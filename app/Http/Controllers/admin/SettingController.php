<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.all');
    }

    public function fileDownload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'bg_first_big'.'.'.$request->image->extension();
        $result=$request->image->move(public_path('img'), $imageName);
//        dd($result);
        Artisan::call('view:clear');
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
