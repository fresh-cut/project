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
            'admin_email'=>'Е-mail на который присылать уведомление',
            'google_maps_key'=>'Google maps key',
            'google_recapcha_site_key'=>'Google reCAPTCHA ключ сайта',
            'google_recapcha_secret_key'=>'Google reCAPTCHA секретный ключ',
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
            $result=$settings->put($key,$value);
        }
        if(!$result)
            return response()->json('', 404);
        return response()->json('', 200);
    }
}
