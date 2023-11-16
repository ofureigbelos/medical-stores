<?php

class ControllerDispense{

	/*=============================================
	SHOW DISPENSE
	=============================================*/

	static public function ctrShowDispense($item, $value){

		$table = "dispense";

		$answer = ModelDispense::mdlShowDispense($table, $item, $value);

		return $answer;

	}

		static public function ctrShowDispensed($item, $value){

		$table = "dispense";

		$answer = ModelDispense::mdlShowDispensed($table, $item, $value);

		return $answer;

	}


		static public function ctrShowDispenseLog($item, $value){

		$table = "dispenselog";

		$answer = ModelDispense::mdlShowDispenseLog($table, $item, $value);

		return $answer;

	}


	static public function ctrBincardReport(){

		if(isset($_POST["search"])){

			$productname = $_POST["prodname"];

			$data = array('goods' => $productname);

			$answer = ModelDispense::mdlBincardReport($data);

			return $answer;

		}

	}



}