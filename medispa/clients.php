<?php
require_once('/connect.php');
require_once('/includes/session.php');
test_login();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clients</title>

    <!-- Bootstrap Core CSS -->
    <link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="alert alert-success" style="margin:0px">
		<p><strong>Success!</strong> You have logged into the medispa&copy; server!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
	</div></p>

	</div>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="margin-top:0px">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Choose from services:
                    </a>
                </li>
                <li>
                    <a href="#">Bookings</a>
                </li>
                <li>
                    <a href="#">Records</a>
                </li>
                <li>
                    <a href="#">Clients</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<h1>Here are the clients</h1>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="sidebar-homepage/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="sidebar-homepage/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
