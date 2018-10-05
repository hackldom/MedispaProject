<?php
require_once('includes/session.php');
test_login();
if($_SESSION['privilege'] <= 2){
	header("Location: index.php");
	die();
}
 ?>
<html>
<head>

	 <link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet" />
	 <link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
	 <link rel="stylesheet" href="css/style.css" type="text/css" />
	 <link href="chartist.min.css" rel="stylesheet" />

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
				<a href="viewbookings.php">Bookings</a>
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
				<a href="login.php?action=logout">Log Out</a>
			</li>
		</ul>
	</div>
	<div id="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6" style="border-right: 1px dotted black;">
					<h4>Clients per month</h4>
					<div class="ct-chart ct-golden-section" id="chart1"></div>
				</div>




				<?php
				require_once('connect.php');
				$therapists = [];
				$query2 = "SELECT * FROM `therapist`";
				$response = mysqli_query($dbc, $query2);
				if($response){
						while($row = mysqli_fetch_array($response)){

							$therapists[$row['name']] = 0;
						}
				}
				//var_dump($therapists);
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
						while($row = mysqli_fetch_array($response)){

						$therapists[$row['therapist_name']]++;
						}
			}
				$labels = [];
				$series = [[]];
				foreach ($therapists as $key => $value) {
					$labels[] = $key;
					$series[0][]  = $value;
				}
				 ?>
				 <div class="col-md-6" id="specialchart">
					 <div class="hidden labels" >
 					 	<?php echo json_encode($labels);?>
					 </div>
					 <div class="hidden series">
				 		<?php echo json_encode($series);?>
				 	</div>
 					<h4>Total Clients per Staff</h4>
 					<div class="ct-chart ct-golden-section" id="chart2"></div>
 				</div>
			</div>
			<div class="row">
				<div class="col-md-6" style="border-right: 1px dotted black;">
					<h4>Most popular services</h4>
					<div class="ct-chart ct-golden-section"  id="chart3"></div>
				</div>
				<div class="col-md-6">
					<h4>Busiest rooms (most booked)</h4>
					<div class="ct-chart ct-golden-section" id="chart4"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="chartist.min.js" ></script>
<script src="js/chart.js"></script>


</body>
</html>
