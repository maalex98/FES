<?php
require_once 'phpfiles/startSession.php';
include 'header.php'
?>

<div class="testbox">
	<h5 id="title">Edit Profile</h5>
	<hr />
</div>

<form method="POST" action="phpfiles/editProfile.php" class="form-container">
    <div class="form-group">
        <p>Edit Profile Picture</p>
        <input type="file" name="profile"><br />
        <input type="submit" name="updateImage" value="Update" class="button"><br />
    </div>

    <div class="form-group">
        <p>Edit Username</p>
        <input type="text" name="username" placeholder="Username"><br />
        <input type="submit" name="updateUsername" value="Update" class="button"><br />
    </div>

    <div class="form-group">
        <p>Edit Email Address</p>
        <input type="text" name="email" placeholder="Email"><br />
        <input type="submit" name="updateEmail" value="Update" class="button"><br />
    </div>

    <div class="form-group">
        <p>Edit Country</p>
        <input type="text" name="country" placeholder="Country"><br />
        <input type="submit" name="updateCountry" value="Update" class="button"><br />
    </div>

    <div class="form-group">
        <p>Edit Password</p>
        <input type="password" name="password" placeholder="Password"><br />
        <input type="submit" name="updatePassword" value="Update" class="button">
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