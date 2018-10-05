	<?php
require_once('includes/session.php');
test_login();if($_SESSION['privilege'] == 1){
	header("Location: index.php");
	die();
}
?>
<html>
<head>
	<title>All Clients</title>
	 <link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
		  integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
		  crossorigin="anonymous"> -->



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
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h3>Here is the all of our clients' data: <a href="http://localhost/medispa/newclient.php"><button class="btn btn-link" type="button">Add New Client</button></a></h3>
						<form action="search.php" method="post">
						  <label>
							<input type="text" name="search" placeholder="Search for clients" autocomplete="off">
						  </label>
						  <input type="submit" value="Search" />
						<?php
						require_once('connect.php');

						$query = "SELECT id, first_name, last_name, email,
						postcode, phone_number, birth_date FROM newclient";

						$response = @mysqli_query($dbc, $query);

						if($response){
						  echo '<table id="clients_table" class=" table table-bordered " cellspacing="5" cellpadding="8" border="0" style="background-color: #77b874, border-radius: 10px, margin:auto" >

						  <tr style="border-bottom: 1px solid black" id="client_table_header"> <th align="left" >#</th>
						  <td align="left"><b>First Name</b></td>
						  <td align="left"><b>Last Name</b></td>
						  <td align="left"><b>Email</b></td>
						  <td align="left"><b>Post Code</b></td>
						  <td align="left"><b>Phone Number</b></td>
						  <td align="left"><b>Date of Birth</b></td></tr> ';

						  while($row = mysqli_fetch_array($response)){

						    echo '<tr><td align="left">' .
						    $row['id'] . '</td><td align="left">' .
						    $row['first_name'] . '</td><td align="left">' .
						    $row['last_name'] . '</td><td align="left">' .
						    $row['email'] . '</td><td align="left">' .
						    $row['postcode'] . '</td><td align="left">' .
						    $row['phone_number'] . '</td><td align="left">' .
						    $row['birth_date'] . '</td>'  ;

						    echo '</tr>';
						  }
						    echo '</table>';

						} else {
						  echo "couldn't issue database query";

						  echo mysqli_error($dbc);
						}

						mysqli_close($dbc);
						 ?>
				</div>

			</div>
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Menu Toggle Script -->
	<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	</script>


</body>


</html>
