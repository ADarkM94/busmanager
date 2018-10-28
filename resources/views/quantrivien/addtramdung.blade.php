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
        <form name="tramdung" class="col-lg-6" action="{{route('addbusstop')}}" method="post">
            @csrf
            <fieldset>
                <legend><?php echo isset($tttramdung)? 'Sửa Thông Tin Trạm Dừng':'Thêm Trạm Dừng';?></legend>
                @if(isset($tttramdung))
                    <?php
                    $tttramdung = (array)$tttramdung;
                    ?>
                    <input type="hidden" name="ID" value="{{$tttramdung['Mã']}}">
                @endif
                <input type="hidden" name="employeeID" value="1">
                <label>Tên trạm dừng</label>
                <input type="text" class="form-control" name="name" value="{{isset($tttramdung['Tên'])? $tttramdung['Tên']:''}}" placeholder="Tên trạm dừng">
                <br>
                <label>Tọa độ</label>
                <input type="text" class="form-control"  name="toado" value="{{isset($tttramdung['Tọa_độ'])? $tttramdung['Tọa_độ']:''}}" placeholder="Tọa độ" readonly>
                <br>
                <div id="viewmap" style="width: 100%; height: 500px;"></div>
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
        option[8].classList.add('selected');
        option[8].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/parking-hover.png")}}');
        function openmap(){
            var toado = document.forms["tramdung"]["toado"].value;
            var x,y;
            if(toado!=""){
                var arr = toado.split(",");
                x = arr[0];
                y = arr[1];
            }
            else{
                x = 10.865720;
                y = 106.759710;
            }
            var mapOptions = {
                center: new google.maps.LatLng(x, y),
                zoom: 16,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(x, y)
            });
            var map = new google.maps.Map(document.getElementById("viewmap"),mapOptions);
            marker.setMap(map);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
            function placeMarker(location) {
                marker['position'] = location;
                marker.setMap(map);
                document.forms["tramdung"]["toado"].value = location.lat()+","+location.lng();
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=openmap"></script>
@endsection
