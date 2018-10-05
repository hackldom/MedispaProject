<html>
<head>
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
					<a href="login.php?action=logout">Log Out</a>
				</li>
			</ul>
		</div>
		<!-- end of sidebar -->


<?php
echo '<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">';
require_once('connect.php');

$q = "SELECT * FROM email";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0){
//CREATE TABLE FOR THE INCOMING DATA
echo '<table class="table table-striped table-bordered" cellspacing="2" cellpadding="5"><tr><th>Posted By</th>
		<th>Subject</th>
		<th id="message">Message</th></tr>';

		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
			echo '<tr>
				<td><i>'.$row['first_name'].' '.$row['last_name'].'</i></br>'
				. $row['date'].'</td>
				<td>'.$row['subject'].'</td>
				<td>'.$row['message'].'</td>
				</tr>';
		}
		echo '</table>';
		mysqli_close($dbc);
}
else {
	echo '<p>There are currently no messages.</p>';
}
echo '		</div>
	</div>

	<!-- Standard button to redirect user if they want to write a new post -->
	<a href="sendemail.php"><button type="button" class="btn btn-default" >New Post</button></a>
</div>';
?>

</div>
</div>
</body>
</html>
