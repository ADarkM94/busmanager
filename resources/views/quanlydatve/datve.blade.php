@extends('quanlydatve.main')
@section('content')
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
                <form name="timkhachhang">
                    <div>
                        <input type="text" name="searchkh" class="form-control" placeholder="Search">
                        <span id="timkh" class="glyphicon glyphicon-search"></span>
                    </div>
					<div>
						<label>Tìm theo:</label>
						<label class="kh-filter"><input type="checkbox" onclick="if(document.getElementById('kh-filter0').checked == true){ document.getElementById('kh-filter1').checked = true; document.getElementById('kh-filter2').checked = true; document.getElementById('kh-filter1').disabled = true; document.getElementById('kh-filter2').disabled = true;} else { document.getElementById('kh-filter1').disabled = false; document.getElementById('kh-filter2').disabled = false;}" id="kh-filter0" value="0">Tất cả</label>
						<label class="kh-filter"><input type="checkbox" id="kh-filter1" value="1">Tên</label>
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
					<button class="btn btn-success">Chọn</button>
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
			// var loaighe = ev.getAttribute('data-loaighe');
			// var sohang = ev.getAttribute('data-sohang');
			// var socot = ev.getAttribute('data-socot');
			// var sodoxe = ev.getAttribute('data-sodoxe');
			chuyenxe.innerHTML = "Chuyến Xe #"+ev.getAttribute('data-ma');
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
						str = "";
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
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null)
										{
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
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
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null)
										{
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
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
											str+="<td class='vecontrong' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 1)
										{
											str+="<td class='vedadat' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng != null)
										{
											str+="<td class='vedanggiu' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
										}
										else if(ve[demve].Trạng_thái == 2&&ve[demve].Mã_khách_hàng == null)
										{
											str+="<td class='vecontrong vedangchon' onclick='chonve(this)' data-mave='"+ve[demve].Mã+"' data-vitri='"+ve[demve].Vị_trí_ghế+"'>"+ve[demve].Vị_trí_ghế+"</td>";
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
			var loading = document.getElementsByClassName('kqtimkh')[0].getElementsByClassName('loading')[0];
			if(searchkh.value == '')
			{
				alert('Dữ liệu chưa nhập');
				searchkh.style.borderColor = 'red';
			}
			else
			{
				loading.classList.add('show');
			}
		};
		document.forms['timkhachhang'].onsubmit = function(ev){
			ev.preventDefault();
			document.getElementById('timkh').click();
		};
		$("#modaldatve").on("hidden.bs.modal", function(){ //Bắt sự kiện modal đặt vé tắt
			alert('catcha');
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
						idves: [ev.getAttribute("data-mave")]
					},
					success: function(data){
						if(data.kq == 1)
						{
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
						idve: ev.getAttribute("data-mave")
					},
					success: function(data){
						if(data.kq == 0)
						{
							ev.classList.remove("vedangchon");
						}
						else if(data.kq == 1)
						{
							document.forms["ttchuyenxe"]["vechon"].value+=(ev.getAttribute("data-vitri")+",");
						}
					},
					timeout: 10000,
					error: function(xhr){
					
					}
				});
			}
		}
    </script>
@endsection
