<?php
require_once 'dbConnection.php';

global $totalQuantity;
global $totalPrice;

if (!empty($_SESSION["cart"])) {
	if (isset($_GET["remove"]) && isset($_GET["id"])) {
		unset($_SESSION["cart"][strval($_GET["id"])]);
	} else if (isset($_GET["empty"])) {
		unset($_SESSION["cart"]);
	} else if (isset($_POST["updateQuantity"]) && isset($_GET["id"])) {
		$product = json_decode($_SESSION["cart"][strval($_GET["id"])]);
		$product->quantity = $_POST["updateQuantity"];
		$_SESSION["cart"][strval($_GET["id"])] = json_encode($product);
	} else if (isset($_GET["placeOrder"])) {
		$productsIds = "";
		$quantities = "";
		$status = "processing";
		$first = true;
		$price = 0;

		foreach ($_SESSION["cart"] as $key => $value) {
			$product = json_decode($value);

			if (true == $first) {
				$productsIds = $productsIds . strval($product->id);
				$quantities = $quantities . strval($product->quantity);
				$first = false;
			} else {
				$productsIds = $productsIds . "-" . strval($product->id);
				$quantities = $quantities . "-" . strval($product->quantity);
			}

			$price += $product->price * $product->quantity;
		}

		$sql = "INSERT INTO Orders (id_user, ids_products, quantities, total_price, status) VALUES ('".$_SESSION["id_user"]."', '".$productsIds."', '".$quantities."', '".$price."', '".$status."');";

		$result = mysqli_query($conn, $sql);
		
		if (false == $result) {
			echo mysqli_error($conn);
		}

		unset($_SESSION["cart"]);
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
		echo "</tbody></table>";
		echo "<a class=\"place-order-button\" href=\"cart.php?placeOrder\">Place Order</a>";
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