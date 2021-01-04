<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function index()
    {
        $landingPage=[
            'logo-text'=>['Текст около лого в шапке', 'text-area', 'Business services<br>in the United States'],
            'search-text'=>['Текст над строкой поиска', 'text-area', 'Find business services in the United States'],
            'head-text'=>['Текст заголовка', 'text-area', 'All business services in the United States'],
            'after-head-text'=>['Текст после заголовка', 'text-area', 'Welcome to our website where you can find all companies and organizations providing business services in the United States'],
            'popular-company-text'=>['Текст раздела "популярные компании"', 'text-area', 'Popular business services'],
            'popular-region-text'=>['Текст раздела "популярные регионы"', 'text-area', 'Popular states'],
            'popular-locality-text'=>['Текст раздела "популярные города"', 'text-area', 'Popular cities'],
            'latest-reviews-text'=>['Текст "Latest reviews"', 'text-area', 'Latest reviews'],
            ];
        $companyPage=[
            'company-title-text'=>['Текст "title"', 'text-area', '{ $company->name } in { $company->streetaddress }, { $company->region_name }: opening hours, driving directions, official site, phone numbers &  customer reviews.'],
            'company-description-text'=>['Текст "description"', 'text-area', '{ $company->locality_name }, { $company->region_name }.Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'company-after-head-text'=>['Текст после заголовка', 'text-area', 'consumer reviews, opening hours, driving directions, photos etc.'],
            'company-contacts-of-text'=>['Текст "Contacts of"', 'text-area', 'Contacts of'],
            'company-costumer-review-text'=>['Текст "Write a customer review"', 'text-area', 'Write a customer review'],
            'company-suggest-update-text'=>['Текст "Suggest an update"', 'text-area', 'Suggest an update'],
            'company-costumer-review-about-text'=>['Текст "Customer Reviews about"', 'text-area', 'Customer Reviews about'],
            'company-after-costumer-review-about-text'=>['Текст после "Customer Reviews about"', 'text-area', 'At the moment, there are no reviews about {$company->name}. If you bought something at a {$company->name} or visited a service - leave feedback about this business service:'],
            'company-how-rate-text'=>['Текст "How would you rate this service?"', 'text-area', 'How would you rate this service?'],
            'company-about-text'=>['Текст "About"', 'text-area', 'About'],
            'company-nearest-text'=>['Текст сбоку "The nearest business services in"', 'text-area', 'The nearest business services in'],
        ];
        $regionPage=[
            'region-title-text'=>['Текст "title"', 'text-area', 'Business services locations in { $region->name } near me. Opening hours, driving directions, services and customer reviews'],
            'region-description-text'=>['Текст "description"', 'text-area', 'Full information about business services locations in { $region->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'region-head-text'=>['Текст заголовка', 'text-area', 'All Business services in { $region->name }, United States by cities'],
            'region-after-head-text'=>['Текст после заголовка', 'text-area', 'Full information about business services locations in { $region->name }.They are conveniently located near you. Get driving directions for every  location in { $region->name }. Write a review to rate. Get customer phone numbers, opening hours for every business services in { $region->name }.'],
            'region-popular-service-text'=>['Текст "Popular business services in"', 'text-area', 'Popular business services in'],
        ];
        $localityPage=[
            'locality-title-text'=>['Текст "title"', 'text-area', 'Business services in { $locality->name }. Opening hours, driving directions, services and customer reviews'],
            'locality-description-text'=>['Текст "description"', 'text-area', 'Full information about Business services in { $locality->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'locality-head-text'=>['Текст заголовка', 'text-area', 'All Business services in { $locality->name }, United States'],
            'locality-after-head-text'=>['Текст после заголовка', 'text-area', 'Full information about Business services in { $locality->name }.<br>Many Business services in { $locality->name } are conveniently located near you. Find the nearest location! Get driving directions for every Business services location in { $locality->name }. Write a review to rate Business services. Get customer phone numbers, opening hours for every Business services in { $locality->name }.'],
            'locality-popular-service-text'=>['Текст "Popular business services in"', 'text-area', 'Popular business services in'],
        ];
        $asidePage=[
            'aside-popular-services-text'=>['Текст "Popular business services"', 'text-area', 'Popular business services'],
            'aside-latest-reviews-text'=>['Текст "Latest reviews"', 'text-area', 'Latest reviews'],
        ];
        $footerPage=[
            'footer-popular-locality-text'=>['Текст "Popular locations with business services"', 'text-area', 'Popular locations with business services:'],
            'footer-popular-region-text'=>['Текст "Popular states with business services"', 'text-area', 'Popular states with business services:'],
            'footer-all-states-text'=>['Текст "All states"', 'text-area', 'All states'],
            'footer-contact-us-text'=>['Текст "Contact Us"', 'text-area', 'Contact Us'],
            'footer-add-listing-text'=>['Текст "Add listing"', 'text-area', 'Add listing'],
        ];
        $allStatesPage=[
            'allStates-title-text'=>['Текст "title"', 'text-area', 'List of Business services in the United States near me: Opening hours, phone numbers, driving directions and customer reviews'],
            'allStates-description-text'=>['Текст "description"', 'text-area', 'Business services the most complete and current list. Contact information, addresses and phone numbers, opening hours  in all United States cities. Customer Reviews and ratings of popularity Business services.'],
            'allStates-head-text'=>['Текст заголовка', 'text-area', 'All Business services in the United States by cities'],
            'allStates-after-head-text'=>['Текст после заголовка', 'text-area', 'Business services in the United States is the most complete and current list. Contact information, addresses and phone numbers, opening hours of stores in all United States cities. Customer Reviews and ratings of popularity Business services.<br>Many Business services services in United States are conveniently located near you. Find the nearest location! Get driving directions for every Business services location i. Write a review to rate this services. Get customer phone numbers, opening hours for every services.'],
        ];

        return view('admin.translate.all', compact('landingPage', 'companyPage', 'regionPage', 'localityPage', 'asidePage', 'footerPage', 'allStatesPage'));
    }
    public function addTranslate(Request $request, Settings $settings)
    {
        $data=$request->all();
        $result=false;
        foreach($data as $key=>$value)
        {
            if($value==null){
                $result=$settings->forget($key);
                continue;
            }
            $result=$settings->put($key,$value);
        }
        if(!$result)
            return response()->json('', 404);
        return response()->json('', 200);
    }
}
