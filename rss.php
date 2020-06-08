<?php
include 'header.php';
?>

<div class="testbox">
	<h5 id="title">RSS FEED</h5>
	<hr />
</div>

<div class="rss-list">
	<ul class="rss">
		<li>
			<a href="./phpfiles/rssContent.php?page=all">All products</a>
		</li>
		<li class="margin">
			<a href="./phpfiles/rssContent.php?page=mv">Most Viewed Products</a>
		</li>
		<li class="margin">
			<a href="./phpfiles/rssContent.php?page=mb">Most Bought Products</a>
		</li>
		<li class="margin">
			<a href="./phpfiles/rssContent.php?page=male">Most Popular male products</a>
		</li>
		<li class="margin">
			<a href="./phpfiles/rssContent.php?page=female">Most Popular female products</a>
		</li>
		<li class="margin">
			<a href="./phpfiles/rssContent.php?page=kids">Most Popular kids products</a>
		</li>
	</ul>
</div>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/rss.css" />

</html>