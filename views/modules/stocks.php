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
            <h1>Stocks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Stocks Page</li>
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
          <a href="stock-issue"><button type="button" class="btn btn-success">Dispense Stocks</button></a>
        </div>
        <div class="card-body">
          <table class="table table-bordered dt-responsive table-striped stockTable">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Entry Date</th>
                <th>Actions</th>
              </tr>
            </thead>
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