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
            <h1>Products List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Products Page</li>
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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProduct">Create Store Item</button>
        </div>
        <div class="card-body">
          <table id="table" class="table table-bordered dt-responsive table-striped">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Product</th>
                <th>Store</th>
                <th>Date_Created</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              if($_SESSION["department"] == "All"){ 
                $item  = null;
                $value = null;

              $product  = ControllerProductList::ctrShowProducts($item, $value);
              foreach ($product as $key => $value) {
           echo'<tr>
                <td>'.($key+1).'</td>';
           echo'<td>'.$value["product"].'</td>
                <td>'.$value["storelocation"].'</td>
                <td>'.$value["date_created"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCourse"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>     
                </tr>';
              }
            }else{

              $item  = "storelocation";
              $value = $_SESSION["department"];

              $produc = ControllerProductList::ctrShowProducts($item, $value);
              foreach ($produc as $k => $val) {
           echo'<tr>
                <td>'.($k+1).'</td>';
           echo'<td>'.$val["product"].'</td>
                <td>'.$val["storelocation"].'</td>
                <td>'.$val["date_created"].'</td>';
           echo'<td>
                  <div class="btn-group">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCourse"><i class="fas fa-pencil-alt" style="color: white;"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
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




    <div class="modal fade" id="addProduct">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" enctype="multipart/form-data">

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

            <?php
              $createProduct =  new ControllerProductList();
              $createProduct -> ctrCreateProduct();
            ?>

          </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->