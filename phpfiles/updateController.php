<?php
require_once 'dbConnection.php';

if (true == $_SESSION["admin"]) {
	if (isset($_POST["commitUsers"])) {
		global $conn;
		$sql = "UPDATE users SET username='" . $_POST["username"] . "', firstname='" . $_POST["firstname"] . "', lastname='" . $_POST["lastname"] . "', typeUser='" . $_POST["usertype"] . "', email='" . $_POST["email"] . "' WHERE id_user=" . $_GET["id_user"];
		echo $sql;
		$result = mysqli_query($conn, $sql);
		header("location:../admin.php?page=users");
	}

	if (isset($_POST["editUserType"])) {
		$sql = "UPDATE users SET typeUser = '" . $_POST["type"] . "' WHERE id_user = " . $_GET["id_user"] . ";";
		$result = mysqli_query($conn, $sql);
		header("location:../admin.php?page=users");
	}

	if (isset($_POST["commitProducts"])) {
		global $conn;
		$sql = "UPDATE products SET name='" . $_POST["name"] . "', image_path='" . $_POST["image_path"] . "', price='" . $_POST["price"] . "', gender='" . $_POST["gender"] . "', type='" . $_POST["type"] . "', color='" . $_POST["color"] . "', event='" . $_POST["event"] . "', season='" . $_POST["season"] . "', style='" . $_POST["style"] . "', brand='" . $_POST["brand"] . "', trends='" . $_POST["trends"] . "' WHERE id_product=" . $_GET["id_product"];
		$result = mysqli_query($conn, $sql);
		header("location:../admin.php?page=products");
	}

	if (isset($_POST["commitOrders"])) {
		$sql = "UPDATE orders SET status='" . $_POST["status"] . "' WHERE id_order=" . $_GET["id_order"];
		$result = mysqli_query($conn, $sql);
		header("location:../admin.php?page=orders");
	}

	if (isset($_POST["addProduct"])) {
		$imagePath = "";

		if (isset($_FILES["image_path"]) && isset($_POST["gender"])) {
			$baseDir = $_SERVER["DOCUMENT_ROOT"] . "\\FES\\images\\" . $_POST["gender"] . "\\";
			$imagePath = $baseDir . $_FILES["image_path"]["name"];
			move_uploaded_file($_FILES["image_path"]["tmp_name"], $imagePath);
		}

		$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, trends, description) VALUES ('" . $_POST["type"] . "','" . $_POST["name"] . "', '" . $_POST["price"] . "','" . $imagePath . "','" . $_POST["gender"] . "','" . $_POST["event"] . "' ,'" . $_POST["season"] . "','" . $_POST["style"] . "','" . $_POST["brand"] . "','" . $_POST["color"] . "','" . $_POST["trends"] . "','.')";
		$result = mysqli_query($conn, $sql);
		header("location:../admin.php?page=products");
	}
}

function showUpdateContent() {
	if (!empty($_GET["page"])) {
		if ($_GET["page"] == "users") {
			usersUpdateForm($_GET["id"]);
		} else if ($_GET["page"] == "products") {
			productsUpdateForm($_GET["id"]);
		}
	}
}

function usersUpdateForm($id_user) {
	global $conn;

	$sql = "SELECT * FROM Users where id_user = " . $id_user . ";";
	$result = mysqli_query($conn, $sql);

	if (true == $result) {
		$numOfRows = mysqli_num_rows($result);

		if ($numOfRows == 1) {
			$row = mysqli_fetch_assoc($result);

			echo
				"<form method=\"POST\" action=\"phpfiles/updateController.php?id_user=" . $id_user . "\" class=\"form-container\">
				    <div class=\"form-group\">
				        <p>Username</p>
				        <input type=\"text\" name=\"username\" placeholder=\"" . $row["username"] . "\" value=\"" . $row["username"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>First Name</p>
				        <input type=\"text\" name=\"firstname\" placeholder=\"" . $row["firstname"] . "\" value=\"" . $row["firstname"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>Last Name</p>
				        <input type=\"text\" name=\"lastname\" placeholder=\"" . $row["lastname"] . "\" value=\"" . $row["lastname"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>Email</p>
				        <input type=\"text\" name=\"email\" placeholder=\"" . $row["email"] . "\" value=\"" . $row["email"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>User type</p>
				        <input type=\"text\" name=\"usertype\" placeholder=\"" . $row["typeUser"] . "\" value=\"" . $row["typeUser"] . "\"><br />
				    </div>

				        <input type=\"submit\" name=\"commitUsers\" value=\"Update\" class=\"button\">
				</form>";
		}
	}
}

function productsUpdateForm($id_product) {
	global $conn;

	$sql = "SELECT * FROM Products where id_product = " . $id_product . ";";
	$result = mysqli_query($conn, $sql);

	if (true == $result) {
		$numOfRows = mysqli_num_rows($result);

		if ($numOfRows == 1) {
			$row = mysqli_fetch_assoc($result);

			echo
				"<form method=\"POST\" action=\"phpfiles/updateController.php?id_product=" . $id_product . "\" class=\"form-container\">
				    <div class=\"form-group\">
				        <p>Type</p>
				        <input type=\"text\" name=\"type\" placeholder=\"" . $row["type"] . "\" value=\"" . $row["type"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>Name</p>
				        <input type=\"text\" name=\"name\" placeholder=\"" . $row["name"] . "\" value=\"" . $row["name"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>Price</p>
				        <input type=\"text\" name=\"price\" placeholder=\"" . $row["price"] . "\" value=\"" . $row["price"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>image_path</p>
				        <input type=\"text\" name=\"image_path\" placeholder=\"" . $row["image_path"] . "\" value=\"" . $row["image_path"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>gender</p>
				        <input type=\"text\" name=\"gender\" placeholder=\"" . $row["gender"] . "\" value=\"" . $row["gender"] . "\"><br />
				    </div>


				    <div class=\"form-group\">
				        <p>event</p>
				        <input type=\"text\" name=\"event\" placeholder=\"" . $row["event"] . "\" value=\"" . $row["event"] . "\"><br />
				    </div>


				    <div class=\"form-group\">
				        <p>season</p>
				        <input type=\"text\" name=\"season\" placeholder=\"" . $row["season"] . "\" value=\"" . $row["season"] . "\"><br />
				    </div>


				    <div class=\"form-group\">
				        <p>style</p>
				        <input type=\"text\" name=\"style\" placeholder=\"" . $row["style"] . "\" value=\"" . $row["style"] . "\"><br />
				    </div>


				    <div class=\"form-group\">
				        <p>brand</p>
				        <input type=\"text\" name=\"brand\" placeholder=\"" . $row["brand"] . "\" value=\"" . $row["brand"] . "\"><br />
				    </div>


				    <div class=\"form-group\">
				        <p>color</p>
				        <input type=\"text\" name=\"color\" placeholder=\"" . $row["color"] . "\" value=\"" . $row["color"] . "\"><br />
				    </div>

				    <div class=\"form-group\">
				        <p>trends</p>
				        <input type=\"text\" name=\"trends\" placeholder=\"" . $row["trends"] . "\" value=\"" . $row["trends"] . "\"><br />
				    </div>

				        <input type=\"submit\" name=\"commitProducts\" value=\"Update\" class=\"button\">
				</form>";
		}
	}
}
