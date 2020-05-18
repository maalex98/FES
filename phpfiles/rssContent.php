
<?php
require_once 'dbConnection.php';
    echo "<rss version='2.0' xmlns:atom='http://www.w3.org/2005/Atom'>\n";
    echo "<channel>\n";


    if($_GET["page"] == "mv"){

        echo "<title>Most Viewed Products</title>\n";
        echo "<description>The most viewed products on our website</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products ORDER BY viewed_by desc LIMIT 10;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<gender>".$row["gender"]."</gender>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }

        echo "</channel>\n";
        echo "</rss>\n";
    }
    else if($_GET["page"] == "mb"){

        echo "<title>Most Bought Products</title>\n";
        echo "<description>The most bought products on our website</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products ORDER BY bought_by desc LIMIT 10;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<gender>".$row["gender"]."</gender>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }
        
        echo "</channel>\n";
        echo "</rss>\n";
    }
    else if($_GET["page"] == "all"){

        echo "<title>Most Bought Products</title>\n";
        echo "<description>All our products</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<gender>".$row["gender"]."</gender>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }
        
        echo "</channel>\n";
        echo "</rss>\n";
    }else if($_GET["page"] == "male"){

        echo "<title>Most Popular Male Products</title>\n";
        echo "<description>The most popular male products from our e-Shop</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products where gender = 'male' ORDER BY viewed_by desc LIMIT 10;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }
        
        echo "</channel>\n";
        echo "</rss>\n";
    }else if($_GET["page"] == "female"){

        echo "<title>Most Popular Female Products</title>\n";
        echo "<description>The most popular female products from our e-Shop</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products where gender = 'female' ORDER BY viewed_by desc LIMIT 10;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }
        
        echo "</channel>\n";
        echo "</rss>\n";
    }
    else if($_GET["page"] == "kids"){

        echo "<title>Most Popular kids Products</title>\n";
        echo "<description>The most popular kids products from our e-Shop</description>\n";
        echo "<link>http://127.0.0.1</link>\n";

        $sql = "SELECT * FROM products where gender = 'kids' ORDER BY viewed_by desc LIMIT 10;";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<item>\n";
            echo "<name>".$row["name"]."</name>\n";
            echo "<type>".$row["type"]."</type>\n";
            echo "<description>".$row["description"]."</description>\n";
            echo "<price>".$row["price"]."</price>\n";
            echo "<product_link>http://127.0.0.1/product.php?product_id=".$row["id_product"]."</product_link>\n";
            echo "</item>\n";
        }
        
        echo "</channel>\n";
        echo "</rss>\n";
    }

?>