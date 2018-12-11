@extends('quanlydatve.main')
@section('content')
	<div class="sidebar col-lg-2">
        <span>Chuyến xe</span>
        <div class="chuyenxe">
            <ul>
            </ul>
        </div>
    </div>
    <div class="col-lg-10">
        <span>
            <ul>
                <a href="{{asset('qldv/giamsat')}}">
                    <li class="option selected">Bản đồ</li>
                </a>
				<a href="{{asset('qldv/datve')}}">
                    <li class="option">Nhập vé</li>
                </a>
            </ul>
        </span>
        <div class="content bando show">
			<span>Hiển thị bản đồ</span>
		</div>
    </div>
    
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
		option = document.getElementsByClassName("option");
        for (var i = 0; i < 2; i++) {
            option[i].classList.remove('selected');
        }
        option[0].classList.add('selected');
		function showMap1(locations)
		{
			// var locations = [
				// ['Bondi Beach', -33.890542, 151.274856, 4],
				// ['Coogee Beach', -33.923036, 151.259052, 5],
				// ['Cronulla Beach', -34.028249, 151.157507, 3],
				// ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
				// ['Maroubra Beach', -33.950198, 151.259302, 1]
			// ];
			var locations = locations;
			var center = [];
			
			for (i = 0; i < locations.length; i++) {  
				if(locations[i][3] == '{{session("qldv.idgiamsat")}}')
				{
					center = locations[i];
					break;
				}
			}
			
			var map = new google.maps.Map(document.getElementsByClassName('bando')[0], {
				zoom: 15,
				center: new google.maps.LatLng(center[1], center[2]),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var infowindow = new google.maps.InfoWindow();
			
			var marker, i;

			for (i = 0; i < locations.length; i++) {  
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
			infowindow.setContent(center[0]);
			infowindow.open(map, marker);
		}
        // function showMap(){
            // var mapOptions = {
                // center: new google.maps.LatLng(51.2, 46),
                // zoom: 10,
                // mapTypeId: google.maps.MapTypeId.HYBRID
            // };
            // var map = new google.maps.Map(document.getElementsByClassName("bando")[0],mapOptions);
        // }
		var locations = [];
		if(window.EventSource !== undefined){
			// supports eventsource object go a head...
			var es = new EventSource("{{route('qldv_sendgps')}}");
			es.addEventListener("message", function(e) {
				var arr = JSON.parse(e.data);
				var str = "";
				for(var i=0;i<arr.length;i++)
				{
					var locate = arr[i].location.split(",");
					var location = ["Chuyến xe "+arr[i].Mã,locate[0],locate[1],arr[i].Mã];
					locations.push(location);
				}
				for(var i=0;i<arr.length;i++)
				{
					if(arr[i].Mã == '{{session("qldv.idgiamsat")? session("qldv.idgiamsat"):"undefined"}}')
					{
						str += "<li style='background: red;' onclick='location.href = \"{{asset("qldv/giamsat")}}/"+arr[i].Mã+"\"' data-location='"+arr[i].location+"' data-id='"+arr[i].Mã+"'>Chuyến xe #"+arr[i].Mã+" <i class='glyphicon glyphicon-record' style='color: green;'></i></li>";
					}
					else
					{
						str += "<li onclick='location.href = \"{{asset("qldv/giamsat")}}/"+arr[i].Mã+"\"' data-location='"+arr[i].location+"' data-id='"+arr[i].Mã+"'>Chuyến xe #"+arr[i].Mã+" <i class='glyphicon glyphicon-record' style='color: green;'></i></li>";
					}
				}
				if(document.getElementsByClassName("bando").length != 0)
				{
					showMap1(locations);
				}			
				document.getElementsByClassName("chuyenxe")[0].getElementsByTagName("ul")[0].innerHTML = str;
			}, false);
		} else {
			// EventSource not supported, 
			// apply ajax long poll fallback
		}
		window.onclick = function(ev){
			var chuyenxe = document.getElementsByClassName("chuyenxe")[0].getElementsByTagName("li");
			for(var i=0;i<chuyenxe.length;i++)
			{
				if(ev.target != chuyenxe[i])
				{
					chuyenxe[i].style.backgroundColor = "#004964";
				}
			}
		};
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78"></script>
@endsection
