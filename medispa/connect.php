<?php

$servername = "localhost";
$username = "dom";
$password = "test";
$dbname = "medispa";


$dbc = new mysqli($servername, $username, $password, $dbname);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

function initConnection(){
	$servername = "localhost";
	$username = "dom";
	$password = "test";
	$dbname = "medispa";
	$dbc = new mysqli($servername, $username, $password, $dbname);
	if ($dbc->connect_error) {
	    die("Connection failed: " . $dbc->connect_error);
	}
	return $dbc;
}

function getAllData($table_name){
	$dbc = initConnection();
	$query = "SELECT * FROM ".$table_name;
	if ($result = $dbc->query($query)) {
		return $result;
	}
}
function getData($table_name, $where){
	$dbc = initConnection();
	$query = "SELECT * FROM ".$table_name;
	$query .= ' WHERE '.$where;
	//echo $query;
	if ($result = $dbc->query($query)) {
		return $result;
	}
}

function insert($table_name, $input_values){
	// tablename + value

	$dbc = initConnection();
	//var_dump($input_values);
	$query = "INSERT INTO `".$table_name.'`';
	$values = [];
	$keys = [];
	foreach($input_values as $key=>$value){
		$values[] = '"'.$value.'"';
		$keys[] = $key;
	}
	$query .= ' ('.implode(", ",$keys).') VALUES ('.implode(", ",$values).')';

	if( $dbc->query($query) !== TRUE){
		mysqli_error();
	}
}

 ?>
