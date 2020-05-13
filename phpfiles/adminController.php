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
					<th>id_user</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>User Type</th>
					<th>Actions</th>
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
						<td>
						<a href=\"admin.php?page=users&id=".$row["id_user"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
						<a href=\"update.php?page=users&id=".$row["id_user"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Update</a>
						</td>
						</tr>";
            	}
          	} 
    }
echo "</tbody></table>";
}

function showProducts(){
	global $conn;
	echo "
		<table class=\"tbl-cart\" cellpadding=\"3\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th>id_product</th>
					<th>type</th>
					<th>name</th>
					<th>price</th>
					<th>image_path</th>
					<th>gender</th>
					<th>event</th>
					<th>season</th>
					<th>style</th>
					<th>brand</th>
					<th>color</th>
					<th>trends</th>
					<th>Actions</th>
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
						<td>
						<a href=\"update.php?page=products&id=".$row["id_product"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Update</a>
						<a href=\"admin.php?page=products&id=".$row["id_product"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
						</td>
						</tr>";
            	}
          	} 
    }
    echo
		"<form method=\"POST\" action=\"phpfiles/updateController.php\" class=\"form-container\">
        <td></td>
        <td><input type=\"text\" name=\"type\"></td>
        <td><input type=\"text\" name=\"name\"></td>
        <td><input type=\"text\" name=\"price\"></td>
        <td><input type=\"text\" name=\"image_path\"></td>
        <td><input type=\"text\" name=\"gender\"></td>
        <td><input type=\"text\" name=\"event\"></td>
        <td><input type=\"text\" name=\"season\"></td>
        <td><input type=\"text\" name=\"style\"></td>
        <td><input type=\"text\" name=\"brand\"></td>
        <td><input type=\"text\" name=\"color\"></td>
        <td><input type=\"text\" name=\"trends\"></td>
        <td><input type=\"submit\" name=\"addProduct\" value=\"Add\" class=\"button\">
		</form>";
echo "</tbody></table>";

}

function showOrders(){
	global $conn;
	echo "
		<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th>id_order</th>
					<th>id_user</th>
					<th>ids_products</th>
					<th>quantities</th>
					<th>status</th>
					<th>total_price</th>
					<th>Actions</th>
					<th>Update Status</th>
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
						<td>
							<a href=\"admin.php?page=orders&id=".$row["id_order"]." \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
						</td>
						<td>
							<form method=\"POST\" action=\"phpfiles/updateController.php?id_order=".$row["id_order"]."\">
								<select name=\"status\" class=\"choices\">
								  <option value=\"processing\">processing</option>
								  <option value=\"processed\">processed</option>
								  <option value=\"shipped\">shipped</option>
								  <option value=\"delivered\">delivered</option>
								</select>
								<input type=\"submit\" value=\"Update\" name=\"commitOrders\">
							</form>
						</td>
						</tr>";
            	}
          	} 
    }
echo "</tbody></table>";
}

?>