<body class="sidebar-mini" cz-shortcut-listen="true">
  <div class="wrapper">          
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="assets/img/sidebar.jpg">
      <div class="logo">
        <a href="" class="simple-text logo-mini">G</a>
        <a href="index.php" class="simple-text logo-normal">Gasoline</a>
      </div>
      <div class="sidebar-wrapper"> 
        <div class="user">
          <div class="photo">
              <img src="assets/img/faces/avatar.jpg">
          </div>
          <div class="user-info">
              <a class="username">
                  <span><?php echo $_SESSION['user_name']; ?></span>
              </a>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item <?php if($title == 'Dashboard') echo 'active'; ?>">
            <a class="nav-link" href="index.php"><i class="material-icons">dashboard</i><p>Entry</p></a>
          </li>
          <?php
          $nav_admin = array("A01","A02","A03","A04","A05","A06");
          if(array_intersect($nav_admin, $user_access)){ 
          ?>
          <?php
              if(in_array('A01', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'Stock Update') echo 'active'; ?>">
                <a class="nav-link" href="stockup.php">
                  <i class="material-icons">all_inbox</i><p>Stock Update</p>
                </a>
            </li>
          <?php } ?>
         
          <?php
              if(in_array('A02', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'User Management') echo 'active'; ?>">
                <a class="nav-link" href="user_mgnt.php">
                  <i class="material-icons">face</i><p>User Management</p>
                </a>
            </li>
          <?php } ?>
           
          <?php
              if(in_array('A05', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'Fuel') echo 'active'; ?>">
                <a class="nav-link" href="fuel.php">
                  <i class="material-icons">local_gas_station</i><p>Add Fuel</p>
                </a>
            </li>
          <?php } ?>
          <?php
              if(in_array('A06', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'Sales') echo 'active'; ?>">
                <a class="nav-link" href="sales.php">
                  <i class="material-icons">local_grocery_store</i><p>Sales</p>
                </a>
            </li>
          <?php } ?>
          <?php
              if(in_array('A04', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'Expense') echo 'active'; ?>">
                <a class="nav-link" href="expense.php">
                  <i class="material-icons">monetization_on</i><p>Expense</p>
                </a>
            </li>
          <?php } ?>
           <?php
              if(in_array('A03', $user_access)){
            ?>
            <li class="nav-item <?php if($title == 'Reports') echo 'active'; ?>">
                <a class="nav-link" href="reports.php">
                  <i class="material-icons">assessment</i><p>Reports</p>
                </a>
            </li>
          <?php } ?>
          <?php
          }
          ?>
        </ul>    
      </div>
      <div class="sidebar-background" style="background-image: url(assets/img/sidebar.jpg) "></div>
    </div>
      <div class="main-panel">
              <!-- NAVBAR STARTS -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" id="navigation-example">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                  <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                  <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
              </div>
              <a class="navbar-brand" href="#"><?php echo $title; ?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
              <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <form class="navbar-form">
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="functions/signout.php">
                    <i class="material-icons">power_settings_new</i>
                    <p class="d-lg-none d-md-block">
                    Logout
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- NAVBAR ENDS -->