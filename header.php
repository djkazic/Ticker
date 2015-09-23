<!-- Header for geo cookie updates / header redirection if no cookies -->

<script src="js/geolocate.js"></script>
<script>
	//TODO: switch to localStorage
	$(document).ready(function() {
		$('#dieMsg').hide();
		if(navigator.geolocation) {
			$('#geoStat').html("Crunching numbers for your location...");
			navigator.geolocation.getCurrentPosition(success, error);
		} else {
			$.post(
				"geoupdate.php",
				{lat: 0, long: 0}
			);
			$('#dieMsg').show();
			alert('Your browser sucks. Upgrade it.');
		}
	});
	
	function success(position) {
		$.post(
			"geoupdate.php",
			{lat: position.coords.latitude, long: position.coords.longitude},
			function(data) {
				$('#geoStat').html("");
				setTimeout(function() {
					if(document.URL.indexOf("#") == -1) {
						url = document.URL + "#";
						location = "#";
						location.reload();
					}
				}, 2000);
			}
		);
	}
	
	function error(error) {
		document.getElementById('geo').innerHTML = 'Error: ' + error.message;
	}
</script>

<div id="geoStat"></div>

<?php
require_once('includes/functions.php');

//Cookie check
if(getId() == null) {
	register();
	die();
}

//Geoloc check
$uid = getId();
$gcres = $conn->prepare("SELECT * FROM geoloc WHERE poster = :uid");
$gcres->bindParam(":uid", $uid);
$gcres->execute();
if($gcres->rowCount() == 0) {
	die("<div id=\"dieMsg\">Sorry, we need geo-location services to work.</div>");
	//NEED A LANDER PAGE WITHOUT A HEADER 
}

renderNavBar();

?>