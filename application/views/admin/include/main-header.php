<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('admin/dashboard')?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img style="width:100%;" src="<?php echo base_url('assets/admin/images/mini-logo.png'); ?>"></span>
        <!-- logo for regular state and mobile devices -->
        <span style="text-align: left;" class="logo-lg"><img src="<?php echo base_url('assets/admin/images/logo.png'); ?>"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Notifications: style can be found in dropdown.less -->
                <!-- Tasks: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                  <a href="<?=base_url();?>" target="_blank" class="view-website">
                    <i class="fa fa-eye"></i><span><?='Website'; ?></span>
                  </a>
                </li>
                <?php 
                $admin_id = $this->session->userdata('admin_id');
                $admin_name = $this->session->userdata('admin_name');
                $admin_role = $this->session->userdata('admin_role');
                ?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=getUserAvatar($admin_id); ?>" class="user-image" alt="User Image">
                      <span class="hidden-xs"><?=!empty($admin_name)?$admin_name:'Admin'; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="user-header">
                          <img src="<?=getUserAvatar($admin_id); ?>" class="img-circle" alt="User Image">
                          <p>
                            <?=!empty($admin_name)?$admin_name:'Admin'; ?> <?=!empty($admin_role)?' - '.getRoleName($admin_role):''; ?>
                            <!--small>Member since Mar. 2019</small-->
                          </p>
                      </li>
                      <li class="user-footer">
                          <div class="pull-left">
                              <a href="<?php echo base_url('admin/changepassword'); ?>" class="btn btn-default btn-flat">Change Password</a>
                          </div>
                          <div class="pull-right">
                              <a href="<?php echo base_url('admin/dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                      </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!--  <li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li> -->
            </ul>
        </div>
    </nav>
</header>