<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-lienhe.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</head>
<body>
<div class="header">
    <img src="{{asset('images/logo.png')}}" height="40">
    @if(Session::has('makh'))
        <ul>
            <li><a  href="{{route('logout')}}" style="line-height: 40px;color: #FFF;">( Đăng xuất )</a></li>
            <li style="color: #FFF;line-height: 40px;"><i class="fa fa-address-book-o" style="font-size:20px; margin-right: 3px;"></i>  <a style="color: #CCC;">{{Session::get('sdt')}}</a></li>
        </ul>
    @else
        <ul>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">Đăng ký</button></li>
            <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">Đăng nhập</button></li>
        </ul>
    
    @endif
</div>
<div class="menu">
    <ul>
        <li><a href="{{asset('/')}}"><i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                <span>TRANG CHỦ</span>
            </a>
        </li>
        <li>
            <a href="{{asset('/datve')}}">
                <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                <span>ĐẶT VÉ</span>
            </a>
        </li>
        <li>
            <a href="{{asset('/tintuc')}}">
                <i class="glyphicon glyphicon-text-size" aria-hidden="true"></i>
                <span>TIN TỨC</span>
            </a>
        </li>
        <li>
            <a href="{{asset('/gioithieu')}}">
                <i class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></i>
                <span>GIỚI THIỆU</span>
            </a>
        </li>
        <li>
            <a href="{{asset('/lienhe')}}">
                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                <span>LIÊN HỆ</span>
            </a>
        </li>
    </ul>
</div>
<div style="clear: both;"></div>
@yield('content')
<div style="clear: both;"></div>
<main class="main">
    <div class="footer">
        <ul>
            <li>
                <h3>Liên Hệ</h3>
                <i class="fa fa-home" aria-hidden="true"></i>
                <i>Đại Học Bách Khoa HCM</i><br>
                <i class="fa fa-phone" aria-hidden="true"></i>
                <i>0989671651</i><br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <i>nhan51202526@gmail.com</i>
            </li>
            <li>
                <h4> &copy; Bảng Quyền Thuộc Về Đại Học Bách Khoa HCM </h4>
                <h4>Tất cả vì khách hàng - Thiết Kế bới Nhóm 30</h4>
            </li>
        </ul>
    </div>
</main>
@section('script')
    <script type="text/javascript" src="js/js.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dangky").click(function(){
                var sdt=$(".dienthoai").val();
                var bieuthuc = /^(0[3578]|09)[0-9]{8}$/;
                var truyen = true;
                /*dien thoai*/
                if(sdt!=""){
                   if(sdt.search(bieuthuc)==-1){
                     $(".loi").html("<div class='alert alert-danger'><strong>Số điện thoại bạn nhập không hợp lệ !</strong></div>");
                     truyen = false;
                   }
                   else{
                    $(".loi").html("");
                   }
                }
                else{
                    $(".loi").html("<div class='alert alert-danger'><strong>Số điện thoại không được để trống !</strong></div>");
                    truyen = false;
                }
                /*mat khau */
                var mk = $(".matkhau").val();
                var rmk = $(".rematkhau").val();
                var xemmk =true;
                if(mk==""){
                    $(".loi2").html("<div class='alert alert-danger'><strong>Mật khẩu không được để trống !</strong></div>");
                    truyen = false;
                    xemk = false;
                }
                else if(mk.length> 30 || mk.length <6){
                    $(".loi2").html("<div class='alert alert-danger'><strong>Độ dài mật khẩu ít nhất 6 ký tự và  không quá 30 ký tự !</strong></div>");
                    truyen = false;
                    xemmk = false;
                }
                else{
                    $(".loi2").html("");
                }
                /*rematkhau*/
                if(rmk==""){
                    $(".loi3").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu không được để trống !</strong></div>");
                    truyen = false;
                     xemmk = false;
                }
                else if(rmk.length > 30 || rmk.length < 6){
                    $(".loi3").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu có độ dài không đúng!</strong></div>");
                    truyen = false;
                     xemmk = false;
                }
                else{
                    $(".loi3").html("");
                }
                if(xemmk==true && mk!=rmk){
                         $(".loi4").html("<div class='alert alert-danger'><strong>Nhập lại mật khẩu không giống mật khẩu!</strong></div>");
                            truyen = false;
                }
                else{
                    $(".loi4").html("");
                }
                if(truyen == true){
                     $.ajax({
                        url: '{{route("dangky")}}',
                        type: 'POST',
                        data: {
                        _token: '{{csrf_token()}}',
                        SDT: sdt,
                        MK: mk
                        },
                    success: function (data) {
                       if(data.kq==0){
                        $(".loi5").html("<div class='alert alert-danger'><strong>Xin lổi - Số điện thoại này đã đăng ký tài khoản trước đó !</strong></div>");
                       }
                       else if(data.kq==1){
                        $(".dangkytc").html("<div class='alert alert-success'><strong>Bạn đã đăng ký thành công, bấm <a href='javascript:void(0);' data-toggle='modal' data-target='#login' data-dismiss='modal' class='btn btn-link'>Đăng nhập</a> để tiếp tục</trong></div>");
                       }
                       
                     }
                    });
                }
            });
            $(".dongdangky").click(function(){
                $(".").html("");
                $(".loi2").html("");
                $(".loi3").html("");
                $(".loi4").html("");
                $(".loi5").html("");
                $(".dangkytc").html("");
            });
            $(".dangnhap").click(function(){
                var dndt = $(".dndienthoai").val();
                var dnmk = $(".dnmatkhau").val();
                var bieuthuc = /^(0[3578]|09)[0-9]{8}$/;
                var dntruyen = true;
                /*dienthoai*/
                if(dndt!=""){
                    if(dndt.search(bieuthuc)==-1){
                         $(".dnloi").html("<div class='alert alert-danger'><strong>Số điện thoại bạn nhập không hợp lệ !</trong></div>");
                         dntruyen = false;
                        }
                    else{
                        $(".dnloi").html("");
                    }
                }
                else{
                    $(".dnloi").html("<div class='alert alert-danger'><strong>Số điện thoại không được để trống !</strong></div>");
                    dntruyen = false;
                }
                /*matkhau*/
                if(dnmk==""){
                    $(".dnloi2").html("<div class='alert alert-danger'><strong>Mật khẩu không được để trống !</strong></div>");
                    dntruyen = false;
                }
                else if(dnmk.length> 30 || dnmk.length <6){
                    $(".dnloi2").html("<div class='alert alert-danger'><strong>Độ dài mật khẩu ít nhất 6 ký tự và  không quá 30 ký tự !</strong></div>");
                    dntruyen = false;
                }
                else{
                    $(".dnloi2").html("");
                }
                if(dntruyen==true){
                      $.ajax({
                        url: '{{route("dangnhap")}}',
                        type: 'POST',
                        data: {
                        _token: '{{csrf_token()}}',
                        DNDT: dndt,
                        DNMK: dnmk
                        },
                    success: function (data) {
                       if(data.kq == 0){
                        $(".dnloi3").html("<div class='alert alert-danger'><strong>Số điện thoại hoặc mật khẩu không đúng !</strong></div");
                       }
                       else{
                        var sdt = data.sdt;
                        $("#login").modal("hide");
                        $(".header").html("<img src='{{asset("images/logo.png")}}' height='40'><ul><li><a  href='{{route("logout")}}' style='line-height: 40px;color: #FFF;'>( Đăng xuất )</a></li><li style='color: #FFF;line-height: 40px;'><i class='fa fa-address-book-o' style='font-size:20px; margin-right: 3px;'></i>  <a style='color: #CCC;'>"+sdt+"</a></li></ul>");
                       }
                       
                     }
                    });   
                }
            });
             $(".dongdangnhap").click(function(){
                $(".dnloi").html("");
                $(".dnloi2").html("");
                $("dnloi3").html("");
            });
        });
    </script>
@endsection
@extends('tttn-web.login')
@extends('tttn-web.register')
@yield('script')
</body>

