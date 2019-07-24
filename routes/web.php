<?php

use App\User;
use App\Property;

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

Route::get('/', 'FrontController@index');
// Route::match(['get', 'post'], 'register', function(){
//     return redirect('/');
// });
Route::get('/blank', 'FrontController@blank');
Route::get('/tests', 'AdminController@test');
Route::get('/index', 'FrontController@index');
Route::get('/about', function() {
	return view('front/about');
});
Route::get('/agent', 'FrontController@agent');
Route::get('/blog', function() {
	return view('front/blog');
});
Route::get('/contact', 'FrontController@contact');
Route::post('/contact', 'FrontController@contactStore');

Route::post('/message/{id}', 'FrontController@messageStore');

Route::get('/buy', 'FrontController@buy');
Route::get('/sale', 'FrontController@sale');
Route::get('/rent', 'FrontController@rent');

Route::get('/details/{id}', 'FrontController@details');
Route::post('/search', 'FrontController@search');
// Route::post('/subscribers', 'FrontController@subscribers');

Route::group(['middleware' => 'Verified'], function() {
	Route::get('admin/messages', 'AdminController@messages');	
	Route::get('admin/notifications', 'AdminController@notifications');

	Route::get('update/profile/{id}', 'AdminController@edit');
	Route::post('update/profile/{id}', 'AdminController@update');

	Route::get('admin/addProperty', 'AdminController@create');
	Route::post('admin/addProperty', 'AdminController@store');

	Route::get('admin/viewProperty', 'AdminController@view');
	Route::get('admin/view/{id}', 'AdminController@read');

	Route::get('admin/enable/{id}', 'AdminController@enable');
	Route::get('admin/disable/{id}', 'AdminController@disable');

	Route::post('admin/editProperty/{id}', 'AdminController@editProperty');

	
	Route::get('admin/messages/read/{id}', 'AdminController@readMessage');

	Route::get('admin/notifications/read/{id}', 'AdminController@readNotifications');

	Route::get('admin/viewAgent', 'AdminController@adminView');
	Route::get('admin/viewOwner', 'AdminController@ownerView');
	Route::get('admin/addUser', 'AdminController@addUsers');
	Route::post('admin/addUser', 'AdminController@addUser');
	Route::get('admin/delete/{id}', 'AdminController@delete');
	Route::get('/admin/restore/{id}', function($id){
		User::onlyTrashed()->where('id', '=', $id)->restore();
		return redirect('admin/viewUsers');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
