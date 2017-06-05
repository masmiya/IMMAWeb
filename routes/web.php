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

Route::get('/', 'HomeController@ports');

Auth::routes();


Route::get('/ports', 'HomeController@ports')->name('ports');
Route::get('/ports/{id}/edit', 'HomeController@showEditPort');
Route::get('/ports/{id}/delete', 'HomeController@deletePort');
Route::get('/ports/new', 'HomeController@showNewPort');
Route::post('/ports/new', 'HomeController@newPort');
Route::post('/ports/{id}/edit', 'HomeController@storePort');

Route::get('/suppliers', 'HomeController@suppliers')->name('suppliers');
Route::get('/suppliers/{id}/edit', 'HomeController@showEditSupplier');
Route::get('/suppliers/{id}/delete', 'HomeController@deleteSupplier');
Route::get('/suppliers/new', 'HomeController@showNewSupplier');
Route::post('/suppliers/new', 'HomeController@newSupplier');
Route::post('/suppliers/{id}/edit', 'HomeController@storeSupplier');

Route::get('/globaldocs', 'HomeController@globaldocs')->name('globaldocs');
Route::get('/globaldocs/{id}/edit', 'HomeController@showEditGlobalDoc');
Route::get('/globaldocs/{id}/delete', 'HomeController@deleteGlobalDoc');
Route::get('/globaldocs/new', 'HomeController@showNewGlobalDoc');
Route::post('/globaldocs/new', 'HomeController@newGlobalDoc');
Route::post('/globaldocs/{id}/edit', 'HomeController@storeGlobalDoc');

Route::get('/userdocs', 'HomeController@userdocs')->name('userdocs');

Route::get('/settings', 'HomeController@settings')->name('settings');
Route::post('/settings', 'HomeController@storeSettings');


Route::get('/products', 'HomeController@showProducts')->name('products');
Route::get('/products/new', 'HomeController@showCreateProduct');
Route::get('/products/{id}/edit', 'HomeController@showEditProduct');
Route::get('/products/{id}/delete', 'HomeController@deleteProduct');
Route::post('/products/new', 'HomeController@newProduct');
Route::post('/products/{id}/edit', 'HomeController@storeProduct');

Route::get('/products/{id}/subproducts/new', 'HomeController@showCreateSubProduct');
Route::get('/products/{id}/subproducts/{subid}/edit', 'HomeController@showEditSubProduct');
Route::get('/products/{id}/subproducts/{subid}/delete', 'HomeController@deleteSubProduct');
Route::post('/products/{id}/subproducts/new', 'HomeController@createSubProduct');
Route::post('/products/{id}/subproducts/{subid}/edit', 'HomeController@storeSubProduct');

Route::get('/categories', 'HomeController@showCategories')->name('categories');
Route::get('/categories/new', 'HomeController@showCreateCategory');
Route::get('/categories/{id}/edit', 'HomeController@showEditCategory');
Route::get('/categories/{id}/delete', 'HomeController@deleteCategory');
Route::post('/categories/new', 'HomeController@newCategory');
Route::post('/categories/{id}/edit', 'HomeController@storeCategory');

Route::get('/categories/{id}/subcategories/new', 'HomeController@showCreateSubCategory');
Route::get('/categories/{id}/subcategories/{subid}/edit', 'HomeController@showEditSubCategory');
Route::get('/categories/{id}/subcategories/{subid}/delete', 'HomeController@deleteSubCategory');
Route::post('/categories/{id}/subcategories/new', 'HomeController@createSubCategory');
Route::post('/categories/{id}/subcategories/{subid}/edit', 'HomeController@storeSubCategory');
