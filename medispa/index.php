<?php
require_once('includes/session.php');
test_login();
 ?>
<html>
<head>
	 <meta charset="utf-8" />
	 <link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet" />
	 <link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
	 <link rel="stylesheet" href="css/style.css" type="text/css" />


</head>
<body>
<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper" style="margin-top:0px">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<a href="#">
					Medispa:
				</a>
			</li>
			<li>
				<a href="viewbookings.php" >Bookings</a>
			</li>
			<li>
				<a href="viewstaff.php">Staff</a>
			</li>
			<li>
				<a href="viewdata.php">Clients</a>
			</li>
			<li>
				<a href="stats.php">Statistics</a>
			</li>
			<li>
				<a href="emails.php">Forum</a>
			</li>
			<li>
				<a href="shop.php">Shop</a>
			</li>
			<li>
				<a href="login.php?action=logout">Log Out</a>
			</li>
		</ul>
	</div>
	<!-- END OF SIDEBAR -->
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>←You have succesfully logged into the Medispa system, please use the sidebar to navigate to your desired destination</h4>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
