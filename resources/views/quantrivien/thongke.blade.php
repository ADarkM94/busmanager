@extends('quantrivien.main')
@section('title')
	Quản lý Thống kê
@endsection
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
                <canvas id="bieudo1" style="width: 100%; height: 100%;"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="bieudo2" style="width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    {{--<script async="" src="http://www.google-analytics.com/analytics.js"></script>
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>
    <script src="{{asset('plugins/chartjs/utils.js')}}"></script>--}}
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
		var bieudo1 = document.getElementById('bieudo1');
		var bieudo2 = document.getElementById('bieudo2');
		var myChart1 = new Chart(bieudo1, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(255, 99, 132, 1)',
            pointBackgroundColor: [
                'rgba(0,73,100,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
			pointBorderColor: [
                'rgba(0,73,100,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
			borderColor: '#FFA000'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
var myChart2 = new Chart(bieudo2, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    </script>
@endsection
