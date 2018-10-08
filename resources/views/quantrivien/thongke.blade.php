@extends('quantrivien.main')
@section('content')
    <div class="content thongke show">
        <div>
            <div class="col-lg-4">
                <div class="the">
                    <a href="">
                        <div>
                            <div class="glyphicon glyphicon-user"></div>
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <div>
                            <p>Khách hàng</p>
                            <p>Đã đăng ký: <i>1000</i></p>
                            <p>Đang online: <i>100</i></p>
                            <p>Lượng truy cập: <i>100</i></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="the">
                    <a href="">
                        <div>
                            <div class="glyphicon glyphicon-calendar"></div>
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <div>
                            <p>Lịch trình</p>
                            <p>Só chuyến xe: <i>1000</i></p>
                            <p>Đã đi: <i>100</i></p>
                            <p>Đang chờ: <i>100</i></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="the">
                    <a href="">
                        <div>
                            <div class="glyphicon glyphicon-credit-card"></div>
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <div>
                            <p>Doang thu</p>
                            <p>Theo tháng: <i>1000</i></p>
                            <p>Theo quý: <i>100</i></p>
                            <p>Theo năm: <i>100</i></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="col-lg-6">
                <canvas id="bieudo1"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="bieudo2"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
        document.getElementById("bieudo1").width=document.getElementById("bieudo1").parentNode.clientWidth - 15;
        document.getElementById("bieudo1").height=document.getElementById("bieudo1").parentNode.clientHeight - 15;
        document.getElementById("bieudo2").width=document.getElementById("bieudo2").parentNode.clientWidth - 15;
        document.getElementById("bieudo2").height=document.getElementById("bieudo2").parentNode.clientHeight - 15;
        // function showMap(){
        // 	var mapOptions = {
        // 		center: new google.maps.LatLng(51.2, 46),
        // 		zoom: 10,
        // 		mapTypeId: google.maps.MapTypeId.HYBRID
        // 	};
        // 	var map = new google.maps.Map(document.getElementsByClassName("bando")[0],mapOptions);
        // }
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[0].classList.add('selected');
        option[0].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/report-hover.png")}}');
        var buyerData = {
            labels : ["January","February","March","April","May","June"],
            datasets : [
                {
                    fillColor : "rgba(172,194,132,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [203,156,99,251,305,247]
                }
            ]
        }
        var bieudo1 = document.getElementById('bieudo1').getContext('2d');
        var bieudo2 = document.getElementById('bieudo2').getContext('2d');
        new Chart(bieudo1).Line(buyerData);
        new Chart(bieudo2).Bar(buyerData);
    </script>
@endsection
