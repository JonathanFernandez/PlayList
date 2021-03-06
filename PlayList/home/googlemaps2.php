<html>
	<head>
		<title>Google Maps JavaScript API v3 Example: Common Loader</title>
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("maps", "3",  {callback: initialize, other_params:"sensor=false"});

		  function initialize() {
			// Initialize default values
			var zoom = 3;
			var latlng = new google.maps.LatLng(-34.603705, -58.381439);
			var location = "Showing default location for map.";

			// If ClientLocation was filled in by the loader, use that info instead
			if (google.loader.ClientLocation) {
			  zoom = 13;
			  latlng = new google.maps.LatLng(google.loader.ClientLocation.latitude, google.loader.ClientLocation.longitude);
			  
			  location = "Showing IP-based location: <b>" + getFormattedLocation() + "</b>";
			}

			var myOptions = {
			  zoom: zoom,
			  center: latlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}

			var map = new google.maps.Map(document.getElementById("map"), myOptions);
			document.getElementById("location").innerHTML = location;
		  }

		  function getFormattedLocation() {
			if (google.loader.ClientLocation.address.country_code == "US" &&
			  google.loader.ClientLocation.address.region) {
			  return google.loader.ClientLocation.address.city + ", " 
				  + google.loader.ClientLocation.address.region.toUpperCase();
			} else {
			  return  google.loader.ClientLocation.address.city + ", "
				  + google.loader.ClientLocation.address.country_code;
			}
		  }

		</script>
	</head>
	<body>
		<div class="mapa">
			<div id="map"></div>
			<div id="location"></div>
		</div>
	</body>
</html>