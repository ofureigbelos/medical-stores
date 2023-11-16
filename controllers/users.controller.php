<?php

class ControllerUsers {

/*  ====================================
	       User Login ctr Method
	====================================  */

	static public function ctrLoginUser(){
		# code...

		if(isset($_POST["submit"])){

			$userN =  $_POST["loginname"];
            $passW =  $_POST["password"];

            #$passH = hash('sha512', $passW);
            $passH = crypt($passW, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $table = 'users';

            $item = 'username';

            $value = $userN;

            $answer = UsersModel::mdlShowUsers($table, $item, $value);

            #password_verify($passW, $row['User_Password'])  password_verify($passH, 

           // var_dump($answer);

            if($answer["username"] == $userN && $answer["password"] == $passH){

            	if($answer["status"] == 1){

            		$_SESSION["loggedIn"] = "ok";
					$_SESSION["id"] = $answer["id"];
					$_SESSION["name"] = $answer["fullname"];
					$_SESSION["user"] = $answer["username"];
					$_SESSION["photo"] = $answer["photo"];
					$_SESSION["profile"] = $answer["profile"];
					$_SESSION["department"] = $answer["department"];
					$_SESSION["date"] = $answer["date"];

					/*=============================================
						Register date to know last_login
					=============================================*/

					date_default_timezone_set("America/Bogota");

					$date = date('Y-m-d');
					$hour = date('H:i:s');

					$actualDate = $date.' '.$hour;

					$item1 = "lastLogin";
					$value1 = $actualDate;

					$item2 = "id";
					$value2 = $answer["id"];

					$lastLogin = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2); 

					if($lastLogin == "ok"){ 

						echo '<script>
								window.location = "home";
							  </script>';
							}

				}else { echo '<br><div class="alert alert-danger">User is deactivated</div>'; }
            
            }else { echo '<br><div class="alert alert-danger">Username or Password incorrect</div>'; }

		}
	}



/*  ====================================
	      Create User ctr Method
	====================================  */

	static public function ctrCreateUser(){

		if(isset($_POST["submit"])){

			$fname = $_POST["fullname"];
			$uname = $_POST["username"];
			$passw = $_POST["password"];
			$pfile = $_POST["profile"];

			#$passH = hash('sha512', $passw);
            $passH = crypt($passw, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            
            #$options = ['cost' => 12,];

            #$passw = password_hash($passH, PASSWORD_BCRYPT, $options); 


            /*=============================================
						 VALIDATE IMAGE
			=============================================*/

			$photo = "";

			if (isset($_FILES["userPhoto"]["tmp_name"])){

				list($width, $height) = getimagesize($_FILES["userPhoto"]["tmp_name"]);

				$newWidth = 500;
				$newHeight = 500;

				/*=============================================
					Let's create the folder for each user
				=============================================*/

				$folder = "views/img/users/".$uname;

				mkdir($folder, 0755);

				/*=============================================
					PHP functions depending on the image
				=============================================*/

				if($_FILES["userPhoto"]["type"] == "image/jpeg"){

					$randomNumber = mt_rand(100,999);
						
					$photo = "views/img/users/".$uname."/".$randomNumber.".jpg";
						
					$srcImage = imagecreatefromjpeg($_FILES["userPhoto"]["tmp_name"]);
						
					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagejpeg($destination, $photo);

				}

				if ($_FILES["userPhoto"]["type"] == "image/png") {

					$randomNumber = mt_rand(100,999);
						
					$photo = "views/img/users/".$uname."/".$randomNumber.".png";
						
					$srcImage = imagecreatefrompng($_FILES["userPhoto"]["tmp_name"]);
						
					$destination = imagecreatetruecolor($newWidth, $newHeight);

					imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

					imagepng($destination, $photo);
				}

			}

			$table = 'users';

			$data = array('fullname' => $fname,
				          'username' => $uname,
                          'password' => $passH,
                          'profile' => $pfile,
						  'photo' => $photo);

			$answer = UsersModel::mdlAddUser($table, $data);

			if ($answer == 'ok') {

				echo '<script>
						swal({
							type: "success",
							title: "¡User added succesfully!",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){

								if(result.value){
									window.location = "users";
								}

							});

						</script>';

				}else{

				echo '<script>
					
					swal({
						type: "error",
						title: "Data not sent !",
						showConfirmButton: true,
						confirmButtonText: "Close"
			
						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
					
				</script>';
			}



		}

		/*else{

				echo '<script>
					
					swal({
						type: "error",
						title: "Data not sent !",
						showConfirmButton: true,
						confirmButtonText: "Close"
			
						}).then(function(result){

							if(result.value){

								window.location = "users";
							}

						});
					
				</script>';
			}
			*/


	}


/*  ====================================
	      Show Users List Method
	====================================  */

	static public function ctrShowUsers($item, $value){

		$table = "users";

		$answer = UsersModel::mdlShowUsers($table, $item, $value);

		return $answer;
	}


/*  ====================================
	      Edit User Method
	====================================  */

	static public function ctrEditUser(){}


/*  ====================================
	      Delete User Method
	====================================  */

	static public function ctrDeleteUser(){}


}