<?php
require_once 'phpfiles/startSession.php';
require_once 'phpfiles/orders.php';
include 'header.php';
?>

<div class="testbox">
    <h5 id="title">Preview Your Orders!</h5>
    <hr />
</div>

<div class="orders-content">
    <?php
    showContent();
    ?>
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

<link rel="stylesheet" type="text/css" href="styles/orders.css" />

</html>