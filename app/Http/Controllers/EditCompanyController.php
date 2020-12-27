<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

class EditCompanyController extends Controller
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

    public function create($region_url, $locality_url, $company_url)
    {

        $region      =   $this->regionRepository->getRegionByUrl($region_url);
        $locality    =   $this->localityRepository->getLocalityByUrl($locality_url);
        $company     =   $this->companyRepository->getCompanyByUrl($region->id, $locality->id, $company_url);
        if(empty($company))
            abort(404);
//        dd($company);
        $breadcrumbs    =   [
            $region->name   =>  ['region', $region_url],
            $locality->name =>  ['city', [$region_url, $locality_url]],
            $company->name  =>  ['company', [$region_url, $locality_url, $company_url]]
        ];
        return view('company.edit', compact('company', 'breadcrumbs'));
    }

    public function store(ReviewStoreRequest $request)
    {
        dd($request->all());
        $data=$request->all();
        $data['ip']=$request->ip();
        $data['added']=now();
        $data['status']=0;
        $item=Review::create($data);
        if($item)
            return redirect()->route('home')->with('message-success', 'Thank you for your review, after being moderated it appears on the site!');
        else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }
}
