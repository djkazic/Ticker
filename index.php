<?php ob_start(); ?>
<!-- Views posts -->
<!DOCTYPE HTML>
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
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('#ajaxLoad').hide();
			});
		
			var noMore = 0;
			var now = new Date().getTime();
			$(window).scroll(function() {
				if((($(document).height() - $(window).height()) - $(window).scrollTop()) <= 4) {
					if(new Date().getTime() - now > 1000) {
						$('#ajaxLoad').show();
						var maxId = 0;
						$(".entries *[id]").each(function() {
							if(maxId < $(this).attr("id")){ maxId = $(this).attr("id")}
						});
						maxId = maxId.substring(3);			
						var minId = maxId;
						$(".entries *[id]").each(function() {
							if(minId > $(this).attr("id")){ minId = $(this).attr("id")}
						});
						$.ajax({
							method: "POST",
							url: "feeder.php",
							data: {lastMin : minId},
							success: function(html) {
								var oh = "<div class=\"row text-center\"><p>No posts are currently available :(</p></div>";
								if(noMore == 0 && html == oh) {
									$("#entryContainer").append(html);
									noMore = 1;
								} else if(html != oh) {
									$("#entryContainer").append(html);
								}
								$('#ajaxLoad').hide();
							}
						});
						now = new Date().getTime();
					}
				}
			});
		</script>
		
		<title>Ticker</title>
	</head>
	<body>
		<div class="container" style="word-break: break-word">
			<div class="row">
				<div class="col-xs-12">
					<h2 style="color: #000000; margin-left: 5px; margin-right: 10px"><img src="img/logo.svg" width="25" height="25" style="fill:#333333"></img>Ticker</h2>
				</div>
			</div>
			
			<div class="entries" id="entryContainer">
				<?php
				include('header.php');
				
				echo "<hr>";	
				displayFeed();
				
				?>
				<div id="ajaxLoad" class="text-center"><img src="img/loading-bars.svg" width="256" height="32"></div>
			</div>
		</div>
	</body>
</html>