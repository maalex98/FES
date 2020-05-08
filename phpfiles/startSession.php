<?php

session_start();

if (isset($_SESSION['login'])) {

	require_once 'phpfiles/dbConnection.php';

	$sql = "SELECT * FROM users where username='" . $_SESSION['login'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if (empty($row["profileImage"])) {
		$profile = "user.png";
	}

	$message = "
	<div class=\"dropdown\">
		<button class=\"dropbtn\">
			<a style='border: 2px solid ; border: 30px;'>
				<img src='images/" . $profile . "' width='40' height='30' align='middle'>" . $_SESSION['login'] . "
			</a>
		</button>
		<div class=\"dropdown-content\">
			<div class=\"row_submenu\">
				<div class=\"column_submenu\">
					<a href=\"profile.php\">My Profile</a>
				</div>
				<div class=\"column_submenu\">
					<a href=\"orders.php?\">My Orders</a>
				</div>
			</div>
		</div>
	</div>
	<a style='border: 2px solid ; border: 30px;' href='cart.php'>
		<img src='images/cart.png' width='40' height='30' align='middle'> Cart
	</a>
	<a href='phpfiles/logout.php?logout'>Logout</a>";

	$old_name = $_SESSION['login'];
} else {
	$message = "<a href='login.php'>
					<p>Login</p>
				</a>";
}

?>