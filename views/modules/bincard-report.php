<?php
if($_SESSION["profile"] != "Super Admin"){

  echo '<script>
    window.location = "404";
  </script>';

  return;

}

?>


    <?php
    
    $querya = "SELECT productid FROM stocks";

    $stmta = Connection::Connect()->prepare($querya);

    $stmta -> execute();
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bincard Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Bincard Report Page</li>
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
          <div class="row">
            <div class="col-md-3"><?php 
            if(isset($_POST["prodname"])){

              $name = $_POST["prodname"];


              $table = "stocks";
              $item  = "productid";
              $value = $name;

              $remainder = ModelStocks::mdlShowStock($table, $item, $value);

              

              if($remainder["stock"] > 1000){
                    echo '<h2>
                      <span class="text">Stock Left:</span>
                      <small class="badge badge-success"><i class="fas fa-shopping-cart"></i> '.$remainder["stock"].'</small>
                    </h2>';
                  }else{
                    echo '<h2>
                      <span class="text">Stock Left:</span>
                      <small class="badge badge-danger"><i class="fas fa-shopping-cart"></i> '.$remainder["stock"].'</small>
                    </h2>';
                  }

              

          }

              
          
            ?>
            </div>
            <div class="col-md-9">
              <form method="POST">
                <div class="row">

                  <div class="col-7">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-graduate"></i></span></div>
                        <select name="prodname" id="prodname" class="form-control" required="">
                          <option value="">Select Item</option>
                          <?php
                          while($row = $stmta->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row["productid"].'">'.$row["productid"].'</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group-append">
                      <button type="submit" name="search" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-body">
          <table id="table" class="table table-bordered dt-responsive table-striped">
          <!--<table class="table table-bordered dt-responsive table-striped stockTable">-->
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Description</th>
                <th>Supply/Request</th>
                <th>SRV_No</th>
                <th>SIV_No</th>
                <th>QR/QD</th>
                <th>Entry Date</th>
              </tr>
            </thead>
            <tbody>
            
              <?php

              $bincard  = ControllerDispense::ctrBincardReport();
              if($bincard != null){
              foreach ($bincard as $key => $value) {
           echo'<tr>
                <td>'.($key+1).'</td>';
           echo'<td>'.$value["item"].'</td>
                <td>'.$value["request"].'</td>
                <td>'.$value["srvno"].'</td>
                <td>'.$value["siv"].'</td>
                <td>'.$value["quantity"].'</td>
                <td>'.$value["day"].'</td>';
           echo'</tr>';
              }
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