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




// USER
Route::get('', 'UserController@landing')
    ->name('landing');

Route::post('/filter', 'UserController@filter')
    ->name('filter');

Route::get('blog/{id}', 'UserController@detail_blog')
    ->name('user_detail_blog');

Route::get('superuser', 'AdminController@login')
    ->name('admin_login');

Route::get('login', 'UserController@login')
    ->name('user_login');

Route::post('login', 'UserController@login_proses')
    ->name('user_login_proses');

Route::get('/logout', 'UserController@logout_proses')
    ->name('logout');

Route::get('/registrasi', 'UserController@registrasi')
    ->name('user_registrasi');

Route::post('/registrasi', 'UserController@registrasi_proses')
    ->name('user_registrasi_proses');



// PENGELOLA
Route::get('/pengelola', 'AdminController@login')
    ->name('login_pengelola');

Route::post('/pengelola', 'AdminController@login_proses')
    ->name('proses_login_pengelola');


Route::get('/auth/redirect', 'UserController@redirectToProvider');
Route::get('/auth/callback', 'UserController@handleProviderCallback');


// Route::group(['middleware' => 'cek_login_pengelola'], function(){


// USER
Route::get('/profile', 'UserController@user_profile')
    ->name('user_profile');

Route::post('/profile_edit', 'UserController@user_profile_edit_proses')
    ->name('user_edit_profil');


// PENGELOLA
Route::get('/admin/list_akun', 'AdminController@admin_list')
    ->name('pengelola_akun_list');

Route::get('/admin/tambah_akun', 'AdminController@admin_tambah')
    ->name('pengelola_akun_tambah');

Route::post('/admin/tambah_akun', 'AdminController@admin_tambah_proses')
    ->name('pengelola_akun_tambah_proses');

Route::get('/admin/edit_akun/{id}', 'AdminController@admin_edit')
    ->name('pengelola_akun_edit');

Route::post('/admin/edit_akun/{id}', 'AdminController@admin_edit_proses')
    ->name('pengelola_akun_edit_proses');

Route::get('/admin/hapus_akun/{id}', 'AdminController@admin_hapus_proses')
    ->name('pengelola_akun_hapus_proses');

Route::get('/admin/edit_password', 'AdminController@admin_edit_password')
    ->name('pengelola_edit_password');

Route::post('/admin/edit_password', 'AdminController@admin_edit_password_proses')
    ->name('pengelola_edit_password_proses');


//kategori permainan
Route::get('/pengelola/list_kategori', 'KategoriController@kategori_permainan_list')
    ->name('kategori_permainan_list');

Route::get('/pengelola/tambah_kategori', 'KategoriController@kategori_permainan_tambah')
    ->name('kategori_permainan_tambah');

Route::post('/pengelola/tambah_kategori_proses', 'KategoriController@kategori_permainan_tambah_proses')
    ->name('kategori_permainan_tambah_proses');

Route::get('/pengelola/hapus_kategori/{id}', 'KategoriController@kategori_permainan_hapus_proses')
    ->name('kategori_permainan_hapus_proses');

Route::get('/pengelola/edit_kategori/{id}', 'KategoriController@kategori_permainan_ubah')
    ->name('kategori_permainan_ubah');

Route::post('/pengelola/ubah_kategori_proses/{id}', 'KategoriController@kategori_permainan_ubah_proses')
    ->name('kategori_permainan_ubah_proses');


// Route::get('/kalender', 'KalenderController@kalender_list')
//     ->name('kalender');

// Route::get('/kalender_detail/{tgl}', 'KalenderController@kalender_detail')
//     ->name('kalender_detail');

// ARTIKEL
Route::get('/pengelola/list_artikel', 'ArtikelController@pengelola_artikel_list')
    ->name('pengelola_artikel_list');

Route::get('/pengelola/tambah_artikel', 'ArtikelController@pengelola_artikel_tambah')
    ->name('pengelola_artikel_tambah');

Route::post('/pengelola/tambah_artikel', 'ArtikelController@pengelola_artikel_tambah_proses')
    ->name('pengelola_artikel_tambah_proses');

Route::get('/pengelola/detail_artikel/{id}', 'ArtikelController@pengelola_artikel_detail')
    ->name('pengelola_artikel_detail');

Route::get('/pengelola/terima_artikel/{id}', 'ArtikelController@pengelola_artikel_terima')
    ->name('pengelola_artikel_terima_proses');

Route::get('/pengelola/tolak_artikel/{id}', 'ArtikelController@pengelola_artikel_tolak')
    ->name('pengelola_artikel_tolak_proses');

Route::get('/pengelola/edit_artikel/{id}', 'ArtikelController@pengelola_artikel_edit')
    ->name('pengelola_artikel_edit');

Route::post('/pengelola/edit_artikel/{id}', 'ArtikelController@pengelola_artikel_edit_proses')
    ->name('pengelola_artikel_edit_proses');

Route::get('/pengelola/hapus_artikel/{id}', 'ArtikelController@pengelola_artikel_hapus_proses')
    ->name('pengelola_artikel_hapus_proses');

Route::post('/tambah_komentar/{id}', 'ArtikelController@tambah_komentar_proses')
    ->name('tambah_komentar_proses');

Route::get('/hapus_komentar/{id}', 'ArtikelController@hapus_komentar_proses')
    ->name('hapus_komentar_proses');


// ARTIKEL KATEGORI
Route::get('/pengelola/list_artikel_kat', 'ArtikelController@pengelola_kat_artikel_list')
    ->name('pengelola_artikel_kat_list');

Route::get('/pengelola/tambah_artikel_kat', 'ArtikelController@pengelola_kat_artikel_tambah')
    ->name('pengelola_artikel_kat_tambah');

Route::post('/pengelola/tambah_artikel_kat', 'ArtikelController@pengelola_kat_artikel_tambah_proses')
    ->name('pengelola_artikel_kat_tambah_proses');

Route::get('/pengelola/edit_artikel_kat/{id}', 'ArtikelController@pengelola_kat_artikel_edit')
    ->name('pengelola_artikel_kat_edit');

Route::post('/pengelola/edit_artikel_kat/{id}', 'ArtikelController@pengelola_kat_artikel_edit_proses')
    ->name('pengelola_artikel_kat_edit_proses');

Route::get('/pengelola/hapus_artikel_kat/{id}', 'ArtikelController@pengelola_kat_artikel_hapus_proses')
    ->name('pengelola_artikel_kat_hapus_proses');


// KALENDER
Route::get('/pengelola/list_kalender', 'KalenderController@pengelola_kalender_list')
    ->name('pengelola_kalender_list');

Route::get('/pengelola/tambah_kalender', 'KalenderController@pengelola_kalender_tambah')
    ->name('pengelola_kalender_tambah');

Route::post('/pengelola/tambah_kalender', 'KalenderController@pengelola_kalender_tambah_proses')
    ->name('pengelola_kalender_tambah_proses');

Route::get('/pengelola/hapus_kalender/{id}', 'KalenderController@pengelola_kalender_hapus_proses')
    ->name('pengelola_kalender_hapus_proses');

Route::get('/kalender', 'KalenderController@kalender_list')
    ->name('kalender');

Route::get('/kalender_detail/{tgl}', 'KalenderController@kalender_detail')
    ->name('kalender_detail');

// });