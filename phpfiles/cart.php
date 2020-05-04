<?php
require_once 'dbConnection.php';

global $totalQuantity, $totalPrice;
$data = null;

if (isset($_GET['remove']) && isset($_GET['id'])) {
	unset($_SESSION["cart"][strval($_GET['id'])]);
} else if (isset($_GET['empty'])) {
	unset($_SESSION["cart"]);
} else if (isset($_POST['updateQuantity']) && isset($_GET["id"])) {
	if (!empty($_SESSION["cart"])) {
		$product = json_decode($_SESSION["cart"][strval($_GET["id"])]);
		$product->quantity = $_POST["updateQuantity"];
		$_SESSION["cart"][strval($_GET["id"])] = json_encode($product);
	}
}

function showCart() {
	if (empty($_SESSION["cart"])) {
		echo   "<div class=\"no-records\">You cart is Empty!<br><br>
		    		<a href=\"./shop.php\" class=\"empty-cart\">Select something from the shop </a>
		    		</div>";
	} else {
		echo "
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th class=\"algnLeft hideName\">Name</th>
					<th class=\"algnLeft\">Image</th>
					<th class=\"algnRight5\">Quantity</th>
					<th class=\"algnRight10\">Unit Price</th>
					<th class=\"algnRight10\">Price</th>
					<th class=\"algnCenter\">Remove</th>
				</tr>";
		showCartProducts();
		echo "<a class=\"empty-cart-button\" href=\"cart.php?empty\">Empty Cart</a>";
	}
}

function showCartProducts() {
	global $totalQuantity, $totalPrice;

	foreach ($_SESSION["cart"] as $key => $value) {
		$product = json_decode($value);
		$productPrice = $product->quantity * $product->price;

		echo
			"<tr>
			<td class=\"hideName\">$product->name</td>		
			<td><img src= $product->image class=\"product-image\" /></td>
			<td class=\"algnRight\">
				<form method = \"POST\" action=\"cart.php?id=$product->id\">
					<input type=\"number\" value=\"$product->quantity\" placeholder input-type=\"numeric\" name=\"updateQuantity\">
				<input type=\"submit\" value=\"Update\" name=\"update-count-button\">
        	</form>
			</td>
			<td  class=\"algnRight\">$ $product->price</td>
			<td  class=\"algnRight\">$ $productPrice</td>
			<td style=\"text-align:center;\"><a href=\"cart.php?remove&id=$product->id \" class=\"btnRemoveAction\"><img class=\"remove-button\" src=\"./images/delete.png\"></a></td>
			</tr>";

		$totalQuantity += $product->quantity;
		$totalPrice += ($product->price * $product->quantity);
	}

	echo "<tr>
			<td colspan=\"2\" align=\"right\">Total:</td>
			<td align=\"right\" colspan=\"1\"><strong>$ $totalPrice</strong></td>
		</tr>";
}
?>