<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>RG Office V2</title>
  <link rel="icon" href="<?php echo base_url()?>assets/Image/rg title.png" type="image/gif" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  <style type="text/css">
    .bg-rg{
      background-color: #222222;
      color:#C99A45;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav accent-black text-sm ">
<div class="wrapper">

  <?php $this->load->view('Link/Menuall')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url('<?php echo base_url()?>assets/Image/cover-web-black-background.jpg')">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <center>
          <h1 class="m-0" style="font-family: ProximaNova,Arial,Sans-serif; font-style: normal; font-weight:100; font-size:13pt; color: white;">
                                <span id="jam"></span>
                            </h1>
        </center>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content" >
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4">

            <!-- Profile Image -->
            <div class="card card-black card-outline" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url()?>assets/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3" >
                  <li class="list-group-item" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
                    <b>Divisi</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
                    <b>Loaksi Kerja</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
                    <b>Jatah Cuti</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-block" style="background-color: black; color:white;"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-md-8">
            <div class="card" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  TENTANG SAYA
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">Nama Lengkap</dt>
                  <dd class="col-sm-8">A description list is perfect for defining terms.</dd>
                  <dt class="col-sm-4">Alamat Lengkap</dt>
                  <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                  <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
                  <dt class="col-sm-4">No Telepon/Whatsapp</dt>
                  <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                    sit amet risus.
                  </dd>
                </dl>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer navbar-dark">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#">Raja Golf</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<script>
  waktu();
  function waktu() {
    var waktu = new Date();
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds('s');
    var html ='<i class="fas fa-calendar-alt"></i>&nbsp; <?php echo date('D, d F Y')?> , <i class="far fa-clock"></i>&nbsp;'+ jam+' : '+menit+' : '+detik;
  
    setTimeout("waktu()", 1000);
    $('#jam').html(html)    
  }
</script>
</body>
</html>