<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOffersCompanyUpdateRequest;
use App\Models\Category;
use App\Models\CompaniesAddEdit;
use App\Models\Company;
use App\Models\Locality;
use App\Models\Region;
use App\Repositories\CompanyAddEditRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OffersCompanyController extends Controller
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
        return view('admin.offersCompanies.all', compact('addCompany', 'editCompany'));
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
            return redirect()->route('admin.offers-companies.index')->withErrors(['msg'=>'Компания не найдена']);
        $old_item='';
        if($item->type=='edit') {
            $old_item=$this->companyRepository->getCompanyById($item->company_id);
            if(!$old_item)
                return back()->withErrors(['msg'=>'Компания не найдена'])->withInput();
        }
        return view('admin.offersCompanies.edit', compact('item', 'old_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminOffersCompanyUpdateRequest $request, $comAddEdit_id)
    {
        $data=$request->all();
        $data=$this->helpUpdate($data);
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
            if($this->destroy($comAddEdit_id, 'return'))
            {
                return redirect()
                    ->route('admin.company.edit', ($data['type']=='edit')?$data['company_id']:$result->id)
                    ->with(['success'=>'Успешно сохранено']);
            }
            else{
                return back()
                    ->withErrors(['msg'=>'Ошибка сохранения'])
                    ->withInput();
            }
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
    public function destroy($id, $return='')
    {
        $company=CompaniesAddEdit::find($id);
        if(!$company) {
            return back()
                ->withErrors(['msg'=>'Непредвиденная ошибка, перезагрузите страницу'])
                ->withInput();
        }
        $result=$company->delete();
        if($result){
            return ($return=='return')?true:redirect()->route('admin.offers-companies.index')->with(['success'=>'Успешно завершено']);
        }
        return ($return=='return')?false:redirect()->route('admin.offers-companies.index')->withErrors(['msg'=>'Непредвиденная ошибка, перезагрузите страницу'])->withInput();
    }

    public function helpUpdate($data){
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
