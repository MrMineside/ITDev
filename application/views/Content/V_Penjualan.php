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
          <div class="col-12 col-md-12">
            <div class="card shadow" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-header" style="background-color:#222222; color: white;">
                <h3 class="card-title">
                 INFORMASI PENARIKAN PENJUALAN
                </h3>
                <div class="card-tools">
                  <label>Note : Silahkan pilih data penarikan</label>
                </div>
              </div>
              <div class="card-header">
                <div class="row">
                  <div class="col-6 col-md-3">
                    <select class="custom-select rounded-0 text-sm" id="filter" name="filter">
                    </select>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="date" id="pilihtgl" name="pilihtgl" value="<?php echo date('Y-m-d')?>" class="form-control float-right">
                        <div class="input-group-append">
                      </div>
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

    setInterval( function () {
      dataview();
    }, 10000 );
    
    $('#pilihtgl').change(function(){
        dataview();
    })
    
    dataview();
    opfilter();

    function opfilter(){
        var gettanggal = $('#pilihtgl').val();
        var type = '1';
        $.ajax({
            type      : 'POST',
            url       : '<?php echo base_url()?>index.php/C_Tasksales/op_creat',
            async     : false,
            dataType  : 'json',
            data      : {gettanggal:gettanggal,type:type},
            success: function(data) {
                    $('#filter').empty(); // Kosongkan select option terlebih dahulu

                    if (data.length > 0) {
                        $('#filter').append('<option value="">-- Pilih Data Penarikan --</option>');
                        $.each(data, function(key, value) {
                            $('#filter').append('<option value="'+ value.id +'">Penarikan Jam :'+ value.jam +'</option>');
                        });

                        //$('#simpandata').prop('disabled', false); // Disable tombol save
                    } else {
                        $('#filter').append('<option value="">-- Tidak Ada Data Penarikan --</option>');
                        //$('#simpandata').prop('disabled', true); // Disable tombol save jika tidak ada data
                    }
            }
     
        });
    }

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