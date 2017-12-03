<?php
declare(strict_types=1);

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

//Route::options('{catchAll}', ['uses' => 'ApiController@options'])->where('catchAll', '(.*)');

Route::group(['prefix' => 'auth'], function () {
    Route::post('v1/sign-up', ['uses' => 'AuthController@register']);
    Route::get('v1/sign-in', ['uses' => 'Api\AuthController@login']);
    /*Route::post('v1/password/change', [
        'uses' => 'AuthController@passwordChange',
        'middleware' => 'jwt.auth',
    ]);*/
    Route::post('v1/password/reset', ['uses' => 'AuthController@passwordReset']);
    Route::post('v1/refresh-token', ['uses' => 'AuthController@refreshToken']);
});