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

Route::get('/','Controller@Index')->name("home");

Route::get('/datve','Controller@Datve');

Route::get('/lienhe', function () {
    return view('tttn-web.lienhe');
});

Route::post('/chuyenxe', 'Controller@Chuyenxe1')->name('chuyenxe');
Route::post('/chuyenxe1', 'Controller@Chuyenxe2')->name('chuyenxe1');

Route::get('/chonve/{id}','Controller@Chonve')->name('chonve');

Route::post('/xulydatve','Controller@xulydatve')->name('xulydatve');
Route::post('/xulydatve2','Controller@xulydatve2')->name('xulydatve2');
Route::post('/chondatve','Controller@chondatve')->name('chondatve');
Route::get('/thongtinve/{id}/{makh}','Controller@thongtinve');
Route::post('/dangky','Controller@dangky')->name('dangky');
Route::post('/dangnhap','Controller@dangnhap')->name('dangnhap');
Route::get('logout', function(){
    Request::session()->flush();
    $tinh = DB::select("SELECT Tên FROM tinh");
    return redirect(route("home"));
})->name('logout');

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

/* Bắt đầu phần Route để test chức năng */

Route::get('/checkconnection', 'Controller@checkConnection');

//Testing
Route::get('/admintest', 'AdminController@test');
Route::get('/admintest/test', function() {
    return view('test');
});
Route::post('/admintest/login', 'AdminController@login')->name('login');

/* Kết thúc phần Route để test chức năng */

