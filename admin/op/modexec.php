<?php
ob_start();
include('../secure.php');
include('../../includes/db.php');

if(isset($_POST['post_id']) && isset($_POST['move'])) {
	if($_POST['move'] == -1) {
		//Negative vote
		echo "N";
	} else if($_POST['move'] == 1) {
		//Positive vote
		echo "P";
	}
}

if(isset($_GET['post_id'])) {
	echo "GET ENABLED";
}

echo "DUMP <pre>";
var_dump($_POST);
echo "</pre>";

?>