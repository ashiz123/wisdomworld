<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // return view('welcome');
});

Route::get('/', 'WelcomeController@home')->name('welcome');

Auth::routes(['verify' => true]);




Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  });


  Route::prefix('post')->group(function(){
    Route::get('create', 'User\PostController@create')->name('post.create');
    Route::post('store', 'User\PostController@store')->name('post.store');
    Route::get('show/{id}', 'User\PostController@show')->name('post.show'); //must show the slug in the link (work left)
  });



 Route::post('profile/{profileId}/follow', 'User\ProfileController@followUser')->name('user.follow');
 Route::post('/{profileId}/unfollow', 'User\ProfileController@unFollowUser')->name('user.unfollow');

 Route::get('{id}/tags', 'User\TagController@index')->name('tag.index');
 Route::post('{tagId}/tag', 'user\TagController@store')->name('tag.store');
 Route::post('{tagId}/untag', 'user\TagController@remove')->name('tag.remove');
 Route::get('tags', 'User\TagController@show')->name('tag.show');
 Route::get('tags/{id}', 'User\TagController@showById')->name('tag.showById');



 Route::get('basic_info/create', 'User\BasicInfoController@create')->name('basic_info.create');
 Route::post('basic_info/store', 'User\BasicInfoController@store')->name('basic_info.store');
 Route::get('education_info/create','User\EducationInfoController@create')->name('education_info.create');
 Route::post('education_info/post', 'User\EducationInfoController@store')->name('education_info.store');


 Route::post('comment/{postId}/store', 'User\CommentController@store')->name('comment.store');
 Route::post('like/store', 'User\LikeController@store')->name('like.store');


//  filter
Route::get('filter/{data}', 'User\FilterController@apply')->name('filter.apply');
Route::get('filter', 'User\FilterController@index')->name('filter.index');


  Route::prefix('profile/{name}')->group(function(){
      Route::get('/{profileId?}/', 'User\ProfileController@index')->name('profile');
      // Route::post('/profile_created', 'User\UserinfoController@store')->name('userinfo.stored');
      Route::get('/timeline', 'User\ProfileController@timeline')->name('timeline');
      Route::get('/about', 'User\ProfileController@about')->name('about');
});









 

