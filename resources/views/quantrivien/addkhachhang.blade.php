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
                <label>Tên</label>
                <input type="text" class="form-control" name="name" value="{{isset($ttkhachhang['Tên'])? $ttkhachhang['Tên']:''}}" placeholder="Tên đầy đủ">
                <br>
                <label>Ngày sinh</label>
                <input type="date" class="form-control"  name="brtday" value="{{isset($ttkhachhang['Ngày_sinh'])? $ttkhachhang['Ngày_sinh']:''}}" placeholder="Ngày sinh">
                <br>
                <label>Giới tính</label>
                <br>
                <input type="radio" class="form-inline" name="gender" value="0" <?php if(!isset($ttkhachhang)||$ttkhachhang['Giới tính']=='0') echo "checked";?>> Không xác định
                <input type="radio" class="form-inline" name="gender" value="1" <?php if(isset($ttkhachhang)&&$ttkhachhang['Giới tính']=='1') echo "checked";?>> Nam
                <input type="radio" class="form-inline" name="gender" value="2" <?php if(isset($ttkhachhang)&&$ttkhachhang['Giới tính']=='2') echo "checked";?>> Nữ
                <br>
                <label>Địa chỉ</label>
                <input type="text" class="form-control"  name="address" value="{{isset($ttkhachhang['Địa chỉ'])? $ttkhachhang['Địa chỉ']:''}}" placeholder="Địa chỉ">
                <br>
                <label>Nickname</label>
                <input type="text" class="form-control"  name="nickname" value="{{isset($ttkhachhang['Nickname'])? $ttkhachhang['Nickname']:''}}" placeholder="Bí danh">
                <br>
                <label>Password<i class="text text-danger">*</i></label>
                <input type="password" class="form-control"  name="password" value="{{isset($ttkhachhang['Password'])? $ttkhachhang['Password']:''}}" <?php echo isset($ttkhachhang)? "disabled":"";?> placeholder="Mật khẩu" required>
                <br>
                <label>Email<i class="text text-danger">*</i></label>
                <input type="email" class="form-control"  name="email" value="{{isset($ttkhachhang['Email'])? $ttkhachhang['Email']:''}}" placeholder="Địa chỉ Email" required>
                <br>
                <label>Số điện thoại<i class="text text-danger">*</i></label>
                <input type="tel" class="form-control"  name="phone" value="{{isset($ttkhachhang['Sđt'])? $ttkhachhang['Sđt']:''}}" placeholder="Số điện thoại" required>
                <br>
                <div style="text-align: center">
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
            var name = document.forms["ttkhachhang"]["name"].value;
            var password = document.forms["ttkhachhang"]["password"].value;
            var email = document.forms["ttkhachhang"]["email"].value;
        };
    </script>
