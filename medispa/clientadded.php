<?php require_once('connect.php'); ?>
<html>
<head>
<title>Add New Client</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
  <?php

	if(isset($_POST['submit'])){
	  $data_missing = array();

	  if(empty($_POST['first_name'])){
		$data_missing[] = 'First Name';

	  }else {
		$f_name = trim($_POST['first_name']);
	  }

	  if(empty($_POST['last_name'])){
		$data_missing[] = 'Last Name';

	  }else {
		$l_name = trim($_POST['last_name']);
	  }

	  if(empty($_POST['email'])){
		$data_missing[] = 'Email';

	  }else {
		$email = trim($_POST['email']);
	  }

	  if(empty($_POST['postcode'])){
		$data_missing[] = 'Post Code';

	  }else {
		$post = trim($_POST['postcode']);
	  }

	  if(empty($_POST['phone'])){
		$data_missing[] = 'Phone Number';

	  }else {
		$phone = trim($_POST['phone']);
	  }

	  if(empty($_POST['birth_date'])){
		$data_missing[] = 'Date of Birth';

	  }else {
		$b_date = trim($_POST['birth_date']);
	  }

	  if(empty($data_missing)){

		  $query = "INSERT INTO newclient (first_name, last_name, email,
		  postcode, phone_number, birth_date) VALUES (?, ?, ?, ?, ?, ?)";

		  $stmt = mysqli_prepare($dbc, $query);

		  /*i INTEGER
		   *d DOUBLE
		   *b BLOBS
		   *s EVERYTHING ELSE
		   */
		  mysqli_stmt_bind_param($stmt, "ssssss", $f_name, $l_name, $email,
								 $post, $phone, $b_date);

		  mysqli_stmt_execute($stmt);

		  $affected_rows = mysqli_stmt_affected_rows($stmt);

		  if($affected_rows ==1){
			echo 'Client entered';
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);

		  } else {
			echo 'Error Occurred <br>';
			echo mysqli_error();
		  }
	  }else {
		echo "You are missing the following data </br> ";

		foreach($data_missing as $missing){
		  echo "$missing<br />";
		}
	  }
	}
   ?>
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
</body>
</html>
