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

Route::get('/', 'PagesController@product');

Route::get('/orders', 'PagesController@orders');

Route::post('/', 'PagesController@addOrder');

Route::post('/orders', 'PagesController@addProduct');

Route::put('/orders', 'PagesController@updateProducts');