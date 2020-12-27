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
Route::redirect('admin', 'admin/regions');

Route::get('/', ['\App\Http\Controllers\IndexController', 'landing'])->name('home');
Route::get('/region/{region}/city/{city}/company/{company}', ['\App\Http\Controllers\IndexController', 'company'] )->name('company');
Route::get('/region/{region}', ['\App\Http\Controllers\IndexController', 'region'] )->name('region');
Route::get('/city/{city}', ['\App\Http\Controllers\IndexController', 'city'] )->name('city');
Route::get('/regions', ['\App\Http\Controllers\IndexController', 'allRegions'] )->name('all-regions');

// оставить отзыв на компанию
Route::get('/region/{region}/city/{city}/company/{company}/add-review', ['\App\Http\Controllers\ReviewController', 'create'] )->name('add-review');
Route::post('/region/{region}/city/{city}/company/{company}/add-review', ['\App\Http\Controllers\ReviewController', 'store'] )->name('store-review');

// изменить компании user
Route::get('/region/{region}/city/{city}/company/{company}/edit', ['\App\Http\Controllers\CompanyAddEditController', 'editCompany'] )->name('edit-company');
Route::post('/region/{region}/city/{city}/company/{company}/edit', ['\App\Http\Controllers\CompanyAddEditController', 'editStore'] )->name('editstore-company');

// создать компанию user
Route::get('/company/new', ['\App\Http\Controllers\CompanyAddEditController', 'addCompany'] )->name('add-company');
Route::post('/company/new', ['\App\Http\Controllers\CompanyAddEditController', 'addStore'] )->name('addstore-company');

// autocomplite компании
Route::get('company/api/autocompliteCategory',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteCategory'])->name('autocompleteCategory');
Route::get('company/api/autocompliteRegion',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteRegion'])->name('autocompleteRegion');
Route::get('company/api/autocompliteLocality',['\App\Http\Controllers\CompanyAddEditController', 'autocompleteLocality'])->name('autocompleteLocality');


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

});
