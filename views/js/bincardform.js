/*=============================================
EDIT CUSTOMER
=============================================*/

$("#table").on("click", "tbody .btnEditDelivery", function(){

	var idDelivery = $(this).attr("idDelivery");

	var datum = new FormData();
    datum.append("idDelivery", idDelivery);

    $.ajax({

      url:"ajax/bincard.ajax.php",
      method: "POST",
      data: datum,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
      
      	 $("#idbincard").val(answer["binid"]);
	       $("#editproduct").val(answer["productid"]);
	       $("#editcontractorId").val(answer["contractorid"]);
	       $("#editsrv").val(answer["srvno"]);
	       $("#editquantity").val(answer["quantityreceived"]);
	       $("#editdaterev").val(answer["daycreated"]);
	  }

  	})

})