<?php 
ob_start();
include('includes/functions.php');

if(isset($_POST['lastMax'])) {
	displayFeed($_POST['lastMax']);
}

?>