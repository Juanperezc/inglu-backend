<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
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

Passport::routes(null, ['middleware' => 'auth:api']);

//* auth
Route::post('login', 'UserController@login')->name('login');


//todo GROUP AUTH
Route::group(['middleware' => ['auth:api'/* , 'verified' */]], function () {

//*auth
Route::delete('logout', 'UserController@logout');

//*users
Route::apiResource('users', 'UserController');
Route::get('user/me', 'UserController@me');
Route::post('user/change_password', 'UserController@change_password');

//*posts
Route::apiResource('posts', 'PostController');
Route::get('post/categories', 'PostController@all_categories');

//*faqs
Route::apiResource('faqs', 'FaqController');

//*claims
Route::apiResource('claims', 'ClaimController');
//*claim_user
Route::apiResource('claim_user', 'ClaimUserController');

//*suggestion_user
Route::apiResource('suggestion_user', 'SuggestionUserController');

//*file
Route::post('upload_file', 'StorageController@upload');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {


    return $request->user();
});
