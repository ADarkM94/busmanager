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
                <span onclick="showMenu(this)"><img src="{{asset('images/icons/user.png')}}" alt="icon">{{session('admin.name','AdminTest')}}&nbsp;<i class="glyphicon glyphicon-menu-down" ></i>
                    <ul>
                        <li onclick="showUserInfo({{session('admin.id')}})"><i class="glyphicon glyphicon-info-sign"></i>Thông tin</li>
                        <a href="{{route('adminlogout')}}">
                            <li><i class="glyphicon glyphicon-off"></i>Thoát</li>
                        </a>
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
<div class="modal fade" id="userinfo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">Thông tin Admin</div>
			</div>
			<div class="modal-body">
				<div class="loading"></div>
				<form name="frm-userinfo" class="row">
					<div class="form-group col-lg-6">
						<label>Tên:</label>
						<input type="text" name="name" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Tên đăng nhập:</label>
						<input type="text" name="username" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Giới tính:</label>
						<input type="text" name="gender" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Mật khẩu:</label>
						<input type="password" name="password" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Ngày sinh:</label>
						<input type="date" name="brtday" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Ngày bắt đầu làm việc:</label>
						<input type="date" name="starttime" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Số điện thoại:</label>
						<input type="text" name="phone" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Chi nhánh:</label>
						<input type="text" name="chinhanh" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
					<div class="form-group col-lg-6">
						<label>Địa chỉ:</label>
						<input type="text" name="address" class="form-control" placeholder="Chưa có thông tin" readonly>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="{{asset('admin/addnhanvien/').'/'.session('admin.id')}}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;Thay Đổi Thông Tin</a>
			</div>
		</div>
	</div>
</div>
@yield('excontent')
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop=document.getElementsByClassName("header")[0].clientHeight+15+"px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom= "15px";
    function pqDatePicker(ui) 
	{
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
	function showMenu(ev)
	{
		if(ev.getElementsByTagName("i")[0].classList.contains("glyphicon-menu-down"))
		{
			ev.getElementsByTagName("ul")[0].style.display = "block";
			ev.style.border = "1px solid white";
			ev.style.borderBottom = "none";
			ev.getElementsByTagName("i")[0].classList.remove("glyphicon-menu-down");
			ev.getElementsByTagName("i")[0].classList.add("glyphicon-menu-up");
		}
		else
		{
			ev.getElementsByTagName("i")[0].classList.remove("glyphicon-menu-up");
			ev.getElementsByTagName("i")[0].classList.add("glyphicon-menu-down");
			ev.getElementsByTagName("ul")[0].style.display = "none";
			ev.style.border = "1px solid transparent";
			ev.style.borderBottom = "none";
		}
	}
	function showUserInfo(id)
	{
		var name = document.forms['frm-userinfo']['name'];
		var username = document.forms['frm-userinfo']['username'];
		var gender = document.forms['frm-userinfo']['gender'];
		var password = document.forms['frm-userinfo']['password'];
		var brtday = document.forms['frm-userinfo']['brtday'];
		var phone = document.forms['frm-userinfo']['phone'];
		var chinhanh = document.forms['frm-userinfo']['chinhanh'];
		var address = document.forms['frm-userinfo']['address'];
		var starttime = document.forms['frm-userinfo']['starttime'];
		var email = document.forms['frm-userinfo']['email'];
		$('#userinfo').modal('show');
		$('#userinfo .loading').addClass('show');
		$.ajax({
			url: '{{route('userinfo')}}',
			type: 'post',
			data: {
				_token: '{{csrf_token()}}',
				id: id
			},
			success: function(data){
				if(data.kq==1)
				{
					name.value = data.userinfo[0].Họ_Tên;
					name.parentNode.title = name.value==null? '':name.value;
					username.value = data.userinfo[0].Username;
					username.parentNode.title = username.value;
					gender.value = data.userinfo[0].Giới_tính==0? 'Không xác định':(data.userinfo[0].Giới_tính==1? 'Nam':'Nữ');
					gender.parentNode.title = gender.value;
					password.value = data.userinfo[0].Password;
					brtday.value = data.userinfo[0].Ngày_sinh;
					brtday.parentNode.title = brtday.value==null? '':brtday.value;
					phone.value = data.userinfo[0].Sđt;
					phone.parentNode.title = phone.value==null? '':phone.value;
					chinhanh.value = data.userinfo[0].Chi_nhánh;
					chinhanh.parentNode.title = chinhanh.value==null? '':chinhanh.value;
					address.value = data.userinfo[0].Địa_chỉ;
					address.parentNode.title = address.value==null? '':address.value;
					starttime.value = data.userinfo[0].Date_Starting;
					starttime.parentNode.title = starttime.value==null? '':starttime.value;
					email.value = data.userinfo[0].Email;
					email.parentNode.title = email.value==null? '':email.value;
					$('#userinfo .loading').removeClass('show');
				}
				else
				{
					alert('Tải thông tin thất bại!');
				}
			},
			timeout: 10000,
			error: function(xhr){
				if(xhr.statusText=="timeout")
				{
					alert('Vui lòng kiểm tra kết nối!');
				}
			}
		});
	}
</script>
@yield('script')
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script> -->
</body>
</html>
