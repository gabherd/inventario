<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\DashboardController@index')
	->name('dashboard')->middleware('auth');

Route::view("cuenta", 'account-settings')
	->name('account-settings')->middleware('auth');

Route::view("usuarios", 'users')
	->name('users')->middleware('auth');

Route::view("proveedores", 'providers')
	->name('providers')->middleware('auth');


Route::resource("productos", '\App\Http\Controllers\ProductController')
	->names('products')->middleware('auth');



Route::get('inventario/productos', '\App\Http\Controllers\ProductController@getProducts')
	->name('products')->middleware('auth');

Route::get('dashboard/stock', '\App\Http\Controllers\DashboardController@getStockQty')
	->name('stock')->middleware('auth');

Route::get('dashboard/sales', '\App\Http\Controllers\DashboardController@getSales')
	->name('sales')->middleware('auth');

