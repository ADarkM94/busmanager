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
        <form class="col-lg-6" action="{{route('addbusstop')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($tttramdung)? 'Sửa Thông Tin Trạm Dừng':'Thêm Trạm Dừng';?></legend>
                @if(isset($tttramdung))
                    <?php
                    $tttramdung = (array)$tttramdung;
                    ?>
                    <input type="hidden" name="ID" value="{{$tttramdung['Mã'] or ''}}">
                @endif
                <input type="hidden" name="EmployeeID" value="1">
                <label>Tên trạm dừng</label>
                <input type="text" class="form-control" name="name" value="{{isset($tttramdung['Tên'])? $tttramdung['Tên']:''}}" placeholder="Tên trạm dừng">
                <br>
                <label>Tọa độ</label>
                <input type="text" class="form-control"  name="toado" value="{{isset($tttramdung['Tọa_độ'])? $tttramdung['Tọa_độ']:''}}" placeholder="Tọa độ" readonly>
                <br>
                <div style="text-align: center">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($tttramdung)? 'Sửa Thông Tin':'Thêm Trạm Dừng';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/tramdung')}}')" class="btn btn-danger" value="Hủy">
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
        option[7].classList.add('selected');
        option[7].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/customer-hover.png")}}');
    </script>
@endsection
