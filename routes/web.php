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
    return view('welcome');
});


//user
Route::get('/api/v1/user/{user_id}', 'UsersController@get');
Route::post('/api/v1/user', 'UsersController@register');
Route::put('/api/v1/user/{user_id}', 'UsersController@update');
Route::delete('/api/v1/user', 'UsersController@delete');

// timecapsule_good
Route::put('/api/v1/user_timecapsule_good/{user_id}/timecapsule/{timecapsule_id}', 'UserTimecapsuleGoodsController@post');
Route::delete('/api/v1/user_timecapsule_good/{user_id}/timecapsule/{timecapsule_id}', 'UserTimecapsuleGoodsController@delete');

// comment
Route::get('/api/v1/timecapsule/{timecapsule_id}/comment', 'CommentsController@get');
Route::post('/api/v1/timecapsule/{timecapsule_id}/comment/{user_id}', 'CommentsController@post');
Route::delete('/api/v1/comment/{comment_id}', 'CommentsController@delete');

// follow
Route::get('/api/v1/user/{user_id}/user_follows', 'UserFollowsController@get');
Route::get('/api/v1/timecapsule/{posted_user_id}/user_follows/{user_id}', 'UserFollowsController@follow_check');
Route::post('/api/v1/user/{user_id}/user_follows/{following_user_id}', 'UserFollowsController@post');
Route::delete('/api/v1/user/{user_id}/user_follows/{followed_user_id}', 'UserFollowsController@delete');

// money
Route::get('/api/v1/user_moneys/{user_id}', 'UserMoneysController@get');
Route::put('/api/v1/timecapsule/{timecapsule_id}/user_moneys/{user_id}', 'UserMoneysController@put');

// timecapsule
Route::get('/api/v1/user/{user_id}/timecapsules', 'TimecapsulesController@user_timecapsule_get');
Route::get('/api/v1/timecapsule', 'TimecapsulesController@search');
Route::get('/api/v1/timecapsule/{timecapsule_id}', 'TimecapsulesController@get');
Route::get('/api/v1/timecapsule/{user_id}/{display_type}', 'TimecapsulesController@index');
Route::post('/api/v1/timecapsule/{user_id}', 'TimecapsulesController@post');


/**
 * テスト用ページapi
 */
Route::get('/api/v1/home', function(){
    return view('home');
});
Route::get('/api/v1/post', function(){
    return view('post');
});
Route::get('/api/v1/timecapsule_good/{user_id}', function(){
    return view('good');
});
Route::get('/api/v1/comment/{user_id}', function(){
    return view('comment');
});
Route::get('/api/v1/follow', function(){
    return view('follow');
});
Route::get('/api/v1/money', function(){
    return view('money');
});