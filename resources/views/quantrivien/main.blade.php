<!DOCTYPE html>
<html>
<head>
    <title>Quản trị viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.theme.min.css')}}" rel="stylesheet">
	<link href="{{asset('plugins/paramquery-3.3.4/pqgrid.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/paramquery-3.3.4/pqgrid.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/paramquery-3.3.4/pqgrid.ui.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/paramquery-3.3.4/themes/custom/pqgrid.css')}}" rel="stylesheet">
    {{--<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">--}}
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/paramquery-3.3.4/pqgrid.min.js')}}"></script>
    <script src="{{asset('plugins/paramquery-3.3.4/jsZip-2.5.0/jszip.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-qtv.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="header">
        <div class="row">
            <h3 class="col-lg-4"><a href="{{asset('admin/')}}">AWE Admin</a></h3>
            <h5 class="col-lg-4"><a href="{{url('/')}}" title="Chuyển về trang khách hàng"><img src="{{asset('/images/icons/luggage.png')}}" height="30" alt="icon">AwesomeTravel</a></h5>
            <div class="col-lg-4 userzone">
                <span onclick="showMenu(this)"><img src="{{asset('images/icons/bus.png')}}" alt="icon">Phan Anh Minh&nbsp;<i class="glyphicon glyphicon-menu-down" ></i>
                    <ul>
                        <li><i class="glyphicon glyphicon-info-sign"></i>Thông tin</li>               
                        <li><i class="glyphicon glyphicon-off"></i>Thoát</li>
                    </ul>
                </span>
                <!--span>Thoát</span-->
            </div>
        </div>
        {{--<hr />--}}
    </div>
    <div class="noidung row">
        <div class="sidebar">
            <div class="menu">
                <ul>
                    <a href="{{url('/admin/thongke')}}">
                        <li class="option selected"><img src="{{asset('images/icons/report.png')}}" alt="icon">&nbsp;&nbsp;Thống kê</li>
                    </a>
                    <a href="{{url('/admin/khachhang')}}">
                        <li class="option"><img src="{{asset('images/icons/customer.png')}}" alt="icon">&nbsp;&nbsp;Khách hàng</li>
                    </a>
                    <a href="{{url('/admin/chuyenxe')}}">
                        <li class="option"><img src="{{asset('images/icons/chuyenxe.png')}}" alt="icon">&nbsp;&nbsp;Chuyến xe</li>
                    </a>
					<a href="{{url('/admin/ve')}}">
                        <li class="option"><img src="{{asset('images/icons/bus-ticket.png')}}" alt="icon">&nbsp;&nbsp;Vé xe</li>
                    </a>
                    <a href="{{url('/admin/loaixe')}}">
                        <li class="option"><img src="{{asset('images/icons/bus-type.png')}}" alt="icon">&nbsp;&nbsp;Loại xe</li>
                    </a>
                    <a href="{{url('/admin/lotrinh')}}">
                        <li class="option"><img src="{{asset('images/icons/route.png')}}" alt="icon">&nbsp;&nbsp;Lộ trình</li>
                    </a>
                    <a href="{{url('/admin/nhanvien')}}">
                        <li class="option"><img src="{{asset('images/icons/partnership.png')}}" alt="icon">&nbsp;&nbsp;Nhân viên</li>
                    </a>
                    <a href="{{url('/admin/xe')}}">
                        <li class="option"><img src="{{asset('images/icons/bus.png')}}" alt="icon">&nbsp;&nbsp;Xe</li>
                    </a>
                    <a href="{{url('/admin/tramdung')}}">
                        <li class="option"><img src="{{asset('images/icons/parking.png')}}" alt="icon">&nbsp;Trạm dừng</li>
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
           {{-- <span><a href="{{url('/')}}">Trang chủ</a></span>--}}
            @yield('content')
        </div>
    </div>
</div>
@yield('excontent')
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop=document.getElementsByClassName("header")[0].clientHeight+15+"px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom= "15px";
    function pqDatePicker(ui) {
        var $this = $(this);
        $this
        //.css({ zIndex: 3, position: "relative" })
            .datepicker({
                yearRange: "-25:+0", //25 years prior to present.
                changeYear: true,
                changeMonth: true,
                //showButtonPanel: true,
                onClose: function (evt, ui) {
                    $(this).focus();
                }
            });
        //default From date
        $this.filter(".pq-from").datepicker("option", "defaultDate", new Date("01/01/1996"));
        //default To date
        $this.filter(".pq-to").datepicker("option", "defaultDate", new Date("12/31/1998"));
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script> -->
</body>
</html>
