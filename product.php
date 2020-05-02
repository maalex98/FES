<?php
include "header.php";
include "./phpfiles/product.php"
?>

<div class="testbox">
    <h5 id="title">Wanna' Buy It? Get It While It's Hot!</h5>
    <hr />
</div>

<div class="show-product">
    <?php
    showProduct();
    ?>
    <div class="product-info">
        <?php
        if ($data != null)
        {
        ?>
        <h2>
            <?php
            echo $data["name"] . " (" . ucfirst($data["gender"]) . ") - " .  $data["brand"] . " - " . ucfirst($data["color"]);
            ?>
        </h2>
        <h2>
            <?php
            echo "Price: " . $data["price"] . "$";
            ?>
        </h2>
        <input type="number" value="1" placeholder input-type="numeric">
        <input type="submit" value="Add To Cart">
        <h4>
            <?php
            echo "Description";
            ?>
        </h4>
        <ul class="product-description">
            <li>
                <?php
                echo "Season - " . ucfirst($data["season"]);
                ?>
            </li>
            <li>
                <?php
                echo "Style - " . ucfirst($data["style"]);
                ?>
            </li>
            <li>
                <?php
                echo "Trend - " . ucfirst($data["trends"]);
                ?>
            </li>
            <li>
                <?php
                echo $data["description"];
                ?>
            </li>
        </ul>
        <?php
        }
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

<link rel="stylesheet" type="text/css" href="styles/product.css" />

</html>