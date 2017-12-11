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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*SignUp*/
Route::post('/user/signup', 'Auth\RegisterController@signup');
Route::post('/user/activation', 'Auth\RegisterController@activateUser');//->name('user.activate');
/*LogOut*/
Route::middleware('auth:api')->post('/user/logout', 'Auth\LogoutController@logoutDevice');
/*ChangePass*/
Route::middleware('auth:api')->post('/user/update-account', 'Auth\AccountController@changeData');


/*Reset password*/
Route::post('/password/email', 'Auth\ForgotPasswordController@getResetToken');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');