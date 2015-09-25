<?php 
ob_start(); 

if(isset($_POST['lastMax'])) {
	displayFeed($_POST['lastMax']);
}

?>