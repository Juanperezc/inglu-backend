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
Route::group(['middleware' => ['auth:api' /* , 'verified' */]], function () {

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

//*treatments
    Route::apiResource('treatments', 'TreatmentController');

//*appointments
    Route::apiResource('appointments', 'AppointmentController');
    Route::get('appointment/treatment/{appointment}', 'AppointmentController@show_treatment');

//*events
    Route::apiResource('events', 'EventController');
    Route::apiResource('event/user', 'EventUserController');

//*specialties
    Route::apiResource('specialties', 'SpecialtyController');

//*contacts
    Route::resource('contacts', 'ContactController', [
        'except' => [
            'store',
        ],
    ]);
//*posts
    Route::resource('posts', 'PostController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*post_category
    Route::resource('post_category', 'PostCategoryController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*faqs
    Route::resource('faqs', 'FaqController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*claims
    Route::apiResource('claims', 'ClaimController');
//*claim_user
    Route::apiResource('claim_user', 'ClaimUserController');

//*suggestions
    Route::apiResource('suggestions', 'SuggestionController');
//*suggestion_user
    Route::apiResource('suggestion_user', 'SuggestionUserController');

//? Site

//*site_team
    Route::resource('site_teams', 'SiteTeamController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_team_member

    Route::resource('site_team_members', 'SiteTeamMemberController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_image
    Route::resource('site_images', 'SiteImageController', [
        'except' => [
            'index',
            'show',
        ],
    ]);
//*site_image_item

    Route::resource('site_image_items', 'SiteImageItemController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_h_work
    Route::resource('site_h_works', 'SiteHWorkController', [
        'except' => [
            'index',
            'show',
        ],
    ]);
//*site_h_work_item
    Route::resource('site_h_work_items', 'SiteHWorkItemController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_information

    Route::resource('site_information', 'SiteInformationController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_setting
    Route::resource('site_setting', 'SiteSettingController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//*site_join
    Route::resource('site_join', 'SiteJoinController', [
        'except' => [
            'index',
            'show',
        ],
    ]);

//? File
    //*file
    Route::post('upload_file', 'StorageController@upload');
});

//? Public Site Routes
//*site_team_members
Route::resource('site_team_members', 'SiteTeamMemberController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*site_team
Route::resource('site_teams', 'SiteTeamController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*posts
Route::resource('posts', 'PostController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*post_category
Route::resource('post_category', 'PostCategoryController', [
    'only' => [
        'index',
        'show',
    ],
]);
//*site_information

Route::resource('site_information', 'SiteInformationController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*faqs
Route::resource('faqs', 'FaqController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*site_setting
Route::resource('site_setting', 'SiteSettingController', [
    'only' => [
        'index',
        'show',
    ],
]);
//*site_image
Route::resource('site_images', 'SiteImageController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*site_h_work
Route::resource('site_h_works', 'SiteHWorkController', [
    'only' => [
        'index',
        'show',
    ],
]);
//*site_h_work_item
Route::resource('site_h_work_items', 'SiteHWorkItemController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*site_image_items
Route::resource('site_image_items', 'SiteImageItemController', [
    'only' => [
        'index',
        'show',
    ],
]);

//*site_join
Route::resource('site_join', 'SiteJoinController', [
    'only' => [
        'index',
        'show',
    ],
]);
//*contacts
Route::resource('contacts', 'ContactController', [
    'only' => [
        'store',
    ],
]);
Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});
