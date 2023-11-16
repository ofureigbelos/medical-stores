<?php

require_once "connections/pdo-connection.php";

class ModelBinCard{

	/*=============================================
	CREATE BinCard
	=============================================*/

	static public function mdlAddBincard($table, $data){
		$query = "INSERT INTO $table(productid, contractorid, srvno, quantityreceived, department, storelocation, enteredby, daycreated, enterydate) VALUES (:Product, :Supplier, :SRV, :Quantity, :Department, :Location, :Entered, :Rday, :Nday)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt->bindParam(':Product', $data['Product'], PDO::PARAM_STR);
		$stmt->bindParam(':Supplier', $data['Supplier'], PDO::PARAM_STR);
		$stmt->bindParam(':SRV', $data['SRV'], PDO::PARAM_STR);
		$stmt->bindParam(':Quantity', $data['Quantity'], PDO::PARAM_STR);
		$stmt->bindParam(':Department', $data['Department'], PDO::PARAM_STR);
		$stmt->bindParam(':Location', $data['Location'], PDO::PARAM_STR);
		$stmt->bindParam(':Entered', $data['Entered'], PDO::PARAM_STR);
		$stmt->bindParam(':Rday', $data['Rday'], PDO::PARAM_STR);
		$stmt->bindParam(':Nday', $data['Nday'], PDO::PARAM_STR);

		if($stmt->execute()){

			return 'ok';

		}else{

			return 'error';
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	SHOW BinCard
	=============================================*/

	static public function mdlShowBincard($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY daycreated DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table ORDER BY daycreated DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


		static public function mdlShowBincards($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY daycreated DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table ORDER BY daycreated DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDIT BinCard
	=============================================*/

	static public function mdlEditBincard($table, $data){

		$query = "UPDATE $table SET productid = :Product, contractorid = :Supplier, srvno = :SRV, quantityreceived = :Quantity, department = :Department, storelocation = :Location, enteredby = :Entered, daycreated = :Rday WHERE binid = :id";

		$stmt = Connection::Connect()->prepare($query);

		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$stmt->bindParam(':Product', $data['Product'], PDO::PARAM_STR);
		$stmt->bindParam(':Supplier', $data['Supplier'], PDO::PARAM_STR);
		$stmt->bindParam(':SRV', $data['SRV'], PDO::PARAM_STR);
		$stmt->bindParam(':Quantity', $data['Quantity'], PDO::PARAM_STR);
		$stmt->bindParam(':Department', $data['Department'], PDO::PARAM_STR);
		$stmt->bindParam(':Location', $data['Location'], PDO::PARAM_STR);
		$stmt->bindParam(':Entered', $data['Entered'], PDO::PARAM_STR);
		$stmt->bindParam(':Rday', $data['Rday'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	DELETE BinCard
	=============================================*/

	static public function mdlDeleteBincard($table, $data){

		$stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	UPDATE BinCard
	=============================================*/

	static public function mdlUpdateBincard($table, $item1, $value1, $value){

		$stmt = Connection::Connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $value, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}