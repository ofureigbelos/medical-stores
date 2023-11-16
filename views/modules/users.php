<?php
if($_SESSION["profile"] != "Super Admin"){

  echo '<script>
    window.location = "404";
  </script>';

  return;

}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">User Management Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUser">Add User</button>

        </div>
        <div class="card-body">

          <table id="table" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Photo</th>
                <th>Profile</th>
                <th>Status</th>
                <th>LastLogin</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php

              $item  = null;
              $value = null;

              $user  = ControllerUsers::ctrShowUsers($item, $value);

              foreach($user as $key => $row){
                echo
              '<tr>
                <td>'.($key+1).'</td>
                <td>'.$row["fullname"].'</td>
                <td>'.$row["username"].'</td>';

                if($row["photo"] != ""){
                  echo
                '<td><img src="'.$row["photo"].'" class="img-thumbnail" width="40px;"></td>';
              }else{
                echo
                '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px;"></td>';
              }

                echo '<td>'.$row["profile"].'</td>';

                if($row["status"] != 0){
                  echo
                '<td><button class="btn btn-success btn-activate" userId="'.$row["id"].'" userStatus="0" style="line-height: 0.6; font-size: 12px;">Activated</button></td>';
              }else{
                echo
                '<td><button class="btn btn-danger btn-activate" userId="'.$row["id"].'" userStatus="1" style="line-height: 0.6; font-size: 12px;">Deactivated</button></td>';
              }
                echo '<td>'.$row["lastLogin"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btn-edit-user" edituserId="'.$row["id"].'" data-toggle="modal" data-target="#editUser"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger btn-delete-user" deleteuserId="'.$row["id"].'" username="'.$row["username"].'" userphoto="'.$row["photo"].'"><i class="fas fa-times"></i></button>
                  </div>
                </td>

              </tr>';

            }

              ?>
            </tbody>
          </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


        <div class="modal fade" id="addUser">
        <div class="modal-dialog">
          <div class="modal-content">

            <form method="POST" enctype="multipart/form-data">

            <div class="modal-header" style="background: #dc3545; color: white">
              <h4 class="modal-title">Add New User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
     <!-- /.modal-body -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                  <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" required="required">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                  <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required="required">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-lock"></i></span></div>
                  <input type="password" class="form-control" placeholder="Enter Password" name="password" required="required">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                  <select class="form-control" name="profile" required="required">
                    <option value="">Select User Level</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Record Officer">Record Officer</option>
                    <option value="Desk Officer">Record Desk</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Upload Image</label>
                <input type="file" class="form-control" name="userPhoto" id="userPhoto">
                <p class="help-block">Maximum size 2Mb</p>
                <img class="img-thumbnail preview" src="views/img/users/default/anonymous.png" width="100px">
              </div>
    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>

            <?php
              $createUser =  new ControllerUsers();
              $createUser -> ctrCreateUser();
            ?>

          </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->