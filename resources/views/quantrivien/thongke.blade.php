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
        };
        var bieudo1 = document.getElementById('bieudo1').getContext('2d');
        var bieudo2 = document.getElementById('bieudo2').getContext('2d');
        new Chart(bieudo1).Line(buyerData);
        new Chart(bieudo2).Bar(buyerData);
        /*var lineChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                borderColor: 'red',
                backgroundColor: 'red',
                fill: false,
                data: [
                   10,20,15,50,20,30,26
                ],
                yAxisID: 'y-axis-1',
            }, {
                label: 'My Second dataset',
                borderColor: 'blue',
                backgroundColor: 'blue',
                fill: false,
                data: [
                    5,30,21,56,20,10,5
                ],
                yAxisID: 'y-axis-2'
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById('bieudo2').getContext('2d');
            window.myLine = Chart.Line(ctx, {
                data: lineChartData,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart - Multi Axis'
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',

                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],
                    }
                }
            });
        };*/
    </script>
@endsection
