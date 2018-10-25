<?php
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
Route::get('ticket', function (){
    $matrix = [
        'user1'=>[3,2,5,5,'?',6],
        'user2'=>[3,'?',1,5,4,6],
        'user3'=>[3,2,1,5,'?',6],
        'user4'=>[3,7,'?',5,1,6],
        'user5'=>[3,2,8,5,'?',6]
    ];
    App\Http\Controllers\TicketSuggestion::ticketSuggestion($matrix);
});
/* Route::get('test11', function(){
	return response()->json(0);
}); */