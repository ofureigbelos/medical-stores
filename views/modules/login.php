<body class="hold-transition login-page">
  <div></div>
  
<div class="login-box">

  <div class="login-logo">
    <img src="views/img/template/MH_header.png" >
  </div>
  <!-- /.login-logo -->

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="loginname" placeholder="Enter Username" required="">
          <div class="input-group-append input-group-text">
              <span class="fas fa-user"></span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

        <?php 
          $login = new ControllerUsers();
          $login -> ctrLoginUser();
         ?>

      </form>

      <!-- /.social-auth-links --

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>

      -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->