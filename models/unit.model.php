<?php

require_once "connections/pdo-connection.php";

class UnitModel{

	/*=============================================
	CREATE CATEGORY
	=============================================*/

	static public function mdlAddUnit($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(unit_name, storelocation) VALUES (:item_name, :item_loc)");

		$stmt -> bindParam(":item_name", $data["Unit"], PDO::PARAM_STR);
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
	
	static public function mdlShowUnits($table, $item, $value){

		if($item != null){

			$stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		else{
			$stmt = Connection::Connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

}