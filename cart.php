<?php
include "header.php";
include "./phpfiles/cart.php"
?>

<div class="testbox">
    <h5 id="title">Ready to Buy It?</h5>
    <hr />
</div>

<div class="cart-content">
    <?php showCart() ?>
</div>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/cart.css" />

</html>