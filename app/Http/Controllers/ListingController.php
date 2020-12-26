<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingCreateRequest;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function create()
    {
        $breadcrumbs=   ['Add listing'=>['offer-listing','']];
        return view('company.add', compact('breadcrumbs'));
    }

    public function autocomplete(ListingCreateRequest $request)
    {
        $data = Category::select("name")
            ->where("name","LIKE","%{$request->input('query')}%")
            ->get();
        return response()->json($data);
    }


    public function store(Request $request)
    {
        dd($request->all(),$_POST,__METHOD__);
    }
}
