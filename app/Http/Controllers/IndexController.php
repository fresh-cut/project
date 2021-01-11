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

        $urlOther=json_decode($settings->get('url_other_catalog'), true);
        $items      =   $this->companyRepository->getCompanies(10);
        $regions    =   $this->regionRepository->getRegions(48);
        $regions    =   $regions->take(floor($regions->count()/4)*4);
        $localities =   $this->localityRepository->getLocalities(48);
        $localities =   $localities->take(floor($localities->count()/4)*4);
        $reviews    =   $this->reviewRepository->getReviews(settings('count_last_review_landing', 3));
        return view('landing.landing', compact('items', 'regions', 'localities', 'reviews', 'urlOther'));
    }

    public function company($region_url, $locality_url, $company_url)
    {
        $region      =   $this->regionRepository->getRegionByUrl($region_url);
        if(!$region) abort(404);
        $locality    =   $this->localityRepository->getLocalityByUrl($locality_url);
        if(!$locality) abort(404);
        $company     =   $this->companyRepository->getCompanyByUrl($region->id, $locality->id, $company_url);
        if(!$company) abort(404);
        $items = $this->companyRepository->getCompanies(settings('count_companies_review', 6));
        $reviews        =   $this->reviewRepository->getReviewsByCompanyId($company->id);
        $nearest_item = $this->companyRepository->getCompaniesByCity(settings('count_nearest_company', 6),$locality->id);
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $last_reviews    =   $this->reviewRepository->getReviews(settings('count_last_review_sidebar', 3));
        $footer_localities =   $this->localityRepository->getLocalities(12);
        $breadcrumbs    =   [
            $region->name   =>  ['region', $region_url],
            $locality->name =>  ['city', $locality_url],
            $company->name  =>  ['company', [$region_url, $locality_url, $company_url]]
         ];
        return view('company.aboutCompany', compact('items','company', 'reviews', 'breadcrumbs', 'nearest_item', 'footer_regions', 'last_reviews', 'footer_localities'));
    }

    public function region($region_url)
    {
        $region     =   $this->regionRepository->getRegionByUrl($region_url);
        if(!$region) abort(404);
        $localities =   $this->localityRepository->getLocalitiesByRegion(24, $region->id);
        $items      =   $this->companyRepository->getCompaniesByRegion(6,$region->id);
        $region_reviews= $this->reviewRepository->getReviewsByRegion($region->id);
        $last_items =   $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews    =   $this->reviewRepository->getReviews(settings('count_last_review_sidebar', 3));
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $footer_localities =   $this->localityRepository->getLocalities(12);
        $breadcrumbs    =   ([
            $region->name   =>  ['region', $region_url],
        ]);
        return view('region.region', compact('region', 'localities', 'items', 'last_reviews', 'last_items', 'breadcrumbs', 'footer_regions', 'footer_localities', 'region_reviews'));
    }

    public function city( $locality_url)
    {
        $locality    =   $this->localityRepository->getLocalityByUrl($locality_url);
        if(!$locality) abort(404);
        $items       =   $this->companyRepository->getCompaniesByCity(24,$locality->id);
        $last_items  =   $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews     =   $this->reviewRepository->getReviews(settings('count_last_review_sidebar', 3));
        $footer_regions    =   $this->regionRepository->getRegions(12);
        $footer_localities =   $this->localityRepository->getLocalities(12);
        $breadcrumbs =   [
            $locality->name =>  ['city', [$locality_url]],
        ];
        return view('city.city', compact('locality', 'items', 'last_items', 'last_reviews', 'breadcrumbs', 'footer_regions', 'footer_localities'));
    }

    public function category($category_url)
    {
        $category = $this->categoryRepository->getCategoryByUrl($category_url);
        if(!$category) abort(404);
        $items = $this->companyRepository->getCompaniesByCategory(24,$category->id);
        $last_items = $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews = $this->reviewRepository->getReviews(settings('count_last_review_sidebar', 3));
        $footer_regions = $this->regionRepository->getRegions(12);
        $footer_localities = $this->localityRepository->getLocalities(12);
        $breadcrumbs =   [
            $category->name =>  ['category', [$category_url]],
        ];
        return view('category.category  ', compact('category', 'items', 'last_items', 'last_reviews', 'breadcrumbs', 'footer_regions', 'footer_localities'));
    }

    public function allRegions()
    {
        $regions = $this->regionRepository->getRegions('all');
        $last_items =   $this->companyRepository->getCompanies(settings('count_popular_company', 4));
        $last_reviews    =   $this->reviewRepository->getReviews(settings('count_last_review_sidebar', 3));
        $footer_regions    =   $regions->random(($regions->count()>12)?12:$regions->count());
        $footer_localities =   $this->localityRepository->getLocalities(12);
        $breadcrumbs=   [settings_translate('footer_all_states_text', 'All states')=>['all-regions','']];
        return view('region.all', compact('regions', 'last_items', 'last_reviews', 'breadcrumbs', 'footer_localities', 'footer_regions'));
    }

    public function aboutUs()
    {
        $breadcrumbs = [settings_translate('footer_about_us_text', 'About Us')=>['about-us','']];
        return view('pages.about-us', compact('breadcrumbs'));
    }

    public function privacyPolicy()
    {
        $breadcrumbs = [settings_translate('footer_privacy_policy_text', 'Privacy Policy')=>['privacy-policy','']];
        return view('pages.privacy-policy', compact('breadcrumbs'));
    }

    public function cookiesPrivacy()
    {
        $breadcrumbs = [settings_translate('footer_cookies_privacy_text', 'Cookies Privacy Policy')=>['cookies-privacy','']];
        return view('pages.cookie-privacy', compact('breadcrumbs'));
    }

    public function faq()
    {
        $breadcrumbs = [settings_translate('footer_faq_text', 'FAQ')=>['faq','']];
        return view('pages.faq', compact('breadcrumbs'));
    }

    public function termsConditions()
    {
        $breadcrumbs = [settings_translate('footer_terms_conditions_text', 'Terms and Conditions')=>['terms-conditions','']];
        $items=[
            '1. Domain of application of Terms and Conditions'=>[
                '1.1 These Terms and Conditions (hereinafter collectively referred to as "Terms") of catalog.com (hereinafter "CYLEX") applies to all services provided in the business directory catalog.com, unless there are special circumstances for a certain service.'=>[
                    '222',
                    '333',
                    ],
                '1.2 In CYLEX portal, users (hereinafter referred to as "Users") can search for different information about companies and authorised natural persons, this information being recorded directly in the CYLEX business directory by legal representatives of firms and authorised natural persons in question or being taken from publicly accessible documents. Clients (hereinafter called "Clients") are authorised natural persons, legal persons, partners or private associations, that present their activities in CYLEX by using the offered services of the portal or that use the different registration requiring services.'=>[

                ],
                '1.3 The users or clients can apply for the portal services offered with or without registration solely on the basis of these terms and conditions. Validity of other conditions is excluded. The terms listed here are also valid if CYLEX fulfils an unconditioned request knowing the client\'s divergent conditions, even if these are different from the ones listed here. CYLEX Employees are not authorised to make additional oral agreements.'=>[],
            ],
            '2. Preliminary conditions for the use of www.cylex.us.com'=>'1',

        ];
        return view('pages.terms-conditions', compact('items', 'breadcrumbs'));
    }


}
