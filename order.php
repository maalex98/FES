<?php
require_once 'phpfiles/startSession.php';
require_once 'phpfiles/order.php';
include 'header.php';
?>

<div class="testbox">
    <h5 id="title">Good Ol' Times!</h5>
    <hr />
</div>

<div class="order-content">
    <?php
    showContent();
    ?>
</div>

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/order.css" />

</html>
