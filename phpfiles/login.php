<?php
require_once "dbConnection.php";

if (isset($_POST["signin"])) {

	if (!empty($_POST["your_name"]) && !empty($_POST["your_pass"])) {

		$sql = "SELECT * FROM Users WHERE username = '". $_POST["your_name"] ."';";
		$result = mysqli_query($conn, $sql);
		$resultNumberRows = mysqli_num_rows($result);

		if ($resultNumberRows == 1) {

			$row = mysqli_fetch_assoc($result);

			if (true == password_verify($_POST["your_pass"], $row["password"])) {

				session_start();

				$_SESSION["id_user"] = $row["id_user"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["cart"] = array();

				if ($row["usertype"] == "admin") {
					$_SESSION["admin"] = true;
				} else {
					$_SESSION["admin"] = false;
				}

				header("location:../index.php");
			} else {
				header("location:../login.php?error=Invalid username or password!");
			}
		} else {
			header("location:../login.php?error=Invalid username or password!");
		}
	}
}

function showError() {
	if (isset($_GET["error"])) {
		echo $_GET["error"];
	} else if (isset($_GET["info"])) {
		echo $_GET["info"];
	}
}

?>
