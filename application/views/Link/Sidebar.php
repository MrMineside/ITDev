<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-white elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-dark">
      <img src="<?php echo base_url()?>assets/Image/rg title.png" alt="Raja Golf Logo" class="brand-image" style="opacity: .9;">
      <span class="brand-text font-weight-light">Office Raja Golf</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($this->session->userdata('divisi')=='IT'):?>
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_Store" <?php if($this->uri->segment(1)=="C_Store"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-store"></i>
              <p>
                STORE
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_Newtask" <?php if($this->uri->segment(1)=="C_Newtask"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-file"></i>
              <p>
                NEW TASK
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" <?php if($this->uri->segment(1)=="#"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-circle"></i>
              <p>
                IVENTORY
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_User" <?php if($this->uri->segment(1)=="C_User"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-user"></i>
              <p>
                USER
              </p>
            </a>
          </li>
          <?php else:?>
            <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_Store" <?php if($this->uri->segment(1)=="C_Store"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-store"></i>
              <p>
                STORE
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_Kary" <?php if($this->uri->segment(1)=="C_Kary"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                KARYAWAN
              </p>
            </a>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/C_Dsall" <?php if($this->uri->segment(1)=="C_Dsall"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?>>
              <i class="nav-icon fas fa-book"></i>
              <p>
                PENGAJUAN CUTI
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>