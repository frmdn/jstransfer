<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Get All Customer
Route::get('customers','CustomerController@index');

// Get Single Customer
Route::get('customer/{id}','CustomerController@show');

// Insert New Customer
Route::post('customer','CustomerController@store');

// Update single Customer
Route::put('customer','CustomerController@store');

// Delete Single Customer
Route::delete('customer/{id}','CustomerController@destroy');

Route::get('transaksis','TransaksiController@index');
Route::get('transaksi/{id}','TransaksiController@show');

Route::get('banks', function() {
	$data = \App\Bank::get();
	return $data;
});