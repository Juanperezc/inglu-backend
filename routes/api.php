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
Route::get('user/index_patient', 'UserController@index_patient');
Route::get('user/index_doctors', 'UserController@index_doctors');
Route::get('user/specialty/{user}', 'UserController@show_specialties');
Route::get('user/workspace/{user}', 'UserController@show_workspaces');
Route::get('user/medical_record/{user}', 'UserController@show_medical_record');
Route::put('user/medical_record/{user}', 'UserController@update_medical_record');
Route::post('user/specialty/{user}', 'UserController@store_specialty');
Route::post('user/workspace/{user}', 'UserController@store_workspace');
Route::post('user/specialty_delete/{user}', 'UserController@delete_specialty');
Route::post('user/workspace_delete/{user}', 'UserController@delete_workspace');
Route::get('user/me', 'UserController@me');
Route::post('user/change_password/{user}', 'UserController@change_password');

//*appointments
Route::apiResource('appointments', 'AppointmentController');

//*specialties
Route::apiResource('specialties', 'SpecialtyController');

//*contacts
Route::apiResource('contacts', 'ContactController');

//*posts
Route::apiResource('posts', 'PostController');

//*post_category
Route::apiResource('post_category', 'PostCategoryController');
Route::get('post/categories', 'PostController@all_categories');

//*faqs
Route::apiResource('faqs', 'FaqController');

//*claims
Route::apiResource('claims', 'ClaimController');
//*claim_user
Route::apiResource('claim_user', 'ClaimUserController');

//*suggestions
Route::apiResource('suggestions', 'SuggestionController');
//*suggestion_user
Route::apiResource('suggestion_user', 'SuggestionUserController');

//*file
Route::post('upload_file', 'StorageController@upload');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {


    return $request->user();
});
