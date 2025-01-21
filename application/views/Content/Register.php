<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
  <link rel="icon" href="<?php echo base_url()?>assets/Image/rg title.png" type="image/gif" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition register-page" style="background-image:url('<?php echo base_url()?>assets/Image/cover-web-black-background.jpg')">
<div class="register-box" style="width:50%;">
  <div class="card card-outline card-dark" style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
    <div class="card-header text-center">
      <b class="h1">REGISTER</b>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register akun baru</p>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" placeholder="">
                </div>
            </div>
            <div class="col-6">
                 <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" id="notelp" onkeypress="return hanyaAngka(event)"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Tempat,Tanggal Lahir</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" id="tmplahir" placeholder="">
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control" id="tgllahir" value="<?php echo date('Y-m-d')?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" email placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Lokasi Kantor</label>
                    <select class="custom-select" id="store">

                        </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Divisi</label>
                        <select class="custom-select" id="divisi">
                            
                        </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="">
                    <span id="username_error"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" id="alamat"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo base_url('')?>index.php/C_Login" class="text-left" style="color: black;"><i class="fas fa-arrow-left"></i> Kembali ke Login</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block" id="aksi">Register</button>
          </div>
          <!-- /.col -->
        </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

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
<script type="text/javascript">
function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
        return true;
    }
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    opdivisi();
    opstore();

    function opdivisi(){
      $.ajax({
            type      : 'GET',
            url       : '<?php echo base_url()?>index.php/C_Login/opdivisi',
            async     : false,
            dataType  : 'json',
            success : function(data){
              var html = '';
              var i;    
                
                for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id+'>'+data[i].divisi+'</option>';
                }
              
                $('#divisi').html(html);
            }   
      });
    }

    function opstore(){
      $.ajax({
            type      : 'GET',
            url       : '<?php echo base_url()?>index.php/C_Login/opstore',
            async     : false,
            dataType  : 'json',
            success : function(data){
              var html = '';
              var i;    
                
                for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id+'>'+data[i].store_name+'</option>';
                }
              
                $('#store').html(html);
            }   
      });
    }

    $('#username').on('keyup', function() {
        var username = $(this).val();

        $.ajax({
            url: '<?php echo base_url('index.php/C_Login/check_username'); ?>',
            type: 'post',
            data: {username: username},
            success: function(response) {
                if (response == 'false') {
                    $('#username_error').text('Username sudah digunakan');
                    document.getElementById('aksi').disabled = true;
                } else {
                    $('#username_error').text('Username dapat digunakan');
                    document.getElementById('aksi').disabled = false;
                }
            }
        });
    });

    $('#aksi').click(function(){
        var name = $('#name').val();
        var notelp = $('#notelp').val();
        var email = $('#email').val();
        var tmplahir = $('#tmplahir').val();
        var tgllahir = $('#tgllahir').val();
        var store = $('#store').val();
        var divisi = $('#divisi').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var alamat = $('#alamat').val();
        $.ajax({
            url: '<?php echo base_url('index.php/C_Login/simpanregis'); ?>',
            type: 'POST',
            async : false,
            dataType : 'JSON',
            data: {name:name,notelp:notelp,email:email,tmplahir:tmplahir,tgllahir:tgllahir,store:store,divisi:divisi,username:username,password:password,alamat:alamat},
            success: function(data) {
                Swal.fire(
                  'REGISTER',
                  'Akun Berhasil Dibuat, Silahkan Melakukan Login',
                  'success'
                )
                clear();
            }
        });
    })

    function clear(){
        $('#name').val("");
        $('#notelp').val("");
        $('#email').val("");
        $('#tmplahir').val("");
        $('#username').val("");
        $('#password').val("");
        $('#alamat').val(""); 
    }
});
</script>
</body>
</html>
