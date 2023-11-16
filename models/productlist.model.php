<?php

require_once "connections/pdo-connection.php";

class ProductListModel{

	/*=============================================
	CREATE CATEGORY
	=============================================*/

	static public function mdlAddProduct($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(product, storelocation) VALUES (:item_name, :item_loc)");

		$stmt -> bindParam(":item_name", $data["Prod"], PDO::PARAM_STR);
		$stmt -> bindParam(":item_loc", $data["Dept"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 'ok';

		} else {

			return 'error';

		}
		
		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	SHOW CATEGORY 
	=============================================*/
	
	static public function mdlShowProducts($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else{
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDIT CATEGORY
	=============================================*/

	static public function mdlEditCategory($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET Category = :Category WHERE id = :id");

		$stmt -> bindParam(":Category", $data["Category"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/

	static public function mdlDeleteCategory($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}