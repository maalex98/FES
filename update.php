<?php
include 'header.php';
include "./phpfiles/updateController.php"
?>

<?php
if (true == $_SESSION["admin"]) {
?>

<div class="testbox">
	<h5 id="title">Admin Interface - Update Form</h5>
	<hr />
</div>

<div class="update">

	<div class="admin-menu">
		<a href="admin.php?page=users">Users</a>
		<a href="admin.php?page=products">Products</a>
		<a href="admin.php?page=orders">Orders</a>
	</div>
	<div class="update-content">
		<?php showUpdateContent() ?>
	</div>
</div>

<?php
} else {
?>

<div class="testbox">
	<h5 id="title">Err @ You're Not Authorized To Access This Page!</h5>
	<hr />
</div>

<?php
}
?>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/update.css" />

</html>