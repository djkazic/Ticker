<?php
ob_start();
session_start();

//If not authed
if(!isset($_SESSION['username']) || !isset($_SESSION['status'])) {
	header("Location: https://tickr.us/index.php");
}
?>