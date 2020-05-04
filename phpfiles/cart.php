<?php
    require_once 'dbConnection.php';
    global $totalQuantity, $totalPrice;
    $data = null;

	if (isset($_GET['remove']) && isset($_GET['id'])) {
	unset($_SESSION["cart"][strval($_GET['id'])]);
	}

	if (isset($_GET['empty'])) {
	unset($_SESSION["cart"]);
	}

	
    function showCart(){
    	if(empty($_SESSION["cart"])){
    		echo   "<div class=\"no-records\">You cart is Empty!<br><br>
		    		<a href=\"./shop.php\" class=\"empty-cart\">Select something from the shop </a>
		    		</div>";
    	}
    	else{
    		echo"
    	<a class=\"empty-cart-button\" href=\"cart.php?empty\">Empty Cart</a>
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th class=\"algnLeft\">Name</th>
					<th class=\"algnLeft\">Image</th>
					<th class=\"algnLeft\">Code</th>
					<th class=\"algnRight5\">Quantity</th>
					<th class=\"algnRight10\">Unit Price</th>
					<th class=\"algnRight10\">Price</th>
					<th class=\"algnCenter\">Remove</th>
				</tr>";		
				showCartProducts();
    	}

	
	
    }

    function showCartProducts(){	

    global $totalQuantity, $totalPrice;	

    foreach ($_SESSION["cart"] as $key => $value){
    	$product=json_decode($value);
        $productPrice = $product->quantity*$product->price;
        	
			echo 
			"<tr>
			<td>$product->name</td>		
			<td><img src= $product->image class=\"product-image\" /></td>
			<td>$product->id</td>
			<td class=\"algnRight\">
				<form method = \"POST\">
					<input type=\"number\" value=\"$product->quantity\" placeholder input-type=\"numeric\" name=\"quantity\">
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
			<td colspan=\"5\" align=\"right\">Total:</td>
			<td align=\"right\" colspan=\"5\"><strong>$ $totalPrice</strong></td>
		</tr>";

    }

    


?>