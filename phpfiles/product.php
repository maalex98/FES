<?php
require_once 'dbConnection.php';

$data = null;

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
?>