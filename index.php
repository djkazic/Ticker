<!-- Views posts -->
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
		
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		
		<link href="css/roboto.min.css" rel="stylesheet">
        	<link href="css/material.min.css" rel="stylesheet">
        	<link href="css/ripples.min.css" rel="stylesheet">
		
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" crossorigin="anonymous"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		
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
			include('header.php');
			include('includes/db.php');
					
			displayFeed();
			
			?>
		</div>
	</body>
</html>
