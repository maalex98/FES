<?php
require_once 'dbConnection.php';

$id = array();
$name = array();
$imagePath = array();
$price = array();
$color = array();
$brand = array();
$stock = array();

$allGenders = array();
$allTypes = array();
$allColors = array();
$allBrands = array();
$allStyles = array();
$allSeasons = array();
$allEvents = array();
$allFabrics = array();

$totalProducts;
$pageno;
$numOfProductsPerPage = 6;

$sql = "";
$whereClause = '';
$stmtFormat = '';
$stmtInfo = array();

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

if (isset($_GET["gender"])) {
    $sql = sprintf("SELECT * FROM Products WHERE gender = '%s';", $_GET["gender"]);
} else {
    $sql = "SELECT * FROM Products;";
}

function getFilters() {
    global $conn;
    global $sql;
    global $allGenders, $allTypes, $allColors, $allBrands, $allStyles, $allSeasons, $allEvents, $allFabrics;

    $result = mysqli_query($conn, $sql);

    $it = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $allGenders[$it] = $row["gender"];
        $allTypes[$it] = $row["type"];
        $allColors[$it] = $row["color"];
        $allBrands[$it] = $row["brand"];
        $allStyles[$it] = $row["style"];
        $allSeasons[$it] = $row["season"];
        $allEvents[$it] = $row["event"];
        $allFabrics[$it] = $row["fabric"];
        $it++;
    }
}

function getProductsFromDatabase() {
    global $sql;
    global $conn;
    global $id, $name, $imagePath, $price, $color, $brand, $stock;
    global $stmtFormat, $whereClause, $stmtInfo;
    global $pageno;
    global $numOfProductsPerPage;
    global $totalProducts;

    checkFilter("gender");
    checkFilter("type");
    checkFilter("brand");
    checkFilter("color");
    checkFilter("style");
    checkFilter("event");
    checkFilter("season");
    checkFilter("fabric");

    $sql = rtrim($sql, ';');
    $sql = $sql . $whereClause;

    $stmt = $conn->prepare($sql);

    if ($stmtFormat != '') {
        $stmt->bind_param($stmtFormat, ...$stmtInfo);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    $it = 0;
    $productCounter = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        if (($it >= (($pageno - 1) * $numOfProductsPerPage)) &&
            ($it < ($pageno * $numOfProductsPerPage))) {
            $id[$productCounter] = $row["id_product"];
            $name[$productCounter] = $row["name"];
            $price[$productCounter] = $row["price"];
            $imagePath[$productCounter] = $row["image_path"];
            $brand[$productCounter] = $row["brand"];
            $color[$productCounter] = $row["color"];
            $stock[$productCounter] = $row["stock"];
            $productCounter++;
        }

        $it++;
    }

    $totalProducts = $it;
}

function checkFilter($filterName) {
    global $stmtFormat, $whereClause, $stmtInfo;

    if (isset($_GET[$filterName]) && $_GET[$filterName] != "none") {
        $whereClause = $whereClause . " AND " . $filterName . "= ?";
        $stmtFormat = $stmtFormat . "s";
        array_push($stmtInfo, $_GET[$filterName]);
    }
}

function mapFilter($filter) {
    global $allGenders, $allTypes, $allColors, $allBrands, $allStyles, $allSeasons, $allEvents, $allFabrics;

    switch ($filter) {
        case "gender": {
            filter($allGenders, $filter);
            break;
        }
        case "type": {
            filter($allTypes, $filter);
            break;
        }
        case "brand": {
            filter($allBrands, $filter);
            break;
        }
        case "color": {
            filter($allColors, $filter);
            break;
        }
        case "style": {
            filter($allStyles, $filter);
            break;
        }
        case "season": {
            filter($allSeasons, $filter);
            break;
        }
        case "event": {
            filter($allEvents, $filter);
            break;
        }
        case "fabric": {
            filter($allFabrics, $filter);
            break;
        }
        default: {
            break;
        }
    }
}

function filter($filterValues, $filterName) {
    if ($filterValues != null) {
        $filterValues = array_unique($filterValues);
        $length = count($filterValues);
        $filterValues = array_values($filterValues);

        for ($i = 0; $i < $length; $i++) {
            echo
                "<input type=\"radio\" name=\"$filterName\" value=\"$filterValues[$i]\">";
            echo ucfirst($filterValues[$i]);
            echo "<br>";
        }
    }
}

function showFilters() {
    $filterArr = array("gender", "type", "brand", "color", "season", "style", "event", "fabric");

    foreach ($filterArr as $filter) {
        echo
            "<div class=\"selector\">
                <button class=\"collapsible\" type=\"button\">";        
        echo ucfirst($filter);
        echo "</button>
                <div class=\"content\">
                    <input type=\"radio\" name=\"$filter\" value=\"none\"> None <br>";
        mapFilter($filter);
        echo "</div>
            </div>";
    }
}

function showProducts() {
    global $imagePath, $name, $id, $price, $brand, $color, $stock;

    if ($id == null) {
        return;
    }

    $length = count($id);

    for ($it = 0; $it < $length; $it++) {
        echo
            "<a href=\"./product.php?product_id=$id[$it]\">
            <div class=\"product-box\">";

        if (0 < $stock[$it]) {
            echo "<img src=$imagePath[$it] alt=\"ShoeImage\" />";
        } else {
            echo "<img src=\"images/outofstock.png\" alt=\"ShoeImage\" />";
        }

        echo "<div class=\"product-box-title\">
                    <p>$name[$it] - $color[$it] - $brand[$it] - <b>$price[$it]\$</b></p>
                </div>
            </div>
        </a>";
    }
}

function showPages() {
    global $pageno;
    global $numOfProductsPerPage;
    global $totalProducts;

    if ($pageno > 1) {
        echo "<a href=\"shop.php?gender=".$_GET["gender"]."&pageno=".($pageno - 1)."\" class=\"previous round\">Previous Page &nbsp &nbsp</a>";
    }

    if ($pageno * $numOfProductsPerPage < $totalProducts) {
        echo "<a href=\"shop.php?gender=".$_GET["gender"]."&pageno=".($pageno + 1)."\" class=\"next round\">Next Page</a>";
    }
}
