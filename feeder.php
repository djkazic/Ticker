<?php 
ob_start();
include('includes/functions.php');

if(isset($_POST['lastMin'])) {
	displayFeed($_POST['lastMin']);
}

?>