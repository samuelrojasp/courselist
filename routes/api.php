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

    Route::middleware('client')->group(function(){
        /**
         * Routes for resource course
         */
        Route::get('courses/all', 'CourseController@list');
        Route::resource('courses', 'CourseController');
        

        /**
         * Routes for resource people
         */
        Route::resource('people', 'PersonController');
    });
    
    Route::get('token', 'TokenController');