<?php
require_once 'dbConnection.php';
require "pdf/fpdf.php";



if($_GET["table"] == "products"){
	$sql = sprintf("SELECT * FROM orders WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL '%d' DAY);", $_GET["days"]);
	$result= mysqli_query($conn, $sql);
	if($_GET["type"] == "pdf"){

		class myPDF extends FPDF{
			
			function header(){
				$title= "Products sold in the last ". $_GET["days"]. " days";
				$this->SetFont('Times','B',30);
				$this->Cell(276,10,$title,0,0,'C');
				$this->LN(20);
			}

			function footer(){
				$this->SetY(-15);
				$this->SetFont('Arial','',8);
				$this->Cell(0,10,'Page '.$this->PageNO().'/{nb}',0,0,'C');
			}

			function headerTable(){
				$this->SetFont('Times','B',12);
				$this->Cell(35,10,'Product ID',1,0,'C');
				$this->Cell(35,10,'Name',1,0,'C');
				$this->Cell(35,10,'Price',1,0,'C');
				$this->Cell(35,10,'Gender',1,0,'C');		
				$this->Cell(35,10,'Items Sold',1,0,'C');
				$this->Cell(35,10,'Stock',1,0,'C');
				$this->Cell(35,10,'Gross Income',1,0,'C');
				$this->Cell(35,10,'Views',1,0,'C');
				$this->LN();
			}
			function listRows(){
				global $result,$conn;
				$totalQuantity = 0;
				$totalIncome = 0;
				$product = array();
				$this->SetFont('Times','',12);
				while ($row = mysqli_fetch_assoc($result)) {
					$idsProducts = explode("-", $row["ids_products"]);
	    			$quantities = explode("-", $row["quantities"]);
	    			for ($it = 0; $it < count($idsProducts); $it = $it + 1) {
	    				if(!array_key_exists(strval($idsProducts[$it]), $product)){
	    					$product[strval($idsProducts[$it])] = intval($quantities[$it]);
	    				}
	    				else{
	    					$product[strval($idsProducts[$it])] = intval($product[strval($idsProducts[$it])]) + intval($quantities[$it]);
	    				}
	    			}
				}

			    foreach ($product as $key => $value) {
			    	$sql = sprintf("SELECT * FROM products WHERE id_product = '%d'", intval($key));
					$result= mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					$grossIncome= intval($value) * intval($row["price"]);
			    	$this->SetFont('Times','',12);
					$this->Cell(35,10,$key,1,0,'C');
					$this->Cell(35,10,$row["name"],1,0,'C');
					$this->Cell(35,10,$row["price"],1,0,'C');
					$this->Cell(35,10,$row["gender"],1,0,'C');
					$this->Cell(35,10,$value,1,0,'C');
					$this->Cell(35,10,$row["stock"],1,0,'C');
					$this->Cell(35,10,$grossIncome,1,0,'C');
					$this->Cell(35,10,$row["viewed_by"],1,0,'C');
					$this->LN();
					$totalQuantity = $totalQuantity + $value;
					$totalIncome = $totalIncome + $grossIncome;
				}
				$this->SetFont('Times','B',12);
				$this->Cell(35,10,'Total',1,0,'C');
				$this->Cell(35,10,' ',1,0,'C');
				$this->Cell(35,10,' ',1,0,'C');
				$this->Cell(35,10,' ',1,0,'C');
				$this->Cell(35,10,$totalQuantity,1,0,'C');
				$this->Cell(35,10,' ',1,0,'C');
				$this->Cell(35,10,$totalIncome,1,0,'C');
				$this->Cell(35,10,' ',1,0,'C');
			}
		}

		$pdf = new myPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('L','A4',0);
		$pdf->headerTable();
		$pdf->listRows();
		$pdf->Output();
	}
	else{
		$headers= array("Product ID","Name","Price","Gender","Items Sold","Stock","Gross Income","Views");
		$data = array();
		$it = 0;

		global $result,$conn;
		$totalQuantity = 0;
		$totalIncome = 0;
		$product = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$idsProducts = explode("-", $row["ids_products"]);
			$quantities = explode("-", $row["quantities"]);
			for ($it = 0; $it < count($idsProducts); $it = $it + 1) {
				if(!array_key_exists(strval($idsProducts[$it]), $product)){
					$product[strval($idsProducts[$it])] = intval($quantities[$it]);
				}
				else{
					$product[strval($idsProducts[$it])] = intval($product[strval($idsProducts[$it])]) + intval($quantities[$it]);
				}
			}
		}
	    foreach ($product as $key => $value) {

	    	$sql = sprintf("SELECT * FROM products WHERE id_product = '%d'", intval($key));
			$result= mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);

			$grossIncome= intval($value) * intval($row["price"]);
			$totalQuantity = $totalQuantity + $value;
			$totalIncome = $totalIncome + $grossIncome;

			$item=array();
			$item["Product ID"]=$key;
			$item["Name"]=$row["name"];
			$item["Price"]=$row["price"];
			$item["Gender"] =$row["gender"];
			$item["Items Sold"]= $value;
			$item["Stock"]=$row["stock"];
			$item["Gross"]=$grossIncome;
			$item["Views"]=$row["viewed_by"];
			$data[$it] = $item;
			$it=$it +1;
		}

		$filename='stats'.$_GET["days"].'days.csv';

		header('content-type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$filename.'";');
		header("Pragma: no-cache");
	    header("Expires: 0");

		$output = fopen("php://output","w");
		fputcsv($output, $headers);
		foreach($data as $fields){
			fputcsv($output, $fields);
		}
		fclose($output);

	}
}
else if($_GET["table"] == "users"){
	if($_GET["type"] == "pdf"){
		if(isset($_GET["days"])){
			$sql = sprintf("SELECT * FROM users WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL '%d' DAY);", $_GET["days"]);
			$result= mysqli_query($conn, $sql);
			class myPDF extends FPDF{
				
				function header(){
					$title= "Accounts created in the last ". $_GET["days"]. " days";
					$this->SetFont('Times','B',30);
					$this->Cell(276,10,$title,0,0,'C');
					$this->LN(20);
				}

				function footer(){
					$this->SetY(-15);
					$this->SetFont('Arial','',8);
					$this->Cell(0,10,'Page '.$this->PageNO().'/{nb}',0,0,'C');
				}

				function headerTable(){
					$this->SetFont('Times','B',12);
					$this->Cell(41,10,'Username',1,0,'C');
					$this->Cell(41,10,'First Name',1,0,'C');
					$this->Cell(41,10,'Last Name',1,0,'C');
					$this->Cell(41,10,'Country',1,0,'C');		
					$this->Cell(41,10,'Orders Made',1,0,'C');
					$this->Cell(60,10,'Email',1,0,'C');
					$this->LN();
				}
				function listRows(){
					global $result,$conn;

					$users = array();
					$it=0;
					$this->SetFont('Times','',12);
					while ($row = mysqli_fetch_assoc($result)) {
						$users[$it]=$row;
						$it = $it +1;
					}
					for ($it = 0; $it < count($users); $it = $it + 1){
						$sql = sprintf("SELECT * FROM orders WHERE id_user = '%d'", intval($users[$it]["id_user"]));
						$result= mysqli_query($conn, $sql);
						$row = mysqli_num_rows($result);
						$this->SetFont('Times','',12);
						$this->Cell(41,10,$users[$it]["username"],1,0,'C');
						$this->Cell(41,10,$users[$it]["firstname"],1,0,'C');
						$this->Cell(41,10,$users[$it]["lastname"],1,0,'C');
						$this->Cell(41,10,$users[$it]["country"],1,0,'C');
						$this->Cell(41,10,$row,1,0,'C');
						$this->Cell(60,10,$users[$it]["email"],1,0,'C');
						$this->LN();
					}
				}
			}
			$pdf = new myPDF();
			$pdf->AliasNbPages();
			$pdf->AddPage('L','A4',0);
			$pdf->headerTable();
			$pdf->listRows();
			$pdf->Output();
		}
		else{
			if(isset($_GET["country"])){
				$sql = "SELECT DISTINCT country FROM users";
				$result= mysqli_query($conn, $sql);

				global $countries;
				$countries= array();
				$it=0;

				while ($row = mysqli_fetch_assoc($result)){
				$countries[$it]=$row["country"];
				$it = $it +1;
				}
				class myPDF extends FPDF{
					
					function header(){
						$title= "Number of users by country";
						$this->SetFont('Times','B',30);
						$this->Cell(276,10,$title,0,0,'C');
						$this->LN(20);
					}

					function footer(){
						$this->SetY(-15);
						$this->SetFont('Arial','',8);
						$this->Cell(0,10,'Page '.$this->PageNO().'/{nb}',0,0,'C');
					}

					function headerTable(){
						$this->SetFont('Times','B',12);
						$this->Cell(41,10,'Country',1,0,'C');
						$this->Cell(41,10,'Number of Users',1,0,'C');
						$this->LN();
					}
					function listRows(){
						global $result,$conn, $countries;

						$users = array();
						$it=0;
						$this->SetFont('Times','',12);
						while ($row = mysqli_fetch_assoc($result)) {
							$users[$it]=$row;
							$it = $it +1;
						}
						for ($it = 0; $it < count($countries); $it = $it + 1){
							$sql = sprintf("SELECT * FROM users WHERE country = '%s'", $countries[$it]);
							$result= mysqli_query($conn, $sql);
							$row = mysqli_num_rows($result);
							$this->SetFont('Times','',12);
							$this->Cell(41,10,$countries[$it],1,0,'C');
							$this->Cell(41,10,$row,1,0,'C');
							$this->LN();
						}
					}
				}
				$pdf = new myPDF();
				$pdf->AliasNbPages();
				$pdf->AddPage('L','A4',0);
				$pdf->headerTable();
				$pdf->listRows();
				$pdf->Output();
			}
		}
	}
	else{
		if(isset($_GET["days"])){
			$headers= array("Username","First Name","Last Name","Country","Orders Made","Email");
			$data = array();
			$it = 0;
			$users =array();

			global $result,$conn;
			$sql = sprintf("SELECT * FROM users WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL '%d' DAY);", $_GET["days"]);
			$result= mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_assoc($result)) {
				$users[$it]=$row;
				$it = $it +1;
			}

			for ($it = 0; $it < count($users); $it = $it + 1){
				$sql = sprintf("SELECT * FROM orders WHERE id_user = '%d'", intval($users[$it]["id_user"]));
				$result= mysqli_query($conn, $sql);
				$row = mysqli_num_rows($result);
				$item=array();
				$item["Username"]=$users[$it]["username"];
				$item["First Name"]=$users[$it]["firstname"];
				$item["Last Name"]=$users[$it]["lastname"];
				$item["Country"] =$users[$it]["country"];
				$item["Orders Made"]= $row;
				$item["Email"]=$users[$it]["email"];
				$data[$it] = $item;
				$it=$it +1;
			}

			$filename='stats'.$_GET["days"].'days.csv';

			header('content-type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment;filename="'.$filename.'";');
			header("Pragma: no-cache");
		    header("Expires: 0");

			$output = fopen("php://output","w");
			fputcsv($output, $headers);
			foreach($data as $fields){
				fputcsv($output, $fields);
			}
			fclose($output);

		}
		else if(isset($_GET["country"])){
			$headers= array("Country","Number of Accounts");
			$data = array();
			$it = 0;

			$sql = "SELECT DISTINCT country FROM users";
			$result= mysqli_query($conn, $sql);

			global $countries;
			$countries= array();
			$it=0;

			while ($row = mysqli_fetch_assoc($result)){
			$countries[$it]=$row["country"];
			$it = $it +1;
			}

			for ($it1 = 0; $it1 < count($countries); $it1 = $it1 + 1){
				$sql = sprintf("SELECT * FROM users WHERE country = '%s'", $countries[$it1]);
				$result= mysqli_query($conn, $sql);
				$row = mysqli_num_rows($result);
				$item=array();
				$item["Country"]=$countries[$it1];
				$item["Number of Accounts"]=$row;
				$data[$it] = $item;
				$it=$it +1;

			}

			$filename='stats.csv';

			header('content-type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment;filename="'.$filename.'";');
			header("Pragma: no-cache");
		    header("Expires: 0");

			$output = fopen("php://output","w");
			fputcsv($output, $headers);
			foreach($data as $fields){
				fputcsv($output, $fields);
			}
			fclose($output);

		}

	}
}

?>