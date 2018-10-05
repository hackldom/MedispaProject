<?php
include_once('includes/session.php');
test_login();
include_once('connect.php');

$page_title = "Goodbye";
$_SESSION = array();
session_destroy();

echo '<h2>goodbye</h2>
	<p>you are now logged out</p>
	<p><a href="login.php">Log In</a></p>';
?>
