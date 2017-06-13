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
/**
 * input : mobile_verification_code, phone
 */
Route::post('confirm-verification-code', 'ApiAuthenticationController@confirmVerificationCode')->name('confirm-verification-code');
//login
/*mobile-access-token*/
Route::post('login','ApiAuthenticationController@authenticationTokenGenerateForMobile');
//forgot password
Route::post('forgot-password','ApiAuthenticationController@forgotPassword');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

