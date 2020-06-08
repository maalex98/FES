<?php
require_once 'dbConnection.php';

function showContent() {
    if (isset($_GET["id"])) {
        global $conn;

        $sql = "SELECT * FROM Orders WHERE id_order = " . $_GET["id"] . ";";
        $result = mysqli_query($conn, $sql);

        if ($result == true) {
            $numOfRows = mysqli_num_rows($result);

            if (1 == $numOfRows) {
                echo "
                    <table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
                        <tbody>
                            <tr>
                                <th class=\"algnCenter hideName\">Name</th>
                                <th class=\"algnLeft\">Image</th>
                                <th class=\"algnLeft\">Quantity</th>
                                <th class=\"algnLeft\">Unit Price</th>
                                <th class=\"algnLeft\">Price</th>
                            </tr>";

                showOrder($result);

                echo "</tbody></table>";
            } else {
                echo "Error";
            } 
        } else {
            echo mysqli_error($conn);
        }
    }
}

function showOrder($sqlResult) {
    global $conn;

    $row = mysqli_fetch_assoc($sqlResult);
    $idsProducts = explode("-", $row["ids_products"]);
    $quantities = explode("-", $row["quantities"]);

    $sql = "SELECT * FROM Products WHERE id_product = " . $idsProducts[0];
    
    for ($it = 1; $it < count($idsProducts); $it = $it + 1) {
        $sql = $sql . " OR id_product = " . $idsProducts[$it];
    }

    $sql = $sql . ";";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        $numOfRows = mysqli_num_rows($result);

        if ($numOfRows == count($idsProducts)) {
            $rowNum = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                        <td class=\"algnCenter hideName\">".$row["name"]."</td>
                        <td><img src= ".$row["image_path"]." class=\"product-image\" /></td>
                        <td class=\"algnLeft\">".$quantities[$rowNum]."</td>
                        <td  class=\"algnLeft\">".$row["price"]."$</td>
                        <td  class=\"algnLeft\">".$row["price"] * $quantities[$rowNum]."$</td>
                    </tr>
                    ";

                $rowNum += 1;
            }
        }
    } else {
        echo mysqli_error($conn);
    }
}

?>