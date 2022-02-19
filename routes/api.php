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


    Route::middleware('auth:api')->group(function () {
        Route::get('settings','MainController@settings');
        Route::put('settings/{id}','MainController@updateSettings');

        Route::get('contact-us','MainController@contacts');
        Route::post('contact-us','MainController@addContacts');

        Route::get('posts','MainController@posts');
        Route::get('post','MainController@post');
        Route::get('list-favourites','MainController@listFavourites');
        Route::post('post-toggle-favourite','MainController@postToggleFavourite');

        Route::get('donations','MainController@donations');
        Route::get('donation','MainController@donation');
        Route::post('donation-request/create','MainController@donationRequestCreate');

        Route::get('notifications','MainController@notifications');
        Route::get('notifications-count','MainController@notificationsCount');
        Route::post('notifications-settings','AuthController@notificationsSettings');

        Route::post('profile','AuthController@profile');


    });
});
