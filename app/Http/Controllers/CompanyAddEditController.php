<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Mail\AddCompanyMail;
use App\Mail\EditCompanyMail;
use App\Models\Category;
use App\Models\CompaniesAddEdit;
use App\Models\Locality;
use App\Models\Region;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
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
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $footer_localities =   $this->localityRepository->getLocalities(12);
        if(empty($company))
            abort(404);
        $breadcrumbs    =   [
            $region->name   =>  ['region', $region_url],
            $locality->name =>  ['city',  $locality_url],
            $company->name  =>  ['company', [$region_url, $locality_url, $company_url]]
        ];
        return view('company.edit', compact('company', 'breadcrumbs', 'footer_localities', 'footer_regions'));
    }

    public function editStore(CompanyStoreRequest $request)
    {
        $data=$request->all();
        $data['ip']=$request->ip();
        $data['type']='edit';
        $data['added']=now();
        $data['status']='1';
        $item=CompaniesAddEdit::create($data);
        $datafoUrl=[$data['region_url'], $data['locality_url'], $data['url']];
        if($item){
            $url=URL::route('admin.offers-companies.edit', $item->id);
            try{
                Mail::to(settings('admin_email'))->send(new EditCompanyMail($data, $url));
            }catch (\Swift_TransportException $e)
            {
                return redirect()->route('company',$datafoUrl )
                    ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
            }
            return redirect()->route('company',$datafoUrl )
                ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
        }
        else{
            return back()
                ->withErrors(['msg'=>'Fail saving'])
                ->withInput();
        }
    }

    public function addCompany()
    {
        $breadcrumbs=   [settings_translate('footer_add_listing_text','Add listing')=>['add-company','']];
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $footer_localities =   $this->localityRepository->getLocalities(12);
        return view('company.add', compact('breadcrumbs', 'footer_localities', 'footer_regions'));
    }

    public function addStore(CompanyStoreRequest $request)
    {
        $data=$request->all();
        $data['company_id']=0;
        $data['url']=Str::slug($data['name']);
        $data['latitude']=0;
        $data['longitude']=0;
        $data['ip']=$request->ip();
        $data['type']='add';
        $data['added']=now();
        $data['status']='1';
        $item=CompaniesAddEdit::create($data);
        if($item) {
            $url=URL::route('admin.offers-companies.edit', $item->id);
            try{
                Mail::to(settings('admin_email'))->send(new AddCompanyMail($data, $url));
            }catch (\Swift_TransportException $e) {
                return redirect()->route('home')
                    ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
            }
            return redirect()->route('home')
                ->with('message-success', 'Thank you for your suggest, after being moderated it appears on the site!');
        }
        else{
            return back()
                ->withErrors(['msg'=>'Fail saving'])
                ->withInput();
        }
    }


    // autocomplite category
    public function autocompleteCategory(Request $request)
    {
        return $this->autocomplite('category', $request);
    }

    // autocomplite region
    public function autocompleteRegion(Request $request)
    {
        return $this->autocomplite('region', $request);
    }

    // autocomplite locality
    public function autocompleteLocality(Request $request)
    {
        return $this->autocomplite('locality', $request);
    }

    public function autocomplite($table, $request)
    {
        $queries = DB::table($table)
            ->select('id','name')
            ->where('name', 'LIKE', "%{$request->input('term')}%")
            ->take(7)->get();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->name];
        }
        return response()->json($results);
    }
}
