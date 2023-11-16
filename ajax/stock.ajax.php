<?php

require_once "../connections/pdo-connection.php";

if(isset($_POST["idProduct"])){

	$stock_id 	= $_POST["idProduct"];

	$query = "SELECT * FROM stocks WHERE id = '$stock_id'";

	$stmt  = Connection::Connect()->prepare($query);

	if($stmt->execute()){
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

			$answer[] = $row;
		}

		echo json_encode($answer);

	}
}