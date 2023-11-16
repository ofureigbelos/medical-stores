<?php

class ControllerStocks{

	/*=============================================
	SHOW BinCard
	=============================================*/

	static public function ctrShowStocks($item, $value){

		$table = "stocks";

		$answer = ModelStocks::mdlShowStocks($table, $item, $value);

		return $answer;

	}

	static public function ctrShowStock($item, $value){
		$table = "stocks";

		$answer = ModelStocks::mdlShowStock($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT BinCard
	=============================================*/

	static public function ctrEditStocks(){

		if(isset($_POST["editCustomer"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCustomer"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editIdDocument"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editPhone"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editAddress"])){

			   	$table = "stocks";

			   	$data = array("id"=>$_POST["idCustomer"],
			   				   "name"=>$_POST["editCustomer"],
					           "idDocument"=>$_POST["editIdDocument"],
					           "email"=>$_POST["editEmail"],
					           "phone"=>$_POST["editPhone"],
					           "address"=>$_POST["editAddress"],
					           "birthdate"=>$_POST["editBirthdate"]);

			   	$answer = ModelBinCard::mdlEditStocks($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "stocks";

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

							window.location = "stocks";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE Bincard
	=============================================*/

	static public function ctrDeleteStocks(){

		if(isset($_GET["idCustomer"])){

			$table ="stocks";
			$data = $_GET["idCustomer"];

			$answer = ModelStocks::mdlDeleteStocks($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "stocks";

								}
							})

				</script>';

			}		

		}

	}

}

