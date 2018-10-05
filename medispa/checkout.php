<?php
include_once('includes/session.php');
test_login();
include_once('connect.php');


//storing shopping cart in the database
if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))){
	//mysqli insert query into the database
	$q = "INSERT INTO orders(user_id, total, order_date) VALUES('" . $_SESSION['email']  ."',".$_GET['total'].", NOW() )";
	var_dump($q);
	$r = mysqli_query($dbc, $q);

	$order_id = mysqli_insert_id($dbc);

	//this is to retrieve the selected cart items from the 'shop' database
	$q = "SELECT * FROM shop WHERE item_id IN(";
	foreach ($_SESSION['cart'] as $id => $value) {
		$q .= $id . ',';
	}
	$q = substr($q, 0, -1) . ') ORDER BY item_id ASC';
	$r = mysqli_query($dbc, $q);

	//storing item details in the database
	while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)){
		$query = "INSERT INTO order_contents(order_id, item_id, quantity, price)
					VALUES ( $order_id, ".$row['item_id'].",
					".$_SESSION['cart'][$row['item_id']]['quantity'].",
					".$_SESSION['cart'][$row['item_id']]['price'].")" ;
		$result = mysqli_query($dbc, $query);
	}

	mysqli_close($dbc);
	echo "<p>Order has been placed, your order number is #".$order_id ."</p>";
	$_SESSION['cart'] = NULL;

}else{
	echo '<p>There are no items in your cart</p>';
}
 echo '<a href="goodbye.php"<p>Exit</p></a>';
?>
