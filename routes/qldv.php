<?php
/* Bắt đầu phần Route cho trang quản lý đặt vé */

Route::get('/qldv', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/giamsat', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/datve','TicketBookingManager@trangdatve');

Route::post('/qldv/searchroute','TicketBookingManager@searchroute')->name('qldv-searchroute');

Route::post('/qldv/routedetails','TicketBookingManager@routedetails')->name('qldv-routedetails');

Route::post('/qldv/chonve','TicketBookingManager@qldv_chonve')->name('qldv-chonve');

Route::post('/qldv/huychonve','TicketBookingManager@qldv_huychonve')->name('qldv-huychonve');

Route::post('/qldv/huychonchuyenxe','TicketBookingManager@qldv_huychonchuyenxe')->name('qldv-huychonchuyenxe');

// Route::get('/qldv/ticket/{idve}','TicketBookingManager@ticketinfo');

/* Route::post('/qldv/searchtinh', 'TicketBookingManager@searchtinh')->name('searchtinh'); */
/* Kết thúc phần Route cho trang quản lý đặt vé */