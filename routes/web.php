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

Auth::routes(['verify' => true]);

Route::get('/checkins/{user_id}', 'CheckinController@getCheckinsForUser')->name('checkins.for.user')->middleware('verified');
Route::post('/checkin', 'CheckinController@processCheckin')->name('process.checkin.from.user')->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/friends', 'FriendController@index')->name('friends.index')->middleware('verified');
Route::get('/friends/request', 'FriendController@viewFriendRequests')->name('new.friend.request.view')->middleware('verified');
Route::post('/friends/request', 'FriendController@addUnverifiedFriend')->name('friends.addUnverifiedFriend')->middleware('verified');

Route::get('/search', 'SearchController@index')->name('search.index')->middleware('verified');
Route::post('/search', 'FriendController@doSearch')->name('search.doSearch')->middleware('verified');
