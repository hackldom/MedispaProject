<?php
	require_once('includes/session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="medispa">
    <meta name="author" content="dom_hackl">


    <title>Sign in to Medispa</title>
	<?php
		require_once('includes/head.php');
		require_once('connect.php');
		if(isset($_POST['user'])){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$result = getData('user',"email=\"$user\" AND password=\"$password\"");
			//echo $result->num_rows;
			if($result->num_rows == 1){
				// successful login
				$first_row = $result->fetch_row();
				$_SESSION['email'] = $first_row[2];
				$_SESSION['privilege'] = $first_row[4];
				header('Location: index.php');
			} else {
				echo '<div class="alert alert-danger">
  <strong>Error:</strong> Bad combination of email/password.
</div>';

			}
		}
		if(isset($_GET['action'])){
			if($_GET['action']=='logout'){
				session_destroy();
			}
		}

	?>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <!--<script src="loginscript.js" type="text/javascript"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<?php
	//	if(isset($_SESSION['email'])){
	//		echo $_SESSION['email'];
	//	}
	?>
    <div class="container">
	<div class="login-container">
            <div id="output"></div>
            <div class="avatar" >

            </div>
            <div class="form-box">
                <form action="login.php" method="post">
                    <input name="user" type="email" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
		<a href="login.php?action=logout" class="btn btn-warning" style="margin-top: 5px"  >Logout</a>

    </div>
    </div>

  </body>
</html>
