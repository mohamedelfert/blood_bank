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

Route::group(['prefix' => 'v1','namespace' => 'Api'],function (){
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');

    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@ceties');
    Route::get('categories','MainController@categories');
    Route::get('blood-types','MainController@bloodTypes');
    Route::get('contact-us','MainController@contacts');
    Route::post('contact-us','MainController@addContacts');

    Route::middleware('auth:api')->group(function () {
        Route::get('settings','MainController@settings');
        Route::put('settings/{id}','MainController@updateSettings');

        Route::get('posts','MainController@posts');
        Route::get('list-favourites','MainController@listFavourites');

        Route::get('donations','MainController@donations');
        Route::post('donations','MainController@donationRequest');
    });
});
