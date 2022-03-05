<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'MainController@home');
});

Route::group(['prefix' => 'front', 'namespace' => 'Front'], function () {
    Route::get('/', 'MainController@home');
    Route::get('/about-app', 'MainController@about_app')->name('about-app');
    Route::get('/about-us', 'MainController@about_us')->name('about-us');

    Route::get('/contact', 'MainController@contact')->name('contact');
    Route::post('/add-contact', 'MainController@add_contact')->name('add-contact');

    Route::get('/donation-requests', 'MainController@donation_requests')->name('donation-requests');
    Route::get('/donation-details/{id}', 'MainController@donation_details')->name('donation-details');
    Route::post('/donation-requests-filter', 'MainController@donation_requests_filter')->name('donation-requests-filter');
    Route::get('/add-donation-request', 'MainController@add_donation')->name('add-donation-request');
    Route::post('/add-donation-request', 'MainController@add_donation_request')->name('add-donation-request');

    Route::get('/posts', 'MainController@posts')->name('posts');
    Route::get('/post/{id}', 'MainController@post')->name('post');
    Route::post('/toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');

    Route::get('/client-profile/{id}', 'AuthController@profile')->name('client-profile');
    Route::post('/client-profile/{id}', 'AuthController@edit_profile')->name('client-profile');

    Route::get('/signup', 'AuthController@signup')->name('signup');
    Route::post('/signup', 'AuthController@doSignup')->name('signup');
    Route::get('/signin', 'AuthController@signin')->name('signin');
    Route::post('/signin', 'AuthController@doSignin')->name('signin');
    Route::any('client-logout', 'AuthController@clint_logout');
});

//===================================================================================//

Route::get('/admin', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auto_check_permission'], 'namespace' => 'Admin'], function () {
    Route::get('/admin', function () {
        return view('admin.home');
    });

    Route::resource('governorates', 'GovernorateController');
    Route::resource('cities', 'CityController');
    Route::resource('categories', 'CategoryController');

    Route::resource('clients', 'ClientController');
    Route::get('activate/{id}', 'ClientController@activate')->name('activate');
    Route::get('deactivate/{id}', 'ClientController@deactivate')->name('deactivate');
    Route::post('blood-types-filters', 'ClientController@bloodTypesFilter')->name('clients.blood-types-filters');
    Route::get('filter', 'ClientController@filter')->name('clients.filter');

    Route::resource('posts', 'PostController');

    Route::resource('donations', 'DonationController');
    Route::post('blood-types-filter', 'DonationController@bloodTypesFilter')->name('donations.blood-types-filter');
    Route::get('donations-filter', 'DonationController@filter')->name('donations.filter');

    Route::resource('contacts', 'ContactController');
    Route::get('filter-contacts', 'ContactController@filter')->name('contacts.filter');

    Route::resource('settings', 'SettingController');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');
});
