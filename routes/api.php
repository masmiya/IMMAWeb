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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['namespace'=>'api'], function() {
	Route::post('/register', 'UserController@register');
	Route::post('/login', 'UserController@login');
	Route::get('/about', 'APIController@about');
	Route::get('/user', 'UserController@details')->middleware('auth:api');
	Route::post('/user', 'UserController@update')->middleware('auth:api');

	Route::get('/ports', 'APIController@ports');
	Route::get('/suppliers', 'APIController@suppliers');
	Route::get('/categories', 'APIController@categories');
	// Route::get('/subcategories', 'APIController@subcategories');
	Route::get('/products', 'APIController@products');
	Route::get('/products-by-ids', 'APIController@items');

	Route::post('/purchase', 'APIController@purchase')->middleware('auth:api');

	Route::get('/globaldocs', 'APIController@globaldocs');
	Route::get('/userdocs', 'APIController@getUserDocs')->middleware('auth:api');
	Route::post('/userdoc', 'APIController@storeUserDoc')->middleware('auth:api');

	Route::post('/slot', 'APIController@addSlot')->middleware('auth:api');
	Route::delete('/slot', 'APIController@deleteSlot')->middleware('auth:api');
	Route::post('/uploadreq', 'APIController@processUploadRequest')->middleware('auth:api');
});



