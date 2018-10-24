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
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/paramquery-3.3.4/pqgrid.min.js')}}"></script>
    <script src="{{asset('plugins/paramquery-3.3.4/jsZip-2.5.0/jszip.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style-qtv.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="login-form">
        <form>
            <fieldset>
                <legend>Đăng nhập Admin</legend>
                <label>Số điện thoại</label>
                <input type="tel" class="form-control" name="phone" placeholder="Số điện thoại">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                <input type="submit" class="form-control" value="Đăng Nhập">
            </fieldset>
        </form>
    </div>
</div>
<script>
    document.getElementsByClassName("container-fluid")[0].style.paddingTop=document.getElementsByClassName("header")[0].clientHeight+30+"px";
    document.getElementsByClassName("container-fluid")[0].style.paddingBottom= "15px";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script> -->
</body>
</html>
