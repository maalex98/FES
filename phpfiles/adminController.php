<?php
require_once "dbConnection.php";

$pageno = 0;
$numOfItemsPerPage = 10;
$total = 0;

function showAdminContent() {
	global $conn;
	global $pageno;

	if (true == $_SESSION["admin"]) {
		if (isset($_GET["pageno"])) {
			$pageno = $_GET["pageno"];
		} else {
			$pageno = 1;
		}
	
		if (!empty($_GET["page"])) {
			if ($_GET["page"] == "users" && !empty($_GET["id"])) {
				$sql = "DELETE FROM Users where id_user = " . $_GET["id"] . ";";
				$result = mysqli_query($conn, $sql);
			} else if ($_GET["page"] == "products" && !empty($_GET["id"])) {
				$sql = "DELETE FROM Products where id_product = " . $_GET["id"] . ";";
				$result = mysqli_query($conn, $sql);
			} else if ($_GET["page"] == "orders" && !empty($_GET["id"])) {
				$sql = "DELETE FROM Orders where id_order = " . $_GET["id"] . ";";
				$result = mysqli_query($conn, $sql);
			}
	
			if ($_GET["page"] == "users") {
				showUsers();
			} else if ($_GET["page"] == "products") {
				showProducts();
			} else if ($_GET["page"] == "orders") {
				showOrders();
			}
		}
	}
}

function showUsers() {
	global $conn;
	global $pageno;
	global $numOfItemsPerPage;
	global $total;

	echo
		"<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th>Id User</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Country</th>
					<th>Address</th>
					<th>Email</th>
					<th>User Type</th>
					<th>Created At</th>
					<th>Actions</th>
					<th>Rank-Up User</th>
				</tr>";

	$sql = "SELECT * FROM Users";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		$numOfRows = mysqli_num_rows($result);

		if (0 != $numOfRows) {
			$it = 0;

			while ($row = mysqli_fetch_assoc($result)) {

				if (($it >= (($pageno - 1) * $numOfItemsPerPage)) &&
            		($it < ($pageno * $numOfItemsPerPage))) {
					echo
						"<tr>
							<td>" . $row["id_user"] . "</td>
							<td>" . $row["username"] . "</td>
							<td>" . $row["firstname"] . "</td>
							<td>" . $row["lastname"] . "</td>
							<td>" . $row["country"] . "</td>
							<td>" . $row["address"] . "</td>
							<td>" . $row["email"] . "</td>
							<td>" . $row["usertype"] . "</td>
							<td>" . $row["created_at"] . "</td>
							<td>
								<a href=\"admin.php?page=users&id=" . $row["id_user"] . " \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
								<a href=\"update.php?page=users&id=" . $row["id_user"] . " \" class=\"btnRemoveAction\"><img class=\"remove-button\">Update</a>
							</td>
							<td>
								<form method=\"POST\" action=\"phpfiles/updateController.php?id_user=" . $row["id_user"] . "\">
									<select name=\"type\" class=\"choices\">
									<option value=\"user\">user</option>
									<option value=\"admin\">admin</option>
									</select>
									<input type=\"submit\" value=\"Update\" name=\"editUserType\">
								</form>
							</td>
						</tr>";
				}

				$it += 1;
			}

			$total = $it;
		}
	}

	echo "</tbody></table>";
}

function showProducts() {
	global $conn;
	global $pageno;
	global $numOfItemsPerPage;
	global $total;

	echo
	    "<table class=\"tbl-cart\" cellpadding=\"3\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th>Type</th>
					<th>Name</th>
					<th>Price</th>
					<th>Image Path</th>
					<th>Gender</th>
					<th>Event</th>
					<th>Season</th>
					<th>Style</th>
					<th>Brand</th>
					<th>Color</th>
					<th>Fabric</th>
					<th>Stock</th>
					<th>Actions</th>
				</tr>";

	$sql = "SELECT * FROM Products";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		$numOfRows = mysqli_num_rows($result);

		$it = 0;

		if (0 != $numOfRows) {
			while ($row = mysqli_fetch_assoc($result)) {
				if (($it >= (($pageno - 1) * $numOfItemsPerPage)) &&
            		($it < ($pageno * $numOfItemsPerPage))) {
					echo
						"<tr>
							<td>" . ucfirst($row["type"]) . "</td>
							<td>" . ucfirst($row["name"]) . "</td>
							<td>" . $row["price"] . "</td>
							<td>" . $row["image_path"] . "</td>
							<td>" . ucfirst($row["gender"]) . "</td>
							<td>" . ucfirst($row["event"]) . "</td>
							<td>" . ucfirst($row["season"]) . "</td>
							<td>" . ucfirst($row["style"]) . "</td>
							<td>" . ucfirst($row["brand"]) . "</td>
							<td>" . ucfirst($row["color"]) . "</td>
							<td>" . ucfirst($row["fabric"]) . "</td>
							<td>" . $row["stock"] . "</td>
							<td>
								<a href=\"update.php?page=products&id=" . $row["id_product"] . " \" class=\"btnRemoveAction\"><img class=\"remove-button\">Update</a>
								<a href=\"admin.php?page=products&id=" . $row["id_product"] . " \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
							</td>
						</tr>";
				}

				$it += 1;
			}
		}

		$total = $it;
	}

	echo
		"<form method=\"POST\" action=\"phpfiles/updateController.php\" class=\"form-container\" enctype=\"multipart/form-data\">
			<td><input type=\"text\" name=\"type\"></td>
			<td><input type=\"text\" name=\"name\"></td>
			<td><input type=\"text\" name=\"price\"></td>
			<td><input type=\"file\" name=\"image_path\"></td>
			<td><input type=\"text\" name=\"gender\"></td>
			<td><input type=\"text\" name=\"event\"></td>
			<td><input type=\"text\" name=\"season\"></td>
			<td><input type=\"text\" name=\"style\"></td>
			<td><input type=\"text\" name=\"brand\"></td>
			<td><input type=\"text\" name=\"color\"></td>
			<td><input type=\"text\" name=\"fabric\"></td>
			<td><input type=\"text\" name=\"stock\"></td>
			<td><input type=\"submit\" name=\"addProduct\" value=\"Add\" class=\"button\">
		</form>";
	echo "</tbody></table>";
}

function showOrders() {
	global $conn;
	global $pageno;
	global $numOfItemsPerPage;
	global $total;

	echo
		"<table class=\"tbl-cart\" cellpadding=\"10\" cellspacing=\"1\">
			<tbody>
				<tr>
					<th>Id_Order</th>
					<th>Id_User</th>
					<th>Ids_Products</th>
					<th>Quantities</th>
					<th>Total Price</th>
					<th>Address</th>
					<th>Phone Number</th>
					<th>Status</th>
					<th>Update Status</th>
					<th>Actions</th>
				</tr>";

	$sql = "SELECT * FROM Orders";
	$result = mysqli_query($conn, $sql);

	if ($result == true) {
		$numOfRows = mysqli_num_rows($result);

		if (0 != $numOfRows) {
			$it = 0;

			while ($row = mysqli_fetch_assoc($result)) {
				if (($it >= (($pageno - 1) * $numOfItemsPerPage)) &&
            		($it < ($pageno * $numOfItemsPerPage))) {
					echo
						"<tr>
							<td>" . $row["id_order"] . "</td>
							<td>" . $row["id_user"] . "</td>
							<td>" . $row["ids_products"] . "</td>
							<td>" . $row["quantities"] . "</td>
							<td>" . $row["total_price"] . "</td>
							<td>" . $row["address"] . "</td>
							<td>" . $row["phone_number"] . "</td>
							<td>" . ucfirst($row["status"]) . "</td>
							
							<td>
								<a href=\"admin.php?page=orders&id=" . $row["id_order"] . " \" class=\"btnRemoveAction\"><img class=\"remove-button\">Delete</a>
							</td>
							<td>
								<form method=\"POST\" action=\"phpfiles/updateController.php?id_order=" . $row["id_order"] . "\">
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

				$it += 1;
			}

			$total = $it;
		}
	}

	echo "</tbody></table>";
}

function showPages() {
	global $pageno;
	global $numOfItemsPerPage;
	global $total;

	if ($pageno > 1) {
		echo "<a href=\"admin.php?page=".$_GET["page"]."&pageno=".($pageno - 1)."\" class=\"previous round\">Previous Page &nbsp &nbsp</a>";
	}

	if ($pageno * $numOfItemsPerPage < $total) {
		echo "<a href=\"admin.php?page=".$_GET["page"]."&pageno=".($pageno + 1)."\" class=\"next round\">Next Page</a>";
	}

	echo "</div>";
}
