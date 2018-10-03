@extends('quanlydatve.main')
@section('content')
    <div class="content bando show">
        <span onclick="showMap()">Hiển thị bản đồ</span>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
        function showMap(){
            var mapOptions = {
                center: new google.maps.LatLng(51.2, 46),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.HYBRID
            };
            var map = new google.maps.Map(document.getElementsByClassName("bando")[0],mapOptions);
        }
        option = document.getElementsByClassName("option");
        for (var i = 0; i < 2; i++) {
            option[i].classList.remove('selected');
        }
        option[0].classList.add('selected');
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78&callback=showMap"></script>
@endsection
