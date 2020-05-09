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
                            <th class=\"algnLeft\">Show Order</th>
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
            <td class=\"algnCenter\">".$row["id_order"]."</td>		
            <td  class=\"algnCenter\">".$row["total_price"]."$</td>
            <td  class=\"algnLeft\">
                <p class = \"hideStatus\">".ucfirst($row["status"])."</p>
                <ol class=\"progtrckr\" data-progtrckr-steps=\"5\">
                    <li class=\"progtrckr-done\">Order Processing</li><!--";

        if (($row["status"] == "processed") || ($row["status"] == "shipped") || ($row["status"] == "delivered")) {
            echo "--><li class=\"progtrckr-done\">Order Processed</li><!--";
        } else {
            echo "--><li class=\"progtrckr-todo\">Order Processed</li><!--";
        }
        
        if (($row["status"] == "shipped") || ($row["status"] == "delivered")) {
            echo "--><li class=\"progtrckr-done\">Shipped to Courier</li><!--";
        } else {
            echo "--><li class=\"progtrckr-todo\">Shipped to Courier</li><!--";
        }

        if ($row["status"] == "delivered") {
            echo "--><li class=\"progtrckr-done\">Delivered</li>";
        } else {
            echo "--><li class=\"progtrckr-todo\">Delivered</li>";
        }

        echo
            "</ol>
            </td>
            <td style=\"text-align:left;\"><a href=\"order.php?id=".$row["id_order"]." \"><button class=\"button\">Show Order</button></a></td>
            </tr>";
    }
}
?>