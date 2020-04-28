<?php
include 'header.php';
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

		<span class="error">
			<?php
			if (@$_GET['LoginR'] == true) {
			?>
				<div>
					<h4><?php echo $_GET['LoginR'] ?></h4>
				</div>
			<?php
			}
			?>

			<?php
			if (@$_GET['InvalidLogin'] == true) {
			?>
				<div>
					<?php echo $_GET['InvalidLogin'] ?>
				</div>
			<?php
			}
			?>
		</span>

		<a href="register.php">Create Account</a>
	</form>
</div>

<footer>
	<div class="share">
		<div class="share-content">
			<p>FOLLOW US</p>

			<a class="share-logo" href="https://www.facebook.com">
				<i class="fa fa-facebook-square"></i>
			</a>

			<a class="share-logo" href="https://www.twitter.com">
				<i class="fa fa-twitter-square"></i>
			</a>

			<a class="share-logo" href="https://www.instagram.com">
				<i class="fa fa-youtube-square"></i>
			</a>

			<a class="share-logo" href="https://www.instagram.com">
				<i class="fa fa-instagram"></i>
			</a>
		</div>
	</div>
</footer>
</body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />

</html>
