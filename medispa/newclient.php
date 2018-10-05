<html>
<head>
  <title> Add Client </title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
		integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
		crossorigin="anonymous"> -->
		<link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet">
</head>

<body>

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
					<a href="viewbookings.php" >Bookings</a>
				</li>
				<li>
					<a href="viewstaff.php">Staff</a>
				</li>
				<li>
					<a href="viewdata.php">Clients</a>
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
					<div class="col-lg-4">
						<div class="form_container">
						  <form action="http://localhost/medispa/clientadded.php" method="post">
						    <b>Add a New Client</b>

						    <p> First name:
						    <input type="text" name="first_name" size="30" value="" />
						    </p>

						    <p>Last Name:
						  	<input type="text" name="last_name" size="30" value="" />
						  	</p>

						  	<p>Email:
						  	<input type="text" name="email" size="30" value="" />
						  	</p>

						  	<p>Post Code:
						  	<input type="text" name="postcode" size="30" value="" />
						  	</p>

						  	<p>Phone Number:
						  	<input type="text" name="phone" size="30" value="" />
						  	</p>

						  	<p>Birth Date (YYYY-MM-DD):
						  	<input type="text" name="birth_date" size="30" value="" />
						  	</p>

						    <p>
						      <input type="submit" name="submit" value="Send" />
						    </p>


						  </form>
						</div>

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
