<?php

 class ControllerUnit{

 	 	/*=============================================
	CREATE Bin-card Produc
	=============================================*/
	
	public static function ctrCreateUnit(){

		if(isset($_POST["saveunit"])){

			$prod = $_POST["unit"];
			$dept = $_POST["userdepartment"];

				$table = 'unit';

				$data = array("Unit" => $prod,
							  "Dept" => $dept);

				$answer = UnitModel::mdlAddUnit($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "Unit has been saved successfully",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "stock-issue";

								}
							});
						
					</script>';
				}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "No especial characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "stock-issue";
								}
							});
						
				</script>';
				
			}
		}
	}



	/*=============================================
	SHOW CATEGORIES
	=============================================*/

	public static function ctrShowUnit($item, $value){

		$table = "unit";

		$answer = UnitModel::mdlShowUnits($table, $item, $value);

		return $answer;
	}


 }