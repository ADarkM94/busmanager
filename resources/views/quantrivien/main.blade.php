<!DOCTYPE html>
<html>
<head>
    <title>Quản trị viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style-qtv.css">
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <h3 class="col-lg-4">Quản trị viên</h3>
            <h5 class="col-lg-4">Tên Hãng Xe Khách</h5>
            <div class="col-lg-4 userzone">
                <span><span class="glyphicon glyphicon-user"></span>Phan Anh Minh</span>
                <span>Thoát</span>
            </div>
        </div>
        <hr />
    </div>
    <div class="noidung row">
        <div class="sidebar">
            <div class="menu">
                <ul>
                    <a href="thongke">
                        <li class="option selected">Thống kê</li>
                    </a>
                    <a href="khachhang">
                        <li class="option">Khách hàng</li>
                    </a>
                    <a href="chuyenxe">
                        <li class="option">Chuyến xe</li>
                    </a>
                    <a href="loaixe">
                        <li class="option">Loại xe</li>
                    </a>
                    <a href="lotrinh">
                        <li class="option">Lộ trình</li>
                    </a>
                    <a href="nhanvien">
                        <li class="option">Nhân viên</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="">
            <!-- <span>
                <ul>
                    <li class="option selected" onclick="change(this)">Bản đồ</li>
                    <li class="option" onclick="change(this)">Nhập vé</li>
                </ul>
            </span> -->
            <span><a href="./">Trang chủ</a></span>
            @yield('content')
        </div>
    </div>
</div>
@yield('excontent')
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop=document.getElementsByClassName("header")[0].clientHeight+30+"px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom= "15px";
</script>
@yield('script')
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script> -->
</body>
</html>
