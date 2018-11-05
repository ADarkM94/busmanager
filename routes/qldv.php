<?php
/* Bắt đầu phần Route cho trang quản lý đặt vé */

Route::get('/qldv', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/giamsat', function() {
    return view('quanlydatve.giamsat');
});

Route::get('/qldv/datve', function() {
    return view('quanlydatve.datve');
});

/* Kết thúc phần Route cho trang quản lý đặt vé */