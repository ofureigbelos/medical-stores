<?php

//require_once "../connections/pdo-connection.php";

require_once "../controllers/dispense.controller.php";
require_once "../models/dispense.model.php";
require_once "../models/stocks.model.php";


class AjaxDispense{

	public function ctrDispenseItem(){

		if(isset($_POST["poid"])){

			/*=============================================
			UPDATE CUSTOMER'S PURCHASES AND REDUCE THE STOCK AND INCREASE SALES OF THE PRODUCT
			=============================================*/
			$storekeeper_name = $_POST["nstke"];
			$storekeeper_dept = $_POST["nloct"];
			$storesiv_number  = $_POST["nsivn"];
			$dispense_year 	  = $_POST["nyear"];
			$requisiting_unit = $_POST["nrequ"];
			$dispense_list	  = $_POST["nlist"];

			$productsList = json_decode($dispense_list, true);

			$totalPurchasedProducts = array();

			foreach ($productsList as $key => $value) {

			   array_push($totalPurchasedProducts, $value["quantity"]);
				
			   $tableStocks = "stocks";

			    $item = "id";
			    $valueProductId = $value["id"];

			    $getProduct = ModelStocks::mdlShowStock($tableStocks, $item, $valueProductId);

				$item1a = "stockout";
				$value1a = $value["quantity"] + $getProduct["stockout"];

			    $newSales = ModelStocks::mdlNewStockUpdate($tableStocks, $item1a, $value1a, $valueProductId);

				$item1b = "stock";
				$value1b = $value["stock"];

				$newStock = ModelStocks::mdlNewStockUpdate($tableStocks, $item1b, $value1b, $valueProductId);

			}
			/*=============================================
			SAVE THE DISPENSE
			=============================================*/	



			$table = "dispense";

			$data = array("username"=>$storekeeper_name,
						   "userdept"=>$storekeeper_dept,
						   "stockcode"=>$storesiv_number,
						   "issueyear"=>$dispense_year,
						   "unit"=>$requisiting_unit,
						   "product"=>$dispense_list);

			$answer = ModelDispense::mdlDispenseItem($table, $data);

			/*if($answer == "ok"){
				echo'<script>

				</script>';
			}else{}*/


	$productId = $_POST["poid"];
	$productNa = $_POST["prod"];
	$productQu = $_POST["quan"];
	$newStocks = $_POST["stck"];
	$storeKeep = $_POST["stke"];
	$storeLoca = $_POST["loct"];
	$dispeYear = $_POST["year"];
	$dispenSiv = $_POST["sivn"];
	$requisit  = $_POST["requ"];

	for($i = 0; $i < count($productId); $i++){

		$dat = array(':productId' => $productId[$i],
					  ':productNa' => $productNa[$i],
					  ':productQu' => $productQu[$i],
					  ':newStocks' => $newStocks[$i],
					  ':storeKeep' => $storeKeep[$i],
					  ':storeLoca' => $storeLoca[$i],
					  ':dispeYear' => $dispeYear[$i],
					  ':dispenSiv' => $dispenSiv[$i],
					  ':requisit'  => $requisit[$i]);

		$query = "INSERT INTO dispenselog(dispenseItemId, dispenseProduct, dispenseQuantity, stockLeft, userName, storeLocation, dispenseYear, sivNum, requestUnit) VALUES(:productId, :productNa, :productQu, :newStocks, :storeKeep, :storeLoca, :dispeYear, :dispenSiv, :requisit)";

		$stmt = Connection::Connect()->prepare($query);

		$stmt -> execute($dat);
	}


} 

} 

}



$sendDispense = new AjaxDispense();
$sendDispense -> ctrDispenseItem();






/*if(isset($_POST["poid"])){


}*/

?>