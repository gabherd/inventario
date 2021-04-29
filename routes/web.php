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

# Marcas
Route::resource('marca', '\App\Http\Controllers\BrandController')
	->names('brands')->middleware('auth');

# Modelos
Route::resource('modelo', '\App\Http\Controllers\ModelController')
	->names('models')->middleware('auth');

# Medidas
Route::resource('medida', '\App\Http\Controllers\MeasureController')
	->names('measures')->middleware('auth');	

# Cuenta de usuario 
Route::resource('cuenta', '\App\Http\Controllers\UserController')
	->names('account-settings')->middleware('auth');

#-----------------------------------consulta individuales---------------------------------------------------------------#
// obtine lista de usuarios
Route::get('registros/usuarios', '\App\Http\Controllers\UsersController@getUsers')
	->name('user-list')->middleware('auth');

//cambio de contraseña
Route::put('password', '\App\Http\Controllers\UserController@changePassword')
	->name('password')->middleware('auth');

//--------------PRODUCTS--------------

// obtine lista de productos
Route::get('inventario/productos', '\App\Http\Controllers\ProductController@getProducts')
	->name('products')->middleware('auth');

//obtiene lista de modelos por marca
//Route::get('inventario/model/{marca}', '\App\Http\Controllers\ProductController@getModel')
//	->name('model')->middleware('auth');

//obtiene lista de medidas
Route::get('inventario/measure', '\App\Http\Controllers\ProductController@getMeasure')
	->name('measure')->middleware('auth');


//--------------DASHBOARD--------------

// obtine lista de productos agotados y por agotarse
Route::get('dashboard/stock', '\App\Http\Controllers\DashboardController@getStockQty')
	->name('stock')->middleware('auth');

// obtine top de productos mas vendidos
Route::get('dashboard/sales/{period}', '\App\Http\Controllers\DashboardController@getSales')
	->name('sales')->middleware('auth');

// obtine total de productos vendidos
Route::get('dashboard/sales-products/{period}', '\App\Http\Controllers\DashboardController@getTotalSales')
	->name('sales-products')->middleware('auth');

// obtiene un resumen de ventas
Route::get('dashboard/sales-summary/{period}', '\App\Http\Controllers\DashboardController@salesSummary')
	->name('sales-summary')->middleware('auth');





