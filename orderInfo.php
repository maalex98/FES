<?php
include "header.php";
include "./phpfiles/orderInfo.php"
?>

<?php
if ((null != $userData) && !empty($_SESSION["cart"])) {
?>

<div class="testbox">
    <h5 id="title">Almost Ready... Please Confirm The Delivery Address!</h5>
    <hr />
</div>

<form method="POST" action="phpfiles/orderInfo.php" class="form-container">
    <div class="form-group">
        <p>Enter The Delivery Address</p>
        <?php
            echo "<input type=\"text\" name=\"address\" placeholder='".$userData["address"]."' value='".$userData["address"]."'><br>";
        ?>
    </div>

	<div class="form-group">
	    <p>Enter your Phone Number</p>
	    <?php
	         echo "<input type=\"text\" name=\"phone-number\"><br>";
	    ?>
	</div>

    <div class="form-group">
        <p><b>Note: Only Cash on Delivery Payment is Supported!</b></p>
    </div>

    <div class="form-group">
        <input type="submit" name="placeOrder" value="Place Order" class="button">
    </div>

    <p class="error">
        <?php
            showError();
        ?>
    </p>
</form>

<?php
} else {
?>

<div class="testbox">
    <h5 id="title">Nothing here...</h5>
    <hr />
</div>

<div class="cart-content">
    <div class="no-records">You cart is Empty!<br><br>
        <a href="shop.php" class="empty-cart">Select something from the shop</a>
    </div>
</div>

<?php
}

include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/orderInfo.css" />

</html>