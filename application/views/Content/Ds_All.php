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
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.css">
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
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-store"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TOKO</span>
                <span class="info-box-number">25 TOKO</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PENJUALAN DITARIK</span>
                <span class="info-box-number">25 PENJUALAN</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">JATAH CUTI</span>
                <span class="info-box-number">14 Dari 14</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card shadow"  style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-header" style="background-color:#222222; color: white;">
                <h3 class="card-title">
                 DATA CUTI SAYA
                </h3>
                <div class="card-tools">
                     
                </div>
              </div>
              <div class="card-body">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Perihal</th>
                      <th>Tanggal</th>
                      <th>Hari</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="datacuti">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card shadow"  style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-header" style="background-color:#222222; color: white;">
                <h3 class="card-title">
                 DETAIL STATUS
                </h3>
                <div class="card-tools">
                     
                </div>
              </div>
              <div class="card-body table-responsive" id="histcuti" style="max-height: 350px;">
                
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
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
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
$(function () {
    var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
    });

  viewcuti();

  function viewcuti(){
      $.ajax({
        type    : 'GET',
        url     : '<?php echo base_url()?>index.php/C_Dsall/datacuti',
        async   : true,
        dataType: 'json',
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                  var sts = '';
                  var btn = '';
                  for(i=0; i<data.length; i++){
                    if (data[i].status == 1) {
                      sts = '<div class="color-palette-set"><div class="bg-secondary color-palette" style="border-radius: 5px; text-align: center;"><label>New Cuti</label></div></div>';
                      btn = '<a href="javascript:;" class="dropdown-item item_hapus" data="'+data[i].id+'" data1="'+data[i].iduser+'" data2="'+data[i].jmlhari+'" data3="'+data[i].cuti+'" data4="'+data[i].jeniscuti+'"><i class="fa fa-ban" title="Batal"></i> Pembatalan</a>';
                    }else if(data[i].status == 2){
                      sts = '<div class="color-palette-set"><div class="bg-info color-palette" style="border-radius: 5px; text-align: center;"><label>DIreview</label></div></div>';                      
                      btn = '<a href="javascript:;" class="dropdown-item item_hapus" data="'+data[i].id+'" data1="'+data[i].iduser+'" data2="'+data[i].jmlhari+'" data3="'+data[i].cuti+'" data4="'+data[i].jeniscuti+'"><i class="fa fa-ban" title="Batal"></i> Pembatalan</a>';
                    }else if(data[i].status == 4){
                      sts = '<div class="color-palette-set"><div class="bg-success color-palette" style="border-radius: 5px; text-align: center;"><label>Disetujui</label></div></div>';
                      btn = '<a href="<?php echo base_url()?>index.php/C_Print/printcuti" target="blank" class="dropdown-item item_print"><i class="fa fa-print" title="Print"></i> Cetak Form Cuti</a>';
                    }else{
                      sts = '<div class="color-palette-set"><div class="bg-danger color-palette" style="border-radius: 5px; text-align: center;"><label>Ditolak</label></div></div>';
                      btn = '<a href="javascript:;" class="dropdown-item item_hapus" data="'+data[i].id+'" data1="'+data[i].iduser+'" data2="'+data[i].jmlhari+'" data3="'+data[i].cuti+'" data4="'+data[i].jeniscuti+'"><i class="fa fa-ban" title="Batal"></i> Pembatalan</a>';
                    }
                    html += '<tr >'+
                            '<td style="vertical-align: middle;">'+no+++'</td>'+       
                            '<td style="vertical-align: middle;">'+data[i].Jenis+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].tglawal+' - '+data[i].tglakhir+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].jmlhari+' Hari</td>'+
                            '<td style="vertical-align: middle;">'+sts+'</td>'+
                            '<td style="text-align:center;">'+
                                    '<div class="btn-group">'+
                                        '<button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                                          '<span class="sr-only"></span>'+
                                        '</button>'+
                                        '<div class="dropdown-menu" role="menu">'+
                                            '<a href="javascript:;" class="dropdown-item item_detail" data="'+data[i].id+'"><i class="fa fa-eye" title="History"></i> Detail Status</a>'+
                                            ''+btn+''+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                            '</tr >';
                  }
              $('#datacuti').html(html);
            }
     
      });
    }

  $('#datacuti').on('click','.item_hapus',function(){
    var no_aju = $(this).attr("data");
    var no_user = $(this).attr("data1");
    var jml_day = $(this).attr("data2");
    var cuti = $(this).attr("data3");
    var jenis = $(this).attr("data4");
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_Dsall/cancelcuti',
          dataType : "JSON",
          data : {no_aju:no_aju,no_user:no_user,jml_day:jml_day,cuti:cuti,jenis:jenis},
          success: function(data){
                  Swal.fire(
                    'Cancel Leave!',
                    'Your Submission has been Cancel.',
                    'success'
                  )
                }
        });
        return false;
      }
    })
  });

  $('#datacuti').on('click','.item_detail',function(){
    var id = $(this).attr("data");
    $.ajax({
      type    : 'POST',
      url     : '<?php echo base_url()?>index.php/C_Dsall/histcuti',
      async   : true,
      dataType: 'json',
      data    : {id:id},
      success : function(data){
                  var html = '';
                  var i;
                  var sts = '';
                  var user = '';
                  for(i=0; i<data.length; i++){
                    if (data[i].info == 1) {
                      sts = '<i class="fas fa-paper-plane bg-gray"></i>';
                      user = '';
                    }else if(data[i].info == 2){
                      sts = '<i class="fas fa-user-secret bg-info"></i>';
                      user =  'by: '+ data[i].name;
                    }else if(data[i].info == 4){
                      sts = '<i class="fas fa-check bg-success"></i>';
                      user = 'by: '+  data[i].name;
                    }else{
                      sts = '<i class="fas fa-times bg-danger"></i>';
                      user = 'by: '+  data[i].name;
                    }
                    html += '<div class="timeline">'+
                              '<div class="time-label">'+
                                '<span class="bg-lightblue">'+data[i].tanggal+' , '+data[i].jam+'</span>'+
                              '</div>'+
                              '<div>'+
                                ''+sts+''+
                                '<div class="timeline-item">'+
                                  '<h3 class="timeline-header no-border">'+data[i].status+' '+user+'</h3>'+
                                '</div>'+
                              '</div>'+
                            '</div>';
                  }
              $('#histcuti').html(html);
            }
    })
  })

});
</script>
</body>
</html>