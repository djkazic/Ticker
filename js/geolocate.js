function GEOprocess(position) {	
	// GET post
	updateGeo(position.coords.latitude, position.coords.longitude);
}

function updateGeo(positionLat, positionLong) {
	$.ajax({
		url: "geoupdate.php",
		type: "POST",
		data: {lat: positionLat, long: positionLong}
	});
}

// this is used when the visitor bottles it and hits the "Don't Share" option
function GEOdeclined(error) {
	document.getElementById('geo').innerHTML = 'Error: ' + error.message;
}