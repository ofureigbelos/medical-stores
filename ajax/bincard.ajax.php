<?php

require_once "../controllers/bincard.controller.php";
require_once "../models/bincard.model.php";

class AjaxCustomers{

	/*=============================================
	EDIT CUSTOMER
	=============================================*/	

	public $idDelivery;

	public function ajaxEditCustomer(){

		$item = "binid";
		$value = $this->idDelivery;
		$table = "bincard";

		$answer = ModelBinCard::mdlShowBincards($table, $item, $value);

		echo json_encode($answer);


	}

}

/*=============================================
EDIT CUSTOMER
=============================================*/	

if(isset($_POST["idDelivery"])){

	$Customer = new AjaxCustomers();
	$Customer -> idDelivery = $_POST["idDelivery"];
	$Customer -> ajaxEditCustomer();

}