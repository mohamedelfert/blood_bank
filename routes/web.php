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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    });

    Route::resource('governorates','GovernorateController');
    Route::resource('cities','CityController');
    Route::resource('categories','CategoryController');

    Route::resource('clients','ClientController');
    Route::get('activate/{id}','ClientController@activate');
    Route::get('deactivate/{id}','ClientController@deactivate');
    Route::post('blood-types-filter','ClientController@bloodTypesFilter')->name('clients.blood-types-filter');
    Route::get('filter','ClientController@filter');

    Route::resource('posts','PostController');

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    });
});
