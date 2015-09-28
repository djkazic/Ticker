<!-- Header for geo cookie updates / header redirection if no cookies -->
<html>

<head>
<script>
	$(document).ready(function() {
		if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(success, error, {enableHighAccuracy: true});
		} else {
			$.post(
				"op/geoupdate.php",
				{lat: 0, long: 0}
			);
		}
	});

	function success(position) {
		$.post(
			"op/geoupdate.php",
			{lat: position.coords.latitude, long: position.coords.longitude}
		);
	}

	function error(error) {}
</script>
</head>

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
if($gcres->rowCount() > 0) {
	$grows = $gcres->fetchAll(PDO::FETCH_ASSOC);
	if($grows[0]['latitude'] == 0 && $grows[0]['longitude'] == 0) {
		header("Location: getgeo.php");
	}
} else {
	header("Location: getgeo.php");
}

renderNavBar();
echo "<div id=\"geoStat\"></div>";
echo "> debug: ".$uid;

?>