<!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark bg-rg">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="<?php echo base_url()?>assets/Image/rg title.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          
        </ul>

   <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Dsall" <?php if($this->uri->segment(1)=="C_Dsall"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-home"> DASBOARD</i>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Cuti" <?php if($this->uri->segment(1)=="C_Cuti"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-file-alt"> PENGAJUAN CUTI</i>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Vall" <?php if($this->uri->segment(1)=="C_Vall"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-book"> TARIK PENJUALAN</i>
        </a>
      </li>      
      <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Profile" <?php if($this->uri->segment(1)=="C_Profile"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-user-alt"> PROFILE</i>
        </a>
      </li>
      <?php if ($this->session->userdata('divisi')=='HRD'):?>
      <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Hrd" <?php if($this->uri->segment(1)=="C_Hrd"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-circle"> HOME ADMIN</i>
        </a>
      </li>
      <?php elseif ($this->session->userdata('divisi')=='IT'):?>
       <li class="nav-item">
        <a href="<?php echo base_url()?>index.php/C_Store" <?php if($this->uri->segment(1)=="C_Store"){echo 'class="nav-link active"';} else{echo 'class="nav-link"';}?> role="button">
          <i class="fas fa-circle"> HOME ADMIN</i>
        </a>
      </li>
      <?php endif;?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url()?>index.php/C_Login/logout" role="button">
          <i class="fas fa-sign-out-alt"> LOGOUT</i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->