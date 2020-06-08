<?php
include "header.php";
include "phpfiles/login.php"
?>

<div class="testbox">
	<h5 id="title">Login</h5>
	<hr />
</div>

<div class="form-wrapper">
	<div class="register-image">
		<img src="images/register.png" alt="sing up image" />
	</div>

	<form method="POST" action="phpfiles/login.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="your_name">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="your_pass">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="signin">Log in</button>
		</div>

		<p class="error">
			<?php
				showError();
			?>
		</p>

		<a href="register.php">Create Account</a>
	</form>
</div>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/account.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />

</html>