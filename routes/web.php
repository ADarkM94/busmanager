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
/*hien thong tin nguoi dung*/
Route::get('thongtin/{makh}','Controller@thongtin')->name('thongtin');
Route::get('/gioithieu', function () {
    return view('tttn-web.gioithieu');
});
/*cap nhat thong tin*/
Route::post('/capnhattt','Controller@capnhattt')->name('capnhattt');
/*doi mat khau*/
Route::post('/doimatkhau','Controller@doimatkhau')->name('doimatkhau');
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

Route::get('admin/', function () {
    return view('quantrivien.thongke');
});

Route::get('admin/thongke', function () {
    return view('quantrivien.thongke');
});

//Phần khách hàng

Route::get('admin/khachhang', 'AdminController@khachhang');

Route:: get('admin/addkhachhang/{index?}', 'AdminController@addkhachhang');

Route::post('admin/addcustomer', 'AdminController@addcustomer')->name('addcustomer');

Route::get('admin/delkhachhang/{id}', 'AdminController@delcustomer');

Route::get('admin/viewkhachhang/{id?}', 'AdminController@viewkhachhang');

//Phần chuyến xe

Route::get('admin/chuyenxe', 'AdminController@chuyenxe');

Route::get('admin/addchuyenxe/{id?}', 'AdminController@addchuyenxe');

Route::post('admin/addchuyenxexl', 'AdminController@addchuyenxexl')->name('addchuyenxexl');

Route::get('admin/delchuyenxe/{id?}', 'AdminController@delchuyenxe');

//Phần vé và reset chuyến xe

Route::get('admin/ticket/{index}/{id?}', 'AdminController@ticket');

Route::post('admin/editticket', 'AdminController@editticket')->name('editticket');

//Phần loại xe

Route::get('admin/loaixe', 'AdminController@loaixe');

Route::post('admin/addbusmodel', 'AdminController@addbusmodel')->name('addbusmodel');

Route::get('admin/delloaixe/{id}', 'AdminController@delbusmodel');

//Phần nhân viên

Route::get('admin/nhanvien', 'AdminController@nhanvien');

Route:: get('admin/addnhanvien/{index?}', 'AdminController@addnhanvien');

Route::post('admin/addemployee','AdminController@addemployee')->name('addemployee');

Route::get('admin/delnhanvien/{id}','AdminController@delemployee');

//Phần xe

Route::get('admin/xe', 'AdminController@xe');

Route:: get('admin/addxe/{index?}', 'AdminController@addxe');

Route::post('admin/addbus','AdminController@addbus')->name('addbus');

Route::get('admin/delxe/{id}','AdminController@delbus');

//Phần trạm dừng

Route::get('admin/tramdung', 'AdminController@tramdung');

Route:: get('admin/addtramdung/{index?}', 'AdminController@addtramdung');

Route::post('admin/addbusstop','AdminController@addbusstop')->name('addbusstop');

Route::get('admin/deltramdung/{id}','AdminController@delbusstop');

//Phần lộ trình

Route::get('admin/lotrinh/{cm?}', 'AdminController@lotrinh');

Route::post('admin/addbusroute', 'AdminController@addbusroute')->name('addbusroute');

Route::post('admin/delbusroute', 'AdminController@delbusroute')->name('delbusroute');

//Phần tỉnh

Route:: post('admin/addprovince', 'AdminController@addprovince')->name('addprovince');

Route::post('admin/delprovince', 'AdminController@delprovince')->name('delprovince');

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
