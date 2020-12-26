<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['\App\Http\Controllers\IndexController', 'landing'])->name('home');
Route::get('/region/{region}/city/{city}/company/{company}', ['\App\Http\Controllers\IndexController', 'company'] )->name('company');
Route::get('/region/{region}', ['\App\Http\Controllers\IndexController', 'region'] )->name('region');
Route::get('/region/{region}/city/{city}', ['\App\Http\Controllers\IndexController', 'city'] )->name('city');
Route::get('/regions', ['\App\Http\Controllers\IndexController', 'allRegions'] )->name('all-regions');


Route::get('/listing/new', ['\App\Http\Controllers\ListingController', 'create'] )->name('offer-listing');
Route::post('/listing/store', ['\App\Http\Controllers\ListingController', 'store'] )->name('listing-store');
Route::get('listing/api/autocomplite',['\App\Http\Controllers\ListingController', 'autocomplete'])->name('autocomplete');


//Route::get('/sypex/', function () {
//    echo require_once 'sxd/index.php';
//});



// Админка
$groupData=[
    'namespace'=>'\App\Http\Controllers\admin',
    'prefix'=>'admin/', // то что будет в строке url после имени сайта
];
Route::group($groupData, function(){
    // admin->company
    Route::resource('companies', 'CompanyController')
        ->names('admin.companies');

    // admin->region
    Route::resource('regions', 'RegionController')
        ->names('admin.regions');

    // admin->category
    Route::resource('categories', 'CategoryController')
        ->names('admin.categories');

    // admin->review
    Route::resource('reviews', 'ReviewController')
        ->names('admin.reviews');

    // admin->setting
    Route::get('settings', 'SettingController@index')->name('admin.settings');
    Route::post('settings', 'SettingController@fileDownload')->name('admin.download');

    Route::group(['prefix'=>'regions/{id}/'], function(){
        Route::resource('localities', 'LocalityController')
            ->names('admin.localities');
    });



//    // BlogPost
//    Route::resource('posts', 'PostController')
//        ->except('show') // все ресурсные маршруты кроме show
//        ->names('blog.admin.posts');
//    Route::get('post/{post}/restore/', 'PostController@restore')
//        ->name('blog.admin.posts.restore');
});
