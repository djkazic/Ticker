<!-- Failed geolock -->
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
		<link href="css/roboto.min.css" rel="stylesheet">
        	<link href="css/material.min.css" rel="stylesheet">
        	<link href="css/ripples.min.css" rel="stylesheet">
		
		<title>Ticker</title>
	</head>
	<body>
		<div class="container" style="word-break: break-word">
			<div class="row">
				<div class="col-xs-12">
					<h2 style="color: #000000; margin-left: 5px; margin-right: 10px"><img src="img/logo.svg" width="25" height="25" style="fill:#333333"></img>Ticker</h2>
				</div>
			</div>
			
			<?php
			include('securelock.php');
			include('includes/functions.php');
			renderNavBar(); 
			?>
			
			<div id="dieMsg">Sorry, we need geo-location services to work.</div>
		</div>
	</body>
</html>