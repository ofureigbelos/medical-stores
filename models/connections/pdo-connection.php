<?php

	class Connection {

		static public function Connect(){

			$con = new PDO("mysql:host=127.0.0.1;dbname=stores_erp",
							"root",
							"");

			return $con;
		}


	}

?>