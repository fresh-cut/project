<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingCreateRequest;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function create()
    {
        $breadcrumbs=   ['Add listing'=>['offer-listing','']];
        return view('company.add', compact('breadcrumbs'));
    }

    public function autocomplete(Request $request)
    {
       $queries = Category::select('id','name')
            ->where('name', 'LIKE', "%{$request->input('term')}%") //Your selected row
            ->take(7)->get();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
    }


    public function store(ListingCreateRequest $request)
    {
        dd($request->all(),$_POST,__METHOD__);
    }
}
