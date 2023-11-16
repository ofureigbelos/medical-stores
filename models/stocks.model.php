<?php

require_once "connections/pdo-connection.php";

class ModelStocks{

	/*=============================================
	CREATE BinCard
	=============================================*/

	static public function mdlAddStock($table2, $data2){
		$query = "INSERT INTO $table2(productid, stock, storelocation) VALUES (:product, :newstock, :department)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt->bindParam(':product', $data2['product'], PDO::PARAM_STR);
		$stmt->bindParam(':newstock', $data2['newstock'], PDO::PARAM_STR);
		$stmt->bindParam(':department', $data2['department'], PDO::PARAM_STR);

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

	static public function mdlShowStocks($table, $item, $value){

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


		static public function mdlShowStock($table, $item, $value){

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
	EDIT BinCard
	=============================================*/

	static public function mdlEditStock($table, $data){

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
	DELETE BinCard
	=============================================*/

	static public function mdlDeleteStock($table, $data){

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

	static public function mdlUpdateStock($table2, $value1,  $value){

		$stmt = Connection::Connect()->prepare("UPDATE $table2 set stock = stock + :addstock WHERE productid = :pid");

		$stmt -> bindParam(":addstock", $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":pid", $value, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlNewStockUpdate($table, $item, $value1, $value){

		$query = "UPDATE $table SET $item = :$item WHERE id = :id";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":".$item, $value1, PDO::PARAM_STR);
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