<?php

include('../includes/db.php');
include('../includes/functions.php');

if(isset($_GET['post_id']) && isset($_GET['vote_val'])) {
	$post_id = $_GET['post_id'];
	$val = $_GET['vote_val'];
	
	//DB-check for any existing vote from user
	$checkRes = $conn->prepare("SELECT * FROM votes WHERE voterkey = :voterkey AND post_id = :postid");
	$checkRes->bindParam(":voterkey", getId());
	$checkRes->bindParam(":postid", $post_id);
	$checkRes->execute();
	if($checkRes->rowCount() == 0) {
		$voteRes = $conn->prepare("INSERT INTO votes VALUES ('NULL', :postid, :voterkey, :value)");
	} else {
		//Update vote
		$voteRes = $conn->prepare("UPDATE votes SET value = :value WHERE post_id = :postid AND voterkey = :voterkey");
	}
	$voteRes->bindParam(":postid", $post_id);
	$voteRes->bindParam(":voterkey", getId());
	$voteRes->bindParam(":value", $val);
	if($voteRes->execute()) {
		echo "OK";
	}
}

?>