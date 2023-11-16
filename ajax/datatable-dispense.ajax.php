<?php

require_once "../controllers/stocks.controller.php";
require_once "../models/stocks.model.php";

class dispenseTable{

	public function showDispenseTable(){

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

					

					$buttons =  "<div class='btn-group'><button class='btn btn-primary addProductSale recoverButton' idProduct='".$items[$i]["id"]."'>Add</button></div>";
		  			

		  			$jsonData .='[
						"'.($i+1).'",
						"'.$description.'",
						"'.$stock.'",
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

					

					$buttons =  "<div class='btn-group'><button class='btn btn-primary addProductSale recoverButton' idProduct='".$items[$i]["id"]."'>Add</button></div>";
		  			

		  			$jsonData .='[
						"'.($i+1).'",
						"'.$description.'",
						"'.$stock.'",
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

$activateDispense = new dispenseTable();
$activateDispense -> showDispenseTable();