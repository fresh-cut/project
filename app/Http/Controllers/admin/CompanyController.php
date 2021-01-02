<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCompanyUpdateRequest;
use App\Models\Category;
use App\Models\CompaniesAddEdit;
use App\Models\Company;
use App\Models\Locality;
use App\Models\Region;
use App\Repositories\CompanyAddEditRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    private $companyAddEditRepository;
    private $companyRepository;
    public function __construct()
    {
        $this->companyAddEditRepository =  app(CompanyAddEditRepository::class);
        $this->companyRepository =  app(CompanyRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editCompany=$this->companyAddEditRepository->getCompanies('all', 'edit');
        $addCompany=$this->companyAddEditRepository->getCompanies('all', 'add');
        return view('admin.companies.all', compact('addCompany', 'editCompany'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $item=$this->companyAddEditRepository->getCompanyById($id);
        if(!$item)
            return back()->withErrors(['msg'=>'Компания не найдена'])->withInput();
        $old_item='';
        if($item->type=='edit') {
            $old_item=$this->companyRepository->getCompanyById($item->company_id);
            if(!$old_item)
                return back()->withErrors(['msg'=>'Компания не найдена'])->withInput();
        }
        return view('admin.companies.edit', compact('item', 'old_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminCompanyUpdateRequest $request, $comAddEdit_id)
    {
        $data=$request->all();
        $data=$this->helpStore($data);
        $data['url']=Str::slug($data['name']);
        $data['fax']=$data['telephone'];
        $data['email']=$data['website'];
        if($data['type']=='edit'){
            $item=Company::find($data['company_id']);
            if(!$item)
                return back()->withErrors(['msg'=>'Компания не найдена'])->withInput();
            $result=$item->update($data);
        }
        else {
            $result=Company::create($data);
        }
        if($result){
            return $this->destroy($comAddEdit_id);
        }
        else {
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result=CompaniesAddEdit::find($id)->delete();
        if($result){
            return redirect()
                ->route('admin.companies.index')
                ->with(['success'=>'Операция успешно завершена']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка операции'])
                ->withInput();
        }
    }

    public function helpStore($data){
        $category=Category::where('name','=', $data['category_name'])->first();
        if(!$category)
            $category=Category::create(['name'=>$data['category_name'],'url'=>Str::slug($data['category_name'])]);
        $region=Region::where('name','=', $data['region_name'])->first();
        if(!$region)
            $region=Region::create(['name'=>$data['region_name'],'url'=>Str::slug($data['region_name'])]);
        $locality=Locality::where('name','=', $data['locality_name'])->first();
        if(!$locality)
            $locality=Locality::create(['name'=>$data['locality_name'],'url'=>Str::slug($data['locality_name']),'region_id'=>$region->id, 'bla-bla'=>'bla-bla']);

        $data['category_id']=$category->id;
        $data['region_id']=$region->id;
        $data['locality_id']=$locality->id;
        return $data;
    }
}
