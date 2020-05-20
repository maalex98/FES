<?php

require_once "phpfiles/dbConnection.php";

session_start();

if (isset($_SESSION["username"])) {

	$sql = "SELECT * FROM Users where username='" . $_SESSION["username"] . "';";
	$result = mysqli_query($conn, $sql);

	if (true == $result) {
		$profile = "user.png";

		$row = mysqli_fetch_assoc($result);
	
		$message = 
			"<div class=\"dropdown\">
				<button class=\"dropbtn\">
					<a style='border: 2px solid ; border: 30px;'>
						<img src='images/" . $profile . "' width='40' height='30' align='middle'>" . $_SESSION["username"] . "
					</a>
				</button>
				<div class=\"dropdown-content\">
					<div class=\"row_submenu\">
						<div class=\"column_submenu\">
							<a href=\"profile.php\">My Profile</a>
						</div>
						<div class=\"column_submenu\">
							<a href=\"orders.php?\">My Orders</a>
						</div> ";
	
		if($row["usertype"] == "admin")
			$message = $message . "<div class=\"column_submenu\"><a href=\"admin.php\">Admin Panel </a></div> ";
	
		$message = $message . 
					"</div>
				</div>
			</div>
			<a style='border: 2px solid ; border: 30px;' href='cart.php'>
				<img src='images/cart.png' width='40' height='30' align='middle'> Cart
			</a>
			<a href='phpfiles/logout.php?logout'>Logout</a>";
	
		$old_name = $_SESSION["username"];
	} else {
		echo "errrrr@@@@";
	}
} else {
	$message = "<a href='login.php'>
					<p>Login</p>
				</a>";
}

?>