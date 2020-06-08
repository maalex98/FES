<?php

require_once "dbConnection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userData = null;

if (isset($_SESSION["username"])) {
	if (isset($_POST["commit"])) {
		if (isset($_POST["current-password"]) && !empty($_POST["current-password"])) {
			$currentPassword = $_POST["current-password"];

			$sql = "SELECT * FROM users where username='" . $_SESSION["username"] . "'";
			$result = mysqli_query($conn, $sql);

			$numOfRows = mysqli_num_rows($result);

			if ($numOfRows == 1) {
				$row = mysqli_fetch_assoc($result);

				if (true == password_verify($_POST["current-password"], $row["password"])) {
					if (isset($_POST["username"]) && !empty($_POST["username"])) {
						$username = $_POST["username"];
						$sql = "UPDATE users SET username='" . $username . "' WHERE username='" . $_SESSION["username"] . "'";

						if (true == mysqli_query($conn, $sql)) {
							$_SESSION["username"] = $username;
						}
					}

					if (isset($_POST["country"]) && !empty($_POST["country"])) {
						$country = $_POST["country"];
						$sql = "UPDATE users SET country='" . $country . "' WHERE username='" . $_SESSION["username"] . "'";
						mysqli_query($conn, $sql);
					}

					if (isset($_POST["address"]) && !empty($_POST["address"])) {
						$address = $_POST["address"];
						$sql = "UPDATE users SET address='" . $address . "' WHERE username='" . $_SESSION["username"] . "'";
						mysqli_query($conn, $sql);
					}

					if (isset($_POST["email"]) && !empty($_POST["email"])) {
						$email = $_POST["email"];
						$sql = "UPDATE users SET email='" . $email . "' WHERE username='" . $_SESSION["username"] . "'";
						mysqli_query($conn, $sql);
					}

					if (isset($_POST["password"]) && !empty($_POST["password"])) {
						$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

						$sql = "UPDATE users SET password='" . $password . "' WHERE username='" . $_SESSION["username"] . "'";
						mysqli_query($conn, $sql);
					}

					header("location:../profile.php");
				} else {
					header("location:../profile.php?error=Incorrect Password! Try again!");
				}
			}
		} else {
			header("location:../profile.php?error=You Must Enter the Current Password Before Editing the Profile!");
		}
	}
} else {
	header("location:../profile.php");
}

function getUserData() {
	if (isset($_SESSION["username"])) {
		global $conn;
		global $userData;

		$sql = "SELECT * FROM users where username='" . $_SESSION["username"] . "'";
		$result = mysqli_query($conn, $sql);

		$numOfRows = mysqli_num_rows($result);

		if ($numOfRows == 1) {
			$row = mysqli_fetch_assoc($result);
			$userData = $row;
		}
	}
}

function showError() {
	if (isset($_GET["error"])) {
		echo $_GET["error"];
	}
}

?>
