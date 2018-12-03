@extends('quantrivien.main')
@section('title')
	@if(isset($ttnhanvien))
		Chỉnh sửa thông tin nhân viên
	@else
		Thêm nhân viên
	@endif
@endsection
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
		.header .row > *:nth-child(2) {
            text-align: center;
        }
    </style>
    <div class="content show row" id="addnhanvien">
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
        <form class="col-lg-6" name="ttnhanvien" action="{{route('addemployee')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttnhanvien)? 'Sửa Thông Tin Nhân Viên':'Thêm Nhân Viên';?></legend>
                @isset($ttnhanvien)
                    <?php
                    $ttnhanvien = (array)$ttnhanvien;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttnhanvien['Mã']}}">
                @endisset
				<div class="form-group col-lg-6">
					<label>Tên<i class="text text-danger">*</i></label>
					<input type="text" class="form-control" name="name" value="{{isset($ttnhanvien['Họ_Tên'])? $ttnhanvien['Họ_Tên']:''}}" placeholder="Tên đầy đủ" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Ngày sinh<i class="text text-danger">*</i></label>
					<input type="date" class="form-control"  name="brtday" value="{{isset($ttnhanvien['Ngày_sinh'])? $ttnhanvien['Ngày_sinh']:''}}" placeholder="Ngày sinh" required>
                </div>
				<div class="form-group col-lg-12">
					<label>Giới tính<i class="text text-danger">*</i></label>
					<br>
					<input type="radio" class="form-inline" name="gender" value="0" <?php if(!isset($ttnhanvien)||$ttnhanvien['Giới_tính']=='0') echo "checked";?>> Không xác định
					<input type="radio" class="form-inline" name="gender" value="1" <?php if(isset($ttnhanvien)&&$ttnhanvien['Giới_tính']=='1') echo "checked";?>> Nam
					<input type="radio" class="form-inline" name="gender" value="2" <?php if(isset($ttnhanvien)&&$ttnhanvien['Giới_tính']=='2') echo "checked";?>> Nữ
                </div>
				<div class="form-group col-lg-6">
					<label>Username<i class="text text-danger">*</i></label>
					<input type="text" class="form-control"  name="username" value="{{isset($ttnhanvien['Username'])? $ttnhanvien['Username']:''}}" placeholder="Tên đăng nhập" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Password<i class="text text-danger">*</i></label>
					<input type="password" class="form-control"  name="password" value="{{isset($ttnhanvien['Password'])? $ttnhanvien['Password']:''}}" <?php echo isset($ttnhanvien)? "disabled":"";?> placeholder="Mật khẩu" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Email<i class="text text-danger">*</i></label>
					<input type="email" class="form-control"  name="email" value="{{isset($ttnhanvien['Email'])? $ttnhanvien['Email']:''}}" placeholder="Địa chỉ Email" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Số điện thoại<i class="text text-danger">*</i></label>
					<input type="tel" class="form-control"  name="phone" value="{{isset($ttnhanvien['Sđt'])? $ttnhanvien['Sđt']:''}}" placeholder="Số điện thoại" required>
                </div>
				<div class="form-group col-lg-12">
					<label>Địa chỉ<i class="text text-danger">*</i></label>
					<input type="text" class="form-control"  name="address" value="{{isset($ttnhanvien['Địa_chỉ'])? $ttnhanvien['Địa_chỉ']:''}}" placeholder="Địa chỉ" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Loại Nhân viên<i class="text text-danger">*</i></label>
					<select class="form-control" name="typenv" required>
						<option value="QTV" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='QTV') echo "selected";?>>Quản trị viên</option>
						<option value="QLDV" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='QLDV') echo "selected";?>>Quản lý đặt vé</option>
						<option value="TX" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='TX') echo "selected";?>>Tài xế</option>
					</select>
                </div>
				<div class="form-group col-lg-6">
					<label>Bằng lái</label>
					<input type="text" class="form-control" name="banglai" value="{{isset($ttnhanvien['Bằng_lái'])? $ttnhanvien['Bằng_lái']:''}}" placeholder="Số bằng lái">
                </div>
				<div class="form-group col-lg-6">
					<label>Ngày bắt đầu làm việc<i class="text text-danger">*</i></label>
					<input type="date" class="form-control" name="datestart" value="{{isset($ttnhanvien['Date_Starting'])? $ttnhanvien['Date_Starting']:''}}" required>
                </div>
				<div class="form-group col-lg-6">
					<label>Chi nhánh<i class="text text-danger">*</i></label>
					<input type="text" class="form-control" name="chinhanh" value="{{isset($ttnhanvien['Chi_nhánh'])? $ttnhanvien['Chi_nhánh']:''}}" placeholder="Chinh nhánh" required>
                </div>
                <div style="text-align: center; clear: both;">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttnhanvien)? 'Sửa Thông Tin':'Thêm Nhân Viên';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/nhanvien')}}')" class="btn btn-danger" value="Hủy">
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
        option[6].classList.add('selected');
        option[6].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/partnership-hover.png")}}');
    </script>
@endsection
