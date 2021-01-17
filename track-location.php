<!DOCTYPE html>
<html>
<head>
    <title>Teknowebapp - Maps Get Coordinate</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style>
		body {
			padding-top: 50px;
		}

        #directions-panel {
			height: 500px;
			float: right;
			width: 400px;
			overflow: auto;
		}

		#control {
			background: #fff;
			padding: 5px;
			font-size: 14px;
			font-family: Arial;
			border: 1px solid #ccc;
			box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
			display: none;
		}


		#map-canvas {
			height: 500px;
			margin: 0;
			width: 800px;

		}

		#map-canvas img {
			max-width: none;
		}

		#map-canvas label {
			display: inline;
		}
	</style>
</head>
<body>
    <div class="container">
		<div class="form-group">
			<label>Cek Kordinat</label>
            <button class="btn btn-primary" onclick="getLocation()">Cek</button>
		</div>
        <p style="margin-top:10px" id="koordinat"></p>
		<div id="map-canvas" style="width:100%"></div>
	</div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1UhV7s_4c-E3p33HyK_P-N7uEs8qqfpg&callback=initMap"></script>
    <script>
        var view = document.getElementById("koordinat");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
            }
        }
        
        function showPosition(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            latlon = new google.maps.LatLng(lat, lon)
            mapcanvas = document.getElementById('map-canvas')
        
            var myOptions = {
                center:latlon,
                zoom:14,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
            
            var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            var marker = new google.maps.Marker({
                position:latlon,
                map:map,
                title:"You are here!"
            });
        }
        
        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
                    break;
                case error.POSITION_UNAVAILABLE:
                    view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
                    break;
                case error.TIMEOUT:
                    view.innerHTML = "Requestnya timeout bro"
                    break;
                case error.UNKNOWN_ERROR:
                    view.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
</body>
</html>