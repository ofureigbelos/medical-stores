
var hiddenDepartm = $('#userdepartment').val();

$('.dispenseTable').DataTable({
	"ajax": "ajax/datatable-dispense.ajax.php?hiddenDepartm="+hiddenDepartm, 
	"deferRender": true,
	"retrieve": true,
	"processing": true
});


/*=============================================
ADDING PRODUCTS TO THE DISPENSE FROM THE TABLE
=============================================*/

$(".dispenseTable tbody").on("click", "button.addProductSale", function(){


	var idProduct = $(this).attr("idProduct");

	$(this).removeClass("btn-primary addProductSale");

	$(this).addClass("btn-default");

     $.ajax({

     	url: "ajax/stock.ajax.php",
      	method: "POST",
      	dataType: "json",
      	data: {idProduct:idProduct},
      	success:function(answer){
      		for(var b = 0; b < answer.length; b++){
      		var stock = answer[b].stock;
      		var description = answer[b].productid;
      	}
      		
      		console.log(idProduct, description, stock);
      		console.log(answer);

          	/*=============================================
          	AVOID ADDING THE PRODUCT WHEN ITS STOCK IS ZERO
          	=============================================*/

          	if(stock == 0){

      			swal({
			      title: "There's no stock available",
			      type: "error",
			      confirmButtonText: "¡Close!"
			    });

			    
			    $("button[idProduct='"+idProduct+"']").addClass("btn-primary addProductSale");

			    return;

          	}

          	$(".newProduct").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Product description -->'+
	          
	          '<div class="col-9" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-prepend"><button type="button" class="btn btn-danger btn-xs removeProduct" idProduct="'+idProduct+'"><i class="fa fa-times"></i></button></span>'+

	              '<input type="text" class="form-control newProductDescription" idProduct="'+idProduct+'" name="addProductSale" value="'+description+'" readonly required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Product quantity -->'+

	          '<div class="col">'+
	            
	             '<input type="number" class="form-control newProductQuantity" name="newProductQuantity" min="1" value="1" stock="'+stock+'" newStock="'+Number(stock-1)+'" required>'+

	          '</div>' +


	        '</div>')

	        listProducts()

      	}

     })

});


/*=============================================
WHEN TABLE LOADS EVERYTIME THAT NAVIGATE IN IT
=============================================*/

$(".dispenseTable").on("draw.dt", function(){

	if(localStorage.getItem("removeProduct") != null){

		var listIdProducts = JSON.parse(localStorage.getItem("removeProduct"));

		for(var a = 0; a < listIdProducts.length; a++){

			$("button.recoverButton[idProduct='"+listIdProducts[a]["idProduct"]+"']").removeClass('btn-default');
			$("button.recoverButton[idProduct='"+listIdProducts[a]["idProduct"]+"']").addClass('btn-primary addProductSale');

		}


	}


})



/*=============================================
REMOVE PRODUCTS FROM THE SALE AND RECOVER BUTTON
=============================================*/

var idRemoveProduct = [];

localStorage.removeItem("removeProduct");

$(".saleForm").on("click", "button.removeProduct", function(){

	console.log("$(this)", $(this));
	$(this).parent().parent().parent().parent().remove();

	console.log("idProduct", idProduct);
	var idProduct = $(this).attr("idProduct");

	/*=============================================
	STORE IN LOCALSTORAGE THE ID OF THE PRODUCT WE WANT TO DELETE
	=============================================*/

	if(localStorage.getItem("removeProduct") == null){

		idRemoveProduct = [];
	
	}else{

		idRemoveProduct.concat(localStorage.getItem("removeProduct"))

	}

	idRemoveProduct.push({"idProduct":idProduct});

	localStorage.setItem("removeProduct", JSON.stringify(idRemoveProduct));

	$("button.recoverButton[idProduct='"+idProduct+"']").removeClass('btn-default');

	$("button.recoverButton[idProduct='"+idProduct+"']").addClass('btn-primary addProductSale');

	if($(".newProducto").children().length == 0){

		$("#totalSale").val(0);
		$("#newTotalSale").attr("totalSale",0);

	}else{

        // GROUP PRODUCTS IN JSON FORMAT

        listProducts()

	}

})


/*=============================================
MODIFY QUANTITY
=============================================*/

$(".saleForm").on("change", "input.newProductQuantity", function(){

	var newStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("newStock", newStock);

	console.log("$(this).attr(\"stock\")", $(this).attr("stock"));
	if(Number($(this).val()) > Number($(this).attr("stock"))){

		/*=============================================
		IF QUANTITY IS MORE THAN THE STOCK VALUE SET INITIAL VALUES
		=============================================*/

		$(this).val(1);

		swal({
	      title: "The quantity is more than your stock",
	      text: "¡There's only"+$(this).attr("stock")+" units!",
	      type: "error",
	      confirmButtonText: "Close!"
	    });

	    return;

	}

	listProducts()

})


/*=============================================
LIST ALL THE PRODUCTS
=============================================*/

function listProducts(){



	var productsList = [];

	var description = $(".newProductDescription");

	var quantity = $(".newProductQuantity");

	for(var i = 0; i < description.length; i++){

		productsList.push({ "id" : $(description[i]).attr("idProduct"), 
							  "description" : $(description[i]).val(),
							  "quantity" : $(quantity[i]).val(),
							  "stock" : $(quantity[i]).attr("newStock")})

	}

	$("#productsList").val(JSON.stringify(productsList));

}




	$('.saleForm').on('submit', function(event){
		event.preventDefault();

	var poid = [];
	var prod = [];
	var quan = [];
	var stck = [];
	var stke = [];
	var loct = [];
	var year = [];
	var	sivn = [];
	var requ = [];

	var list = [];

	var description = $(".newProductDescription");

	var quantity = $(".newProductQuantity");

	for(var i = 0; i < description.length; i++){

		list.push({ "id" : $(description[i]).attr("idProduct"), 
					"description" : $(description[i]).val(), 
					"quantity" : $(quantity[i]).val(), 
					"stock" : $(quantity[i]).attr("newStock")})

		poid.push($(description[i]).attr("idProduct"));
		prod.push($(description[i]).val());
		quan.push($(quantity[i]).val());
		stck.push($(quantity[i]).attr("newStock"));

		stke.push($("#storekeeper").val());
		loct.push($("#location").val());
		year.push($("#dispenseyear").val());
		sivn.push($("#sivno").val());
		requ.push($("#unit").val());

	}

	$("#productsList").val(JSON.stringify(list));
	var nlist = $("#productsList").val();
	var nstke = $("#storekeeper").val();
	var nloct = $("#location").val();
	var nyear = $("#dispenseyear").val();
	var nsivn = $("#sivno").val();
	var nrequ = $("#unit").val();

	

	console.log(poid, prod, quan, stck, stke, loct, year, sivn, requ, nlist, "ofure");

	//
		
	$.ajax({
		url: "ajax/send.dispense.log.ajax.php",
		method: "POST",
		data: {poid:poid, prod:prod, quan:quan, stck:stck, stke:stke, loct:loct, year:year, sivn:sivn, requ:requ, nlist:nlist, nstke:nstke, nloct:nloct, nyear:nyear, nsivn:nsivn, nrequ:nrequ},
		success: function(){
			
			localStorage.removeItem("range");
			localStorage.clear();

			swal({
				type: "success",
				title: "The Items has been succesfully Dispensed",
				showConfirmButton: true,
				confirmButtonText: "Ok"
			}).then((result) => {
				if (result.value) {
					window.location = "dispense";
				}
			})
		}
	})
		
})


/*=============================================
FUNCTION TO DEACTIVATE "ADD" BUTTONS WHEN THE PRODUCT HAS BEEN SELECTED IN THE FOLDER
=============================================*/

function removeAddProductSale(){

	//We capture all the products' id that were selected in the sale
	var idProducts = $(".removeProduct");

	//We capture all the buttons to add that appear in the table
	var tableButtons = $(".dispenseTable tbody button.addProductSale");

	//We navigate the cycle to get the different idProducts that were added to the sale
	for(var i = 0; i < idProducts.length; i++){

		//We capture the IDs of the products added to the sale
		var button = $(idProducts[i]).attr("idProduct");
		
		//We go over the table that appears to deactivate the "add" buttons
		for(var j = 0; j < tableButtons.length; j ++){

			if($(tableButtons[j]).attr("idProduct") == button){

				$(tableButtons[j]).removeClass("btn-primary addProductSale");
				$(tableButtons[j]).addClass("btn-default");

			}
		}

	}
	
}

/*=============================================
EVERY TIME THAT THE TABLE IS LOADED WHEN WE NAVIGATE THROUGH IT EXECUTES A FUNCTION
=============================================*/

$('.dispenseTable').on( 'draw.dt', function(){

	removeAddProductSale();

})



/*=============================================
PRINT BILL
=============================================*/

$(".btnPrintBill").on("click", function(){

	var saleCode = $(this).attr("saleCode");

	window.open("extensions/TCPDF-main/examples/example_003.php", "_blank");

	//?code="+saleCode,

});