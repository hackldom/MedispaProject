<head>
	<link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet" />
	<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<meta charset="UTF-8" />
	<style>
	/*img{
	margin: 5px;
   border: 1px solid #ccc;

   width: 180px;
   }*/
	</style>
</head>
<div class="wrapper">
	<!--Sidebar -->
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
		<div class="container-fluid" style="position:relative; left:220px">
			<strong><h2 style="color: blue;">Welcome to the shop</h2>
			<div class="row">
				<div class="col-md-8">
<?php
include_once('includes/session.php');
test_login();
include_once('connect.php');

$q = "SELECT * FROM shop";
$r = mysqli_query($dbc, $q	);

if( mysqli_num_rows($r) > 0 ){
	echo '<table class="table table-striped" > <tr>';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		 echo '<td><strong>' . $row['item_name'].
		'</strong><br>' . $row['item_desc'].
		'<br><img width="150px" height="180px" src='. $row['item_img'].
		'><br>£'. $row['item_price'].'<br>
		<a href="added.php?id='. $row['item_id'] .'"	>
		Add to Cart</a></td>';
	}
	echo '</tr></table>';
	mysqli_close($dbc);

}else{
	echo '<p>There are no items in the shop right now</p>';
}
?>
<br>
<br>
<a href="cart.php"><p>Go to Cart</p></a>
</div>
</div>
</div>
</div>
</div>
