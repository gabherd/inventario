<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\DashboardController@index')
	->name('dashboard')->middleware('auth');

Route::view("proveedores", 'providers')
	->name('providers')->middleware('auth');


# Usuarios registrados
Route::resource("usuarios", '\App\Http\Controllers\UsersController')
	->names('users')->middleware('auth');

# Productos de inventario
Route::resource("productos", '\App\Http\Controllers\ProductController')
	->names('products')->middleware('auth');

# Cuenta de usuario 
Route::resource('cuenta', '\App\Http\Controllers\UserController')
	->names('account-settings')->middleware('auth');

// obtine lista de usuarios
Route::get('registros/usuarios', '\App\Http\Controllers\UsersController@getUsers')
	->name('usuarios_lista')->middleware('auth');

// obtine lista de productos
Route::get('inventario/productos', '\App\Http\Controllers\ProductController@getProducts')
	->name('products')->middleware('auth');

// obtine cantidad de productos
Route::get('dashboard/stock', '\App\Http\Controllers\DashboardController@getStockQty')
	->name('stock')->middleware('auth');

// obtine cantidad de ventas
Route::get('dashboard/sales', '\App\Http\Controllers\DashboardController@getSales')
	->name('sales')->middleware('auth');




