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
            <h1>Bin-Card Items</h1>
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
        <div class="card-header">
          <a href="create-bincard"><button type="button" class="btn btn-success">Create Bin-Card</button></a>
        </div>

        <div class="card-body">
          <table id="table" class="table table-bordered dt-responsive table-striped">
          <!--<table class="table table-bordered dt-responsive table-striped stockTable">-->
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Description</th>
                <th>Contractor</th>
                <th>SRV_No</th>
                <th>Quantity</th>
                <th>Entry Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            
              <?php
              
              if($_SESSION["department"] == "All"){
                $item  = null;
                $value = null;

              $bincard  = ControllerBinCard::ctrShowBincard($item, $value);
              foreach ($bincard as $key => $value) {
           echo'<tr>
                <td>'.($key+1).'</td>';
           echo'<td>'.$value["productid"].'</td>
                <td>'.$value["contractorid"].'</td>
                <td>'.$value["srvno"].'</td>
                <td>'.$value["quantityreceived"].'</td>
                <td>'.$value["daycreated"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditDelivery" data-toggle="modal" data-target="#editSocks" idDelivery="'.$value["binid"].'"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>     
                </tr>';
              }
            }else{

              $item  = "department";
              $value = $_SESSION["department"];

              $bin  = ControllerBinCard::ctrShowBincard($item, $value);
              foreach ($bin as $k => $val) {
           echo'<tr>
                <td>'.($k+1).'</td>';
           echo'<td>'.$val["productid"].'</td>
                <td>'.$val["contractorid"].'</td>
                <td>'.$val["srvno"].'</td>
                <td>'.$val["quantityreceived"].'</td>
                <td>'.$val["daycreated"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnEditDelivery" data-toggle="modal" data-target="#editSocks" idDelivery="'.$val["binid"].'"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>     
                </tr>';
            }
          }
              ?>
            </tbody>
          </table>
          <input type="hidden" value="<?php echo $_SESSION['profile']; ?>" id="hiddenProfile">
          <input type="hidden" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>">
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




  <div class="modal fade" id="editSocks">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">

          <div class="modal-header" style="background: #dc3545; color: white">
            <h4 class="modal-title">Edit Item SRV_No</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <!-- /.modal-body -->
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="editproduct" id="editproduct" required="required" readonly="">
                    <input type="hidden" name="idbincard" id="idbincard" required="" readonly="">
                  </div>
                </div>
              </div>
            
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-shipping-fast"></i></span>
                    </div>
                    <input type="text" class="form-control" name="editcontractorId" id="editcontractorId" required="required" readonly="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="text" class="form-control" placeholder="SRV No" name="editsrv" id="editsrv" required="">

                    <input type="hidden" name="userdepartment" id="userdepartment" value="<?php echo $_SESSION["department"]; ?>"><input type="hidden" name="username" id="username" value="<?php echo $_SESSION["name"]; ?>">
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                    <input type="number" class="form-control" min="0" placeholder="Quantity Recieved" name="editquantity" id="editquantity" required="" readonly="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar"></i></span></div>
                    <input type="text" class="form-control" placeholder="Date" name="editdaterev" id="editdaterev" required="" readonly="">
                  </div>
                </div>
              </div>
            </div>
    <!-- /.modal-body -->
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="savecadedit" class="btn btn-primary">Save changes</button>
            </div>

            <?php
              $editBinCard =  new ControllerBinCard();
              $editBinCard -> ctrEditBincard();
            ?>

          </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->