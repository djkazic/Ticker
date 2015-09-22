<!-- Header for geo cookie updates / header redirection if no cookies -->

<?php
require_once('includes/functions.php');

if(getId() == null) {
	//Register
	register();
	die();
}

renderNavBar();

?>