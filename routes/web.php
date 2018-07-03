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
    Route::get('trans/create/{kid}/{id}', 'TransaksiController@create')->middleware('admin.user')->name('transaksi.create');
    Route::post('trans/add/{kid}/{id}', 'TransaksiController@store')->middleware('admin.user')->name('transaksi.store');
    Route::get('trans/delete/{kid}/{id}', 'TransaksiController@destroy')->middleware('admin.user')->name('transaksi.destroy');
    Route::get('trans/getTransaksiSimpan/{id}', 'TransaksiController@getTransaksiSimpan')->middleware('admin.user')->name('transaksi.getTransaksiSimpan');
    Route::get('trans/getTransaksiPinjam/{kid}/{id}', 'TransaksiController@getTransaksiPinjam')->middleware('admin.user')->name('transaksi.getTransaksiPinjam');

    Route::get('checking', 'ScreeningController@index')->middleware('admin.user')->name('screening.index');
    Route::get('checking/create', 'ScreeningController@create')->middleware('admin.user')->name('screening.create');
    Route::post('checking/add', 'ScreeningController@store')->middleware('admin.user')->name('screening.store');
    Route::get('checking/dataScreening', 'ScreeningController@dataScreening')->middleware('admin.user')->name('screening.dataScreening');
    Route::get('checking/dataNasabahScreening/{nik}', 'ScreeningController@dataNasabahScreening')->middleware('admin.user')->name('screening.dataNasabahScreening');
    Route::get('checking/show/{id}', 'ScreeningController@show')->middleware('admin.user')->name('screening.show');

});
