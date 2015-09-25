<?php 
ob_start(); 
include('../includes/functions.php');

if(isset($_POST['admUser']) && isset($_POST['admPassword'])) {
	if(adminAuth($_POST['admUser'], $_POST['admPassword'])) {
		session_start();
		$_SESSION['username'] = $_POST['admUser'];
		$_SESSION['status'] = "Active";
		header("Location: index.php");
	}
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
    <title>Ticker | Admin Auth</title>
    <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link href="../css/roboto.min.css" rel="stylesheet">
	<link href="../css/material.min.css" rel="stylesheet">
	<link href="../css/ripples.min.css" rel="stylesheet">
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>

<body>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
			<br> <br> <br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4><strong>> admin panel access:</strong></h4>
					<hr>
                    <form action="" method="post">
                        <label>username : </label>
                        <input type="text" class="form-control" id="admUser" name="admUser" />
                        <label>password : </label>
                        <input type="password" class="form-control" id="admPassword" name="admPassword" />
                        <hr>
                        <input type="submit" class="btn btn-info">
                    </form>
                    <br />
                </div>
            </div>
        </div>
    </div>
</body>

</html>