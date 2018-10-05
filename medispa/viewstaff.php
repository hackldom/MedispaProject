<?php
	include_once('includes/session.php');
	test_login();

?>
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
					<a href="index.php">
						Medispa:
					</a>
				</li>
				<li>
					<a href="viewbookings.php" >Bookings</a>
				</li>
				<li>
					<a href="staff.php">Staff</a>
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
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h3>These are our staff: <a href="http://localhost/medispa/newclient.php"><button class="btn btn-link" type="button">Add New Staff</button></a></h3>

						<?php
						require_once('connect.php');

						$query = "SELECT id, name,email, title, gender,
						specialisation FROM staff";

						$response = mysqli_query($dbc, $query);

						if($response){
						  echo '<table id="clients_table" class=" table table-bordered " cellspacing="5" cellpadding="8" border="0" style="background-color: #77b874, border-radius: 10px, margin:auto" >

						  <tr style="border-bottom: 1px solid black" id="client_table_header"> <th align="left" >#</th>
						  <td align="left"><b>Name</b></td>
						  <td align="left"><b>Email</b></td>
						  <td align="left"><b>Title</b></td>
						  <td align="left"><b>Gender</b></td>
						  <td align="left"><b>Specialisation</b></td></tr> ';

						  while($row = mysqli_fetch_array($response)){

						    echo '<tr><td align="left">' .
						    $row['id'] . '</td><td align="left">' .
						    $row['name'] . '</td><td align="left">' . '<a href="contactform.html"><img src="http://plainicon.com/dboard/userprod/2805_fce53/prod_thumb/plainicon.com-39926-128px.png" width="25px" /></a> ' .
						    $row['email'] . '</td><td align="left">' .
						    $row['title'] . '</td><td align="left">' .
						    $row['gender']. '</td><td align="left">'.
							$row['specialisation'] 	 . '</td>';

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
<script>
// alert('Testing');
</script>
</body>
</html>
