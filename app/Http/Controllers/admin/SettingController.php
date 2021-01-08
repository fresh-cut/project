<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSettingsAddRequest;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $mainSettings=[
            'admin_email'=>['Е-mail на который присылать уведомление', 'text'],
            'maps_key'=>['Maps key (<a href="//opencagedata.com" target="_blank">opencagedata.com</a>)', 'text'],
            'google_search_key'=>['Идентификатор поисковой системы', 'text'],
            'google_recapcha_site_key'=>['Google reCAPTCHA ключ сайта', 'text'],
            'google_recapcha_secret_key'=>['Google reCAPTCHA секретный ключ', 'text'],
            'count_popular_company'=>['Количество компаний в блоке Popular services', 'text'],
            'count_last_review'=>['Количество комментариев в блоке Latest reviews', 'text'],
            ];
        $colorSettings=[
            'body-color'=>['Цвет основного шрифта сайта', 'color','#01A3DF'],
            'logo-text-color'=>['Цвет шрифта в шапке около лого', 'color','#01A3DF'],
            'box-shadow-color'=>['Цвет тени вокруг блочных элементов', 'color','#01A3DF'],
            'footer-background-color'=>['Цвет футера', 'color','#01A3DF'],
            'focus-color'=>['Цвет при наведении', 'color','#0A246A'],
        ];
        $landingAdsSettings=[
            'ads-one'=>['1-ое место', 'text-area'],
            'ads-two'=>['2-ое место', 'text-area'],
            'ads-three'=>['3-ое место', 'text-area'],
        ];
        $regionAdsSetting=[
            'ads-four'=>['4-ое место', 'text-area'],
            'ads-five'=>['5-ое место', 'text-area'],
        ];
        $companyAdsSettings=[
            'ads-six'=>['6-ое место', 'text-area'],
            'ads-seven'=>['7-ое место', 'text-area'],
            'ads-eight'=>['8-ое место', 'text-area'],
            'ads-nine'=>['9-ое место', 'text-area'],
        ];
        return view('admin.settings.all', compact('mainSettings', 'colorSettings', 'landingAdsSettings', 'regionAdsSetting', 'companyAdsSettings'));
    }

    public function fileDownload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg|max:2048',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'bg_first_big'.'.'.$request->image->extension();
        $result=$request->image->move(public_path('img'), $imageName);
//        dd($result);
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function addSettings(AdminSettingsAddRequest $request, Settings $settings)
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
