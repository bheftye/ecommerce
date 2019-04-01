function initMap() {
	var map;
	getMyLocation();

	// Try to get user current location
	function getMyLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(success, fail);
		} else {
			alert("Browser do not support!")
		}
	}

	// If successfully got the location
	function success(position) {
		var latval = position.coords.latitude;
		var lngval = position.coords.longitude;
		var myLatLng = new google.maps.LatLng(latval, lngval);
		newMap(myLatLng);
	}

	// If fail to got the location
	function fail() {
		// alert("Can't get location!")
		var myLatLng = {lat: 59.840968, lng: 17.649879};
		newMap(myLatLng);
	}

	// Create a new map
	function newMap(myLatLng) {
		map = new google.maps.Map(document.getElementById('map'), {
		center: myLatLng,
		zoom: 15
		});
		nearSearching(myLatLng);
	}

	// Search nearby 'type'
	function nearSearching(myLatLng) {
		var request = {
			location: myLatLng,
			radius: '500',
			type: 'restaurant'
		};

		service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request, callback);
	}
	
	// Generate marker on the map
	function createMarker(title, latlng) {
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			title: title
		});
	}

	// After searching nearby
	function callback(results, status) {
		if (status == google.maps.places.PlacesServiceStatus.OK) {
			for (var i = 0; i < results.length; i++) {
				var place = results[i];
				title = place.name;
				latlng = place.geometry.location;
				createMarker(title, latlng);
			}
		}
	}
}