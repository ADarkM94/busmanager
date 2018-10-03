<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đặt vé</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style-qldv.css">
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <h3 class="col-lg-4">Quản lý đặt vé</h3>
            <h5 class="col-lg-4">Tên Hãng Xe Khách</h5>
            <div class="col-lg-4 userzone">
                <span><span class="glyphicon glyphicon-user"></span>Phan Anh Minh</span>
                <span>Thoát</span>
            </div>
        </div>
        <hr/>
    </div>
    <div class="noidung row">
        <div class="sidebar col-lg-2">
            <span>Chuyến xe</span>
            <div class="chuyenxe">
                <ul>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                    <li>Chuyến xe # <i class="glyphicon glyphicon-record" style="color: green;"></i></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10">
            <span>
                <ul>
                    <a href="giamsat">
                        <li class="option selected">Bản đồ</li>
                    </a>
					<a href="datve">
                        <li class="option" onclick="change(this)">Nhập vé</li>
                    </a>
                </ul>
            </span>
            <span><a href="../">Trang chủ</a></span>
            @yield('content')
        </div>
    </div>
</div>
@yield('excontent')
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop = document.getElementsByClassName("header")[0].clientHeight + 30 + "px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom = "15px";
</script>
@yield('script')
</body>
</html>
