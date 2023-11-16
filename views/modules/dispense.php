<?php
if($_SESSION["profile"] == "Super Admin"){


}elseif($_SESSION["department"] != "Medical"){
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
            <h1>Dispensed List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Dispensed List Page</li>
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
          <a href="dispense"><button type="button" class="btn btn-success">Dispense Stocks</button></a>
        </div>

        <div class="card-body">
          <table id="table" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>SIV_No</th>
                <th>Stock_Keeper</th>
                <th>Dispensed_To</th>
                <th>Items</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php
              if($_SESSION["department"] == "All"){ 
                $item  = null;
                $value = null;

              $contractor  = ControllerDispense::ctrShowDispense($item, $value);
              foreach ($contractor as $key => $value) {
           echo'<tr>
                <td>'.($key+1).'</td>';
           echo'<td>'.$value["store_siv"].'</td>
                <td>'.$value["stockkeeper"].'</td>
                <td>'.$value["requisitioningunit"].'</td>
                <td>'.$value["dispenseditems"].'</td>
                <td>'.$value["entrydate"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-info btnPrintBill" saleCode="'.$value["id"].'"><i class="fa fa-print"></i></button>';
                    if($_SESSION["profile"] == "Super Admin"){
                      echo'
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCourse"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>';
                    }
            echo' </div>
                </td>     
                </tr>';
              }
            }else{

              $item  = "location";
              $value = $_SESSION["department"];

              $contract  = ControllerDispense::ctrShowDispensed($item, $value);
              foreach ($contract as $k => $val) {

           echo'<tr>
                <td>'.($k+1).'</td>';
           echo'<td>'.$val["store_siv"].'</td>
                <td>'.$val["stockkeeper"].'</td>
                <td>'.$val["requisitioningunit"].'</td>
                <td>'.$val["dispenseditems"].'</td>
                <td>'.$val["entrydate"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-info btnPrintBill" saleCode="'.$val["id"].'"><i class="fa fa-print"></i></button>';
                    if($_SESSION["profile"] == "Super Admin"){
                      echo'
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCourse"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>';
                    }
            echo' </div>
                </td>     
                </tr>';
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