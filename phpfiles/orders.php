<?php
require_once 'dbConnection.php';

function showContent() {
    global $conn;

    $sql = "SELECT * FROM Orders WHERE id_user = " . $_SESSION["id_user"] . ";";
    $result = mysqli_query($conn, $sql);
    
    if ($result == true) {
        $numOfRows = mysqli_num_rows($result);

        if (0 == $numOfRows) {
            echo 
                "<div class=\"no-records\">No Orders Right Here...<br><br>
		    	    <a href=\"./shop.php\" class=\"empty-cart\">You can order something from the Shop!</a>
		    	</div>";
        } else {
            echo "
                <table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
                    <tbody>
                        <tr>
                            <th class=\"algnCenter\">Order Number</th>
                            <th class=\"algnCenter\">Total Price</th>
                            <th class=\"algnLeft\">Status</th>
                            <th class=\"algnCenter\">Show Order</th>
                        </tr>";
            showOrders($result);
            echo "</tbody></table>";
        }
    } else {
        echo mysqli_error($conn);
    }
}

function showOrders($sqlResult) {
    while ($row = mysqli_fetch_assoc($sqlResult)) {
        echo
            "<tr>
            <td class=\"algnCenter\">'".$row["id_order"]."'</td>		
            <td  class=\"algnCenter\">'".$row["total_price"]."'</td>
            <td  class=\"algnLeft\">'".$row["status"]."'</td>
            <td style=\"text-align:center;\"><a href=\"order.php?id='".$row["id_order"]."' \" class=\"btnRemoveAction\"><img class=\"remove-button\" src=\"./images/delete.png\"></a></td>
            </tr>";
    }
}
?>