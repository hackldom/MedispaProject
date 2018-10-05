<?php
/*require_once('includes/session.php');
session_start();
*/

//VALIDATION - to make sure that no empty email gets sent!
$page_title = 'Post Error';
if( $_SERVER[ 'REQUEST_METHOD'] == 'POST'){
	if (empty($_POST['name'])){
		echo '<p>Please enter your name for this email</p>';}
	if (empty($_POST['subject'])){
		echo '<p>Plese enter a subject for this email. </p>';}
	if (empty($_POST['message'])){
		echo '<p>Please enter a message for this email</p>';}
	//IF IT IS SUCCESSFUL
	if(!empty ($_POST['subject']) && !empty ($_POST['message']) && !empty($_POST['name'])){
		require_once('connect.php');
		$q = "INSERT INTO email(first_name, subject, message, date)
		VALUES(
			'{$_POST['name']}',
			'{$_POST['subject']}',
			'{$_POST['message']}',
			NOW())";
		$r = mysqli_query($dbc, $q);
		//inserting the statement
		if (mysqli_affected_rows($dbc) != 1){
			echo '<p>Error</p>' . mysqli_error($dbc);
		}else {
		header("Location: emails.php");
		}



		mysqli_close($dbc);
	}
}
echo '<p><a href="emails.php">View Messages</a></p>';

?>
