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

<?php
include "footer.php";
?>

</body>

<link rel="stylesheet" type="text/css" href="styles/orders.css" />

</html>