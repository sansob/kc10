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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('adds', 'BentukKoperasiController@index')->middleware('admin.user');
    Route::get('nasabah', 'NasabahController@index')->middleware('admin.user')->name('nasabah.index');
    Route::get('nasabah/create', 'NasabahController@create')->middleware('admin.user')->name('nasabah.create');
    Route::post('nasabah/add', 'NasabahController@store')->middleware('admin.user')->name('nasabah.store');
    //datatable
    Route::get('nasabah/dataNasabah', 'NasabahController@dataNasabah')->middleware('admin.user')->name('nasabah.dataNasabah');
    Route::get('trans/{kid}/{id}', 'TransaksiController@index2')->middleware('admin.user')->name('transaksi.index');
    Route::get('trans/getTransaksiSimpan/{id}', 'TransaksiController@getTransaksiSimpan')->middleware('admin.user')->name('transaksi.getTransaksiSimpan');
    Route::get('trans/getTransaksiPinjam/{kid}/{id}', 'TransaksiController@getTransaksiPinjam')->middleware('admin.user')->name('transaksi.getTransaksiPinjam');

});
