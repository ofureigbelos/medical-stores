<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class AjaxUsers{

	/*=============================================
	VALIDATE IF USER ALREADY EXISTS
	=============================================*/

	public $validateUser;

	public function ajaxValidateUser(){

		$item = "username";
		$value = $this->validateUser;

		$answer = ControllerUsers::ctrShowUsers($item, $value);

		echo json_encode($answer);

	}

}


/*=============================================
VALIDATE IF USER ALREADY EXISTS PHP POST
=============================================*/


if (isset($_POST["validateUser"])) {

	$valUser = new AjaxUsers();
	$valUser -> validateUser = $_POST["validateUser"];
	$valUser -> ajaxValidateUser();
}