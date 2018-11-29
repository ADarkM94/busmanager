@extends('quantrivien.main')
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="content show row" id="addkhachhang">
        <div class="col-lg-3">
            @if(session('alert'))
                <div class="modal fade" id="alertmessage">
					<div class="modal-dialog" style="width: 400px; margin-top: 200px;">
						<div class="modal-content" style="text-align: center;">
							<div class="modal-header">
								<div class="modal-title">Thông báo</div>
							</div>
							<div class="modal-body alert alert-warning" style="text-align: center; margin-bottom: 0;">
								{{session('alert')}}
							</div>
							<div class="modal-footer" style="text-align: center;">
								<span class="btn btn-success" data-dismiss="modal">OK</span>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function(){
						$('#alertmessage').modal('show');
					});
				</script>
            @endif
        </div>
        <form name="ttkhachhang" class="col-lg-6" action="{{route('addcustomer')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttkhachhang)? 'Sửa Thông Tin Người Dùng':'Thêm Người Dùng';?></legend>
                @isset($ttkhachhang)
                    <?php
                    $ttkhachhang = (array)$ttkhachhang;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttkhachhang['Mã']}}">
                @endisset
				<div class="form-group col-lg-6">
					<label>Tên<i class="text text-danger">*</i></label>
					<input type="text" class="form-control" name="name" value="{{isset($ttkhachhang['Tên'])? $ttkhachhang['Tên']:''}}" placeholder="Tên đầy đủ" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Ngày sinh<i class="text text-danger">*</i></label>
					<input type="date" class="form-control"  name="brtday" value="{{isset($ttkhachhang['Ngày_sinh'])? $ttkhachhang['Ngày_sinh']:''}}" placeholder="Ngày sinh" required>
                </div>
				<div class="form-group col-lg-12">
					<label>Giới tính<i class="text text-danger">*</i></label>
					<br>
					<input type="radio" class="form-inline" name="gender" value="0" <?php if(!isset($ttkhachhang)||$ttkhachhang['Giới tính']=='0') echo "checked";?>> Không xác định
					<input type="radio" class="form-inline" name="gender" value="1" <?php if(isset($ttkhachhang)&&$ttkhachhang['Giới tính']=='1') echo "checked";?>> Nam
					<input type="radio" class="form-inline" name="gender" value="2" <?php if(isset($ttkhachhang)&&$ttkhachhang['Giới tính']=='2') echo "checked";?>> Nữ
                </div>
				<div class="form-group col-lg-6">
					<label>Email</label>
					<input type="email" class="form-control"  name="email" value="{{isset($ttkhachhang['Email'])? $ttkhachhang['Email']:''}}" placeholder="Địa chỉ Email">
                </div>
				<div class="form-group col-lg-6">
					<label>Số điện thoại<i class="text text-danger">*</i></label>
					<input type="tel" class="form-control"  name="phone" value="{{isset($ttkhachhang['Sđt'])? $ttkhachhang['Sđt']:''}}" placeholder="Số điện thoại" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Password<i class="text text-danger">*</i></label>
					<input type="password" class="form-control"  name="password" value="{{isset($ttkhachhang['Password'])? $ttkhachhang['Password']:''}}" <?php echo isset($ttkhachhang)? "disabled":"";?> placeholder="Mật khẩu" required>
                </div>
				<div class="form-group col-lg-12">
					<label>Địa chỉ</label>
					<input type="text" class="form-control"  name="address" value="{{isset($ttkhachhang['Địa chỉ'])? $ttkhachhang['Địa chỉ']:''}}" placeholder="Địa chỉ">
                </div>
                <div style="text-align: center; clear: both;">
                    <input type="submit" name="submit" class="btn btn-success" value="<?php echo isset($ttkhachhang)? 'Sửa Thông Tin':'Thêm Người Dùng';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/khachhang')}}')" class="btn btn-danger" value="Hủy">
                </div>
            </fieldset>
        </form>
        <div class="col-lg-3"></div>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[1].classList.add('selected');
        option[1].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/customer-hover.png")}}');
        document.forms["ttkhachhang"]["submit"].onclick = function (ev) {
            ev.preventDefault();
            var name = document.forms["ttkhachhang"]["name"];
			var brtday = document.forms["ttkhachhang"]["brtday"];
			var gender = document.forms["ttkhachhang"]["gender"];
            var email = document.forms["ttkhachhang"]["email"];
            var phone = document.forms["ttkhachhang"]["phone"];
            var password = document.forms["ttkhachhang"]["password"];
            var address = document.forms["ttkhachhang"]["address"];
			name.style.borderColor = "#ccc";
			password.style.borderColor = "#ccc";
			email.style.borderColor = "#ccc";
			phone.style.borderColor = "#ccc";
			if(name.value == "")
			{
				name.style.borderColor = "red";
			}
			else if(name.value != "")
			{
				
			}
			if(password.value == "")
			{
				password.style.borderColor = "red";
			}
			else if(password.value != "")
			{
				
			}
			if(email.value != "")
			{
				
			}
			if(phone.value == "")
			{
				phone.style.borderColor = "red";
			}
			else if(phone.value != "")
			{
				
			}
        };
    </script>
@endsection