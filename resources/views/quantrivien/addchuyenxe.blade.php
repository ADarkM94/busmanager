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
        <form class="col-lg-6" action="{{route('addcustomer')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?></legend>
                <input type="hidden" name="employeeID" value="1">
                @isset($ttchuyenxe)
                    <?php
                    $ttchuyenxe = (array)$ttchuyenxe;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttchuyenxe['Mã']}}">
                @endisset
                <label>Lộ trình</label>
                <input type="hidden" name="idlotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Mã_lộ_trình']:''}}">
                <input type="date" list="lotrinh" class="form-control"  name="lotrinh" value="{{isset($ttchuyenxe['Nơi_đi'])? $ttchuyenxe['Nơi_đi'].'-'.$ttchuyenxe['Nơi_đến']:''}}" placeholder="Ngày sinh">
                <br>
                <label>Tài xế</label>
                <input type="hidden" name="idtaixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Mã_tài_xế']:''}}">
                <input type="text" list="taixe" class="form-control" name="taixe" value="{{isset($ttchuyenxe['Tài_xế'])? $ttchuyenxe['Tài_xế']:''}}" placeholder="Tài xế">
                <br>
                <label>Xe</label>
                <input type="hidden" name="idxe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Mã_xe']:''}}">
                <input type="text" list="taixe" class="form-control" name="xe" value="{{isset($ttchuyenxe['Biển_số'])? $ttchuyenxe['Biển_số']:''}}" placeholder="Chọn xe">
                <br>
                <label>Thời gian khởi hành</label>
                <input type="datetime-local" class="form-control"  name="starttime" value="{{isset($ttchuyenxe['Thời_gian_xuất_phát'])? $ttchuyenxe['Thời_gian_xuất_phát']:''}}">
                <br>
                <div id="ticket"></div>
                <div style="text-align: center">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttchuyenxe)? 'Sửa Thông Tin Chuyến Xe':'Thêm Chuyến Xe';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/chuyenxe')}}')" class="btn btn-danger" value="Hủy">
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
        option[2].classList.add('selected');
        option[2].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/chuyenxe-hover.png")}}');
    </script>
@endsection
