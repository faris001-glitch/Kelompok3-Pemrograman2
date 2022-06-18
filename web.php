<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('/user', 'UserController');
    Route::get('/user/edit{id}', 'UserController@edit');
    Route::get('/user/hapus/{id}', 'UserController@destroy');
    Route::resource('/barang', 'BarangController');
    Route::get('/barang/hapus/{id}', 'BarangController@destroy');
    Route::resource('/supplier', 'SupplierController');
    Route::get('/supplier/hapus/{id}', 'SupplierController@destroy');
    Route::resource('/akun', 'AkunController');
    Route::resource('/setting', 'SettingController');
    ## Data Akun
    Route::resource('/akun', 'AkunController')->middleware('role:admin');
    Route::get('/akun/hapus/{kode}', 'AkunController@destroy'); //Hapus
    Route::get('/akun/edit/{id}', 'AkunController@edit'); //Edit
    //Order
    Route::get('/order', 'OrderController@index')->name('order.transaksi');
    Route::post('/der/store', 'OrderController@store');
    Route::get('/order/hapus/{kd_brg}', 'OrderController@destroy');
    //Detail Order
    Route::post('/detail/store', 'DetailOrderController@store');
    Route::post('/detail/simpan', 'DetailOrderController@simpan');
    //Barang Masuk
    Route::get('/barangmasuk', 'BarangMasukController@index')->name('barangmasuk.transaksi');
    Route::get('/barangmasuk-beli/{id}', 'BarangMasukController@edit');
    Route::post('/barangmasuk/simpan', 'BarangMasukController@simpan');
    // Barang Keluar
    Route::get('/barangkeluar', 'BarangKeluarController@index')->name('barangkeluar.transaksi');
    Route::get('/barangkeluar-beli/{id}', 'BarangKeluarController@edit');
    Route::post('/barangkeluar/simpan', 'BarangKeluarController@simpan');
    // Laporan
    Route::resource('/laporan', 'LaporanController');
    // Laporan Cetak
    Route::get('/laporancetak/cetak_pdf', 'LaporanController@cetak_pdf');
});
