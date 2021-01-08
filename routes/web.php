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
Route::redirect('admin', 'admin/settings');
//Route::redirect('admin/category/search', '/admin/category');

Route::get('/', ['\App\Http\Controllers\IndexController', 'landing'])->name('home');
Route::get('/{region}/{city}/{company}', ['\App\Http\Controllers\IndexController', 'company'] )->name('company');
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



// contact us
Route::get('/contact-us', ['\App\Http\Controllers\ContactUsController', 'create'] )->name('contact-us');
Route::post('/contact-us', ['\App\Http\Controllers\ContactUsController', 'store'] )->name('store-contact-us');

// about us
Route::get('/about-us', ['\App\Http\Controllers\IndexController', 'aboutUs'] )->name('about-us');

// search
//Route::get('/search', ['\App\Http\Controllers\SearchController', 'search'] )->name('search');


// login
Route::get('/login', ['\App\Http\Controllers\LoginController', 'index'] )->name('login.index');
Route::post('/login', ['\App\Http\Controllers\LoginController', 'authenticate'] )->name('login');
Route::get('/logout', ['\App\Http\Controllers\LoginController', 'logout'] )->name('logout');

// sitemap
Route::get('/sitemap.xml', ['\App\Http\Controllers\SitemapController', 'index'] )->name('sitemap.index');
Route::get('/sitemap.main.xml', ['\App\Http\Controllers\SitemapController', 'main'] )->name('sitemap.main');
Route::get('/sitemap.localities.xml', ['\App\Http\Controllers\SitemapController', 'localities'] )->name('sitemap.localities');
Route::get('/sitemap.items.{id}.xml', ['\App\Http\Controllers\SitemapController', 'items'] )->where('id', '[0-9]+')->name('sitemap.items');


// Админка
$groupData=[
    'middleware'=>'costumAuth',
    'namespace'=>'\App\Http\Controllers\admin',
    'prefix'=>'admin/', // то что будет в строке url после имени сайта
];
Route::group($groupData, function(){
    // admin->offerscompany
    Route::resource('offers-company', 'OffersCompanyController')
        ->names('admin.offers-companies');

    // admin->company
    Route::post('company/search','CompanyController@search')->name('admin.company.search');
    Route::resource('company', 'CompanyController')
        ->names('admin.company');

    // admin->region
    Route::resource('region', 'RegionController')
        ->names('admin.regions');

    // admin->category
    Route::post('category/search','CategoryController@search')->name('admin.categories.search');
    Route::resource('category', 'CategoryController')
        ->names('admin.categories');

    // admin->review
    Route::resource('review', 'ReviewController')
        ->names('admin.reviews');

    // admin->setting
    Route::get('settings', 'SettingController@index')->name('admin.settings');
    Route::post('settings/filehead', 'SettingController@fileHeadDownload')->name('admin.download.head');
    Route::post('settings/filelogo', 'SettingController@fileLogoDownload')->name('admin.download.logo');
    Route::post('settings/add', 'SettingController@addSettings')->name('admin.addSettings');

    // admin->translate
    Route::get('translate', 'TranslateController@index')->name('admin.translate');
    Route::post('translate/add', 'TranslateController@addTranslate')->name('admin.addTranslate');

    Route::group(['prefix'=>'regions/{id}/'], function(){
        Route::post('localities/search','LocalityController@search')->name('admin.localities.search');

        Route::resource('localities', 'LocalityController')
            ->names('admin.localities');
    });

});
