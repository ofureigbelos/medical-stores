<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">

  <!-- Brand Logo -->
  <a href="home" class="brand-link">
      <img src="views/img/template/MH_logo.png"
           alt="MH Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Medical | Store</span>
    </a>
    <!-- Brand Logo Ends -->

    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 
                <!-- Home Menu --> 
               <li class="nav-item">
                <a href="home" class="nav-link">
                  <i class="nav-icon fas fa-home"></i><p>Home</p>
                </a>
               </li>
               <!-- Home Menu -->

               <!-- User Menu -->
               <?php
               if($_SESSION["profile"] == "Super Admin"){
                echo'
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Users Profile<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="users" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>User Management</p>
                    </a>
                  </li>
                </ul>
              </li>';
            }
              ?>
              <!-- User Menu -->

              <!-- Bin Menu -->
              <!--<li class="nav-header">Bin-Card Data</li>--> 
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Bin-Card Data<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="bincard-data" class="nav-link">
                        <i class="fas fa-bars nav-icon"></i><p>Bin-card</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="products" class="nav-link">
                        <i class="fab fa-product-hunt nav-icon"></i><p>Product List</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="contractors" class="nav-link">
                        <i class=" fas fa-bars nav-icon"></i><p>Contractors</p>
                      </a>
                    </li><?php
                    if($_SESSION["profile"] == "Super Admin"){
                      echo'
                    <li class="nav-item">
                      <a href="bincard-report" class="nav-link">
                        <i class=" fas fa-bars nav-icon"></i><p>Bincard Report</p>
                      </a>
                    </li>';
                  }?>
                  </ul>
                </li>
               <!-- Bin Menu -->

                             <!-- Bin Menu -->
              <!--<li class="nav-header">Bin-Card Data</li>--> 
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dispense Item<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="stocks" class="nav-link">
                        <i class="fab fa-product-hunt nav-icon"></i><p>Check-Stock</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="stock-issue" class="nav-link">
                        <i class="fab fa-product-hunt nav-icon"></i><p>Dispense</p>
                      </a>
                    </li>

                  </ul>
                </li>
               <!-- Bin Menu -->

               


        </ul>
      </nav>

    </div>
  </aside>