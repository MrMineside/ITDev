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
<body class="hold-transition layout-top-nav accent-black text-sm">
<div class="wrapper">

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

   <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item" style="padding-bottom:10px;">
        <a class="nav-link" href="<?php echo base_url()?>index.php/C_Login">
          <button type="button" class="btn btn-block btn-sm" style="background-color:#C99A45; color:#222222;">Login</button>
        </a>
      </li>
    </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <h1 class="m-0" style="font-family: ProximaNova,Arial,Sans-serif; font-style: normal; font-weight:100; font-size:13pt;">
                                <span id="jam"></span>
                            </h1>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card shadow" style="background:transparent;">
              <div class="card-header" style="background-color:#222222; color: white;">
                <h3 class="card-title">
                 Information Withdraw Sales
                </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="date" id="pilihtgl" name="pilihtgl" value="<?php echo date('Y-m-d')?>" class="form-control float-right">
                      <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-sm table-striped table-hover">
                  <thead>
                    <th style="width:5%;">No</th>
                    <th>Store</th>
                    <th>Status</th>
                    <th>Date, Time</th>
                    <th>User</th>
                  </thead>
                  <tbody id="dataview"></tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('Link/Footer')?>

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

    setInterval( function () {
      dataview();
    }, 10000 );
    
    $('#pilihtgl').change(function(){
        dataview();
    })
    
    dataview();

    function dataview(){
        var type = $('#type').val();
        var gettanggal = $('#pilihtgl').val();
        $.ajax({
          type  : 'POST',
          url   : '<?php echo base_url()?>index.php/C_Vall/datatask',
          async : false,
          dataType : 'json',
          data : {gettanggal:gettanggal},
          success : function(data){
                        var html = '';
                        var jenis = '';
                        var icon = '';
                        var note = '';
                        var no = 1;
                        var i;

                        for(i=0; i<data.length; i++){
                            if (data[i].status == 1) {icon = '<i class="fa fa-check-circle" title="Success" style="color: green;"> Success</i>'}
                            else {icon = '<i class="fa fa-spinner" title="failed" style="color: red;"> Offline</i>'}

                            html += '<tr>'+
                                    '<td>'+no+++'</td>'+
                                    '<td>'+data[i].store_name+'</td>'+
                                    '<td>'+icon+'</td>'+
                                    '<td>'+data[i].tanggal+','+data[i].jam+'</td>'+
                                    '<td>'+data[i].name+'</td>'+
                                    '</tr>';
                            
                        }
                        $('#dataview').html(html);      
                    }
        });
    }
</script>
</body>
</html>
