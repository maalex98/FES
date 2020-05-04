<?php
    require_once 'dbConnection.php';

    $sql = sprintf("SELECT * FROM Products WHERE gender = '%s';", $_GET["gender"]);
    
    global $id, $type, $name,$price, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
    global $allTypes, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;

    function getFilters() {
        global $conn, $sql, $allTypes, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $allTypes[$i] = $row["type"];
            $allColors[$i] = $row["color"];
            $allBrands[$i] = $row["brand"];
            $allStyles[$i] = $row["style"];
            $allTrends[$i] = $row["trends"];
            $allSeasons[$i] = $row["season"];
            $i++;
        }
    }

    function getProductsFromDatabase() {
        global $sql, $conn, $id, $type, $name, $price, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
        global $stmtFormat, $whereClause, $stmtInfo;
        $whereClause = '';
        $stmtFormat = '';
        $stmtInfo = array();

        function checkFilter($filterName) {
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

        // $result = mysqli_query($conn, $sql);
        $result = $stmt->get_result();

        $i = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $id[$i] = $row["id_product"];
            $name[$i] = $row["name"];
            $price[$i] = $row["price"];
            $type[$i] = $row["type"];
            $description[$i] = $row["description"];
            $imagePath[$i] = $row["image_path"];
            $gender[$i] = $row["gender"];
            $event[$i] = $row["event"];
            $season[$i] = $row["season"];
            $style[$i] = $row["style"];
            $brand[$i] = $row["brand"];
            $color[$i] = $row["color"];
            $trends[$i] = $row["trends"];
            $i++;
        }
    }

    function showProducts() {
        global $imagePath, $name, $id, $price;

        if ($id == null)
            return;

        $length = count($id);

        for($i = 0; $i < $length; $i++) {
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

    function mapFilter($filter) {

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

    function filter($filterValues, $filterName) {

        if ($filterValues != null) {
            $filterValues = array_unique($filterValues);
            $length = count($filterValues);
            $filterValues = array_values($filterValues);

            for($i = 0; $i < $length; $i++) {
                echo
                "<input type=\"radio\" name=\"$filterName\" value=\"$filterValues[$i]\">";
                echo ucfirst($filterValues[$i]);
                echo "<br>"; 
            }
        }
    }

    function showFilters() {
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
?>