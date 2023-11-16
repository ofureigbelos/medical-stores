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
            <h1>Dispense Items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Stock-Issue Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Start Dispense Row -->
      <div class="row">

        <div class="col-lg-5">
          <div class="card card-success card-outline">
            <form method="Post" class="saleForm">
              <div class="card-body">

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                    <input type="text" class="form-control" name="storekeeper" storekeeper[]="<?php echo $_SESSION["name"]; ?>" id="storekeeper" value="<?php echo $_SESSION["name"]; ?>" readonly required="">
                    <input type="hidden" class="form-control" name="location" location[]="<?php echo $_SESSION["department"]; ?>" id="location" value="<?php echo $_SESSION["department"]; ?>" required="">
                    <input type="hidden" class="form-control" name="dispenseyear" dispenseyear[]="<?php echo date('Y')?>" id="dispenseyear" value="<?php echo date('Y')?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <?php 
                      $item = "location";
                      $value =  $_SESSION["department"];

                      $year = date('Y');

                      $dispend = ControllerDispense::ctrShowDispense($item, $value);

                      if(!$dispend){
                        echo'<input type="text" class="form-control" name="sivno" id="sivno" value="001" readonly>';

                      }else{

                        foreach ($dispend as $key => $value) {
                          # code...
                        }

                        if($value["year"] != $year){
                          echo'<input type="text" class="form-control" name="sivno" id="sivno" value="001" readonly>';
                        }elseif ($value["year"] == $year) {
                          $code = $value["store_siv"] +'001';
                          echo'<input type="text" class="form-control" name="sivno" id="sivno" value="'.$code.'" readonly>';
                        }
 
                      }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-shopping-cart"></i></span></div>
                    <select class="form-control" name="unit" id="unit" required="required">
                      <option value="">Select Requester</option>
                      <?php
                       if($_SESSION["department"] == "All"){
                        $item  = null;
                        $value = null;

                        $requester = ControllerUnit::ctrShowUnit($item, $value);
                        foreach ($requester as $key => $value) {
                           echo'<option value="'.$value["unit_name"].'">'.$value["unit_name"].'</option>';
                         }

                       }else{

                          $item = "storelocation";
                          $value =  $_SESSION["department"];

                          $requester = ControllerUnit::ctrShowUnit($item, $value);
                          foreach ($requester as $key => $value) {
                            echo'<option value="'.$value["unit_name"].'">'.$value["unit_name"].'</option>';
                          }
                        } 
                      ?>
                      
                    </select>
                    <span class="input-group-append"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAddUnit" data-dismiss="modal">Add Unit</button></span>
                  </div>
                </div>

                <div class="form-group row newProduct">
                  
                </div>
                <input type="hidden" name="productsList" id="productsList">


              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" name="dispense_item" id="dispense_item" class="btn btn-primary">Dispense Items</button>
              </div>
              <?php 
                #$dispenseItem = new ControllerDispense();
                #$dispenseItem -> ctrDispenseItem();
              ?>
            </form>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card card-warning card-outline">
            <div class="card-body">
              <table class="table table-bordered dt-responsive table-striped dispenseTable">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                     <th style="width:auto;">Description</th>
                     <th>Stock</th>
                     <th>Actions</th>
                  </tr>
                </thead>
              </table>
              <input type="hidden" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>">
            </div>
          </div>
        </div>

      </div>
      <!-- End Dispense Row -->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




   <!-- /.modal -->
<div class="modal fade" id="modalAddUnit">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">

          <div class="modal-header" style="background: #dc3545; color: white">
            <h4 class="modal-title">Create Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <!-- /.modal-body -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-product-hunt"></i></span></div>
                <input type="text" class="form-control" placeholder="Enter Unit Name" name="unit" required="">
                <input type="hidden" name="userdepartment" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>">
              </div>
            </div>
    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="saveunit" class="btn btn-primary">Save changes</button>
            </div>
            
          </form>
          <?php
              $createUnit =  new ControllerUnit();
              $createUnit -> ctrCreateUnit();
          ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->