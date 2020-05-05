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

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');
  
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
    
//     });
// });

// Route::get('test', 'TestController@test');



Route::post('login', '_Api\v1\UserController@login');
Route::post('register', '_Api\v1\UserController@register');

//api group middleware
Route::group(['middleware' => 'auth:api'], function(){
Route::get('user', '_Api\v1\UserController@details');
Route::get('posts', '_Api\v1\PostController@getAllPosts');
Route::get('post/{userId}', '_Api\v1\PostController@postByUser');
});




