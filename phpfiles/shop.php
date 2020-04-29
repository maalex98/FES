<?php
    require_once 'dbConnection.php';
    mysqli_set_charset($conn,"utf8mb4");

    $sql = sprintf("SELECT * FROM Products WHERE gender = '%s';", $_GET["gender"]);
    $base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
    $actual_link = $base_url . $_SERVER["REQUEST_URI"];
    global $id, $name, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
    global $allColors, $allBrands, $allStyles;

    function getFilters() {
        global $conn, $sql, $allColors, $allBrands, $allStyles, $allTrends, $allSeasons;
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $allColors[$i] = $row["color"];
            $allBrands[$i] = $row["brand"];
            $allStyles[$i] = $row["style"];
            $allTrends[$i] = $row["trends"];
            $allSeasons[$i] = $row["season"];
            $i++;
        }
    }

    function getProductsFromDatabase() {
        global $sql, $conn, $id, $name, $imagePath, $description, $gender, $event, $season, $style, $color, $trends, $brand;
        global $stmtFormat, $whereClause, $stmtInfo;
        $whereClause = '';
        $stmtFormat = '';
        $stmtInfo = array();

        function checkFilter($filterName){
        	global $stmtFormat, $whereClause, $stmtInfo;
        	if(isset($_GET[$filterName]) && $_GET[$filterName] != "none") {
	            $whereClause = " AND " . $filterName . "= ?";
	            $stmtFormat = $stmtFormat . "s";
	            array_push($stmtInfo, $_GET[$filterName]);
        	}

        }

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
        while($row = mysqli_fetch_assoc($result)) {
            $id[$i] = $row["id_product"];
            $name[$i] = $row["name"];
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
        global $imagePath, $name, $id;
        if ($id == null)
            return;
        $length = count($id);
        for($i = 0; $i < $length; $i++) {
            echo 
            "<div class=\"product-box\">
                <img src=$imagePath[$i] alt=\"ShoeImage\" />
                <div class=\"product-box-title\">
                    <p>$name[$i]</p>
                </div>
            </div>";
        }
    }

    function filter($filterValues, $filterName) {
        $filterValues = array_unique($filterValues);
        $length = count($filterValues);
        $filterValues = array_values($filterValues);
        for($i = 0; $i < $length; $i++) {
            echo 
            "<input type=\"radio\" name=\"$filterName\" value=\"$filterValues[$i]\">$filterValues[$i] <br>"; 
        }
    }

?>