<?php
require_once 'dbConnection.php';
global $conn;

function showOptions($filter, $gender){
	global $conn;
	$my_array = array();
	$it=0;
	$target=4;


	$sql = "SELECT DISTINCT ". $filter." FROM products WHERE gender = '". $gender ."';";
	$result= mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
	array_push($my_array, $row[$filter]);
	}

	if(count($my_array)<4)
		$target=count($my_array);

	shuffle($my_array);

	for($it=0; $it<$target ; $it = $it +1){
		echo "<a href=\"shop.php?gender=" .$gender. "&".$filter. "=".$my_array[$it]."\">".ucfirst($my_array[$it])."</a>";
	}
}
?>