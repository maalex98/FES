<?php
include "header.php";
include "./phpfiles/cart.php"
?>

<div class="testbox">
    <h5 id="title">Ready to Buy It?</h5>
    <hr />
</div>


<div id="cart-content">
		<?php showCart() ?>
		</tbody>
	</table>
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

<link rel="stylesheet" type="text/css" href="styles/cart.css" />

</html>