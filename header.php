<!-- Header for geo cookie updates / header redirection if no cookies -->

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
		header("Location: index.php");
	}
}

renderNavBar();
echo "<div id=\"geoStat\"></div>";
echo "> debug: ".$uid;

?>