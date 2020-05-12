<?php
	session_start();

	if (isset($_POST['signin'])) {
		require_once 'dbConnection.php';

		if (isset($_POST['your_name']) && isset($_POST['your_pass'])) {
			$username = $_POST['your_name'];
			$password = $_POST['your_pass'];

			$sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
			$result = mysqli_query($conn,$sql);
			$resultNumberRows = mysqli_num_rows($result);

			if ($resultNumberRows == 1) {
				$row = mysqli_fetch_assoc($result);

					$_SESSION['id_user'] = $row["id_user"];
					$_SESSION['login'] = $username;
					$_SESSION['cart']= array();
					header("location:../index.php");
			}
			else {
				header("location:../login.php?InvalidLogin=Invalid username or password!");
			}
		}
	}
	else {
		exit();
	}
?>
