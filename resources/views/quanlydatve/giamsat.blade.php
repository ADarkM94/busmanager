@extends('quanlydatve.main')
@section('content')
    <div class="content bando show">
        <span>Hiển thị bản đồ</span>
    </div>
@endsection
@section('excontent')
@endsection
@section('script')
    <script>
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
        option = document.getElementsByClassName("option");
        for (var i = 0; i < 2; i++) {
            option[i].classList.remove('selected');
        }
        option[0].classList.add('selected');
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78"></script>
@endsection
