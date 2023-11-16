<?php
if($_SESSION["profile"] == "Super Admin"){


}elseif($_SESSION["department"] != "Pathology"){
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
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-tachometer-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">Dashboard Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php

    if($_SESSION["profile"] =="Super Admin" || $_SESSION["profile"] == "Record Officer"){

      include "home/top-box.php";

    }else{

    /*  echo '
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          <div class="card-tools"></div>
        </div>

        <!-- /.card-body -->
        <div class="card-body">
          <h1>Welcome ' .$_SESSION["name"].'</h1>
        </div>
        <!-- /.card-footer-->
        <div class="card-footer">
          Footer
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
    '; */
    include "home/top-box-user.php";
  }

?>
  </div>
  <!-- /.content-wrapper -->