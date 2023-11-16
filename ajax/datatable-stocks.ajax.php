<?php

require_once "../controllers/stocks.controller.php";
require_once "../models/stocks.model.php";

class stocksTable{

	public function showStocksTable(){

		if (isset($_GET["hiddenDepartm"]) && $_GET["hiddenDepartm"] == "All"){

			$item = null;
			$value = null;

			$items = ControllerStocks::ctrShowStocks($item, $value);

			if(count($items) == 0){
				$jsonData = '{"data":[]}';
				echo $jsonData;
				return;
			}

			$jsonData = '{
				"data":[';

				for($i=0; $i < count($items); $i++){

					$description = $items[$i]["productid"];

					if($items[$i]["stock"] <= 500){
						$stock = "<button class='btn btn-danger' style='color: white;'>".$items[$i]["stock"]."</button>";
					}else if($items[$i]["stock"] > 600 && $items[$i]["stock"] <= 1500){
						$stock = "<button class='btn btn-warning' style='color: white;'>".$items[$i]["stock"]."</button>";
					}else{
						$stock = "<button class='btn btn-success'>".$items[$i]["stock"]."</button>";
					}

					$created = $items[$i]["stockdate"];

					if (isset($_GET["hiddenProfile"]) && $_GET["hiddenProfile"] == "Super Admin") {
		  		$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$items[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fas fa-pencil-alt' style='color: white;'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$items[$i]["id"]."' code='".$items[$i]["id"]."' image='".$items[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
		  			}
		  			else{
		  		$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$items[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fas fa-pencil-alt' style='color: white;'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$items[$i]["id"]."' code='".$items[$i]["code"]."' image='".$items[$i]["image"]."'><i class='fa fa-times'></i></button></div>";
		  			}

		  			$jsonData .='[
						"'.($i+1).'",
						"'.$description.'",
						"'.$stock.'",
						"'.$created.'",
						"'.$buttons.'"
					],';

				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;

		}else{

			$item = "storelocation";
			$value = $_GET["hiddenDepartm"];

			$items = ControllerStocks::ctrShowStocks($item, $value);

			if(count($items) == 0){
				$jsonData = '{"data":[]}';
				echo $jsonData;
				return;
			}

			$jsonData = '{
				"data":[';

				for($i=0; $i < count($items); $i++){

					$description = $items[$i]["productid"];

					if($items[$i]["stock"] <= 500){
						$stock = "<button class='btn btn-danger' style='color: white;'>".$items[$i]["stock"]."</button>";
					}else if($items[$i]["stock"] > 600 && $items[$i]["stock"] <= 1500){
						$stock = "<button class='btn btn-warning' style='color: white;'>".$items[$i]["stock"]."</button>";
					}else{
						$stock = "<button class='btn btn-success'>".$items[$i]["stock"]."</button>";
					}

					$created = $items[$i]["stockdate"];

					if (isset($_GET["hiddenProfile"]) && $_GET["hiddenProfile"] == "Super Admin") {
		  		$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$items[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fas fa-pencil-alt' style='color: white;'></i></button></div>";
		  			}else{
		  		$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$items[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fas fa-pencil-alt' style='color: white;'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$items[$i]["id"]."' code='".$items[$i]["id"]."' image='".$items[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
		  			}

		  			$jsonData .='[
						"'.($i+1).'",
						"'.$description.'",
						"'.$stock.'",
						"'.$created.'",
						"'.$buttons.'"
					],';

				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
		}
}

}

$activateProducts = new stocksTable();
$activateProducts -> showStocksTable();