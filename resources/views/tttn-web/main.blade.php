<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-lienhe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</head>
<body>
<div class="header">
    <ul>
        <li><button type="button" class="btn btn-primary">Đăng ký</button></li>
        <li><button type="button" class="btn btn-primary">Đăng nhập</button></li>
    </ul>
</div>
<div class="menu">
    <ul>
        <li><a href="./"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                <span>TRANG CHỦ</span>
            </a>
        </li>
        <li>
            <a href="datve">
                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                <span>ĐẶT VÉ</span>
            </a>
        </li>
        <li>
            <a href="tintuc">
                <i class="glyphicon glyphicon-text-size" aria-hidden="true"></i>
                <span>TIN TỨC</span>
            </a>
        </li>
        <li>
            <a href="gioithieu">
                <i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
                <span>GIỚI THIỆU</span>
            </a>
        </li>
        <li>
            <a href="lienhe">
                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                <span>LIÊN HỆ</span>
            </a>
        </li>
    </ul>
</div>
<div style="clear: all;"></div>
@yield('content')
<div style="clear: all;"></div>
<main class="main">
    <div class="footer">
        <ul>
            <li>
                <h3>Liên Hệ</h3>
                <i class="fa fa-home" aria-hidden="true"></i>
                <i>Đại Học Bách Khoa HCM</i><br>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <i>0989671651</i><br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <i>nhan51202526@gmail.com</i>
            </li>
            <li>
                <h4> &copy; Bảng Quyền Thuộc Về Đại Học Bách Khoa HCM </h4>
                <h4>Tất cả vì khách hàng - Thiết Kế bới Nhóm 30</h4>
            </li>
        </ul>
    </div>
</main>
@yield('script')
</body>
