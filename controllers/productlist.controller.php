<?php

 class ControllerProductList{

 	/*=============================================
	CREATE CATEGORY
	=============================================*/
	
	public static function ctrCreateProduct(){

		if(isset($_POST["submit"])){

			$prod = $_POST["product"];
			$dept = $_POST["userdepartment"];

				$table = 'products';

				$data = array("Prod" => $prod,
							  "Dept" => $dept);

				$answer = ProductListModel::mdlAddProduct($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "Product has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "products";

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
									window.location = "products";
								}
							});
						
				</script>';
				
			}
		}
	}


 	/*=============================================
	CREATE Bin-card Produc
	=============================================*/
	
	public static function ctrCreateBinProduct(){

		if(isset($_POST["submit"])){

			$prod = $_POST["product"];
			$dept = $_POST["userdepartment"];

				$table = 'products';

				$data = array("Prod" => $prod,
							  "Dept" => $dept);

				$answer = ProductListModel::mdlAddProduct($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "Product has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "create-bincard";

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
									window.location = "create-bincard";
								}
							});
						
				</script>';
				
			}
		}
	}

	/*=============================================
	SHOW CATEGORIES
	=============================================*/

	public static function ctrShowProducts($item, $value){

		$table = "products";

		$answer = ProductListModel::mdlShowProducts($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT Product
	=============================================*/

	public function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "categories";

				$data = array("Category"=>$_POST["editCategory"],
							   "id"=>$_POST["idCategory"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);
				// var_dump($answer);

				if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Category has been successfully saved ",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "No especial characters or blank fields",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/

	public function ctrDeleteCategory(){

		if(isset($_GET["idCategory"])){

			$table ="categories";
			$data = $_GET["idCategory"];

			$answer = CategoriesModel::mdlDeleteCategory($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "The category has been successfully deleted",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';
			}
		
		}
		
	}

}