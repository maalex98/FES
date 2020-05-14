<?php
include 'header.php';
include "./phpfiles/adminController.php"
?>

<div class="testbox">
	<h5 id="title">Admin Interface</h5>
	<hr />
</div>

<div class="admin">

	<div class="admin-menu">
		<a href="admin.php?page=users">Users</a>
		<a href="admin.php?page=products">Products</a>
		<a href="admin.php?page=orders">Orders</a>
	</div>
	<div class="admin-content">
		<?php showAdminContent() ?>
	</div>
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

			<a class="share-logo" href="https://www.youtube.com">
				<i class="fa fa-youtube-square"></i>
			</a>

			<a class="share-logo" href="https://www.instagram.com">
				<i class="fa fa-instagram"></i>
			</a>
		</div>
	</div>
</footer>

</body>

<link rel="stylesheet" type="text/css" href="styles/admin.css" />

</html>