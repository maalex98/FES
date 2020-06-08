<?php
require_once "dbConnection.php";
global $conn;

$shoesSizes=array('36','37','38','39','40','41','42','43');
$jacketsSizes=array('S', 'M', 'L', 'XL');
$brands = array('Gucci','Nike','Adidas', 'Balenciaga','Timberland');
$colors = array('black','white','red');
$types = array('shoe', 'jacket', 'Shirt');
$events = array('evening','wedding','graduation','halloween');
$styles = array('modern','vintage','casual');
$seasons = array('summer', 'winter', 'autumn', 'spring');
$fabrics = array('leather', 'cotton', 'unknown');
$descriptions = array('Nice Shoes', 'Nice Jacket', 'Nice Shirt');

$NumberOfEach = 3;

// women shoes
for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,7);
	$name = $colors[$colorNumber].' shoes ' . $shoesSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,8);
	$gender= 'women';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/women_products/' . $colors[$colorNumber] . $types[0] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[0] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[0] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}

//women jackets

for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,3);
	$name = $colors[$colorNumber].' jacket ' . $jacketsSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,4);
	$gender= 'women';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/women_products/' . $colors[$colorNumber] . $types[1] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[1] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[1] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}

//women shirts

for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,3);
	$name = $colors[$colorNumber].' shirt ' . $jacketsSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,4);
	$gender= 'women';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/women_products/' . $colors[$colorNumber] . $types[2] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[2] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[2] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}

// men shoes
for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,7);
	$name = $colors[$colorNumber].' shoes ' . $shoesSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,4);
	$gender= 'men';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/men_products/' . $colors[$colorNumber] . $types[0] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[0] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[0] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}

//men jackets

for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,3);
	$name = $colors[$colorNumber].' jacket ' . $jacketsSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,4);
	$gender= 'men';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/men_products/' . $colors[$colorNumber] . $types[1] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[1] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[1] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}


//men shirts

for($it=0; $it<$NumberOfEach ; $it=$it+1){
	$colorNumber = rand(0,2);
	$sizeNumber = rand(0,3);
	$name = $colors[$colorNumber].' shirt ' . $jacketsSizes[$sizeNumber];
	$price = rand(100,500);
	$rand_number=rand(1,4);
	$gender= 'men';
	$eventNumber = rand(0,3);
	$seasonNumber = rand(0,3);
	$styleNumber = rand(0,2);
	$brandNumber = rand(0,4);
	$fabricNumber = rand(0,2);
	$stock=rand(1,100);

	$image_path = 'images/men_products/' . $colors[$colorNumber] . $types[2] . $rand_number.'.jpg';
	$sql = "INSERT INTO products (type, name, price, image_path, gender, event, season, style, brand, color, fabric,description, stock) VALUES ('" . $types[2] . "','" . $name . "', '" . $price . "','" . $image_path . "','" . $gender . "','" . $events[$eventNumber] . "' ,'" . $seasons[$seasonNumber] . "','" . $styles[$styleNumber] . "','" . $brands[$brandNumber] . "','" . $colors[$colorNumber] ."','" . $fabrics[$fabricNumber]."','" . $descriptions[2] . "','" . $stock . "')";
	$result = mysqli_query($conn, $sql);
}




?>