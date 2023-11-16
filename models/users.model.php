<?php

require_once "connections/pdo-connection.php";

class UsersModel {

	static public function mdlShowUsers($table, $item, $value){

		if($item != null){

		$query = "SELECT * FROM $table WHERE $item = :$item";

		$stmt = Connection::Connect()->prepare($query);

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

/*  ===========================================
				 Add User Model
	=========================================== */

	static public function mdlAddUser($table, $data){

		$query = "INSERT INTO $table(fullname, username, password, profile, photo) VALUES(:fullname, :username, :password, :profile, :photo)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":fullname", $data["fullname"], PDO::PARAM_STR);
		$stmt -> bindParam(":username", $data["username"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":profile", $data["profile"], PDO::PARAM_STR);
		$stmt -> bindParam(":photo", $data["photo"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return 'ok';
		
		}else{

			return 'error';
		}

		$stmt -> close();

		$stmt = null;
	}


 /* ============================================
			  UPDATE USER ON LOGIN 
	============================================ */


	static public function mdlUpdateUser($table, $item1, $value1, $item2, $value2){

		$query = "UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return 'ok';

		}else{

			return 'error';
		}

		$stmt -> close();

		$stmt = null;
	}






}