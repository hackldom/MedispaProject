<?php
include_once('includes/session.php');
test_login();
include_once('connect.php');

$page_title = 'Cart Addition';
//assigning passed item id as variables
if (isset($_GET['id'])) $id = $_GET['id'];

$q = "SELECT * FROM shop WHERE item_id = $id";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) == 1){
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	//if another of the same product was purchased then it displays the following
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		echo '<p>Another '. $row["item_name"].'
		has been added to you cart</p>';
	}
	else{
		$_SESSION['cart'][$id] = array('quantity' => 1, 'price' => $row['item_price']);
		echo '<p>A '. $row["item_name"]. ' has been added to your cart</p>';
	}
	mysqli_close($dbc);

}


?>
