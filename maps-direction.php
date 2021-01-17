<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<title>Teknowebapp - Maps Direction</title>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1UhV7s_4c-E3p33HyK_P-N7uEs8qqfpg&callback=initMap"></script>
	<script>
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();

		function initialize() {
			directionsDisplay = new google.maps.DirectionsRenderer();
			var mapOptions = {
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: new google.maps.LatLng(-7.090911, 107.668887)
			};
			var map = new google.maps.Map(document.getElementById('map-canvas'),
				mapOptions);
			directionsDisplay.setMap(map);
			directionsDisplay.setPanel(document.getElementById('directions-panel'));

			var control = document.getElementById('control');
			map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
		}

		function calcRoute() {
			var start = document.getElementById('start').value;
			var end = document.getElementById('end').value;
			var request = {
				origin: start,
				destination: end,
				travelMode: google.maps.TravelMode.DRIVING
			};
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
			});
		}
	</script>
</head>
<body onload="initialize()">
	<div class="container">
		<div class="form-group">
			<label>Asal</label>
			<input type="text" class="form-control" id="start">
		</div>
		<div class="form-group">
			<label>Tujuan</label>
			<input type="text" class="form-control" id="end">
		</div>
		<p><button type="button" class="btn btn-primary" onclick="calcRoute()">Cari</button></p>
		<p>Maps</p>
		<div id="map-canvas" style="width:100%"></div>
	</div>
</body>
</html>