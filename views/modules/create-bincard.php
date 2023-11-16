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
            <h1>Create Bin-Card</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Bin-Card Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="card">
        
        <div class="card-header" style="background: #28a745; color: white">
        </div>

        <form method="POST">
        <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                    </div>
                    <select class="form-control select2" name="productId" required="required">
                      <option value="">Select Item Description</option>
                      <?php
                      if($_SESSION["department"] == "All"){
                        $item   = null;
                        $value  = null;

                      $product = ControllerProductList::ctrShowProducts($item, $value);
                      foreach ($product as $key => $row_val) {
                        echo'<option value="'.$row_val["product"].'">'.$row_val["product"].'</option>';
                      }
                    }else{
                      $item   = "storelocation";
                      $value  = $_SESSION["department"];

                      $product = ControllerProductList::ctrShowProducts($item, $value);
                      foreach ($product as $key => $row_val) {
                        echo'<option value="'.$row_val["product"].'">'.$row_val["product"].'</option>';
                      }
                    }
                      ?>
                    
                    </select>
                    <div class="input-group-prepend"><span class="input-group-text" data-toggle="modal" data-target="#addbinProduct" data-dismiss="modal"><i class="fas fa-plus"></i></span></div>
                  </div>
                </div>
              </div>
            
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                    </div>
                    <select class="form-control select2" name="contractorId" required="required">
                      <option value="">Select Contractor's Name or Company Name</option>
                      <?php
                      if($_SESSION["department"] == "All"){
                       $item   = null;
                       $value  = null;
                      $company = ControllerContractors::ctrShowContractors($item, $value);
                      foreach ($company as $key => $row_val) {
                        echo'<option value="'.$row_val["companyname"].'">'.$row_val["companyname"].'</option>';
                      }
                    }else{
                      $item   = "storelocation";
                      $value  = $_SESSION["department"];
                      $company = ControllerContractors::ctrShowContractors($item, $value);
                      foreach ($company as $key => $row_val) {
                        echo'<option value="'.$row_val["companyname"].'">'.$row_val["companyname"].'</option>';
                      }
                    }
                      ?>
                    </select>
                    <div class="input-group-prepend"><span class="input-group-text" data-toggle="modal" data-target="#addbinContractor" data-dismiss="modal"><i class="fas fa-plus"></i></span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="text" class="form-control" placeholder="SRV No" name="srv">

                    <input type="hidden" name="userdepartment" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>"><input type="hidden" name="username" id="username" value="<?php echo $_SESSION["name"]; ?>">
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="number" class="form-control" min="0" placeholder="Quantity Recieved" name="quantity" required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="date" class="form-control" placeholder="Date" name="daterev" required="">
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" name="submita" class="btn btn-primary">Save changes</button>
        </div>
        <!-- /.card-footer-->
        <?php
          $createbincard =  new ControllerBinCard();
          $createbincard -> ctrCreateBincard();
        ?>
      </form>
      
      </div>
      <!-- /.card -->
      
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 <!-- /.modal -->
<div class="modal fade" id="addbinProduct">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">

          <div class="modal-header" style="background: #dc3545; color: white">
            <h4 class="modal-title">Create Store Items</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <!-- /.modal-body -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fab fa-product-hunt"></i></span></div>
                <input type="text" class="form-control" placeholder="Item Description" name="product" id="product" required="">
                <input type="hidden" name="userdepartment" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>">
              </div>
            </div>
    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            
          </form>
          <?php
              $createBinProduct =  new ControllerProductList();
              $createBinProduct -> ctrCreateBinProduct();
          ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




  <div class="modal fade" id="addbinContractor">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">

          <div class="modal-header" style="background: #dc3545; color: white">
            <h4 class="modal-title">Create New Contractor</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <!-- /.modal-body -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-building"></i></span></div>
                <input type="text" class="form-control" placeholder="Enter CompanyName" name="company" required="">
              </div>
            </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                  <input type="email" class="form-control" placeholder="Enter Email" name="email" required="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                  <input type="text" class="form-control" placeholder="Enter Phone-Number" name="phone" required="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-home"></i></span></div>
                  <input type="text" class="form-control" placeholder="Enter Address" name="address">
                <input type="hidden" name="userdepartment" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>">
                </div>
              </div>
    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="savecon" class="btn btn-primary">Save changes</button>
            </div>

          </form>
            <?php
              $createBinContractor =  new ControllerContractors();
              $createBinContractor -> ctrCreateBinContractors();
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->