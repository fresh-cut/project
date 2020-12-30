<?php

namespace App\Http\Controllers;

use App\Mail\AddCompanyMail;
use App\Repositories\CategoryRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\LocalityRepository;
use App\Repositories\RegionRepository;
use App\Repositories\ReviewRepository;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    //
    private $companyRepository;
    private $regionRepository;
    private $localityRepository;
    private $reviewRepository;
    private $categoryRepository;
    public function __construct()
    {
        $this->companyRepository    =   app(CompanyRepository::class);
        $this->regionRepository     =   app(RegionRepository::class);
        $this->localityRepository   =   app(LocalityRepository::class);
        $this->reviewRepository     =   app(ReviewRepository::class);
        $this->categoryRepository   =   app(CategoryRepository::class);
    }

    public function landing(Settings $settings)
    {
        $items      =   $this->companyRepository->getCompanies(10);
        $regions    =   $this->regionRepository->getRegions(48);
        $localities =   $this->localityRepository->getLocalities(48);
        $reviews    =   $this->reviewRepository->getReviews(3);
        return view('landing.landing', compact('items', 'regions', 'localities', 'reviews'));
    }

    public function company($region_url, $locality_url, $company_url)
    {
        $region      =   $this->regionRepository->getRegionByUrl($region_url);
        $locality    =   $this->localityRepository->getLocalityByUrl($locality_url);
        $company     =   $this->companyRepository->getCompanyByUrl($region->id, $locality->id, $company_url);
        $reviews        =   $this->reviewRepository->getReviewsByCompanyId($company->id);
        $nearest_item = $this->companyRepository->getCompaniesByCity(6,$locality->id);
        $breadcrumbs    =   [
            $region->name   =>  ['region', $region_url],
            $locality->name =>  ['city', $locality_url],
            $company->name  =>  ['company', [$region_url, $locality_url, $company_url]]
         ];
        return view('company.aboutCompany', compact('company', 'reviews', 'breadcrumbs', 'nearest_item'));
    }

    public function region($region_url)
    {
        $region     =   $this->regionRepository->getRegionByUrl($region_url);
        $localities =   $this->localityRepository->getLocalitiesByRegion(24, $region->id);
        $items      =   $this->companyRepository->getCompaniesByRegion(6,$region->id);
        $last_items =   $this->companyRepository->getCompanies(4);
        $last_reviews    =   $this->reviewRepository->getReviews(3);
        $breadcrumbs    =   ([
            $region->name   =>  ['region', $region_url],
        ]);
        return view('region.region', compact('region', 'localities', 'items', 'last_reviews', 'last_items', 'breadcrumbs'));
    }

    public function city( $locality_url)
    {
        $locality    =   $this->localityRepository->getLocalityByUrl($locality_url);
        $items       =   $this->companyRepository->getCompaniesByCity(24,$locality->id);
        $last_items  =   $this->companyRepository->getCompanies(4);
        $last_reviews     =   $this->reviewRepository->getReviews(3);
        $breadcrumbs =   [
            $locality->name =>  ['city', [$locality_url]],
        ];
        return view('city.city', compact('locality', 'items', 'last_items', 'last_reviews', 'breadcrumbs'));
    }

    public function allRegions()
    {
        $regions = $this->regionRepository->getRegions('all');
        $last_items =   $this->companyRepository->getCompanies(4);
        $last_reviews    =   $this->reviewRepository->getReviews(3);
        $breadcrumbs=   ['All states'=>['all-regions','']];
        return view(    'region.all', compact('regions', 'last_items', 'last_reviews', 'breadcrumbs'));
    }

}
