<?php 
include('secure.php');
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
    <title>Ticker | Admin</title>
    <link href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>

<body>
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.html">Central Dogma</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
					<div class="dashboard-div-wrapper bk-clr-two">
						<a href="moderate.php">
							<i class="fa fa-edit dashboard-div-icon"></i>
						</a>
						<h5>Moderate Posts </h5>
					</div>
                </div>
                <div class="col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
						<a href="settings.php">
							<i class="fa fa-cogs dashboard-div-icon"></i>
						</a>
                        <h5>Settings </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Realtime Analytics
                                <div class="pull-right">
                                    <div class="dropdown">
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a>
                                            </li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">

                                <ul>

                                    <li>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-align-left text-success"></span> Lorem ipsum dolor sit amet ipsum dolor sit amet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-info-sign text-danger"></span> Lorem ipsum dolor sit amet ipsum dolor sit amet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-comment  text-warning"></span> Lorem ipsum dolor sit amet ipsum dolor sit amet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-edit  text-danger"></span> Lorem ipsum dolor sit amet ipsum dolor sit amet
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr />
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Ref. No.</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Delivery On </th>
                                    <th># #</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td># 2501</td>
                                    <td>01/22/2015 </td>
                                    <td>
                                        <label class="label label-info">300 USD </label>
                                    </td>
                                    <td>
                                        <label class="label label-success">Delivered</label>
                                    </td>
                                    <td>01/25/2015</td>
                                    <td> <a href="#" class="btn btn-xs btn-danger">View</a> </td>
                                </tr>
                                <tr>
                                    <td># 2501</td>
                                    <td>01/22/2015 </td>
                                    <td>
                                        <label class="label label-info">300 USD </label>
                                    </td>
                                    <td>
                                        <label class="label label-success">Delivered</label>
                                    </td>
                                    <td>01/25/2015</td>
                                    <td> <a href="#" class="btn btn-xs btn-danger">View</a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 Ticker
                </div>
            </div>
        </div>
    </footer>
</body>

</html>