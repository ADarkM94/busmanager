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
                        <!--li>Chuyến xe # <i class="glyphicon glyphicon-ban-circle" style="color: gray;"></i></li>
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
                        <li>Chuyến xe # <i class="glyphicon glyphicon-ok-circle" style="color: green;"></i></li-->
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
					<div class="loading"></div>
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
                <div class="modal-body">
                    <form name="ttchuyenxe">
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
		document.forms['searchchuyenxe']['ngaydi'].min = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+(date.getDate()<10? ('0'+date.getDate()):date.getDate());
		document.forms['searchchuyenxe']['ngaydi'].defaultValue = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+(date.getDate()<10? ('0'+date.getDate()):date.getDate());
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
						url: '{{route("searchroute")}}',
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
			noidi.value = ev.getAttribute('data-noidi');
			noiden.value = ev.getAttribute('data-noiden');
			thoigiandi.value = ev.getAttribute('data-thoigiandi');
			thoigianden.value = ev.getAttribute('data-thoigianden');
			chuyenxe.innerHTML = "Chuyến Xe #"+ev.getAttribute('data-ma');
			$('#modaldatve').modal('show');
		}
    </script>
@endsection
