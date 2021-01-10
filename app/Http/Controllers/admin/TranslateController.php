<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Settings;
use App\SettingsTranslate;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function index()
    {
        $landingPage=[
            'title_text'=>['Текст "title"', 'text-area', env('APP_NAME')],
            'description_text'=>['Текст "description"', 'text-area', 'This is '.env('APP_NAME')],
            'logo_text'=>['Текст около лого в шапке', 'text-area', ''],
            'search_text'=>['Текст над строкой поиска', 'text-area', 'Find business services in the United States'],
            'head_text'=>['Текст заголовка', 'text-area', 'All business services in the United States'],
            'after_head_text'=>['Текст после заголовка', 'text-area', 'Welcome to our website where you can find all companies and organizations providing business services in the United States'],
            'popular_company_text'=>['Текст раздела "популярные компании"', 'text-area', 'Popular business services'],
            'popular_region_text'=>['Текст раздела "популярные регионы"', 'text-area', 'Popular states'],
            'popular_locality_text'=>['Текст раздела "популярные города"', 'text-area', 'Popular cities'],
            'latest_reviews_text'=>['Текст "Latest reviews"', 'text-area', 'Latest reviews'],
            'other_catalog_text'=>['Текст "Catalog in other country"', 'text-area', 'Catalog in other Countries. Our business directories around world'],
            ];
        $companyPage=[
            'company_title_text'=>['Текст "title"', 'text-area', '{ $company->name } in { $company->streetaddress }, { $company->region_name }: opening hours, driving directions, official site, phone numbers &  customer reviews.'],
            'company_description_text'=>['Текст "description"', 'text-area', '{ $company->locality_name }, { $company->region_name }.Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'company_after_head_text'=>['Текст после заголовка', 'text-area', 'consumer reviews, opening hours, driving directions, photos etc.'],
            'company_contacts_of_text'=>['Текст "Contacts of"', 'text-area', 'Contacts of'],
            'company_costumer_review_text'=>['Текст "Write a customer review"', 'text-area', 'Write a customer review'],
            'company_suggest_update_text'=>['Текст "Suggest an update"', 'text-area', 'Suggest an update'],
            'company_costumer_review_about_text'=>['Текст "Customer Reviews about"', 'text-area', 'Customer Reviews about'],
            'company_after_costumer_review_about_text'=>['Текст после "Customer Reviews about"', 'text-area', 'At the moment, there are no reviews about {$company->name}. If you bought something at a {$company->name} or visited a service - leave feedback about this business service:'],
            'company_how_rate_text'=>['Текст "How would you rate this service?"', 'text-area', 'How would you rate this service?'],
            'company_about_text'=>['Текст "About"', 'text-area', 'About'],
            'company_nearest_text'=>['Текст сбоку "The nearest business services in"', 'text-area', 'The nearest business services in'],
        ];
        $regionPage=[
            'region_title_text'=>['Текст "title"', 'text-area', 'Business services locations in { $region->name } near me. Opening hours, driving directions, services and customer reviews'],
            'region_description_text'=>['Текст "description"', 'text-area', 'Full information about business services locations in { $region->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'region_head_text'=>['Текст заголовка', 'text-area', 'All Business services in { $region->name }, United States by cities'],
            'region_after_head_text'=>['Текст после заголовка', 'text-area', 'Full information about business services locations in { $region->name }.They are conveniently located near you. Get driving directions for every  location in { $region->name }. Write a review to rate. Get customer phone numbers, opening hours for every business services in { $region->name }.'],
            'region_popular_cities_text'=>['Текст "Популярные города в регионе"', 'text-area', 'Popular  cities in { $region->name }, where there are business services'],
            'region_latest_review_text'=>['Текст "Latest reviews" (если есть)', 'text-area', 'Latest reviews about the United States business services in'],
        ];
        $localityPage=[
            'locality_title_text'=>['Текст "title"', 'text-area', 'Business services in { $locality->name }. Opening hours, driving directions, services and customer reviews'],
            'locality_description_text'=>['Текст "description"', 'text-area', 'Full information about Business services in { $locality->name }. Find the nearest location, opening hours and driving diections. Customer reviews and available services.'],
            'locality_head_text'=>['Текст заголовка', 'text-area', 'All Business services in { $locality->name }, United States'],
            'locality_after_head_text'=>['Текст после заголовка', 'text-area', 'Full information about Business services in { $locality->name }.<br>Many Business services in { $locality->name } are conveniently located near you. Find the nearest location! Get driving directions for every Business services location in { $locality->name }. Write a review to rate Business services. Get customer phone numbers, opening hours for every Business services in { $locality->name }.'],
            'locality_popular_service_text'=>['Текст "Popular business services in"', 'text-area', 'Popular business services in'],
        ];

        $categoryPage=[
            'category_title_text'=>['Текст "title"', 'text-area', '{ $category->name }'],
            'category_description_text'=>['Текст "description"', 'text-area', '{ $category->name }'],
            'category_head_text'=>['Текст заголовка', 'text-area', 'Popular Business services with "{ $category->name }" category in United States'],
            'category_after_head_text'=>['Текст после заголовка', 'text-area', 'Many services with "{ $category->name }" category in United States are conveniently located near you. Find the nearest location! Get driving directions for every services with "{ $category->name }" category location in United States. Write a review to rate this services. Get customer phone numbers, opening hours for every services with "{ $category->name }" category in United States.'],
            'category_popular_service_text'=>['Текст "Popular business services"', 'text-area', 'Popular business services with "{ $category->name }" category'],
        ];

        $asidePage=[
            'aside_popular_services_text'=>['Текст "Popular business services"', 'text-area', 'Popular business services'],
            'aside_latest_reviews_text'=>['Текст "Latest reviews"', 'text-area', 'Latest reviews'],
        ];
        $footerPage=[
            'footer_popular_locality_text'=>['Текст "Popular locations with business services"', 'text-area', 'Popular locations with business services:'],
            'footer_popular_region_text'=>['Текст "Popular states with business services"', 'text-area', 'Popular states with business services:'],
            'footer_all_states_text'=>['Текст "All states"', 'text-area', 'All states'],
            'footer_contact_us_text'=>['Текст "Contact Us"', 'text-area', 'Contact Us'],
            'footer_about_us_text'=>['Текст "About Us"', 'text-area', 'About Us'],
            'footer_add_listing_text'=>['Текст "Add listing"', 'text-area', 'Add listing'],
            'footer_privacy_policy_text'=>['Текст "Privacy Policy"', 'text-area', 'Privacy Policy'],
            'footer_cookies_privacy_text'=>['Текст "Сookies Privacy Policy"', 'text-area', 'Сookies Privacy Policy'],
            'footer_faq_text'=>['Текст "FAQ"', 'text-area', 'FAQ'],
            'footer_terms_conditions_text'=>['Текст "Terms and conditions"', 'text-area', 'Terms and conditions'],
        ];
        $allStatesPage=[
            'allStates_title_text'=>['Текст "title"', 'text-area', 'List of Business services in the United States near me: Opening hours, phone numbers, driving directions and customer reviews'],
            'allStates_description_text'=>['Текст "description"', 'text-area', 'Business services the most complete and current list. Contact information, addresses and phone numbers, opening hours  in all United States cities. Customer Reviews and ratings of popularity Business services.'],
            'allStates_head_text'=>['Текст заголовка', 'text-area', 'All Business services in the United States by cities'],
            'allStates_after_head_text'=>['Текст после заголовка', 'text-area', 'Business services in the United States is the most complete and current list. Contact information, addresses and phone numbers, opening hours of stores in all United States cities. Customer Reviews and ratings of popularity Business services.<br>Many Business services services in United States are conveniently located near you. Find the nearest location! Get driving directions for every Business services location i. Write a review to rate this services. Get customer phone numbers, opening hours for every services.'],
        ];

        $updateCompanyPage=[
            'updatePage_title_text'=>['Текст "title"', 'text-area', 'Suggest an update'],
            'updatePage_description_text'=>['Текст "description"', 'text-area', 'Suggest an update'],
            'updatePage_head_text'=>['Текст заголовка', 'text-area', 'Suggest an update'],
            'updatePage_required_text'=>['Текст "Required information"', 'text-area', 'Required information'],
            'updatePage_button_text'=>['Текст кнопки', 'text-area', 'Send'],
        ];

        $writeReviewPage=[
            'reviewPage_title_text'=>['Текст "title"', 'text-area', 'Write a review about'],
            'reviewPage_description_text'=>['Текст "description"', 'text-area', 'Write a review about'],
            'reviewPage_head_text'=>['Текст заголовка', 'text-area', 'Write a review'],
            'reviewPage_required_text'=>['Текст "Required information"', 'text-area', 'Required information'],
            'reviewPage_button_text'=>['Текст кнопки', 'text-area', 'Add a review'],
        ];

        $addCompanyPage=[
            'addCompanyPage_title_text'=>['Текст "title"', 'text-area', 'Add listing'],
            'addCompanyPage_description_text'=>['Текст "description"', 'text-area', 'Add listing'],
            'addCompanyPage_head_text'=>['Текст заголовка', 'text-area', 'Add listing'],
            'addCompanyPage_required_text'=>['Текст "Required information"', 'text-area', 'Required information'],
            'addCompanyPage_button_text'=>['Текст кнопки', 'text-area', 'Send'],
        ];

        $contactPage=[
            'contactPage_title_text'=>['Текст "title"', 'text-area', 'Contact us'],
            'contactPage_description_text'=>['Текст "description"', 'text-area', 'Send message to site administrator'],
            'contactPage_head_text'=>['Текст заголовка', 'text-area', 'Contact us'],
            'contactPage_required_text'=>['Текст "Required information"', 'text-area', 'Required information'],
            'contactPage_button_text'=>['Текст кнопки', 'text-area', 'Send'],
        ];

        return view('admin.translate.all', compact('landingPage', 'companyPage', 'regionPage', 'localityPage', 'categoryPage', 'asidePage', 'footerPage', 'allStatesPage', 'updateCompanyPage', 'writeReviewPage', 'addCompanyPage', 'contactPage'));
    }
    public function addTranslate(Request $request, SettingsTranslate $settings)
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
