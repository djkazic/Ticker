<?php ob_start(); ?>
<!-- Controller -->
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
		
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		
		<script>
			//TODO: switch to localStorage
			$(document).ready(function() {
				if(navigator.geolocation) {
					$('#geoStat').html("<i class=\"fa fa-location-arrow\"></i><i class=\"fa fa-cog fa-spin\" style=\"margin-left: 5px\"></i><br>");
					navigator.geolocation.getCurrentPosition(success, error, {enableHighAccuracy: true});
				} else {
					$.post(
						"op/geoupdate.php",
						{lat: 0, long: 0}
					);
				}
			});
			
			function success(position) {
				$.post(
					"op/geoupdate.php",
					{lat: position.coords.latitude, long: position.coords.longitude},
					function(data, status) {
						window.location.replace("index.php");
					}
				);
			}
			
			function error(error) {
				window.location.replace("nogeo.php");
			}
		</script>
	</head>
	<body>
		<div class="container" style="word-break: break-word">
			<div class="row">
				<div class="col-xs-12">
					<h2 style="color: #000000; margin-left: 5px; margin-right: 10px"><img src="img/logo.svg" width="25" height="25" style="fill:#333333"></img>Ticker</h2>
				</div>
			</div>

			<?php 
			include('includes/functions.php');
			renderNavBar(); 
			?>
			
			<div id="currentMessage">
				One moment please, just need to figure out where you are...
			</div>
		</div>
	</body>
</html>
