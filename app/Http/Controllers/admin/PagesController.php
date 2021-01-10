<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Settings_404;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page_404=[
            'header_text'=>['Текст "404 - Page not found"', 'text-area', '404 - Page not found'],
        ];
        return view('admin.pages.all', compact('page_404'));
    }

    public function add_404(Request $request, Settings_404 $settings)
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
