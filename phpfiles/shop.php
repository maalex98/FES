<?php
require_once 'dbConnection.php';

global $id, $type, $name, $price, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
global $allTypes, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;
global $pageno;
global $totalProducts;
$numOfProductsPerPage = 6;

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$sql = "";

if (isset($_GET["gender"])) {
    $sql = sprintf("SELECT * FROM Products WHERE gender = '%s';", $_GET["gender"]);
} else {
    $sql = "SELECT * FROM Products;";
}

function getFilters()
{
    global $conn, $sql, $allTypes, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;

    $result = mysqli_query($conn, $sql);

    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $allTypes[$i] = $row["type"];
        $allColors[$i] = $row["color"];
        $allBrands[$i] = $row["brand"];
        $allStyles[$i] = $row["style"];
        $allTrends[$i] = $row["trends"];
        $allSeasons[$i] = $row["season"];
        $i++;
    }
}

function getProductsFromDatabase()
{
    global $sql, $conn, $id, $type, $name, $price, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
    global $stmtFormat, $whereClause, $stmtInfo;
    global $pageno;
    global $numOfProductsPerPage;
    global $totalProducts;

    $whereClause = '';
    $stmtFormat = '';
    $stmtInfo = array();

    function checkFilter($filterName)
    {
        global $stmtFormat, $whereClause, $stmtInfo;

        if (isset($_GET[$filterName]) && $_GET[$filterName] != "none") {
            $whereClause = $whereClause . " AND " . $filterName . "= ?";
            $stmtFormat = $stmtFormat . "s";
            array_push($stmtInfo, $_GET[$filterName]);
        }
    }

    checkFilter("type");
    checkFilter("brand");
    checkFilter("color");
    checkFilter("style");
    checkFilter("event");
    checkFilter("season");
    checkFilter("trends");

    $sql = rtrim($sql, ';');
    $sql = $sql . $whereClause;

    $stmt = $conn->prepare($sql);

    if ($stmtFormat != '')
        $stmt->bind_param($stmtFormat, ...$stmtInfo);
    $stmt->execute();

    $result = $stmt->get_result();

    $i = 0;
    $productCounter = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        if ($i >= (($pageno - 1) * $numOfProductsPerPage) &&
            $i < ($pageno * $numOfProductsPerPage)) {
            $id[$productCounter] = $row["id_product"];
            $name[$productCounter] = $row["name"];
            $price[$productCounter] = $row["price"];
            $type[$productCounter] = $row["type"];
            $description[$productCounter] = $row["description"];
            $imagePath[$productCounter] = $row["image_path"];
            $gender[$productCounter] = $row["gender"];
            $event[$productCounter] = $row["event"];
            $season[$productCounter] = $row["season"];
            $style[$productCounter] = $row["style"];
            $brand[$productCounter] = $row["brand"];
            $color[$productCounter] = $row["color"];
            $trends[$productCounter] = $row["trends"];
            $productCounter++;
        }
        $i++;
    }

    $totalProducts = $i;
}

function showProducts()
{
    global $imagePath, $name, $id, $price;

    if ($id == null)
        return;

    $length = count($id);

    for ($i = 0; $i < $length; $i++) {
        echo
            "<a href=\"./product.php?product_id=$id[$i]\">
            <div class=\"product-box\">
                <img src=$imagePath[$i] alt=\"ShoeImage\" />
                <div class=\"product-box-title\">
                    <p>$name[$i] <b>$price[$i]\$</b></p>
                </div>
            </div>
            </a>";
    }
}

function mapFilter($filter)
{
    global $allTypes, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;

    switch ($filter) {
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
        case "trends": {
                filter($allTrends, $filter);
                break;
            }
        case "season": {
                filter($allSeasons, $filter);
                break;
            }
        default: {
                break;
            }
    }
}

function filter($filterValues, $filterName)
{
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

function showFilters()
{
    $filterArr = array("type", "brand", "color", "style", "trends", "season");

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
