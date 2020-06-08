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
            echo $data["name"] . " - " . ucfirst($data["gender"]) . " - " .  $data["brand"] . " - " . ucfirst($data["color"]);
            ?>
        </h2>
        <h2>
            <?php
            echo "Price: " . $data["price"] . "$";
            ?>
        </h2>

        <?php
        if (0 < $data["stock"]) {
        ?>
        <form method = "POST">
            <input type="number" value="1" placeholder input-type="numeric" name="quantity">
            <input type="submit" value="Add To Cart" name="add-to-cart">
        </form>
        <?php
        } else {
        ?>
        <p style="color:red"><b>Out of Stock!</b><p>
        <?php
        }
        ?>
        
        <h4>
            <?php
            echo "Description";
            ?>
        </h4>
        <ul class="product-description">
            <li>
                <?php
                echo "Type - " . ucfirst($data["type"]);
                ?>
            </li>
            <li>
                <?php
                echo "Fabric - " . ucfirst($data["fabric"]);
                ?>
            </li>
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
                echo $data["description"];
                ?>
            </li>
        </ul>
        <?php
        }
        ?>
    </div>
</div>

<?php
include "footer.php";
?>

<link rel="stylesheet" type="text/css" href="styles/product.css" />

</html>