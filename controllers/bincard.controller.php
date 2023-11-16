<?php

class ControllerBinCard{

	/*=============================================
	CREATE BinCard
	=============================================*/

	static public function ctrCreateBincard(){

		if(isset($_POST["submita"])){

			$product = $_POST["productId"];
			$contractor = $_POST["contractorId"];
			$srv = $_POST["srv"];
			$quant = $_POST["quantity"];
			$dept = $_POST["userdepartment"];
			$store = $dept;
			$entered  = $_POST["username"];
			$date = $_POST["daterev"];

			$datel = date("Y-m-d H:i:s");

			$table = "bincard";

			$data = array('Product' => $product,
						  'Supplier' => $contractor,
			   			  'SRV' => $srv,
			   			  'Quantity' => $quant,
			   		  	  'Department' => $dept,
			   			  'Location' => $store,
			   			  'Entered' => $entered,
			   			  'Rday' => $date,
			   			  'Nday' => $datel);


			   	

			   	$answer = ModelBinCard::mdlAddBincard($table, $data);

			   	if($answer == 'ok'){

			   		$data2 = array('product' => $product,
			   					   'newstock' => $quant,
			   					   'department' => $dept);

			   		$table2 = "stocks";

			   		$item  = "productid";
					$value1 = $quant;

					$value = $product;

						$searchstock = ModelStocks::mdlShowStocks($table2, $item, $value);

					if(count($searchstock) > 0){

						$updatestock = ModelStocks::mdlUpdateStock($table2, $value1, $value);
					
					}else{

						$insertstock = ModelStocks::mdlAddStock($table2, $data2);
					}

						echo'<script>
						swal({
							type: "success",
						  	title: "Bin-Card Record Saved Successfully",
						  	showConfirmButton: true,
						  	confirmButtonText: "Ok"
						  	}).then(function(result){
						  		if (result.value) {
						  			window.location = "bincard-data";
						  		}
						  		})
						  		</script>';

						  	}else{
						  		echo'<script>
						  		swal({
						  			type: "error",
						  			title: "¡Bin-Card cannot be blank or especial characters!",
						  			showConfirmButton: true,
						  			confirmButtonText: "Close"
						  			}).then(function(result){
						  				if (result.value) {
						  					window.location = "bincard-data";
						  				}
						  				})
						  				</script>';
						  			}

						  	}
						  }

	/*=============================================
	SHOW BinCard
	=============================================*/

	static public function ctrShowBincard($item, $value){

		$table = "bincard";

		$answer = ModelBinCard::mdlShowBincard($table, $item, $value);

		return $answer;

	}

	static public function ctrShowBincards($item, $value){
		
		$table = "bincard";

		$answer = ModelBinCard::mdlShowBincards($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT BinCard
	=============================================*/

	static public function ctrEditBincard(){

		if(isset($_POST["savecadedit"])){


			$product = $_POST["editproduct"];
			$contractor = $_POST["editcontractorId"];
			$srv = $_POST["editsrv"];
			$quant = $_POST["editquantity"];
			$dept = $_POST["userdepartment"];
			$store = $dept;
			$entered  = $_POST["username"];
			$date = $_POST["editdaterev"];
			$pid = $_POST["idbincard"];

			$table = "bincard";

			$data = array('id' => $pid,
						  'Product' => $product,
						  'Supplier' => $contractor,
			   			  'SRV' => $srv,
			   			  'Quantity' => $quant,
			   		  	  'Department' => $dept,
			   			  'Location' => $store,
			   			  'Entered' => $entered,
			   			  'Rday' => $date);

			   	$answer = ModelBinCard::mdlEditBincard($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The Bincard Record has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "bincard-data";

									}
								})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Bincard Record cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "bincard-data";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE Bincard
	=============================================*/

	static public function ctrDeleteBincard(){

		if(isset($_GET["idCustomer"])){

			$table ="bincard";
			$data = $_GET["idCustomer"];

			$answer = ModelBinCard::mdlDeleteBincard($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "bincard-data";

								}
							})

				</script>';

			}		

		}

	}

}

