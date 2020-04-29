<?php
include 'header.php';
include './phpfiles/shop.php';
?>

<div class="testbox">
	<h5 id="title">Browse our products!</h5>
	<hr />
</div>
    <?php
      getFilters();
      getProductsFromDatabase();
    ?>
    <div class="shop-content">
    	      <form class="filter-selector">
        <?php
          echo sprintf("<input type=\"hidden\" name=\"gender\" value=\"%s\">", $_GET["gender"]); 
        ?>

        <div class = "selector">
          <button class="collapsible" type="button">Brand</button>
          <div class = "content">
            <input type="radio" name="brand" value="none"> None <br>
            <?php
                filter($allBrands, "brand");
            ?>
          </div>
        </div>

        <div class = "selector">
          <button class="collapsible" type="button">Color</button>
          <div class = "content">
            <input type="radio" name="color" value="none"> None <br>
            <?php
                filter($allColors, "color");
            ?>
          </div>
        </div>

        <div class = "selector">
          <button class="collapsible" type="button">Style</button>
          <div class = "content">
            <input type="radio" name="style" value="none"> None <br>
            <?php
                filter($allStyles, "style");
            ?>
          </div>
        </div>

        <div class = "selector">
          <button class="collapsible" type="button">Trends</button>
          <div class = "content">
            <input type="radio" name="trends" value="none"> None <br>
            <?php
                filter($allTrends, "trends");
            ?>
          </div>
        </div>

        <div class = "selector">
          <button class="collapsible" type="button">Seasons</button>
          <div class = "content">
            <input type="radio" name="season" value="none"> None <br>
            <?php
                filter($allSeasons,"season");
            ?>
          </div>
        </div>

        <input type="submit">

      </form>

      <div class="shop-showcase">
        <?php
          showProducts();
        ?>
      </div>
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
    <script src="./jsfiles/shop.js"> </script>

</html>