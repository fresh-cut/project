<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCompanyUpdateRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Locality;
use App\Models\Region;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    private $companyRepository;
    private $regionRepository;
    private $localityRepository;

    public function __construct()
    {
        $this->companyRepository = app(CompanyRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last_companies=$this->companyRepository->getLastCompanies(20);
        if(!$last_companies)
        {
            return view('admin.companies.all', compact('last_companies'))
                ->withErrors(['msg'=>'Ошибка в базе данных, записи не найдены']);
        }
        return view('admin.companies.all', compact('last_companies'));
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
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=$this->companyRepository->getCompanyById($id);
        if(!$company)
        {
            return back()
                ->withErrors(['msg'=>'Ошибка в базе данных'])
                ->withInput();
        }
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminCompanyUpdateRequest $request, $company_id)
    {
        $data=$request->all();
        $data=$this->helpUpdate($data);
        $data['url']=Str::slug($data['name']);
        $data['fax']=$data['telephone'];
        $data['email']=$data['website'];
        $item=Company::find($company_id);
        if(!$item)
            return back()->withErrors(['msg'=>'Компания не найдена'])->withInput();
        $result=$item->update($data);
        if($result)
        {
            return redirect()
                ->route('admin.company.edit', $company_id)
                ->with(['success'=>'Успешно сохранено']);
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
        $company=Company::find($id);
        if(!$company){
            return back()
                ->withErrors(['msg'=>'Не найдена компания для удаления'])
                ->withInput();
        }
        $result=$company->delete();
        if($result) {
            return redirect()
                ->route('admin.company.index')
                ->with(['success' => 'Компания успешно удалена']);
        }
        else {
            return back()
                ->withErrors(['msg'=>'Ошибка удаления'])
                ->withInput();
        }
    }

    public function search(Request $request)
    {
        $searchValue=$request->input('search');
        if(mb_substr_count($searchValue,'/')>1){
            $this->regionRepository   =   app(RegionRepository::class);
            $this->localityRepository =   app(LocalityRepository::class);
            $url=rtrim($searchValue,'/');
            $url_array=explode('/', $url);
            $count=count($url_array);
            $region_url=$url_array[$count-3];
            $locality_url=$url_array[$count-2];
            $company_url=$url_array[$count-1];
            $region = $this->regionRepository->getRegionByUrl($region_url);
            if(!$region)
                return redirect()->route('admin.company.index')->withErrors(['msg'=>'Регион с url "'.$region_url.'" не найден'])->withInput();
            $locality = $this->localityRepository->getLocalityByUrl($locality_url);
            if(!$locality)
                return redirect()->route('admin.company.index')->withErrors(['msg'=>'Город с url "'.$locality_url.'" не найден'])->withInput();
            $findCompany=$this->companyRepository->findCompanyByUrl($region->id, $locality->id, $company_url);
            if(!$findCompany || !$findCompany->count())
                return redirect()->route('admin.company.index') ->withErrors(['msg'=>'Компания не найдена'])->withInput();
        }
        else {
            $findCompany=$this->companyRepository->findCompanyByName($searchValue);
            if(!$findCompany || !$findCompany->count())
                return redirect()->route('admin.company.index') ->withErrors(['msg'=>'Компания "'.$searchValue.'" не найдена'])->withInput();
        }
        return view('admin.companies.findCompany', compact('findCompany', 'searchValue'));

    }

    public function helpUpdate($data)
    {
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
