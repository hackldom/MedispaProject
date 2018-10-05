<head>
	<link href="sidebar-homepage/css/bootstrap.min.css" rel="stylesheet" />
	<link href="sidebar-homepage/css/simple-sidebar.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
<?php
include_once('includes/session.php');
test_login();
include_once('connect.php');

$page_title = "Cart";
//check if form has been submitted for update
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	foreach ($_POST['qty'] as $item_id => $item_qty) {
		//makes sure that the values are integers
		$id = (int)$item_id;
		$qty = (int)$item_qty;

		//change quantity or delete if zero
		if ($qty  == 0){
			unset($_SESSION['cart'][$id]);
		}
		elseif ($qty > 0){
			$_SESSION['cart'][$id]['quantity'] = $qty;
		}
	}
}
//total grand variable
$total = 0;
if(!empty($_SESSION['cart'])){
	//retreive all data from the database
	$q = "SELECT * FROM shop WHERE item_id IN(";
	foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
	$q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
    $r = mysqli_query ($dbc, $q);

	//displaying the cart in a form with a table
	echo '<form action="cart.php" method="POST"><table class="table table-striped table-bordered">
	<tr class="success"><th colspan="5">Items in your cart</th></tr><tr>';
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		//calcluate sub-total and grand total
		$subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] *
		$_SESSION['cart'][$row['item_id']]['price'];
		$total += $subtotal;

		//displaying the rows
		echo "<tr><td>{$row['item_name']}</td>
			<td>{$row['item_desc']}</td>
			<td><input type=\"text\" size=\"3\" name=\"qty[{$row['item_id']}]\"
				value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\">
				</td><td>@{$row['item_price']} = </td>
				<td>".number_format($subtotal, 2). "</td></tr>";
}
	mysqli_close($dbc);

		#displaying the total
		echo ' <tr><td colspan="5" style="text-align:right">
		Total = '.number_format($total,2).'</td></tr></table>
		<input type="submit" name="submit" value="Update My Cart"></form>';
}
		else{
			echo '<p>Your cart is empty</p>';
}
echo '<p><a href="shop.php">Shop</a> |
	 <a href="checkout.php?total='.$total.'">Checkout</a> |
	 <a href="home.php">Home</a> |
	 <a href="goodbye.php">Logout</a></p>' ;

?>
	</div>
</div>
</div>
</div>
</div>

</body>
