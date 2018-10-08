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
        <form class="col-lg-6" action="{{route('addbus')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($ttxe)? 'Sửa Thông Tin Xe':'Thêm Xe';?></legend>
                @isset($ttxe)
                    <?php
                    $ttxe = (array)$ttxe;
                    ?>
                    <input type="hidden" name="ID" value="{{$ttxe['Mã'] or ''}}">
                @endisset
                <label>Biển số</label>
                <input type="text" class="form-control" name="bienso" value="{{$ttxe['Biển_số'] or ''}}" placeholder="Biển số xe">
                <br>
                <label>Loại xe</label>
                <input type="text" list="bustype" class="form-control"  name="idtypebus" value="{{$ttxe['Mã_loại_xe'] or ''}}" placeholder="Mã loại xe">
                <br>
                <label>Lần bảo trì gần nhất</label>
                <br>
                <input type="date" class="form-control" name="baotrigannhat" value="{{$ttxe['Ngày_bảo_trì_gần_nhất'] or ''}}">
                <br>
                <label>Lần bảo trì tiếp theo</label>
                <br>
                <input type="date" class="form-control" name="baotritieptheo" value="{{$ttxe['Ngày_bảo_trì_tiếp_theo'] or ''}}">
                <br>
                <div style="text-align: center">
                    <input type="submit" class="btn btn-success" value="<?php echo isset($ttxe)? 'Sửa Thông Tin':'Thêm Xe';?>">
                    <input type="button" onclick="location.assign('{{url('/admin/xe')}}')" class="btn btn-danger" value="Hủy">
                </div>
            </fieldset>
        </form>
        <div class="col-lg-3"></div>
    </div>
@endsection
@section('excontent')
    <datalist id="bustype">
        @foreach($bustypes as $bustype)
            <?php $bustype = (array)$bustype;?>
            <option value="{{$bustype['Mã']}}">{{$bustype['Tên_Loại']}}</option>
        @endforeach
    </datalist>
@endsection
@section('script')
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[6].classList.add('selected');
        option[6].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/customer-hover.png")}}');
    </script>
@endsection