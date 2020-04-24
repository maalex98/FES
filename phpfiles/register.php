<?php
	if (isset($_POST['register'])) {
		require 'dbConnection.php';

		if (isset($_POST['username']) && isset($_POST['password']) &&
			isset($_POST['firstname']) && isset($_POST['lastname']) &&
			isset($_POST['email']) && isset($_POST['repeatpassword'])) {

			$name = $_POST['firstname'];
			$surname = $_POST['lastname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repeatPassword = $_POST['repeatpassword'];
			$typeUser = "user";

			$sql = "SELECT * FROM users WHERE username = '".$username."'";

			$result = mysqli_query($conn, $sql);
			$resultNumberRows = mysqli_num_rows($result);

			if ($resultNumberRows == 1) {
				header("location:../register.php?UserExist=User already exists!");
			}
			else {
				if ($password != $repeatPassword) {
					header("location:../register.php?InvalidPass=Incorrect password! Try again!");
				}
				else {
					$sql = "INSERT INTO users (username, password, firstname, lastname, typeUser, email) VALUES ('".$username."','".$password."', '".$name."','".$surname."','".$typeUser."','".$email."')";

					$result = mysqli_query($conn, $sql);

					if ($result) {
						header("location:../login.php?LoginR=Registration complete! You can Login now.");
					} else {
						header("location:../register.php?UserExist=Cannot create account!");
					}

					mysqli_close($conn);
				}
			}
		}
	}
	else {
		exit();
	}
?>
