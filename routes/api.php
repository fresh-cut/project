<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// autocomplite компании
Route::get('company/api/autocomplite/region',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteRegion'])->name('autocompleteRegion');
Route::get('company/api/autocomplite/locality',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteLocality'])->name('autocompleteLocality');
Route::get('company/api/autocomplite/category',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteCategory'])->name('autocompleteCategory');

