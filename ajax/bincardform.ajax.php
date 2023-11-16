<?php

require_once "../connections/pdo-connection.php";

	if(isset($_POST["productId"])){
		$product = $_POST["productId"];
		$contractor = $_POST["contractorId"];
		$srv = $_POST["srv"];
		$quant = $_POST["quantity"];
		$dept = $_POST["userdepartment"];
		$store = $dept;
		$entered  = $_POST["username"];
		$date = $_POST["daterev"];

		$data = array('Product' => $product,
					  'Supplier' => $contractor,
			   		  'SRV' => $srv,
			   		  'Quantity' => $quant,
			   		  'Department' => $dept,
			   		  'Location' => $store,
			   		  'Entered' => $entered,
			   		  'Rday' => $date);

$query = "INSERT INTO bincard (productid, contractorid, srvno, quantityreceived, department, storelocation, enteredby, daycreated) VALUES (:Product, :Supplier, :SRV, :Quantity, :Department, :Location, :Entered, :Rday)";

		$stmt = Connection::Connect()->prepare($query);
/*
		$stmt->bindParam(':Product', $data['Product'], PDO::PARAM_STR);
		$stmt->bindParam(':Supplier', $data['Supplier'], PDO::PARAM_STR);
		$stmt->bindParam(':SRV', $data['SRV'], PDO::PARAM_STR);
		$stmt->bindParam(':Quantity', $data['Quantity'], PDO::PARAM_STR);
		$stmt->bindParam(':Department', $data['Department'], PDO::PARAM_STR);
		$stmt->bindParam(':Location', $data['Location'], PDO::PARAM_STR);
		$stmt->bindParam(':Entered', $data['Entered'], PDO::PARAM_STR);
		$stmt->bindParam(':Rdate', $data['Rdate'], PDO::PARAM_STR);*/

		$stmt->execute($data);

		var_dump($data);

	}