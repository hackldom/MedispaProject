<html>
<head>
	<title>List of Staff</title>
		<link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<div id="sidebar-wrapper" style="margin-top: 0px">
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
					<a href="login.php?action=logout" role="button">Log Out</a>
				</li>
			</ul>
		</div>
		<!-- END OF SIDEBAR -->
		<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<h3>Write a post on the forum</h3>
						<hr>
						<form action="post_action.php" method="POST" accept-charset="utf-8">
							<p>Name</br>
								<input name="name" type="text" size="32" maxlength="30"></p>
							<p>Subject</br>
								<input name="subject" type="text" size="64" maxlength="20"></p>
							<p>Message</br>
							<textarea name="message" rows="5" cols="50"></textarea></p>
							<p><input type="submit" value="Submit"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
$to = "domhackl@gmail.com";

?>
