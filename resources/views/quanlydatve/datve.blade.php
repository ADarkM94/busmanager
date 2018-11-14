@extends('quanlydatve.main')
@section('content')
	<script>
		// $(function(){
          // $('i[onload]').trigger('onload');
        // });
	</script>
    <div class="content datve show row">
        <div class="col-lg-4">
            <div class="searchroute">
                <span>Tìm chuyến xe</span>
                <form name="searchchuyenxe">
                    <div>
                        <div class="input-group" style="position: relative;">
                            <span class="input-group-addon">Nơi đi&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="text" name="noidi" class="form-control" list="diadiem" placeholder="Nơi đi">
							<!--ul id="kqsearchtinh"></ul-->
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Nơi đến</span>
                            <input type="text" name="noiden" class="form-control" list="diadiem" placeholder="Nơi đến">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Ngày đi&nbsp;</span>
                            <input type="date" name="ngaydi" class="form-control">
                        </div>
                        <br>
                        <div class="selecttype">
                            <span>Loại xe</span>
                            <label class="radio-inline"><input type="radio" name="loaighe" value="0" checked>Ghế ngồi</label>
                            <label class="radio-inline"><input type="radio" name="loaighe" value="1">Giường nằm</label>
                        </div>
                    </div>
                </form>
                <span class="glyphicon glyphicon-search" id="timchuyenxe"></span>
            </div>
            <div class="searchresult">
                <div class="chuyenxe">
					<div class="loading"></div>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ttdatve">
                <span>Thông tin đặt vé</span>
                <form name="frm-ttdatve" class="form-vertical">
					<input type="hidden" name="idchuyenxe">
					<input type="hidden" name="idkhachhang">
					<input type="hidden" name="idnhanvien" value="6"> <!--Sẽ thay bằng session mã nhân viên sau-->
                    <div class="input-group">
						<label class="input-group-addon">Họ tên&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="hoten" class="form-control" placeholder="Họ tên">
					</div>	
                    <br>
					<div class="input-group">
						<label class="input-group-addon">Di động&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="sodienthoai" class="form-control" placeholder="Số điện thoại">
					</div>
                    <br>
					<div class="input-group">
						<label class="input-group-addon">Giới tính&nbsp;&nbsp;</label>
						<select name="gender" class="form-control">
							<option value="0">Không xác định</option>
							<option value="1">Nam</option>
							<option value="2">Nữ</option>
						</select>
					</div>
					<br>
					<div class="input-group">
						<label class="input-group-addon">Ngày sinh</label>
						<input type="date" name="brtday" class="form-control">
					</div>
                    <br>
					<div class="input-group">
						<label class="input-group-addon">Đã chọn&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="vedachon" class="form-control" placeholder="Các vị trí ghế đã chọn" readonly>
					</div>
                    <br>
					<div class="input-group">
						<label class="input-group-addon">Nơi đi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="noidi" class="form-control" placeholder="Nơi đi" readonly>
					</div>
                    <br>
					<div class="input-group">
						<label class="input-group-addon">Nơi đến&nbsp;&nbsp;&nbsp;</label>
						<input type="text" name="noiden" class="form-control" placeholder="Nơi đến" readonly>
					</div>
                </form>
                <span data-toggle="modal" data-target="#modaldadat">Vé đã đặt</span>
                <br>
                <span data-toggle="modal" data-target="#modaldatve">Đặt vé</span>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="searchcustomer">
                <span>Tìm Khách Hàng</span>
                <form name="timkhachhang">
                    <div>
                        <input type="text" name="searchkh" class="form-control" placeholder="Search">
                        <span id="timkh" class="glyphicon glyphicon-search"></span>
                    </div>
					<div>
						<label>Tìm theo:</label>
						<label class="kh-filter"><input type="checkbox" onclick="if(document.getElementById('kh-filter0').checked == true){ document.getElementById('kh-filter1').checked = true; document.getElementById('kh-filter2').checked = true; document.getElementById('kh-filter1').disabled = true; document.getElementById('kh-filter2').disabled = true;} else { document.getElementById('kh-filter1').disabled = false; document.getElementById('kh-filter2').disabled = false;}" id="kh-filter0" value="0">Tất cả</label>
						<label class="kh-filter"><input type="checkbox" id="kh-filter1" value="1" checked>Tên</label>
						<label class="kh-filter"><input type="checkbox" id="kh-filter2" value="2">Sđt</label>
					</div>
                </form>
                <div class="kqtimkh">
					<div class="loading"></div>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('excontent')
    <datalist id="diadiem" style="display: none;">
		@isset($diadiem)
			@foreach($diadiem as $row)
				<option value="{{$row->Tên}}" label="{{$row->Tên_không_dấu}}">
			@endforeach
		@endisset
	</datalist>
    <div id="modaldatve" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Chuyến xe #</div>
                </div>
                <div class="modal-body row">
					<div class="col-lg-4">
                    <form name="ttchuyenxe">
						<input type="hidden" name="idchuyenxe">
                        <div class="form-group">
                            <label>Nơi đi</label>
                            <input type="text" name="noidi" class="form-control" placeholder="Điểm đi" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Nơi đến</label>
                            <input type="text" name="noiden" class="form-control" placeholder="Điểm đến" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Thời gian đi</label>
                            <input type="text" name="thoigiandi" class="form-control" placeholder="Thời gian đi" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Thời gian đến dự kiến</label>
                            <input type="text" name="thoigianden" class="form-control" placeholder="Thời gian đến dự kiến" readonly="">
                        </div> 
						<div class="form-group">
                            <label>Vé chọn</label>
                            <input type="text" name="vechon" class="form-control" placeholder="Vé đã chọn" readonly="">
                        </div>   
                    </form>
					</div>
                    <div class="col-lg-8">
						<span>Sơ đồ xe</span>
						<div class="sodoxe">
							<div class="loading"></div>
							<div class="table-responsive"></div>
						</div>
					</div>
                </div>
				<div class="modal-footer">
					<button class="btn btn-success" id="chonchuyenxe">Chọn Vé</button>
					<button class="btn btn-danger" id="huychonchuyenxe">Hủy Vé</button>
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
	<div id="modalttkhachhang" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Thông tin khách hàng</h4>
				</div>
				<div class="modal-body">
					<div class="loading"></div>
					<form name="frm-ttkhachhang">
						<input type="hidden" name="id">
						<div class="form-group">
							<label>Tên</label>
							<input type="text" name="name" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Giới tính</label>
							<input type="text" name="gender" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Ngày sinh</label>
							<input type="text" name="brtday" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" name="phone" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<input type="text" name="address" class="form-control" readonly>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success">Lấy Thông Tin</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < 2; i++) {
            option[i].classList.remove('selected');
        }
        option[1].classList.add('selected');
		/* window.onclick = function(ev){
			if(ev.target != document.getElementById('kqsearchtinh'))
			{
				document.getElementById('kqsearchtinh').style.display = 'none';
			}
		};
		function searchtinh(ev)
		{
			var txtsearch = ev.value;
			$('#kqsearchtinh').html('');
			$('#kqsearchtinh').css('display','none');
			$.ajax({
				url: '',
				type: 'post',
				data: {
					_token: '',
					txtsearch: txtsearch
				},
				success: function(data){
					if(data.kq==1)
					{
						for(var i=0;i<data.data.length;i++)
						{
							if($('#kqsearchtinh').html()=='')
							{
								$('#kqsearchtinh').html($('#kqsearchtinh').html()+'<li class="selected" onclick="choosetinh(this)">'+data.data[i].Tên+'</li>');
							}
							$('#kqsearchtinh').html($('#kqsearchtinh').html()+'<li onclick="choosetinh(this)">'+data.data[i].Tên+'</li>');
							$('#kqsearchtinh').css('display','block');
						}
					}
				}
			});
		}
		function choosetinh(ev)
		{
			ev.parentNode.previousElementSibling.value=ev.innerHTML;
			$('#kqsearchtinh').html('');
			$('#kqsearchtinh').css('display','none');
		} */
		var date = new Date; 
		document.forms['searchchuyenxe']['ngaydi'].min = date.getFullYear()+'-'+((date.getMonth()+1)<10? ('0'+(date.getMonth()+1)):(date.getMonth()+1))+'-'+(date.getDate()<10? ('0'+date.getDate()):date.getDate());
		document.forms['searchchuyenxe']['ngaydi'].defaultValue = date.getFullYear()+'-'+((date.getMonth()+1)<10? ('0'+(date.getMonth()+1)):(date.getMonth()+1))+'-'+(date.getDate()<10? ('0'+date.getDate()):date.getDate());
		document.getElementById('timchuyenxe').onclick = function(){
			var noidi = document.forms['searchchuyenxe']['noidi'];
			var noiden = document.forms['searchchuyenxe']['noiden'];
			var ngaydi = document.forms['searchchuyenxe']['ngaydi'];
			var loaighe = document.forms['searchchuyenxe']['loaighe'];
			var diadiem = document.getElementById('diadiem').getElementsByTagName('option');
			noidi.style.borderColor = '#ccc';
			noiden.style.borderColor = '#ccc';
			ngaydi.style.borderColor = '#ccc';
			if(noidi.value == ''||noiden.value == ''||ngaydi.value == '')
			{
				if(noidi.value == '')
				{
					noidi.style.borderColor = 'red';
				}
				if(noiden.value == '')
				{
					noiden.style.borderColor = 'red';
				}
				if(ngaydi.value == '')
				{
					ngaydi.style.borderColor = 'red';
				}
				alert('Dữ liệu không đủ!');
			}
			else
			{
				var checknoidi = 0;
				var checknoiden = 0;
				for(var i=0;i<diadiem.length;i++)
				{
					if(noidi.value == diadiem[i].value)
					{
						checknoidi = 1;
					}					
					if(noiden.value == diadiem[i].value)
					{
						checknoiden = 1;
					}
				}
				if(checknoidi == 0&&checknoiden == 0)
				{
					alert('Nơi đi và Nơi đến không đúng!');
					noidi.style.borderColor = 'red';
					noiden.style.borderColor = 'red';
				}
				else if(checknoidi == 0)
				{
					alert('Nơi đi không đúng!');
					noidi.style.borderColor = 'red';
				}
				else if(checknoiden == 0)
				{
					alert('Nơi đến không đúng!');
					noiden.style.borderColor = 'red';
				}
				else if(noidi.value == noiden.value)
				{
					alert('Nơi đi và Nơi đến không được trùng!');
				}
				else
				{
					var searchresult = document.getElementsByClassName('searchresult')[0].getElementsByClassName('loading')[0];
					searchresult.classList.add('show'); 
					$.ajax({
						url: '{{route("qldv-searchroute")}}',
						type: 'post',
						data: {
							_token: '{{csrf_token()}}',
							noidi: noidi.value,
							noiden: noiden.value,
							ngaydi: ngaydi.value,
							loaighe: loaighe.value
						},
						success: function(data){
							if(data.kq == 1&&data.data.length != 0)
							{
								searchresult.nextElementSibling.innerHTML = '';
								var sothutu = 1;
								for(var i=0;i<data.data.length;i++)
								{
									searchresult.nextElementSibling.innerHTML += '<li data-ma=\"'+data.data[i].Mã+'\" data-noidi=\"'+data.data[i].Nơi_đi+'\" data-noiden=\"'+data.data[i].Nơi_đến+'\" data-thoigiandi=\"'+(data.data[i].Ngày_xuất_phát+' '+data.data[i].Giờ_xuất_phát)+'\" data-thoigianden=\"'+(data.data[i].Ngày_đến+' '+data.data[i].Giờ_đến)+'\" onclick=\"showChuyenXe(this)\">#'+sothutu+' Chuyến xe '+data.data[i].Giờ_xuất_phát+' - '+data.data[i].Giờ_đến+'<i class="glyphicon glyphicon-ban-circle" style="color: gray;"></i></li>'
									sothutu++;
								}
								searchresult.classList.remove('show'); 
							}
							else if(data.kq == 1&&data.data.length == 0)
							{
								searchresult.nextElementSibling.innerHTML = 'Không tìm thấy chuyến xe nào...';
								searchresult.classList.remove('show'); 
							}
						},
						timeout: 10000,
						error: function(xhr){
							if(xhr.statusText == 'timeout')
							{
								searchresult.nextElementSibling.innerHTML = "Quá lâu để phản hồi...<br><i class='btn btn-danger' onclick='document.getElementById(\"timchuyenxe\").click();'>Thử lại</i>";
								searchresult.classList.remove('show'); 
							}
						}
					});
				}
			}
		};
		function showChuyenXe(ev)
		{
			var noidi = document.forms['ttchuyenxe']['noidi'];
			var noiden = document.forms['ttchuyenxe']['noiden'];
			var thoigiandi = document.forms['ttchuyenxe']['thoigiandi'];
			var thoigianden = document.forms['ttchuyenxe']['thoigianden'];
			var chuyenxe = document.getElementById('modaldatve').getElementsByClassName('modal-title')[0];
			var sodoxe = document.getElementById('modaldatve').getElementsByClassName('sodoxe')[0];
			var loading = document.getElementById('modaldatve').getElementsByClassName('loading')[0];
			noidi.value = ev.getAttribute('data-noidi');
			noiden.value = ev.getAttribute('data-noiden');
			thoigiandi.value = ev.getAttribute('data-thoigiandi');
			thoigianden.value = ev.getAttribute('data-thoigianden');
			chuyenxe.innerHTML = "Chuyến Xe #"+ev.getAttribute('data-ma');
			document.forms['ttchuyenxe']['idchuyenxe'].value = ev.getAttribute('data-ma');
			loading.classList.add('show');
			$.ajax({
				url: '{{route("qldv-routedetails")}}',
				type: 'post',
				data: {
					_token: '{{csrf_token()}}',
					idchuyenxe: ev.getAttribute('data-ma')
				},
				success: function(data){
					if(data.kq == 1)
					{
						idnhanvien = 6; //Sẽ thay thế bằng session mã nhân viên đặt vé
						str = "";
						vedachon = "";
						sohang = data.loaixe[0].Số_hàng;
						socot = data.loaixe[0].Số_cột;
						loaighe = data.loaixe[0].Loại_ghế;
						sodo = data.loaixe[0].Sơ_đồ;
						ve = data.ve;
						demve = 0;
						if(loaighe == 0)
						{
							str+="<table class='sodoghe'>";
							str+="<tr><th>Tài xế</th><th colspan='"+(socot - 1)+"'></th></tr>";
							for(var i=1;i<sohang;i++)
							{
								str+="<tr>"
								for(var j=0;j<socot;j++)
								{
									if(sodo[i*socot + j] == 1)
									{
										if(ve[demve].Trạng_thái == 0)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											// title += "Ngày sinh: "+(ve[demve].Ngày_sinh==null? 'Chưa có':ve[demve].Ngày_sinh)+"<br>";
											// title += "Giới tính: "+(ve[demve].Giới_tính==null? 'Chưa có':(ve[demve].Giới_tính==0? 'Không xác định':(ve[demve].Giới_tính==1? 'Nam':'Nữ')))+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";							
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";		
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<br><i onload='showTime(this)'>"+ve[demve].Thời_gian_còn+"</i><div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt == idnhanvien)
										{
											vedachon += (ve[demve].Vị_trí_ghế+",");
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";		
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt != idnhanvien)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										demve++;
									}
									else if(sodo[i*socot + j] == 0)
									{
										str+="<td></td>";
									}
								}
								str+="</tr>"
							}
							str+="</table>";
						}
						else if(loaighe == 1)
						{
							str+="<table class='sodogiuong tangduoi'>";
							str+="<caption>Tầng Dưới</caption>";
							str+="<tr><th>Tài xế</th><th colspan='"+(socot - 1)+"'></th></tr>";
							for(var i=1;i<(sohang + 1)/2;i++)
							{
								str+="<tr>"
								for(var j=0;j<socot;j++)
								{
									if(sodo[i*socot + j] == 1)
									{
										if(ve[demve].Trạng_thái == 0)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<br><i onload='showTime(this)'>"+ve[demve].Thời_gian_còn+"</i><div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt == idnhanvien)
										{
											vedachon += (ve[demve].Vị_trí_ghế+",");
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt != idnhanvien)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										demve++;
									}
									else if(sodo[i*socot + j] == 0)
									{
										str+="<td></td>";
									}
								}
								str+="</tr>"
							}
							str+="</table>";
							str+="<table class='sodogiuong tangtren'>";
							str+="<caption>Tầng Trên</caption>";
							str+="<tr><th>Tài xế</th><th colspan='"+(socot - 1)+"'></th></tr>";
							for(var i=(sohang + 1)/2;i<sohang;i++)
							{
								str+="<tr>"
								for(var j=0;j<socot;j++)
								{
									if(sodo[i*socot + j] == 1)
									{
										if(ve[demve].Trạng_thái == 0)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<br><i onload='showTime(this)'>"+ve[demve].Thời_gian_còn+"</i><div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt == idnhanvien)
										{
											vedachon += (ve[demve].Vị_trí_ghế+",");
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null&&ve[demve].Mã_nhân_viên_đặt != idnhanvien)
										{
											var title = "Vị trí ghế: "+ve[demve].Vị_trí_ghế+"<br>";
											title += "Khách đặt: "+(ve[demve].Tên==null? 'Chưa có':ve[demve].Tên)+"<br>";
											title += "Số điện thoại: "+(ve[demve].Sđt==null? 'Chưa có':ve[demve].Sđt)+"<br>";				
											title += "Nhân viên đặt: "+(ve[demve].Họ_Tên==null? 'Chưa có':ve[demve].Họ_Tên)+"<br>";	
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"<div class='tooltip-info'>"+title+"</div></td>";
										}
										demve++;
									}
									else if(sodo[i*socot + j] == 0)
									{
										str+="<td></td>";
									}
								}
								str+="</tr>"
							}
							str+="</table>";
						}
						sodoxe.getElementsByTagName('div')[1].innerHTML = str;
						document.forms['ttchuyenxe']['vechon'].value = vedachon;
						$('i[onload]').trigger('onload');
					}
					else if(data.kq == 0)
					{
						alert('Thất bại');
					}
					loading.classList.remove('show');
				},
				timeout: 10000,
				error: function(xhr){
					if(xhr.statusText == 'timeout')
					{
						sodoxe.getElementsByTagName('div')[1].innerHTML = "Lỗi Time Out...";
					}
					loading.classList.remove('show');
				}
			});
			$('#modaldatve').modal('show');
		}
		document.getElementById('timkh').onclick = function(){ //Bắt sự kiện tìm kiếm khách hàng
			var searchkh = document.forms['timkhachhang']['searchkh'];
			var kqtimkh = document.getElementsByClassName('kqtimkh')[0];
			var loading = kqtimkh.getElementsByClassName('loading')[0];
			if(searchkh.value == '')
			{
				alert('Dữ liệu chưa nhập');
				searchkh.style.borderColor = 'red';
			}
			else
			{
				loading.classList.add('show');
				var filter;
				if(document.getElementById("kh-filter0").checked == true||(document.getElementById("kh-filter1").checked == true&&document.getElementById("kh-filter2").checked == true))
				{
					filter = 0;
				}
				else if(document.getElementById("kh-filter1").checked == true)
				{
					filter = 1;
				}
				else if(document.getElementById("kh-filter2").checked == true)
				{
					filter = 2;
				}
				$.ajax({
					url: '{{route("qldv-searchcustomer")}}',
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						filtermode: filter,
						datasearch: searchkh.value
					},
					success: function(data){
						if(data.kq == 1)
						{
							var str = "";
							if(data.data.length == 0)
							{
								str += "Không tìm thấy khách hàng phù hợp..."
							}
							else
							{
								for(var i=0;i<data.data.length;i++)
								{
									str += "<li data-ma='"+data.data[i].Mã+"' onclick='showInfoKH(this)'>"+data.data[i].Tên+" - "+data.data[i].Sđt+" <span onclick='chooseKH(event,this,"+data.data[i].Mã+")' class='glyphicon glyphicon-plus'></span></li>";
								}
							}
							kqtimkh.getElementsByTagName("ul")[0].innerHTML = str;
							loading.classList.remove("show");
						}
					},
					timeout: 10000,
					error: function(xhr){
						
					}
				});
			}
		};
		document.forms['timkhachhang'].onsubmit = function(ev){
			ev.preventDefault();
			document.getElementById('timkh').click();
		};
		function showInfoKH(ev)
		{
			var loading = document.getElementById("modalttkhachhang").getElementsByClassName("loading")[0];
			var idkhachhang = ev.getAttribute("data-ma");
			var id = document.forms["frm-ttkhachhang"]["id"];
			var name = document.forms["frm-ttkhachhang"]["name"];
			var brtday = document.forms["frm-ttkhachhang"]["brtday"];
			var gender = document.forms["frm-ttkhachhang"]["gender"];
			var phone = document.forms["frm-ttkhachhang"]["phone"];
			var email = document.forms["frm-ttkhachhang"]["email"];
			var address = document.forms["frm-ttkhachhang"]["address"];
			loading.classList.add("show");
			$.ajax({
				url: '{{route("qldv-infokh")}}',
				type: 'post',
				data: {
					_token: '{{csrf_token()}}',
					idkhachhang: idkhachhang
				},
				success: function(data){
					if(data.kq == 1)
					{
						id.value = data.data[0].Mã;
						name.value = data.data[0].Tên;
						brtday.value = data.data[0].Ngày_sinh_hiển_thị;
						gender.value = data.data[0].Giới_tính==0? "Không xác định":(data.data[0].Giới_tính==1? "Nam":"Nữ");
						phone.value = data.data[0].Sđt;
						address.value = data.data[0].Địa_chỉ!=null&&data.data[0].Địa_chỉ!=""? data.data[0].Địa_chỉ:"Chưa có thông tin";
						email.value = data.data[0].Email!=null&&data.data[0].Email!=""? data.data[0].Email:"Chưa có thông tin";
						loading.classList.remove("show");
					}
				},
				timeout: 10000,
				error: function(xhr){
					
				}
			});
			$("#modalttkhachhang").modal("show");
		}
		function chooseKH(ev,target,id)
		{
			ev.stopPropagation();
			var idkhachhang = document.forms["frm-ttdatve"]["idkhachhang"];
			var hoten = document.forms["frm-ttdatve"]["hoten"];
			var sodienthoai = document.forms["frm-ttdatve"]["sodienthoai"];
			var gioitinh = document.forms["frm-ttdatve"]["gender"];
			var ngaysinh = document.forms["frm-ttdatve"]["brtday"];
			if(target.classList.contains("uncheckkh"))
			{
				idkhachhang.value = "";
				hoten.value = "";
				sodienthoai.value = "";
				gioitinh.value = 0;
				ngaysinh.value = "";
				hoten.removeAttribute("readonly");
				sodienthoai.removeAttribute("readonly");
				gioitinh.removeAttribute("disabled");
				ngaysinh.removeAttribute("readonly");
				target.classList.remove("uncheckkh");
			}
			else
			{
				var children = target.parentNode.parentNode.getElementsByTagName("span");
				for(var i=0;i<children.length;i++)
				{
					children[i].classList.remove("uncheckkh");
				}
				$.ajax({
					url: '{{route("qldv-infokh")}}',
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						idkhachhang: id
					},
					success: function(data){
						if(data.kq == 1)
						{
							idkhachhang.value = data.data[0].Mã;
							hoten.value = data.data[0].Tên;
							sodienthoai.value = data.data[0].Sđt;
							gioitinh.value = data.data[0].Giới_tính;
							ngaysinh.value = data.data[0].Ngày_sinh;
							hoten.setAttribute("readonly","");
							sodienthoai.setAttribute("readonly","");
							gioitinh.setAttribute("disabled","");
							ngaysinh.setAttribute("readonly","");
							target.classList.add("uncheckkh");
						}
					},
					timeout: 10000,
					error: function(xhr){
				
					}
				});
			}			
		}
		$("#modaldatve").on("hidden.bs.modal", function(){ //Bắt sự kiện modal đặt vé tắt
			//Code Sự kiện tắt modal đặt vé
		});
		function chonve(ev)
		{
			if(ev.classList.contains("vedangchon"))
			{
				$.ajax({
					url: '{{route("qldv-huychonve")}}',
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						idnhanvien: 6, //Sẽ thay thế bằng session mã nhân viên đặt vé
						idve: ev.getAttribute("data-mave")
					},
					success: function(data){
						if(data.kq == 1)
						{
							var title = "Vị trí ghế: "+data.ttghe[0].Vị_trí_ghế+"<br>";
							title += "Khách đặt: "+(data.ttghe[0].Tên==null? 'Chưa có':data.ttghe[0].Tên)+"<br>";
							title += "Số điện thoại: "+(data.ttghe[0].Sđt==null? 'Chưa có':data.ttghe[0].Sđt)+"<br>";				
							title += "Nhân viên đặt: "+(data.ttghe[0].Họ_Tên==null? 'Chưa có':data.ttghe[0].Họ_Tên)+"<br>";	
							ev.getElementsByClassName("tooltip-info")[0].innerHTML = title;
							ev.classList.remove("vedangchon");
							document.forms["ttchuyenxe"]["vechon"].value = document.forms["ttchuyenxe"]["vechon"].value.replace(ev.getAttribute("data-vitri")+",","");
						}
					},
					timeout: 10000,
					error: function(xhr){
					
					}
				});
			}
			else
			{
				ev.classList.add("vedangchon");
				$.ajax({
					url: '{{route("qldv-chonve")}}',
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						idnhanvien: 6, //Sẽ thay thế bằng session mã nhân viên đặt
						idve: ev.getAttribute("data-mave")
					},
					success: function(data){
						if(data.kq == 0)
						{
							ev.classList.remove("vedangchon");
						}
						else if(data.kq == 1)
						{
							var title = "Vị trí ghế: "+data.ttghe[0].Vị_trí_ghế+"<br>";
							title += "Khách đặt: "+(data.ttghe[0].Tên==null? 'Chưa có':data.ttghe[0].Tên)+"<br>";
							title += "Số điện thoại: "+(data.ttghe[0].Sđt==null? 'Chưa có':data.ttghe[0].Sđt)+"<br>";				
							title += "Nhân viên đặt: "+(data.ttghe[0].Họ_Tên==null? 'Chưa có':data.ttghe[0].Họ_Tên)+"<br>";	
							ev.getElementsByClassName("tooltip-info")[0].innerHTML = title;
							document.forms["ttchuyenxe"]["vechon"].value+=(ev.getAttribute("data-vitri")+",");
						}
					},
					timeout: 10000,
					error: function(xhr){
					
					}
				});
			}
		}
		function showTime(ev) //Hàm chạy đồng hồ đếm ngược
		{
			if(ev.innerHTML.valueOf() > 0)
			{
				ev.innerHTML = ev.innerHTML.valueOf() - 1;
				setTimeout(showTime,1000,ev);
			}
			else if(ev.innerHTML.valueOf() == 0)
			{
				ev.style.display = "none";
			}
		}
		document.getElementById("chonchuyenxe").onclick = function(ev){
			var idchuyenxe = document.forms["frm-ttdatve"]["idchuyenxe"];
			// var idkhachhang = document.forms["frm-ttdatve"]["idkhachhang"];
			// var idnhanvien = document.forms["frm-ttdatve"]["idnhanvien"];
			// var hoten = document.forms["frm-ttdatve"]["hoten"];
			// var sodienthoai = document.forms["frm-ttdatve"]["sodienthoai"];
			// var gioitinh = document.forms["frm-ttdatve"]["gender"];
			// var ngaysinh = document.forms["frm-ttdatve"]["brtday"];
			var vedachon = document.forms["frm-ttdatve"]["vedachon"];
			var noidi = document.forms["frm-ttdatve"]["noidi"];
			var noiden = document.forms["frm-ttdatve"]["noiden"];
			if(vedachon.value=="")
			{
				alert("Chưa chọn vé!");
			}
			else
			{
				idchuyenxe.value = document.forms['ttchuyenxe']['idchuyenxe'].value;
				vedachon.value = document.forms['ttchuyenxe']['vechon'].value;
				noidi.value = document.forms['ttchuyenxe']['noidi'].value;
				noiden.value = document.forms['ttchuyenxe']['noiden'].value;
				$("#modaldatve").modal("hide");
			}
		};
		document.getElementById("huychonchuyenxe").onclick = function(ev){
			var idchuyenxe = document.forms['ttchuyenxe']['idchuyenxe'].value;
			var vedachon = document.forms['ttchuyenxe']['vechon'].value!=""? document.forms['ttchuyenxe']['vechon'].value.slice(0,document.forms['ttchuyenxe']['vechon'].value.length - 1).split(","):null;
			// alert(vedachon.length+" "+vedachon);
			if(vedachon != null)
			{
				$.ajax({
					url: '{{route("qldv-huychonchuyenxe")}}',
					type: 'post',
					data: {
						_token: '{{csrf_token()}}',
						idnhanvien: 6, //Sẽ thay thế bằng session mã nhân viên đặt vé
						idchuyenxe: idchuyenxe,
						vitrive: vedachon
					},
					success: function(data){
						if(data.kq == 1)
						{
							alert("Đã hủy thành công!");
						}
					},
					timeout: 10000,
					error: function(xhr){
					
					}
				});
			}
			$("#modaldatve").modal("hide");
		};
    </script>
@endsection
