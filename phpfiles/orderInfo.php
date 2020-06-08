<?php
require_once "dbConnection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userData = null;

if (isset($_SESSION["username"])) {
    $sql = "SELECT * FROM users where username='" . $_SESSION["username"] . "'";
    $result = mysqli_query($conn, $sql);

    $numOfRows = mysqli_num_rows($result);

    if ($numOfRows == 1) {
        $row = mysqli_fetch_assoc($result);
        $userData = $row;
    }
}

if (isset($_POST["placeOrder"])) {
    if (isset($_POST["address"]) && !empty($_POST["address"])) {
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

            $sql = "UPDATE products SET bought_by = bought_by + ".$product->quantity.", stock = stock - ". $product->quantity ." WHERE id_product = " . $product->id . ";";
            $result = mysqli_query($conn, $sql);

            $price += $product->price * $product->quantity;
        }

        $sql = "INSERT INTO Orders (id_user, ids_products, quantities, total_price, status, address) VALUES ('".$_SESSION["id_user"]."', '".$productsIds."', '".$quantities."', '".$price."', '".$status."', '".$_POST["address"]."');";

        $result = mysqli_query($conn, $sql);

        if (false == $result) {
            echo mysqli_error($conn);
        }

        unset($_SESSION["cart"]);

        header("location:../index.php");
    } else {
        header("location:../orderInfo.php?error=You must enter the delivery address!");
    }
}

function showError() {
	if (isset($_GET["error"])) {
		echo $_GET["error"];
	}
}

?>