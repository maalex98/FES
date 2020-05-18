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

<br />
<br />
<br />

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

<link rel="stylesheet" type="text/css" href="styles/rss.css" />

</html>