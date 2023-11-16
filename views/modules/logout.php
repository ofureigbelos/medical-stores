<?php

	
	unset($_SESSION["loggedIn"]);
	unset($_SESSION["id"]);
	unset($_SESSION["name"]);
	unset($_SESSION["user"]);
	unset($_SESSION["photo"]);
	unset($_SESSION["profile"]);

	session_destroy();

	if(isset($_SESSION["loggedIn"])){

	}else{

		echo '<script>
				window.location = "login";
			  </script>';

		}