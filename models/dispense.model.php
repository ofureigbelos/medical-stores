<?php

require_once "connections/pdo-connection.php";

class ModelDispense{

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function mdlShowDispense($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id ASC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlShowDispenseLog($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}





		static public function mdlShowDispensed($table, $item, $value){

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



		/*=============================================
	REGISTERING SALE
	=============================================*/

	static public function mdlDispenseItem($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(stockkeeper, store_siv, location, requisitioningunit, dispenseditems, year) VALUES (:username, :stockcode, :userdept, :unit, :product, :issueyear)");

		$stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
		$stmt->bindParam(":stockcode", $data["stockcode"], PDO::PARAM_STR);
		$stmt->bindParam(":userdept", $data["userdept"], PDO::PARAM_STR);
		$stmt->bindParam(":unit", $data["unit"], PDO::PARAM_STR);
		$stmt->bindParam(":product", $data["product"], PDO::PARAM_STR);
		$stmt->bindParam(":issueyear", $data["issueyear"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	static public function mdlBincardReport($data){

		$query = "SELECT productid AS item, contractorid AS request, srvno, sivno AS siv, quantityreceived AS quantity, enterydate AS day FROM bincard WHERE productid = :goods UNION ALL SELECT dispenseProduct AS item, requestUnit AS request, srvno, sivNum AS siv, dispenseQuantity AS quantity, enterydate AS day FROM dispenselog WHERE dispenseProduct = :goods ORDER BY day";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":goods", $data["goods"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
	}



}