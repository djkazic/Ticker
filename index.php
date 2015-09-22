<!-- Views posts -->
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
		
		<link href="css/roboto.min.css" rel="stylesheet">
        	<link href="css/material.min.css" rel="stylesheet">
        	<link href="css/ripples.min.css" rel="stylesheet">
		
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		
		<title>Ticker</title>
	</head>
	<body>
		<div class="container">
			<h2>Ticker</h2>
			<?php

			include('db.php');
			include('functions.php');

			//Check for existing ID from computer
			if(isset($_COOKIE['ticker_id'])) {
				$userId = getId();
				if($userId != null) {
					echo "> debug: [".$userId."]<BR><BR>";
					displayFeed();
				} else {
					die('You tried to mess with your cookie! Argh!');
				}
			} else {
				register();
				echo "<h3>You've just been added to the Ticker family. Welcome! <BR>
					  Refresh the page to see the feed.</h3>";
			}
			
			?>
		</div>
	</body>
</html>
