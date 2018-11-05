<!DOCTYPE html>
<html>
<head>
    <title>Quản lý đặt vé</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-qldv.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <h3 class="col-lg-4"><a href="{{asset('qldv/')}}">AWE QL Đặt vé</a></h3>
            <h5 class="col-lg-4"><a href="{{url('/')}}" title="Chuyển về trang khách hàng"><img src="{{asset('/images/icons/luggage.png')}}" height="30" alt="icon">AwesomeTravel</a></h5>
            <div class="col-lg-4 userzone">
                <span onclick="showMenu(this)"><img src="{{asset('images/icons/bus.png')}}" alt="icon">{{session('admin.name','AdminTest')}}&nbsp;<i class="glyphicon glyphicon-menu-down" ></i>
                    <ul>
                        <li><i class="glyphicon glyphicon-info-sign"></i>Thông tin</li>
                        <a href="{{route('adminlogout')}}">
                            <li><i class="glyphicon glyphicon-off"></i>Thoát</li>
                        </a>
                    </ul>
                </span>
            </div>
        </div>
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
                    <a href="{{asset('qldv/giamsat')}}">
                        <li class="option selected">Bản đồ</li>
                    </a>
					<a href="{{asset('qldv/datve')}}">
                        <li class="option" onclick="change(this)">Nhập vé</li>
                    </a>
                </ul>
            </span>
            <!--span><a href="../">Trang chủ</a></span-->
            @yield('content')
        </div>
    </div>
</div>
@yield('excontent')
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop = document.getElementsByClassName("header")[0].clientHeight + 45 + "px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom = "15px";
	function showMenu(ev){
		if(ev.getElementsByTagName("i")[0].classList.contains("glyphicon-menu-down")){
			ev.getElementsByTagName("ul")[0].style.display = "block";
			ev.style.border = "1px solid white";
			ev.style.borderBottom = "none";
			ev.getElementsByTagName("i")[0].classList.remove("glyphicon-menu-down");
			ev.getElementsByTagName("i")[0].classList.add("glyphicon-menu-up");
		}
		else{
			ev.getElementsByTagName("i")[0].classList.remove("glyphicon-menu-up");
			ev.getElementsByTagName("i")[0].classList.add("glyphicon-menu-down");
			ev.getElementsByTagName("ul")[0].style.display = "none";
			ev.style.border = "1px solid transparent";
			ev.style.borderBottom = "none";
		}
	}
</script>
@yield('script')
</body>
</html>
