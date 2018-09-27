<!DOCTYPE html>
<html>
<head>
	<title>Quản lý đặt vé</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style-qldv.css">
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
			<hr />
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
						<li class="option selected" onclick="change(this)">Bản đồ</li>
						<li class="option" onclick="change(this)">Nhập vé</li>
					</ul>
				</span>
				<span><a href="./">Trang chủ</a></span>
				<div class="content bando show">
					<span onclick="showMap()">Hiển thị bản đồ</span>
				</div>
				<div class="content datve row">
					<div class="col-lg-4">
						<div class="searchroute">
							<span>Tìm chuyến xe</span>
							<form>
							<div>
								<div class="input-group">
									<span class="input-group-addon">Nơi đi</span>
									<input type="text" name="noidi" class="form-control" list="diadiem" placeholder="Nơi đi">
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon">Nơi đến</span>
									<input type="text" name="noiden" class="form-control" list="diadiem" placeholder="Nơi đến">
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon">Ngày đi</span>
									<input type="date" name="ngaydi" class="form-control">
								</div>
								<br>
								<div class="selecttype">
									<span>Loại xe</span>
									<label class="radio-inline"><input type="radio" name="loaighe" value="ghe">Ghế ngồi</label>
									<label class="radio-inline"><input type="radio" name="loaighe" value="giuong">Giường nằm</label>
								</div>
							</div>
							</form>
							<span class="glyphicon glyphicon-search"></span>
						</div>
						<div class="searchresult">
							<div class="chuyenxe">
								<ul>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ban-circle" style="color: gray;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
									<li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="ttdatve">
							<span>Thông tin đặt vé</span>
							<hr>
							<form class="form-vertical">
								<input type="text" name="hoten" class="form-control" placeholder="Họ tên">
								<br>
								<input type="text" name="sodienthoai" class="form-control" placeholder="Số điện thoại">
								<br>
								<input type="text" name="cmnd" class="form-control" placeholder="CMND">
								<br>
								<input type="text" name="noidonkhach" class="form-control" placeholder="Nơi đón khách">
								<br>
								<input type="text" name="noidi" class="form-control" list="diadiem" placeholder="Nơi đi">
								<br>
								<input type="text" name="noiden" class="form-control" list="diadiem" placeholder="Nơi đến">
							</form>
							<span data-toggle="modal" data-target="#modaldadat">Vé đã đặt</span>
							<br>
							<span data-toggle="modal" data-target="#modaldatve">Đặt vé</span>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="searchcustomer">
							<span>Tìm Khách Hàng</span>
							<form>
								<div>
									<input type="text" name="searchkh" class="form-control" placeholder="Search">
									<span class="glyphicon glyphicon-search"></span>
								</div>
							</form>
							<div class="kqtimkh">
								<ul>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
									<li>Khách hàng # <span class="glyphicon glyphicon-plus" style="color: gray;"></span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<datalist id="diadiem" style="display: none;">
		<option>Quảng Ngãi</option>
		<option>Quảng Nam</option>
		<option>Đà Nẵng</option>
		<option>Sài Gòn</option>
		<option>Bình Định</option>
		<option>Hà Nội</option>
	</datalist>
	<div id="modaldatve" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<div class="modal-title">Chuyến xe #</div>
				</div>
				<div class="modal-body">
					<form id="ttchuyenxe">
					<div class="row form-group">
						<div class="col-lg-6">
							<label>Nơi đi</label>
							<input type="text" name="noidi" class="form-control" placeholder="Điểm đi" readonly="">
						</div>
						<div class="col-lg-6">
							<label>Nơi đến</label>
							<input type="text" name="noiden" class="form-control" placeholder="Điểm đến" readonly="">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-6">
							<label>Thời gian đi</label>
							<input type="text" name="thoigiandi" class="form-control" placeholder="Thời gian đi" readonly="">
						</div>
						<div class="col-lg-6">
							<label>Thời gian đến dự kiến</label>
							<input type="text" name="thoigianden" class="form-control" placeholder="Thời gian đến dự kiến" readonly="">
						</div>
					</div>
					</form>
					<span>Sơ đồ xe</span>
					<label class="checkbox-inline"><input type="checkbox" name="multi">Chọn nhiều chỗ</label>
					<div class="sodoxe">
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
								<div class="col-lg-3"><div class="glyphicon glyphicon-check"></div></div>
							</div>
						</div>
						<div class="col-lg-4"></div>
					</div>
					<br>
					<span>Chọn</span>
				</div>
			</div>
		</div>
	</div>
	<div id="modaldadat" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<div class="modal-title">Vé đặt</div>
				</div>
				<div class="modal-body">
					<ul>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
						<li>Thông tin vé # <span class="glyphicon glyphicon-remove" style="color: red;"></span></li>
					</ul>
				</div>
				<div class="modal-footer">
					<div class="col-lg-12">
						<label>Tổng tiền</label>
						<input type="text" name="tongtien" class="form-control" placeholder="Tổng tiền" readonly="">
					</div>
					<div class="row">
						<div class="col-lg-6">
							<span>Xác nhận</span>
						</div>
						<div class="col-lg-6">
							<span>Hoàn tác</span>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<script>
		document.getElementsByClassName("container-fluid")[0].style.paddingTop=document.getElementsByClassName("header")[0].clientHeight+30+"px";
		document.getElementsByClassName("container-fluid")[0].style.paddingBottom= "15px";
		function showMap(){
			var mapOptions = {
				center: new google.maps.LatLng(51.2, 46),
				zoom: 10,
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			var map = new google.maps.Map(document.getElementsByClassName("bando")[0],mapOptions);
		}
		function change(obj){
			option = document.getElementsByClassName("option");
			content = document.getElementsByClassName("content");
			for (var i = 0; i < 2; i++) {
				option[i].classList.remove('selected');
				content[i].classList.remove('show');
			}
			for (var i = 0; i < 2; i++) {
				if(option[i]==obj){
					option[i].classList.add('selected');
					content[i].classList.add('show');
				}
			}
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script>
</body>
</html>