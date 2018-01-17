<?php

use Illuminate\Http\Request;
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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@loginApi');
Route::post('logout', 'Auth\LoginController@logoutApi');
Route::post('password/email', 'Auth\ForgotPasswordController@forgotPasswordApi');

Route::group(['middleware'=>'auth:api'], function (){

    Route::group(['prefix'=>'/user'], function (){
        Route::get('/', function(Request $request){
            return $request->user();
        });
    });

    Route::group(['prefix'=>'articles'], function(){
        Route::get('/', 'ArticleController@index');
        Route::get('{article}', 'ArticleController@show');
        Route::post('/', 'ArticleController@store');
        Route::put('{article}', 'ArticleController@update');
        Route::delete('{article}', 'ArticleController@delete');
    });
});

