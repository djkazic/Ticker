<!-- Header for geo cookie updates / header redirection if no cookies -->

<?php
require_once('includes/functions.php');

//Cookie check
if(getId() == null) {
	register();
	die();
}

?>

<?php
//Geoloc check
$uid = getId();
$gcres = $conn->prepare("SELECT * FROM geoloc WHERE poster = :uid");
$gcres->bindParam(":uid", $uid);
$gcres->execute();
if($gcres->rowCount() > 0) {
	$grows = $gcres->fetchAll(PDO::FETCH_ASSOC);
	if($grows[0]['lat'] != 0 || $grows[0]['long'] != 0) {
		//If direct access to feed fails, go to index
		//All good
	} else {
		header("Location: index.php");
	}
}

renderNavBar();
echo "<div id=\"geoStat\"></div>";
echo "> debug: ".$uid;

?>