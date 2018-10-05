<?php
require_once('includes/session.php');
test_login();
if($_SESSION['privilege'] == 1){
	header("Location: index.php");
	die();
}
?>
<html>
<head>
	<title>View Bookings</title>
	<meta charset="utf-8" />
	<link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet" />
	<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
 <!--	<div class="alert alert-success" style="margin:0px" >
		<p><strong>Success!</strong> You have logged into the medispa&copy; server!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
			<a  class="btn btn-warning" href="login.php?action=logout" role="button">Log Out</a>
	</div></p>

	</div> -->
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

		<!-- Page content -->
		<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
						<h3>All bookings:  <a href="http://localhost/medispa/newbooking.php"><button class="btn btn-link" type="button">Add New Booking</button></a></h3>
			<?php
			require_once('connect.php');
			$query = "SELECT bookings.id AS booking_id, bookings.date as bookingdate, t.name AS therapist_name, nc.first_name AS first_name, nc.last_name AS last_name, tr.name AS treatment_name, tr.duration AS treatment_duration, tr.price AS price
					FROM bookings
					JOIN therapist AS t
					ON bookings.therapist_id = t.id
					JOIN treatment  AS tr
					ON bookings.treatment_id = tr.id
					JOIN newclient AS nc
					ON bookings.client_id = nc.id
					ORDER BY `bookings`.`id` ASC";

			$response = mysqli_query($dbc, $query);
			if($response){
				echo '<table id="clients_table" class="table table-bordered" cellspacing="2" cellpadding="5" border="0" style="background-color: #77b874, border-radius: 10px, margin:auto" >

				 <tr style="border-bottom: 1px solid black"> <th align="left" >#</th>
									  <td align="left"><b>Therapist</b></td>
									  <td align="left"><b>First Name</b></td>
									  <td align="left"><b>Last Name</b></td>
									  <td align="left"><b>Treatment</b></td>
									  <td align="left"><b>Date</b></td>
									  <td align="left"><b>Duration</b></td>
									  <td align="left"><b>Price (£)</b></td></tr> ';

				while($row = mysqli_fetch_array($response)){
					echo '<tr><td align="left">' .
							$row['booking_id'] . '</td><td align="left">' .
							$row['therapist_name'] . '</td><td align="left">' .
							$row['first_name'] . '</td><td align="left">' .
							$row['last_name'] . '</td><td align="left">' .
							$row['treatment_name'] . '</td><td align="left">' .
							$row['bookingdate'] . '</td><td align="left">' .
							$row['treatment_duration'] . '</td><td align="left">'.
								$row['price'] . '</td>';


							echo '</tr>';

				}
					echo '</table>';
			} else{
				echo "couldn't issue database query" . mysqli_error($dbc);

			}
				mysqli_close($dbc);
			?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
