<?php
include 'header.php';
include './phpfiles/shop.php';
?>

<div class="testbox">
    <h5 id="title">Browse Our Products!</h5>
    <hr />
</div>

<?php
getFilters();
getProductsFromDatabase();
?>

<div class="shop-content">
    <form class="filter-selector">
        <?php
        echo sprintf("<input type=\"hidden\" name=\"gender\" value=\"%s\">", isset($_GET["gender"]) ? $_GET["gender"] : "all");
        showFilters();
        ?>
        <input type="submit" value="Apply">
    </form>

    <div class="shop-showcase">
        <?php
        showProducts();
        ?>
    </div>
</div>

<div class="shop-pagination">
    <?php
    showPages();
    ?>
</div>

<?php
include "footer.php";
?>

</body>

<script src="./jsfiles/shop.js"> </script>
<link rel="stylesheet" type="text/css" href="styles/shop.css" />

</html>