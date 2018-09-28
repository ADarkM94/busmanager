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

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', function () {
	return view('tttn-web.index');
});

Route::get('/datve', function () {
	return view('tttn-web.datve');
});

Route::get('/lienhe', function () {
    return view('tttn-web.lienhe');
});

Route::get('/chuyenxe', function () {
    return view('tttn-web.chuyenxe');
});

Route::get('/chonve', function () {
    return view('tttn-web.chonve');
});

Route::get('/gioithieu', function () {
    return view('tttn-web.gioithieu');
});

Route::get('/tintuc', function () {
    return view('tttn-web.tintuc');
});

Route::get('/quanlydatve', function() {
    return view('quanlydatve.index');
});

Route::get('/quantrivien', function() {
    return view('quantrivien.index');
});

Route::get('/checkconnection', 'Controller@checkConnection');

//Testing
Route::get("/login", function () {
    return view("tttn-web.login");
});

