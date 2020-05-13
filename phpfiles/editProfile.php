<?php

session_start();

if (isset($_SESSION['login'])) {
	require_once 'dbConnection.php';

	$old_name = $_SESSION['login'];

	if (isset($_POST["commit"])) {
		if (isset($_POST["current-password"])) {
			if (isset($_SESSION['login'])) {
				$currentPassword = $_POST["current-password"];

				$sql = "SELECT * FROM users where username='" . $_SESSION['login'] . "'";
				$result = mysqli_query($conn, $sql);

				$numOfRows = mysqli_num_rows($result);

				if ($numOfRows == 1) {
					$row = mysqli_fetch_assoc($result);

					if (0 == strcmp($row["password"], $currentPassword)) {
						if (isset($_POST['username'])) {
							$username = $_POST['username'];
							$sql = "UPDATE users SET username='" . $username . "' WHERE username='" . $old_name . "'";
							$_SESSION['login'] = $username;
							mysqli_query($conn, $sql);
						}
			
						if (isset($_POST['country'])) {
							$country = $_POST['country'];
							$sql = "UPDATE users SET country='" . $country . "' WHERE username='" . $old_name . "'";
							mysqli_query($conn, $sql);
						}
			
						if (isset($_POST['email'])) {
							$email = $_POST['email'];
							$sql = "UPDATE users SET email='" . $email . "' WHERE username='" . $old_name . "'";
							mysqli_query($conn, $sql);
						}
			
						if (isset($_POST['password']) && isset($_POST['confirm-password'])) {
							$password = $_POST['password'];
							$confirmPassword = $_POST['confirm-password'];
			
							if (0 == strcmp($password, $confirmPassword)) {
								$sql = "UPDATE users SET pathinfo='" . $password . "' WHERE username='" . $old_name . "'";
								mysqli_query($conn, $sql);
							} else {
								header("location:../profile.php?PasswordMismatch=New Password Mismatch! Try again!");
							}
						}

						header("location:../profile.php");
					} else {
						header("location:../profile.php?IncorrectPassword=Incorrect Password! Try again!");
					}
				} else {
					header("location:../profile.php?NoSession=You Must Login Before Editing the Profile!");
				}
			} else {
				header("location:../profile.php?NoSession=You Must Login Before Editing the Profile!");
			}
		} else {
			header("location:../profile.php?NoPassword=You Must Enter the Current Password Before Editing the Profile!");
		}
	}

	// header("location:../profile.php");
}

?>
