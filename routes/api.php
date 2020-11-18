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


Route::group(['namespace' => 'API'], function () {

    Route::resource('banks', 'BankController');

    Route::group(['prefix' => 'countries'], function () {
        Route::get('/all', 'CountryController@index');
        Route::get('/', 'CountryController@countries');
        Route::get('/cities', 'CountryController@cities');
        Route::get('/areas', 'CountryController@areas');
        Route::get('/zones', 'CountryController@zones');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@categories');
        Route::get('/sub', 'CategoryController@subcategories');
        Route::get('/all', 'CategoryController@index');
    });

    Route::group(['prefix' => 'reviews'], function () {
        Route::post('/store', 'ReviewController@store');
        Route::post('/like', 'ReviewController@commentLike');
        Route::post('/dislike', 'ReviewController@commentDislike');
    });

    Route::group(['prefix' => 'registers'], function () {
        Route::post('/store', 'AuthController@store');
    });

    Route::group(['prefix' => 'login'], function () {
        Route::post('/', 'AuthController@logins');
    });

    Route::group(['prefix' => 'social-login'], function () {
        Route::post('/', 'AuthController@logins');
    });
    
    Route::group(['prefix' => 'profiles'], function () {
        Route::get('/show', 'AuthController@profile');
        Route::post('/update', 'AuthController@updateProfile');
    });

    Route::group(['prefix' => 'become-company'], function () {
        Route::post('/', 'AuthController@becomeCompany');
    });

    Route::group(['prefix' => 'become-affilator'], function () {
        Route::post('/', 'AuthController@becomeAffilator');
    });

    Route::group(['prefix' => 'saved-tokens'], function () {
        Route::post('/', 'TokenController@saveTokens');
    });

    Route::group(['prefix' => 'reset-password'], function () {
        Route::post('/send-mail', 'AuthController@sendMail');
        Route::post('/check-code', 'AuthController@checkCode');
        Route::post('/update-password', 'AuthController@resetPassword');
    });

    Route::group(['prefix' => 'wishlists'], function () {  /// done
        Route::get('/', 'WhishlistController@index');
        Route::post('/store', 'WhishlistController@store');
        Route::delete('/destroy', 'WhishlistController@destroy');
    });

    Route::group(['prefix' => 'tickets'], function () {  /// done
        Route::get('/', 'TicketController@index');
        Route::get('/show', 'TicketController@show');
        Route::post('/store', 'TicketController@store');
        Route::post('/reply', 'TicketController@reply');
    });

    Route::group(['prefix' => 'addresses'], function () {  /// done
        Route::get('/', 'AddressController@index');
        Route::get('/show', 'AddressController@show');
        Route::post('/store', 'AddressController@store');
        Route::delete('/destroy', 'AddressController@destroy');
    });

    Route::group(['prefix' => 'companies'], function () {  /// done
        Route::get('/', 'CompanyController@index');
        Route::get('/show', 'CompanyController@show');
        Route::get('/ads', 'CompanyController@ads');
        Route::get('/subscriptions', 'CompanyController@subscriptions');
        Route::post('/store', 'CompanyController@store');
    });
    Route::resource('subscriptions', 'SubscriptionController');

    Route::get('/home', 'HomeController@index');
    Route::get('/special-ads', 'HomeController@specialAds');
    Route::post('/search', 'HomeController@search');
    Route::get('/policies', 'HomeController@policies');
    Route::get('/about-us', 'HomeController@aboutUs');

    Route::post('/payments', 'PaymentController@index');

    Route::group(['prefix' => 'gateways'], function () {
        Route::get('/frame', 'VapulusPaymentGatway@show_frame');
        Route::post('/pay', 'ReviewController@pay');
    });

});
