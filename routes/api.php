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
    /**************************** Authentication *******************************/
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');

    /**************************** Governorates *******************************/
    Route::resource('governorates','GovernorateController'); // OR
//    Route::get('governorates','GovernorateController@index');
//    Route::get('governorates/{id}','GovernorateController@show');
//    Route::post('governorates','GovernorateController@store');
//    Route::put('governorates/{id}','GovernorateController@update');
//    Route::delete('governorates/{id}','GovernorateController@destroy');

    /**************************** Cities *******************************/
    Route::resource('cities','CityController'); // OR
//    Route::get('cities','CityController@index');
//    Route::get('cities/{id}','CityController@show');
//    Route::post('cities','CityController@store');
//    Route::put('cities/{id}','CityController@update');
//    Route::delete('cities/{id}','CityController@destroy');

    /**************************** Categories *******************************/
    Route::resource('categories','CategoryController');

    /**************************** Blood Type *******************************/
    Route::resource('blood-types','BloodTypeController');

    /**************************** Contacts *******************************/
    Route::get('contacts','ContactController@index');
    Route::get('contacts/{id}','ContactController@show');
    Route::post('contacts','ContactController@store');
    Route::delete('contacts/{id}','ContactController@destroy');

    /**************************** Settings *******************************/
    Route::get('settings','SettingController@index');
    Route::put('settings/{id}','SettingController@update');

    Route::middleware('auth:api')->group(function () {
        Route::get('posts','PostController@posts');
    });
});
