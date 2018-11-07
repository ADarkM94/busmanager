<?php
/* Bắt đầu phần Route cho trang quản lý đặt vé */

Route::get('/qldv', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/giamsat', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/datve','TicketBookingManager@trangdatve');

Route::post('/qldv/searchroute','TicketBookingManager@searchroute')->name('searchroute');

// Route::get('/qldv/ticket/{idve}','TicketBookingManager@ticketinfo');

/* Route::post('/qldv/searchtinh', 'TicketBookingManager@searchtinh')->name('searchtinh'); */
/* Kết thúc phần Route cho trang quản lý đặt vé */