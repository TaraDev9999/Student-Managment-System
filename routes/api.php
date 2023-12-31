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

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResources([
        'user' => 'API\UserController',
        'classes' => 'API\DarasaContoller',
        'students' => 'API\StudentController',
    ]);
    // getDashboardStats
    Route::get('getDashboardStats', 'API\UserController@dashboard');
});

// paymentsPerMonth
Route::get('studentsPerMonth', 'API\StudentController@studentsPerMonth');


Route::get('profile', 'API\UserController@profile')->name('home');
Route::put('profile', 'API\UserController@profile')->name('home');
