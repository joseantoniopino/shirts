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
Route::redirect('/','products');
/*Route::resource('products', 'ProductController');*/

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::post('products/store', 'ProductController@store')->name('products.store');
Route::get('products/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::put('products/update/{id}', 'ProductController@update')->name('products.update');
Route::delete('products/destroy/{id}', 'ProductController@destroy')->name('products.destroy');

Route::get('/variants', 'VariantController@index')->name('variants.index');
Route::get('/variants/show/{id}', 'VariantController@show')->name('variants.show');
Route::get('variants/create', 'VariantController@create')->name('variants.create');
Route::post('variants/store', 'VariantController@store')->name('variants.store');
Route::get('variants/edit/{id}', 'VariantController@edit')->name('variants.edit');
Route::put('variants/update/{id}', 'VariantController@update')->name('variants.update');
Route::delete('variants/destroy/{id}', 'VariantController@destroy')->name('variants.destroy');
