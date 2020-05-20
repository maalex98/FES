<?php
require "dbConnection.php";

if (isset($_POST["register"])) {

	if (!empty($_POST["username"]) && !empty($_POST["email"]) &&
		!empty($_POST["firstname"]) && !empty($_POST["lastname"]) &&
		!empty($_POST["password"]) && !empty($_POST["repeatpassword"]) &&
		!empty($_POST["country"]) && !empty($_POST["address"])) {

		if ($_POST["password"] == $_POST["repeatpassword"]) {

			$sql = "SELECT * FROM Users WHERE username = '" . $_POST["username"] . "';";
			$result = mysqli_query($conn, $sql);
			$resultNumberRows = mysqli_num_rows($result);

			if ($resultNumberRows == 0) {
				$passwordMd5 = password_hash($_POST["password"], PASSWORD_DEFAULT);
				$userType = "user";

				$sql = "INSERT INTO users (username, password, firstname, lastname, email, country, address, usertype)
						VALUES ('" . $_POST["username"] . "', '" . $passwordMd5 . "', '" . $_POST["firstname"] . "',
						'" . $_POST["lastname"] . "', '" . $_POST["email"] . "', '" . $_POST["country"] . "',
						'" . $_POST["address"] . "', '" . $userType . "');";

				$result = mysqli_query($conn, $sql);

				if ($result == true) {
					header("location:../login.php?info=Registration complete! You can Login now.");
				} else {
					header("location:../register.php?error=Cannot create account!");
				}
			} else {
				header("location:../register.php?error=User already exists!");
			}
		} else {
			header("location:../register.php?error=Passwords Mismatch!");
		}
	} else {
		header("location:../register.php?error=Please Complete All Fields!");
	}
}

function showError() {
	if (isset($_GET["error"])) {
		echo $_GET["error"];
	}
}
