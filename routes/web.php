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

// user previllage
Route::get('/', function () {
    return view('bootstrap_layout/user_aplikasi');
});

Route::get('/home', function () {
    return view('user_homepage');
});

Route::get('/daftarsurat', function () {
    return view('user_daftarsurat');
});

// admin previllage
Route::get('/login', function () {
    return view('admin_login');
});

Route::get('/admin', function () {
    return view('bootstrap_layout/admin_daftarsurat');
});

Route::get('/adminhomepage', function () {
    return view('admin_daftarsurat');
});

Route::get('/edit', function () {
    return view('admin_editsurat');
});

Route::get('/cetak', function () {
    return view('admin_cetakrekapitulasi');
});