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
          <div class="col-12 col-md-12">
            <div class="card shadow"  style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
              <div class="card-header" style="background-color:#222222; color: white;">
                <h3 class="card-title">
                 INPUT FORM CUTI
                </h3>
                <div class="card-tools">
                    <div id="infocuti"></div>
                </div>
              </div>
              <div class="card-body">
              <form id="sendcuti">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control form-control-sm" name="nama" id="nama" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Divisi</label>
                      <input type="text" class="form-control form-control-sm" name="divisi" id="divisi" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Lokasi Kerja</label>
                      <input type="text" class="form-control form-control-sm" name="lokasi" id="lokasi" readonly>
                    </div>
                  </div>
                </div>
                <div class="row" id="rowhak">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Hak (Tanpa Potong Cuti)</label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-sm-5">
                            <div class="input-group">
                              <input type="date" class="form-control form-control-sm" id="tglhak" name="tglhak" value="<?php echo date('Y-m-d')?>">
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                              <input type="text" id="hakcuti" name="hakcuti" class="form-control form-control-sm" readonly>
                              <span class="input-group-append">
                                <span class="input-group-text">Hari</span>
                              </span>
                            </div>       
                          </div>
                        </div>                          
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" id="rowlain">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Cuti</label>
                      <div class="col-sm-12">
                          <div class="row">
                            <div class="col-md-5">
                              <label>Awal </label>
                              <div class="input-group">
                              <input type="date" class="form-control form-control-sm" id="tglawal" name="tglawal" value="<?php echo date('Y-m-d')?>">
                              </div>
                                <!-- /input-group -->
                            </div>
                              <!-- /.col-lg-6 -->
                            <div class="col-md-4">
                              <label>Akhir</label>
                              <div class="input-group">
                                <input type="date" class="form-control form-control-sm" id="tglakhir" name="tglakhir" value="<?php echo date('Y-m-d')?>">
                              </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-md-3">
                              <label>Hari </label>
                              <div class="input-group input-group-sm">
                                <input type="text" id="totday" name="totday" class="form-control form-control-sm" readonly>
                                <input type="hidden" class="form-control" id="cuti" name="cuti" style="width: 70px;" readonly>
                                <input type="hidden" class="form-control" id="sisacuti" name="sisacuti" style="width: 70px;" readonly>
                                <span class="input-group-append">
                                  <span class="input-group-text">Hari</span>
                                </span>
                              </div>
                            </div>
                              <!-- /.col-lg-6 -->
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Perihal Cuti</label>
                      <select class="form-control form-control-sm" id="perihal" name="perihal">
                      </select>
                      <input type="hidden" name="infjenis" id="infjenis"><br>
                      <textarea class="form-control form-control-sm" id="lain" name="lain" placeholder="Masukkan Note Tambahan" value="-"></textarea>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group input-group-sm">
                    <label for="customFile">File <label style="color: red;">(Optional)</label> </label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto" data-max-file-size="5M">
                      <label class="custom-file-label" for="customFile">Pilih file</label>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn" style="background-color:black; color:white;">Kirim</button>
                <button class="btn btn-default float-right">Batal</button>
              </form>
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<script>
  $(function() {
    bsCustomFileInput.init();

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('#rowhak').hide();
    $('#infjenis').val('Cuti Lainnya');

    $('#perihal').change(function(){
      var jenis = $(this).val();
      var tglawal = $('#tglawal').val();
      if (jenis == '1') {
        $('#tglakhir').attr('readonly', false);
        $('#totday').val('');
        $('#infjenis').val('Cuti Lainnya');
        $('#rowhak').hide();
        $('#tglawal').val("<?php echo date('Y-m-d')?>");
        $('#tglakhir').val("<?php echo date('Y-m-d')?>");  
      }else{
        $('#tglawal').val("<?php echo date('Y-m-d')?>");
        $('#tglakhir').val("<?php echo date('Y-m-d')?>");
        $.ajax({
          type  : 'POST',
          url   : '<?php echo base_url()?>index.php/C_Cuti/hitungjml',
          dataType  : 'json',
          data  :{tglawal:tglawal,jenis:jenis},
          success   : function(data){
            if (data.id == '3') {
              $('#tglhak').attr('readonly', true);
              $('#tglhak').val(data.endtgl);
              $('#tglawal').val(data.tglmulai);
              $('#hakcuti').val(data.setting);
              $('#infjenis').val(data.jenis);
              $('#rowhak').show();  
            }else{
              $('#rowhak').hide();
              $('#tglakhir').attr('readonly', true);
              $('#tglakhir').val(data.endtgl);
              $('#totday').val(data.setting);
              $('#infjenis').val(data.jenis);
            }                
          }
        })
      }
    })
  });

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

  getuser();
  op_jnscuti();

  function getuser(){
    $.ajax({
          type      : "GET",
          url       : '<?php echo base_url()?>index.php/C_Cuti/getdatauser',
          dataType  : "JSON",
          success   : function(data){
                    $.each(data,function(no_telpon,divisi,alamat,email,name,lokasi,cuti){   
                        $('[name="divisi"]').val(data.divisi);
                        $('[name="nama"]').val(data.name);
                        $('[name="lokasi"]').val(data.lokasi);
                        $('[name="cuti"]').val(data.cuti);
                        $('#infocuti').html('Sisa Cuti: ' + data.cuti);
                    });
          }
        });
        return false;
  }

  function op_jnscuti(){
    $.ajax({
      type      : 'GET',
      url       : '<?php echo base_url()?>index.php/C_Cuti/jnscuti',
      async     : false,
      dataType  : 'json',
      success : function(data){
              var html = '';
              var i;
                        
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].Jenis+' ('+data[i].setting+' Hari)</option>';
                }
              
                $('#perihal').html(html);
            }
     
        });
  }

  function intervalhari(){
    var akhirpengajuan=$('#tglakhir').val();
    var awalpengajuan=$('#tglawal').val();
    var tglhak=$('#tglhak').val();
    var jatah=$('#cuti').val();
    var jenis=$('#perihal').val();
      $.ajax({
        type : "POST",
        url  : '<?php echo base_url()?>index.php/C_Cuti/interval',
        dataType : "JSON",
        data : {awalpengajuan:awalpengajuan , akhirpengajuan:akhirpengajuan},
        success: function(day_without_weekend){
                $('[name="totday"]').val(day_without_weekend);
                var hasil = jatah - day_without_weekend;
                $('[name="sisacuti"]').val(hasil);
                }
      });
      return false;
  }
        
  $('#tglakhir').on('change',function(){
    intervalhari();
  })

  $('#sendcuti').submit(function(e){
    e.preventDefault();
    var tglawal = $('#tglawal').val();
    var tglakhir = $('#tglakhir').val();
    var totday = $('#totday').val(); //Total Hari Cuti
    var sisa = $('#sisacuti').val(); // Sisa Cuti Hasil Pengurangan sisa cuti - total hari cuti
    var lain = $('#lain').val();
    var bfcuti =$('#cuti').val(); // Sisa Cuti Sebelumnya
    var jenis =$('#perihal').val();
    var jncut = $('#infjenis').val(); 
      Swal.fire({
        title: 'Sudah Yakin Dengan Data Anda?',
        text: "Send This Cuti",
        html:
            '<b>Jenis Cuti</b> : '+ jncut +'<br>'+
            '<b>Tanggal</b> : ('+ tglawal +') - ('+ tglakhir +')<br>'+
            '<b>Total Hari</b> : '+ totday +' Hari<br>'+
            '<b>Sisa Cuti</b> : '+ sisa +'',
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal Kirim',
        confirmButtonText: 'Iya, Kirim!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:'<?php echo base_url()?>index.php/C_Cuti/simpan',
            type:'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success   : function(data){
                $('[name="totday"]').val("");
                Swal.fire(
                  'Send Form!',
                  'Pengajuan Cuti Berhasil Terkirim.',
                  'success'
                )
              }
          });
        }
      })
  });

</script>
</body>
</html>