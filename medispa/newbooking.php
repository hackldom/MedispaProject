	<?php
	require_once('includes/session.php');
	test_login();
?>
<html>
<head>
	<title>Add Client</title>
	<?php
		require_once('includes/head.php');
		require_once('connect.php');

		if(isset($_POST['submit'])){
			$values = [
				'treatment_id' => $_POST['treatment_id'],
				'date'	=> $_POST['date'].' '.$_POST['hour'],
				'client_id' => $_POST['client_id'],
				'therapist_id'=> $_POST['therapist_id'],
				'room_id' => $_POST['room_id']
			];
			insert('bookings',$values);
			echo "<b>Booking Successfully entered</b></br>	";
		}
	?>
          <!-- Sidebar CSS -->
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
					<a href="index.php">
						Medispa:
					</a>
				</li>
				<li>
					<a href="viewbookings.php">Bookings</a>
				</li>
				<li>
					<a href="viewdata.php">Clients</a>
				</li>
				<li>
					<a href="viewstaff.php">Staff</a>
				</li>
				<li>
					<a href="stats.php">Stats</a>
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
					<div class="col-lg-4">
						<?php

						 ?>
                        <div class="form_container">
                            <form action="http://localhost/medispa/booking.php" method="post">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input name="date" class="form-control date" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label>Hour</label>
                                    <select name="hour" class="form-control">
                                        <?php
                                            for($i = 0; $i < 20; $i++){
                                                // hour
                                                // 8 + 0,0,1,1,2,2,3,3

                                                // mins 0 / 30
                                                $time = (8 + round(($i / 2), 0, PHP_ROUND_HALF_DOWN)).( $i % 2 == 0 ? ':00' : ':30');
                                                echo '<option value="'.$time.'">'.$time.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Treatment</label>
                                    <select name="treatment_id" class="form-control"/>
                                    <?php
                                        $result = getAllData('treatment');
                                        while ($row = $result->fetch_row()) {
                                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name of Client</label>
                                    <select name="client_id" class="form-control">
                                    <?php
                                        $resultt = getAllData('newclient');
                                        while ($roww = $resultt->fetch_row()) {
                                            echo '<option value="'.$roww[0].' ">'.$roww[1]  .' '. $roww[2].'</option>';
                                        }
                                     ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name of Therapist</label>
                                    <select name="therapist_id" class="form-control">
                                    <?php
                                        $resultt = getAllData('therapist');
                                        while ($roww = $resultt->fetch_row()) {
                                            echo '<option value="'.$roww[0].' ">'.$roww[1].'</option>';
                                        }
                                     ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Room</label>
                                    <select name="room_id" class="form-control">
                                    <?php
                                        $resultt = getAllData('room');
                                        while ($roww = $resultt->fetch_row()) {
                                            echo '<option value="'.$roww[0].' ">'.$roww[0].'</option>';
                                        }
                                     ?>
                                    </select>
                                </div>
                                <button name="submit" value="send" type="submit" class="btn btn-primary">Send</button>
                            </form>
							<a href="viewbookings.php"><button class="btn btn-success">Go back</button></a>
                        </div>
                	</div>
				</div>
			</div>
        </div>
</div>
<script>
	$(function() {
		$( ".date" ).datepicker();
		$( ".date" ).datepicker("option", "dateFormat", "yy-mm-dd");
	});
  </script>
</body>

</html>
