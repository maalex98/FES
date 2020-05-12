<?php
require_once 'dbConnection.php';

global $conn;





function showAdminContent(){
	global $conn;

	if(!empty($_GET["page"])){
		if($_GET["page"] == "users" && !empty($_GET["id"])){
			$sql = "DELETE FROM Users where id_user = ".$_GET["id"].";";
			$result = mysqli_query($conn, $sql);
		}
		else if($_GET["page"] == "products" && !empty($_GET["id"])){
			$sql = "DELETE FROM Products where id_product = ".$_GET["id"].";";
			$result = mysqli_query($conn, $sql);
		}
		else if($_GET["page"] == "orders" && !empty($_GET["id"])){
			$sql = "DELETE FROM Orders where id_order = ".$_GET["id"].";";
			$result = mysqli_query($conn, $sql);
		}

		if($_GET["page"] == "users"){
			showUsers();
		}
		else if($_GET["page"] == "products"){
			showProducts();
		}
		else if($_GET["page"] == "orders"){
			showOrders();
		}
	}
}

function showUsers(){
	global $conn;
	echo "
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th class=\"algnLeft hideName\">id_user</th>
					<th class=\"algnLeft\">Username</th>
					<th class=\"algnRight5\">First Name</th>
					<th class=\"algnRight10\">Last Name</th>
					<th class=\"algnRight10\">Email</th>
					<th class=\"algnCenter\">User Type</th>
					<th class=\"algnCenter\"></th>
				</tr>";
	$sql = "SELECT * FROM Users";
	$result = mysqli_query($conn, $sql);
    
    if ($result == true) {
        $numOfRows = mysqli_num_rows($result);
            if (0 != $numOfRows) {
            	while ($row = mysqli_fetch_assoc($result)) {
            		echo
						"<tr>
						<td>".$row["id_user"]."</td>		
						<td>".$row["username"]."</td>
						<td>".$row["firstname"]."</td>
						<td>".$row["lastname"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["typeUser"]."</td>
						<td><a href=\"admin.php?page=users&id=".$row["id_user"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a></td>
						</tr>";
            	}
          	} 
    }
echo "</tbody></table>";
}

function showProducts(){
	global $conn;
	echo "
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th class=\"algnLeft hideName\">id_product</th>
					<th class=\"algnLeft\">type</th>
					<th class=\"algnLeft\">name</th>
					<th class=\"algnRight5\">price</th>
					<th class=\"algnRight10\">image_path</th>
					<th class=\"algnRight10\">gender</th>
					<th class=\"algnCenter\">event</th>
					<th class=\"algnCenter\">season</th>
					<th class=\"algnCenter\">style</th>
					<th class=\"algnCenter\">brand</th>
					<th class=\"algnCenter\">color</th>
					<th class=\"algnCenter\">trends</th>
				</tr>";
	$sql = "SELECT * FROM Products";
	$result = mysqli_query($conn, $sql);
    
    if ($result == true) {
        $numOfRows = mysqli_num_rows($result);
            if (0 != $numOfRows) {
            	while ($row = mysqli_fetch_assoc($result)) {
            		echo
						"<tr>
						<td>".$row["id_product"]."</td>		
						<td>".$row["type"]."</td>
						<td>".$row["name"]."</td>
						<td>".$row["price"]."</td>
						<td>".$row["image_path"]."</td>
						<td>".$row["gender"]."</td>
						<td>".$row["event"]."</td>
						<td>".$row["season"]."</td>
						<td>".$row["style"]."</td>
						<td>".$row["brand"]."</td>
						<td>".$row["color"]."</td>
						<td>".$row["trends"]."</td>
						<td><a href=\"admin.php?page=products&id=".$row["id_product"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a></td>
						</tr>";
            	}
          	} 
    }
echo "</tbody></table>";

}

function showOrders(){
	global $conn;
	echo "
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th class=\"algnLeft hideName\">id_order</th>
					<th class=\"algnLeft\">id_user</th>
					<th class=\"algnRight5\">ids_products</th>
					<th class=\"algnRight10\">quantities</th>
					<th class=\"algnRight10\">status</th>
					<th class=\"algnCenter\">total_price</th>
					<th class=\"algnCenter\"></th>
				</tr>";
	$sql = "SELECT * FROM Orders";
	$result = mysqli_query($conn, $sql);
    
    if ($result == true) {
        $numOfRows = mysqli_num_rows($result);
            if (0 != $numOfRows) {
            	while ($row = mysqli_fetch_assoc($result)) {
            		echo
						"<tr>
						<td>".$row["id_order"]."</td>		
						<td>".$row["id_user"]."</td>
						<td>".$row["ids_products"]."</td>
						<td>".$row["quantities"]."</td>
						<td>".$row["status"]."</td>
						<td>".$row["total_price"]."</td>
						<td><a href=\"admin.php?page=orders&id=".$row["id_order"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a></td>
						</tr>";
            	}
          	} 
    }
echo "</tbody></table>";
}

?>