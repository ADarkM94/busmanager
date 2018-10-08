@extends('quantrivien.main')
@section('content')
    <style>
        .row > *:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="content show row">
        <div class="col-lg-3">
            @if(session('alert'))
                {!! session('alert') !!}
            @endif
        </div>
        <form class="col-lg-6" action="{{route('addemployee')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttnhanvien)? 'Sửa Thông Tin Nhân Viên':'Thêm Nhân Viên';?></legend>
                @isset($ttnhanvien)
                    <?php
                    $ttnhanvien = (array)$ttnhanvien;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttnhanvien['Mã'] or ''}}">
                @endisset
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="{{isset($ttnhanvien['Họ_Tên'])? $ttnhanvien['Họ_Tên']:''}}" placeholder="Tên đầy đủ">
                <br>
                <label>Ngày sinh</label>
                <input type="date" class="form-control"  name="brtday" value="{{isset($ttnhanvien['Ngày_sinh'])? $ttnhanvien['Ngày_sinh']:''}}" placeholder="Ngày sinh">
                <br>
                <label>Giới tính</label>
                <br>
                <input type="radio" class="form-inline" name="gender" value="0" <?php if(!isset($ttnhanvien)||$ttnhanvien['Giới_tính']=='0') echo "checked";?>> Không xác định
                <input type="radio" class="form-inline" name="gender" value="1" <?php if(isset($ttnhanvien)&&$ttnhanvien['Giới_tính']=='1') echo "checked";?>> Nam
                <input type="radio" class="form-inline" name="gender" value="2" <?php if(isset($ttnhanvien)&&$ttnhanvien['Giới_tính']=='2') echo "checked";?>> Nữ
                <br>
                <label>Địa chỉ</label>
                <input type="text" class="form-control"  name="address" value="{{isset($ttnhanvien['Địa_chỉ'])? $ttnhanvien['Địa_chỉ']:''}}" placeholder="Địa chỉ">
                <br>
                <label>Nickname</label>
                <input type="text" class="form-control"  name="username" value="{{isset($ttnhanvien['Username'])? $ttnhanvien['Username']:''}}" placeholder="Bí danh">
                <br>
                <label>Password<i class="text text-danger">*</i></label>
                <input type="password" class="form-control"  name="password" value="{{isset($ttnhanvien['Password'])? $ttnhanvien['Password']:''}}" <?php echo isset($ttnhanvien)? "disabled":"";?> placeholder="Mật khẩu" required>
                <br>
                <label>Email<i class="text text-danger">*</i></label>
                <input type="email" class="form-control"  name="email" value="{{isset($ttnhanvien['Email'])? $ttnhanvien['Email']:''}}" placeholder="Địa chỉ Email" required>
                <br>
                <label>Số điện thoại<i class="text text-danger">*</i></label>
                <input type="tel" class="form-control"  name="phone" value="{{isset($ttnhanvien['Sđt'])? $ttnhanvien['Sđt']:''}}" placeholder="Số điện thoại" required>
                <br>
                <label>Loại Nhân viên</label>
                <select class="form-inline" name="typenv">
                    <option value="QTV" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='QTV') echo "selected";?>>Quản trị viên</option>
                    <option value="QLDV" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='QLDV') echo "selected";?>>Quản lý đặt vé</option>
                    <option value="TX" <?php if(isset($ttnhanvien)&&$ttnhanvien['Loại_NV']=='TX') echo "selected";?>>Tài xế</option>
                </select>
                <br>
                <label>Bằng lái</label>
                <input type="text" class="form-control" name="banglai" value="{{isset($ttnhanvien['Bằng_lái'])? $ttnhanvien['Bằng_lái']:''}}" placeholder="Số bằng lái">
                <br>
                <label>Chi nhánh</label>
                <input type="text" class="form-control" name="chinhanh" value="{{isset($ttnhanvien['Chi_nhánh'])? $ttnhanvien['Chi_nhánh']:''}}" placeholder="Chinh nhánh">
                <br>
                <label>Ngày bắt đầu làm việc</label>
                <input type="date" class="form-control" name="datestart" value="{{isset($ttnhanvien['Date_Starting'])? $ttnhanvien['Date_Starting']:''}}">
                <br>
                <div style="text-align: center">
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
        option[5].classList.add('selected');
        option[5].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/partnership-hover.png")}}');
    </script>
@endsection
