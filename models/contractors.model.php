<?php

require_once "connections/pdo-connection.php";

class ModelContractors{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function mdlAddContractor($table, $data){

$query = "INSERT INTO $table(fname, email, phonenumber, address, companyname, storelocation) VALUES (:Fullname, :Email, :Phone, :Address, :CompName, :Dept)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt->bindParam(":Fullname", $data["Fullname"], PDO::PARAM_STR);
		$stmt->bindParam(":Email", $data["Email"], PDO::PARAM_STR);
		$stmt->bindParam(":Phone", $data["Phone"], PDO::PARAM_STR);
		$stmt->bindParam(":Address", $data["Address"], PDO::PARAM_STR);
		$stmt->bindParam(":CompName", $data["CompName"], PDO::PARAM_STR);
		$stmt->bindParam(":Dept", $data["Dept"], PDO::PARAM_STR);

		if($stmt->execute()){

			return 'ok';

		}else{

			return 'error';
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function mdlShowContractors($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlShowContractor($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function mdlEditContractor($table, $data){

		$stmt = Connection::Connect()->prepare("UPDATE $table SET name = :name, idDocument = :idDocument, email = :email, phone = :phone, address = :address, birthdate = :birthdate WHERE id = :id");

		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":idDocument", $data["idDocument"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
		$stmt->bindParam(":birthdate", $data["birthdate"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function mdlDeleteContractor($table, $data){

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
	UPDATE CUSTOMER
	=============================================*/

	static public function mdlUpdateContractor($table, $item1, $value1, $value){

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