<?php

include('db.php');

define(SECRET, "ah95Kovtc0Zwm9Snhze3IYG5fr6SsggfwGFkFdGKGOE4Edodf7sDWs");

function getId() {
	if(isset($_COOKIE['ticker_id'])) {
		$data = explode('-', base64_decode($_COOKIE['ticker_id']));
		$signature = $data[0];
		$hash = $data[1];
		$userId = $data[2];
		if($signature !== sha1(SECRET. $hash . $userId)) {
			//If corrupted or malformed cookie, delete
			setcookie('ticker_id', "", time() - 3600);
		} else {
			//Extend expiry
			setcookie('ticker_id', $_COOKIE['ticker_id'], time() + (86400 + 30)); //Prevents expiry
			return $userId;
		}
	}
	return null;
}

function register() {
	$idGen = time().uniqid();
	//TODO: db check for uniqueness
	//do { 
	//$uniqueID = uniqid(); 
	//$exists = mysql_num_rows('SELECT * FROM table WHERE id = $uniqueID');
	//} while ($exists == 1)
	$hash = sha1(rand(0, 500).microtime().SECRET);
	$signature = sha1(SECRET . $hash . $idGen);
	setcookie('ticker_id', base64_encode($signature ."-". $hash ."-". $idGen), time() + (86400 + 30));
	echo "<h4>Here's a recovery code, in case you mess up everything. Keep good care of this! If it's gone, so is your account... [";
	echo base64_encode($signature ."-". $hash ."-". $idGen);
	echo "]</h4>";
}

function displayFeed() {
	//Render bar
	renderNavBar();
	dbPullEntries();
}

function displayPersonalFeed() {
	renderNavBar();
	dbPullPersonalEntries();
}

function renderNavBar() {
	echo
	"
		<nav class=\"navbar navbar-default\">
			<div class=\"container-fluid\">
				<div class=\"navbar-header\">
					<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" 			data-target=\"#collapso\" aria-expanded=\"false\">
						<span class=\"sr-only\">Toggle navigation</span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
					</button>
				</div>
				<div class=\"collapse navbar-collapse\" id=\"collapso\">
					<ul class=\"nav navbar-nav navbar-left\">
						<li>
							<a href=\"index.php\">
								Home
								<span class=\"sr-only\">(current)</span>
							</a>
						</li>
						<li>
							<a href=\"myposts.php\">
								My Posts
								<span class=\"sr-only\">(current)</span>
							</a>
						</li>
						<li>
							<a href=\"#\">
								FAQ
								<span class=\"sr-only\">(current)</span>
							</a>
						</li>
					</ul>
					<ul class=\"nav navbar-nav navbar-right\">
						<li class=\"dropdown\">
							<a href=\"newpost.php\">
								New Post
								<i class=\"fa fa-plus-circle\" style=\"margin-left: 6px\"></i>
								<span class=\"sr-only\">(current)</span>
							</a>
						</li>
					</ul>
				</div>
			<!-- close container -->
			</div>
		</nav>
	";
}

function dbPullEntries() {
	global $conn;
	$res = $conn->prepare("SELECT * FROM posts WHERE active = '1' ORDER BY id DESC LIMIT 25");
	renderEntries($res);
}

function dbPullPersonalEntries() {
	global $conn;
	$res = $conn->prepare("SELECT * FROM posts WHERE active = '1' AND poster = :poster ORDER BY id DESC LIMIT 25");
	$id = getId();
	$res->bindParam(":poster", $id);
	renderEntries($res);
}

function renderEntries($res) {
	global $conn;
	//echo "<div class=\"container\">";
	if($res->execute()) {
		$rows = $res->fetchAll(PDO::FETCH_ASSOC);
		if(sizeof($rows) == 0) {
			echo "<div class=\"row text-center\">";
				echo "<p>No posts are currently available :(</p>";
			echo "</div>";
			return;
		}
		foreach($rows as $row) {
			$content = $row['content'];
			$rid = $row['id'];
			
			$vres = $conn->prepare("SELECT * FROM votes WHERE post_id = :postid");
			$vres->bindParam(":postid", $rid);
			$vres->execute();
			$vrows = $vres->fetchAll(PDO::FETCH_ASSOC);
			
			$thisScore = 0;
			
			foreach($vrows as $vrow) {
				$thisScore += $vrow['value'];
				if($vrow['voterkey'] == getId()) {
					if($vrow['value'] == 1) {
						//Javascript to change color attr
						echo 
						"
						<script>
							$(document).ready(function() {
								$('#uv_$rid').css('color', '#009688');
								$('#dv_$rid').css('color', 'black');
							});
						</script>
						";
					} else if($vrow['value'] == -1) {
						//Javascript to change color attr
						echo 
						"
						<script>
							$(document).ready(function() {
								$('#uv_$rid').css('color', 'black');
								$('#dv_$rid').css('color', '#009688');
							});
						</script>
						";
					}
				}
			}
			
			//thisScore being less than -5 should make it inactive (or deletion)
			if($thisScore <= -5) {
				$dres = $conn->prepare("UPDATE posts SET active = '0' WHERE id = :postid");
				$dres->bindParam(":postid", $rid);
				$dres->execute();
			}
			
			echo "<hr>";
			echo "<div class=\"row\">";
				echo "<div class=\"col-xs-1 text-center\" style=\"padding-left:35px\">";
					echo 
					"<div class=\"row\" id=\"uv_$rid\"><span class=\"glyphicon glyphicon-chevron-up\" aria-hidden='true' onclick=\"
					$.ajax(
						{url: 'vote.php?post_id=$rid&vote_val=1',
						 beforeSend: function() {
							if($('#uv_$rid').css('color') != 'rgb(0, 150, 136)') {
								if($('#dv_$rid').css('color') == 'rgb(0, 150, 136)') {
									$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) + 2);
								} else {
									$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) + 1);
								}
								$('#uv_$rid').css('color', '#009688');
								$('#dv_$rid').css('color', 'black');
							} else {
								//Undo vote
								$('#uv_$rid').css('color', 'black');
								$('#dv_$rid').css('color', 'black');
								$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) - 1);
								$.get('vote.php?post_id=$rid&vote_val=0');
							}
						}}
					);
					\">
					</span></div>";
					
					echo "<div class=\"row\"><span class=\"badge\" id=\"score_$rid\" style=\"font-size: 14px\">$thisScore</span></div>";
					echo 
					"<div class=\"row\" id=\"dv_$rid\"><span class=\"glyphicon glyphicon-chevron-down\" aria-hidden='true' onclick=\"
					$.ajax(
						{url: 'vote.php?post_id=$rid&vote_val=-1',
						 beforeSend: function() {
							if($('#dv_$rid').css('color') != 'rgb(0, 150, 136)') {
								if($('#uv_$rid').css('color') == 'rgb(0, 150, 136)') {
									$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) - 2);
								} else {
									$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) - 1);
								}
								$('#dv_$rid').css('color', '#009688');
								$('#uv_$rid').css('color', 'black');
							} else {
								//Undo vote
								$('#uv_$rid').css('color', 'black');
								$('#dv_$rid').css('color', 'black');
								$('#score_$rid').html(parseInt($('#score_$rid').html(), 10) + 1);
								$.get('vote.php?post_id=$rid&vote_val=0');
							}
						 }}
					); 
					\">
					</span></div>";
				echo "</div>";
			
				echo "<div class=\"col-xs-9\" style=\"font-size: 16px; word-break: break-word\">";
					echo $content;
				echo "</div>";
				
			echo "</div>";	
		}
		echo "<hr>";
	}
}

?>
