
$("#userPhoto").change(function(){

	var userImage = this.files[0];

	/*===============================================
	=            	 Validate Image            =
	===============================================*/

	if(userImage["type"] != "image/jpeg" && userImage["type"] != "image/png"){

		$("#userPhoto").val("");

		swal({
			type: "error",
			title: "Error Uploading Image",
			text: "¡Image has to be a jpeg or png",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else if(userImage["size"] > 2000000){

		$("#userPhoto").val("");

		swal({
			type: "error",
			title: "Error Uploading Image",
			text: "¡Image file size exceeds 2MB",
			showConfirmButton: true,
			confirmButtonText: "Close"
		});

	}else{

		var imageData = new FileReader;
		imageData.readAsDataURL(userImage);

		$(imageData).on("load", function(e){

			var imageURL = e.target.result;

			$(".preview").attr("src", imageURL)
		});
	}

/* === Image Validation Ends === */
});


$("#username").change(function(){

	$(".alert").remove();

	var user = $(this).val();

	var data = new FormData();
 	data.append("validateUser", user);

  	$.ajax({

	  url:"ajax/users.ajax.php",
	  method: "POST",
      dataType: "json",
	  data: data,
	  //cache: false,
      processData: false,
      contentType: false,
      success: function(answer){ 

      	 console.log("answer", answer);

      	if(answer){

      		$("#username").parent().after('<div class="alert alert-warning">This user is already taken</div>');
      		
      		$("#username").val('');
      	}

      }

    });

});