<?php
include 'header.php';
?>

<div class="main">
	<section class="sign-in">
		<div class="container">
			<div class="signin-content">
				<div class="signin-image">
					<figure>
						<img src="imagini/draw.jpg" alt="sing up image" />
					</figure>
					<a href="createAccount.php" class="signup-image-link">Create an account</a>
				</div>


				<div class="signin-form">
					<?php
					if (@$_GET['LoginR'] == true) {
					?>
						<div>
							<img style="height:15%; width:10%;" src="imagini/good.png" />
							<h4><?php echo $_GET['LoginR'] ?></h4>
						</div>
					<?php
					}
					?>

					<h2 class="form-title">Sign Up</h2>

					<?php
					if (@$_GET['InvalidLogin'] == true) {
					?>
						<div>
							<img style="height:10%; width:5%;" src="imagini/wrong.jpg" />
							<?php echo $_GET['InvalidLogin'] ?>
						</div>
					<?php
					}
					?>

					<form class="register-form" id="login-form" method="POST" action="phpfiles/validate.php">
						<div class="form-group">
							<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
							<input type="text" name="your_name" id="your_name" placeholder="Username" required />
						</div>
						<div class="form-group">
							<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
							<input type="password" name="your_pass" id="your_pass" placeholder="Password" required />
						</div>
						<div class="form-group form-button">
							<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
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

<link rel="stylesheet" href="styles/login.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css" />

</html>