<?php
include 'header.php';
?>

<div class="testbox">
	<h5 id="title">Welcome to our Fashion e-Shop!</h5>
	<hr />
</div>

<section>
	<h2 class="index-h2">
		<!-- Welcome to our Fashion e-Shop! -->
	</h2>
	<div class="gender">
		<div class="gender-box">
			<p>Men</p>
			<a href="shop.php?gender=men">
				<img class="image" src="images/men.jpg">
			</a>
		</div>

		<div class="gender-box">
			<p>
				Women
			</p>
			<a href="shop.php?gender=women">
				<img class="image" src="images/women.jpg">
			</a>
		</div>

		<div class="gender-box">
			<p>
				Kids
			</p>
			<a href="shop.php?gender=kids">
				<img class="image" src="images/kids.jpg">
			</a>
		</div>
	</div>
</section>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/gallery.css" />

</html>