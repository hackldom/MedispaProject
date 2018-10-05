<?php
require_once('includes/session.php');
require_once('includes/head.php');
require_once('connect.php');
?>
<html>
<head>
	<title>Services</title>
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
					<a href="index.php">
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
					<a href="login.php?action=logout">Log Out</a>
				</li>
			</ul>
		</div>
		<!-- end of sidebar -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row" style="border-bottom: 1px solid black;">
					<div class="col-md-6" style="border-right: 1px dotted black;">
						<h3>Mole Check</h3>
						<img src="http://static.squarespace.com/static/53b3016de4b0d07e926c39c1/53e4d019e4b0c099d88fb372/53e4d0cee4b0c099d88fcf4e/1342792387000/timthumb.php_.jpg?format=original" height="300px" width="400px" class="img-rounded"/>
						<p>In The Park Club MediSpa we offer a state of the art mole screening technology provided by Dr Bela our resident Dermatologist Consultant,
						the founder of MelanomaMobil clinic and the comparative mole screening technology behind it.</p>
					</div>
					<div class="col-md-6">
						<h3>Botox</h3>
						<img src="http://www.theparkclubmedispa.co.uk/images/botox.jpg" height="300px" width="400px" class="img-rounded"/>
						<p>One of the most effective ways to improve your appearance is to smooth out those tell-tale lines and wrinkles.
						   We can help you achieve the results you want, using the very latest products and techniques.</p>
					</div>

				</div>
				<div class="row" style="border-bottom: 1px solid black;">
					<div class="col-md-6" style="border-right: 1px dotted black;">
						<h3>Physiotherapy</h3>
						<img src="http://lin3.ipsrsolution.com/caritashospital.org/images/DoctorsPhoto/Physio1.jpg" height="300px" width="400px" class="img-rounded"/>
						<p>Sports Massage is the ultimate answer for the professional or amateur athlete or indeed anyone who is looking to increase the amount of training that they are going to do. Sports massage can ultimately treat any soft
							tissue injuries that may have occurred during hard training.</p>
					</div>
					<div class="col-md-6">
						<h3>Mesotherapy</h3>
						<img src="http://www.lespritclinic.com/img/main/cosmetic-mesotherapy.jpg" height="300px" width="400px" class="img-rounded"/>
						<p>Mesotherapy is a medical technique that involves injecting microscopic quantities of natural extracts, pharmaceuticals, hyaluronic acid and vitamin complexes into the skin. It can be used to treat hair loss, ageing
						 and sagging skin, cellulite, localized fat reduction, hyperpigmentation and to rejuvenate the hands and neck.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>
