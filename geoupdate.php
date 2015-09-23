<!-- Send geolocation information -->

<?php

require('header.php');

if(isset($_POST['lat']) && isset($_POST['long'])) {
	//Look for existing record
	$userId = getId();
	$sres = $conn->prepare("SELECT * FROM geoloc WHERE poster = :uid");
	$sres->bindParam(":uid", $userId);
	$sres->execute();
	if($sres->rowCount() > 0) {
		//Update db
		$gres = $conn->prepare("UPDATE geoloc SET lat = :lat, long = :long WHERE userid = :uid");
	} else {
		$gres = $conn->prepare("INSERT INTO geoloc VALUES ('NULL', :uid, :lat, :long)");
	}
	$gres->bindParam(":uid", $userId);
	$gres->bindParam(":lat", $_POST['lat']);
	$gres->bindParam(":long", $_POST['long']);
	$gres->execute();
}

?>