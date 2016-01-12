function updateMarkerPosition(latLng) {
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	}
	$('#idkabupaten').change(function() { 
    var tengah =  $('#idkabupaten').val();
	var latlong=tengah.split(",");
	console.log(latlong);
	
    var myOptions = {
      zoom: 14,
        scaleControl: true,
      center:  new google.maps.LatLng(latlong[0],latlong[1]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

	var marker1 = new google.maps.Marker({
	position : new google.maps.LatLng(latlong[0],latlong[1]),
	title : 'lokasi',
	map : map,
	icon:'assets/ico/blue.png',
	draggable : true
	});
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker1, 'drag', function() {
		updateMarkerPosition(marker1.getPosition());
	});
	

	
});
	