<?php
session_start();
function test_login(){
	if(!isset($_SESSION['email'])){
		header('Location: http://localhost/medispa/login.php');
		die();
	}
}
