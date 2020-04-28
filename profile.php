<?php
require_once 'phpfiles/startSession.php';
include 'header.php'
?>

<div class="testbox">
	<h5 id="title">Edit Profile</h5>
    <hr />
    
    <?php
    if (@$_GET["IncorrectPassword"] == true) {
    ?>
        <div id="err">
            <?php echo $_GET["IncorrectPassword"] ?>
        </div>
    <?php
    }
    if (@$_GET["PasswordMismatch"] == true) {
    ?>
        <div id="err">
            <?php echo $_GET["PasswordMismatch"] ?>
        </div>
    <?php
    }
    if (@$_GET["NoSession"] == true) {
    ?>
        <div id="err">
            <?php echo $_GET["NoSession"] ?>
        </div>
    <?php
    }
    if (@$_GET["NoPassword"] == true) {
    ?>
        <div id="err">
            <?php echo $_GET["NoPassword"] ?>
        </div>
    <?php
    }
    ?>
</div>

<form method="POST" action="phpfiles/editProfile.php" class="form-container">
    <div class="form-group">
        <p>Edit Username</p>
        <input type="text" name="username" placeholder="Username"><br />
    </div>

    <div class="form-group">
        <p>Edit Email</p>
        <input type="text" name="email" placeholder="Email"><br />
    </div>

    <div class="form-group">
        <p>Edit Country</p>
        <input type="text" name="country" placeholder="Country"><br />
    </div>

    <div class="form-group">
        <p>Edit Password</p>
        <input type="password" name="password" placeholder="Password"><br />
        <input type="password" name="confirm-password" placeholder="Confirm Password"><br />
    </div>

    <div class="form-group">
        <p>Type Your Current Password in Order to Update the Profile !</p>
        <input type="password" name="current-password" placeholder="Current Password"><br />
        <input type="submit" name="commit" value="Update" class="button">
    </div>
</form>

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
</html>