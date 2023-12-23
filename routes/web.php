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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Produk
Route::get('/periode/periode', 'PeriodeController@index')->name('periode.index');
Route::post('/periode/periode_doAdd', 'PeriodeController@periode_doAdd')->name('periode.periode_doAdd');
Route::post('/periode/cek_periode', 'PeriodeController@cek_periode')->name('periode.cek_periode');
Route::post('/periode/periode_doEdit', 'PeriodeController@periode_doEdit')->name('periode.periode_doEdit');
Route::get('/periode/periode_delete/{id}', 'PeriodeController@periode_delete')->name('periode.periode_delete');
Route::post('/periode/periode_get', 'PeriodeController@periode_get')->name('periode.periode_get');

// Kriteria
Route::get('/kriteria/kriteria', 'KriteriaController@index')->name('kriteria.index');
Route::post('/kriteria/kriteria_doAdd', 'KriteriaController@kriteria_doAdd')->name('kriteria.kriteria_doAdd');
Route::post('/kriteria/cek_kriteria', 'KriteriaController@cek_kriteria')->name('kriteria.cek_kriteria');
Route::post('/kriteria/kriteria_doEdit', 'KriteriaController@kriteria_doEdit')->name('kriteria.kriteria_doEdit');
Route::get('/kriteria/kriteria_delete/{id}', 'KriteriaController@kriteria_delete')->name('kriteria.kriteria_delete');
Route::post('/kriteria/kriteria_get', 'KriteriaController@kriteria_get')->name('kriteria.kriteria_get');

// Sub Kriteria
Route::get('/subkriteria/subkriteria', 'SubKriteriaController@index')->name('subkriteria.index');
Route::post('/subkriteria/subkriteria_doAdd', 'SubKriteriaController@subkriteria_doAdd')->name('subkriteria.subkriteria_doAdd');
Route::post('/subkriteria/cek_subkriteria', 'SubKriteriaController@cek_subkriteria')->name('subkriteria.cek_subkriteria');
Route::post('/subkriteria/subkriteria_doEdit', 'SubKriteriaController@subkriteria_doEdit')->name('subkriteria.subkriteria_doEdit');
Route::get('/subkriteria/subkriteria_delete/{id}', 'SubKriteriaController@subkriteria_delete')->name('subkriteria.subkriteria_delete');
Route::post('/subkriteria/subkriteria_get', 'SubKriteriaController@subkriteria_get')->name('subkriteria.subkriteria_get');
 

// Karyawan
Route::get('/karyawan/karyawan', 'KaryawanController@index')->name('karyawan.index');
Route::post('/karyawan/karyawan_doAdd', 'KaryawanController@karyawan_doAdd')->name('karyawan.karyawan_doAdd');
Route::post('/karyawan/cek_karyawan', 'KaryawanController@cek_karyawan')->name('karyawan.cek_karyawan');
Route::post('/karyawan/karyawan_doEdit', 'KaryawanController@karyawan_doEdit')->name('karyawan.karyawan_doEdit');
Route::get('/karyawan/karyawan_delete/{id}', 'KaryawanController@karyawan_delete')->name('karyawan.karyawan_delete');
Route::post('/karyawan/karyawan_get', 'KaryawanController@karyawan_get')->name('karyawan.karyawan_get');

// Penilaian
Route::get('/penilaian/penilaian', 'PenilaianController@index')->name('penilaian.index');
Route::post('/penilaian/penilaian_doAdd', 'PenilaianController@penilaian_doAdd')->name('penilaian.penilaian_doAdd');
Route::post('/penilaian/cek_penilaian', 'PenilaianController@cek_penilaian')->name('penilaian.cek_penilaian');
Route::post('/penilaian/penilaian_doEdit', 'PenilaianController@penilaian_doEdit')->name('penilaian.penilaian_doEdit');
Route::get('/penilaian/isi_data/{id}', 'PenilaianController@isi_data')->name('penilaian.isi_data');
Route::post('/penilaian/penilaian_get', 'PenilaianController@penilaian_get')->name('penilaian.penilaian_get');
Route::post('/penilaian/reset_data', 'PenilaianController@reset_data')->name('penilaian.reset_data');
Route::post('/penilaian/simpan_val', 'PenilaianController@simpan_val')->name('penilaian.simpan_val');
Route::post('/penilaian/cek_duplikat', 'PenilaianController@cek_duplikat')->name('penilaian.cek_duplikat');
Route::get('/penilaian/hasil/{id}', 'PenilaianController@hasil')->name('penilaian.hasil');
Route::get('/penilaian/perangkingan', 'PenilaianController@perangkingan')->name('perangkingan');

Route::get('/penilaian/perangkingan_hasil/{id}', 'PenilaianController@perangkingan_hasil')->name('perangkingan.hasil');

// Laporan
Route::get('/produk/laporan_cetak_pdf', 'Produk\LaporanController@cetak_pdf')->name('produk.laporan_pdf');
Route::get('/produk/laporan_cetak_excel', 'Produk\LaporanController@export_excel')->name('produk.laporan_excel');
Route::get('produk/produk_excel', 'Produk\LaporanController@laporan_excel')->name('produk.cetak_excel');

// User
Route::get('/master/user', 'Master\UserController@index')->name('master.user');
Route::post('/master/user_doAdd', 'Master\UserController@user_doAdd')->name('master.user_doAdd');
Route::post('/master/cek_user', 'Master\UserController@cek_user')->name('master.cek_nama_user');
Route::post('/master/user_doEdit', 'Master\UserController@users_doEdit')->name('master.user_doEdit');
Route::get('/master/users_delete/{id}', 'Master\UserController@users_delete')->name('master.user_delete');
Route::post('/master/user_get', 'Master\UserController@user_get')->name('master.user_get');

