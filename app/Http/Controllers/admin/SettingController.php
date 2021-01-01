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
        $data=[
            'admin_email'=>['Е-mail на который присылать уведомление', 'text'],
            'google_maps_key'=>['Google maps key', 'text'],
            'google_recapcha_site_key'=>['Google reCAPTCHA ключ сайта', 'text'],
            'google_recapcha_secret_key'=>['Google reCAPTCHA секретный ключ', 'text'],
            'count_popular_company'=>['Количество компаний в блоке Popular services', 'text'],
            'count_last_review'=>['Количество комментариев в блоке Latest reviews', 'text'],
            'body-color'=>['Цвет основного шрифта сайта', 'color'],
            'logo-text-color'=>['Цвет шрифта в шапке около лого', 'color'],
            'box-shadow-color'=>['Цвет тени вокруг блочных элементов', 'color'],
            'footer-background-color'=>['Цвет футера', 'color'],
            ];
        return view('admin.settings.all', compact('data'));
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
