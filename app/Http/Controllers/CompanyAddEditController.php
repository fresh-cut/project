<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Category;
use App\Models\CompaniesAddEdit;
use App\Models\Locality;
use App\Models\Region;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CompanyAddEditController extends Controller
{
    private $companyRepository;
    private $regionRepository;
    private $localityRepository;

    public function __construct()
    {
        $this->companyRepository = app(CompanyRepository::class);
        $this->regionRepository     =   app(RegionRepository::class);
        $this->localityRepository   =   app(LocalityRepository::class);
    }

    public function editCompany($region_url, $locality_url, $company_url)
    {
        $region   = $this->regionRepository->getRegionByUrl($region_url);
        $locality = $this->localityRepository->getLocalityByUrl($locality_url);
        $company  =  $this->companyRepository->getCompanyByUrl($region->id, $locality->id, $company_url);
        if(empty($company))
            abort(404);
        $breadcrumbs    =   [
            $region->name   =>  ['region', $region_url],
            $locality->name =>  ['city', [$region_url, $locality_url]],
            $company->name  =>  ['company', [$region_url, $locality_url, $company_url]]
        ];
        return view('company.edit', compact('company', 'locality', 'region', 'breadcrumbs'));
    }

    public function editStore(CompanyStoreRequest $request)
    {
        $data=$request->all();
        $data=$this->store($data,'edit', $request->ip());
        $item=CompaniesAddEdit::create($data);
        if($item)
            return redirect()->route('company', [$data['region_url'], $data['locality_url'], $data['url']])
                ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
        else{
            return back()
                ->withErrors(['msg'=>'Fail saving'])
                ->withInput();
        }
    }

    public function addCompany()
    {
        $breadcrumbs=   ['Add listing'=>['add-company','']];
        return view('company.add', compact('breadcrumbs'));
    }

    public function addStore(CompanyStoreRequest $request)
    {
        $data=$request->all();
        $data=$this->store($data,'add', $request->ip());
        $data['company_id']=0;
        $data['url']=Str::slug($data['name']);
        $data['latitude']=0;
        $data['longitude']=0;
        $item=CompaniesAddEdit::create($data);
        if($item)
            return redirect()->route('home')
                ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
        else{
            return back()
                ->withErrors(['msg'=>'Fail saving'])
                ->withInput();
        }
    }

    public function store($data, $type, $ip)
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
        $data['ip']=$ip;
        $data['type']=$type;
        $data['added']=now();
        $data['status']=1;
        return $data;
    }


    // autocomplite category
    public function autocompleteCategory(Request $request)
    {
        return $this->autocomplite('Category', $request);
    }

    // autocomplite region
    public function autocompleteRegion(Request $request)
    {
        return $this->autocomplite('Region', $request);
    }

    // autocomplite locality
    public function autocompleteLocality(Request $request)
    {
        return $this->autocomplite('Locality', $request);
    }

    public function autocomplite($table, $request)
    {
        $queries = DB::table($table)
            ->select('id','name')
            ->where('name', 'LIKE', "%{$request->input('term')}%") //Your selected row
            ->take(7)->get();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
    }
}
