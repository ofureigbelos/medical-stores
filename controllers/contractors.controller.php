<?php

class ControllerContractors{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	public static function ctrCreateContractors(){

		if(isset($_POST["savecad"])){

			$conname = $_POST["fullname"];
			$conemail = $_POST["email"];
			$conphone = $_POST["phone"];
			$conaddress = $_POST["address"];
			$compname = $_POST["company"];
			$dept = $_POST["userdepartment"];

			   	$table = 'contractors';

			   	$data = array("Fullname" => $conname,
			   				  "Email" => $conemail,
			   				  "Phone" => $conphone,
			   				  "Address" => $conaddress,
			   				  "CompName" => $compname,
			   				  "Dept" => $dept);

			   	$answer = ModelContractors::mdlAddContractor($table, $data);

			   	var_dump($answer);

			   	if($answer == 'ok'){

					echo'<script>

					swal({
						  type: "success",
						  title: "The contractor has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Ok"
						  }).then(function(result){
									if (result.value) {

									window.location = "contractors";

									}
								})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "contractors";

							}
						})

			  	</script>';

			}

		}

	}



	/*=============================================
	CREATE Bin CUSTOMERS
	=============================================*/

	public static function ctrCreateBinContractors(){

		if(isset($_POST["savecon"])){

			$conname = $_POST["fullname"];
			$conemail = $_POST["email"];
			$conphone = $_POST["phone"];
			$conaddress = $_POST["address"];
			$compname = $_POST["company"];
			$dept = $_POST["userdepartment"];

			   	$table = 'contractors';

			   	$data = array("Fullname" => $conname,
			   				  "Email" => $conemail,
			   				  "Phone" => $conphone,
			   				  "Address" => $conaddress,
			   				  "CompName" => $compname,
			   				  "Dept" => $dept);

			   	$answer = ModelContractors::mdlAddContractor($table, $data);

			   	var_dump($answer);

			   	if($answer == 'ok'){

					echo'<script>

					swal({
						  type: "success",
						  title: "The contractor has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Ok"
						  }).then(function(result){
									if (result.value) {

									window.location = "create-bincard";

									}
								})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "create-bincard";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowContractors($item, $value){

		$table = "contractors";

		$answer = ModelContractors::mdlShowContractors($table, $item, $value);

		return $answer;

	}

		static public function ctrShowContractor($item, $value){

		$table = "contractors";

		$answer = ModelContractors::mdlShowContractor($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditContractor(){

		if(isset($_POST["editCustomer"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCustomer"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editIdDocument"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editPhone"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editAddress"])){

			   	$table = "contractors";

			   	$data = array("id"=>$_POST["idCustomer"],
			   				   "name"=>$_POST["editCustomer"],
					           "idDocument"=>$_POST["editIdDocument"],
					           "email"=>$_POST["editEmail"],
					           "phone"=>$_POST["editPhone"],
					           "address"=>$_POST["editAddress"],
					           "birthdate"=>$_POST["editBirthdate"]);

			   	$answer = ModelContractors::mdlEditContractor($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "contractors";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "contractors";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteContractor(){

		if(isset($_GET["idCustomer"])){

			$table ="contractors";
			$data = $_GET["idCustomer"];

			$answer = ModelContractors::mdlDeleteContractor($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "contractors";

								}
							})

				</script>';

			}		

		}

	}

}

