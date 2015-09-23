<!-- Header for geo cookie updates / header redirection if no cookies -->

<script src="js/geolocate.js"></script>
<script>
	$(document).ready(function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(GEOprocess, GEOdeclined);
		} else {
			updateGeo(0, 0);
			alert('Your browser sucks. Upgrade it.');
		}
	});
</script>

<?php
require_once('includes/functions.php');

if(getId() == null) {
	//Register
	register();
	die();
}

renderNavBar();

?>