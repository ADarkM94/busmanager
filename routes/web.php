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
/* Bắt đầu phần Route cho trang khách hàng */
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

/* Kết thúc phần Route cho trang khách hàng */

/* Bắt đầu phần Route cho trang quản lý đặt vé */

Route::get('/qldv/giamsat', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/datve', function() {
    return view('quanlydatve.datve');
});

/* Kết thúc phần Route cho trang quản lý đặt vé */

/* Bắt đầu phần Route cho trang quản trị hệ thống */

Route::get('admin/thongke', function () {
    return view('quantrivien.thongke');
});

Route::get('admin/khachhang', 'AdminController@khachhang');

Route:: get('admin/addkhachhang/{index?}', 'AdminController@addkhachhang');

Route::post('admin/addcustomer','AdminController@addcustomer')->name('addcustomer');

Route::get('admin/chuyenxe', function () {
    return view('quantrivien.chuyenxe');
});

Route::get('admin/loaixe', function () {
    return view('quantrivien.loaixe');
});

Route::get('admin/lotrinh', function () {
    return view('quantrivien.lotrinh');
});

Route::get('admin/nhanvien', 'AdminController@nhanvien');

Route:: get('admin/addnhanvien/{index?}', 'AdminController@addnhanvien');

Route::post('admin/addemployee','AdminController@addemployee')->name('addemployee');

/* Kết thúc phần Route cho trang quản trị hệ thống */

/* Bắt đầu phần Route để test chức năng */

Route::get('/checkconnection', 'Controller@checkConnection');

//Testing
Route::get('/admintest', 'AdminController@test');
Route::get('/admintest/test', function() {
    return view('test');
});
Route::post('/admintest/login', 'AdminController@login')->name('login');

/* Kết thúc phần Route để test chức năng */

