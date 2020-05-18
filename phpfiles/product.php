<?php
require_once 'dbConnection.php';

$sql = "UPDATE products SET viewed_by = viewed_by + 1 WHERE id_product = " . $_GET["product_id"] . ";";
$result = mysqli_query($conn, $sql);

$data = null;
if(isset($_POST["add-to-cart"])){
    addToCart($_POST["quantity"]);
}



function showProduct() {
    global $conn;

    $sql = "SELECT * FROM Products WHERE id_product = " . $_GET["product_id"] . ";";
    $result = mysqli_query($conn, $sql);
    $numOfRows = mysqli_num_rows($result);

    if ($numOfRows == 1) {
        global $data;

        $row = mysqli_fetch_assoc($result);
        echo
        "<div class=\"product-img\">
            <img src=\"" . $row["image_path"] . "\" alt=\"#\" />
        </div>";

        $data = $row;
    } else {
        echo "Error!";
        /* Error Handling */
    }



}

function addToCart($quantity) {
    global $conn;
    if(!empty($_POST["quantity"])) {
        $sql= "SELECT * FROM Products WHERE id_product='" . $_GET["product_id"] . "'";
        $result = mysqli_query($conn, $sql);
        $productDetails=mysqli_fetch_assoc($result);

            


        if(!empty($_SESSION["cart"][$_GET["product_id"]]))
        {
            $product=json_decode($_SESSION["cart"][$_GET["product_id"]]);
            $product->quantity += $quantity;
            $_SESSION["cart"][$_GET["product_id"]]=json_encode($product);
        }
        else{
            $product = (object)[];
            $product->id =  $productDetails["id_product"];
            $product->name = $productDetails["name"];
            $product->price = $productDetails["price"];
            $product->quantity = $quantity;
            $product->image = $productDetails["image_path"];

            $product=json_encode($product);
            
            $_SESSION["cart"][$_GET["product_id"]]=$product;
        }
    
    }
}



?>

