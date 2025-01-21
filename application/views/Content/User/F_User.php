<?php $this->load->view('Link/Head')?>
<?php $this->load->view('Link/Navbar')?>
<?php $this->load->view('Link/Sidebar')?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->load->view('Link/Header')?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card shadow shadow-lg"> 
                        <div class="card-header  bg-dark">
                            <h3 class="card-title">New/Update User</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-xs btn-info btn-flat" id="newemplo">New Employees</button>
                                <?php if($this->session->userdata('akses')=='3'):?>
                                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#modal-akses">Akses</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body table-responsive" style="height:450px;">
                            <div class="form-group row">
                                <div class="input-group">
                                    <div id="selectemplo" style="width: 100%;">
                                        <select class="form-control select2" style="width: 100%;" style="width: 100%;" id="opemplo" name="opemplo">
                                        </select> 
                                    </div>
                                    
                                    <div id="hide" style="width: 100%;">
                                        
                                        <div class="input-group input-group-sm">
                                          <input type="text" class="form-control" id="inemplo" name="inemplo" placeholder="New Name Employees">
                                          <span class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary btn-flat" id="canemplo">Cancel</button>
                                          </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Division</label>
                                <div class="col-sm-9">
                                
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend">
                                      <button type="button" class="btn btn-xs btn-success" id="new" data-toggle="modal" data-target="#modal-divisi">New</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <select class="custom-select" id="divisi" name="divisi">

                                    </select>

                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Phone</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="notel" name="notel" placeholder="No Telephone" onkeypress="return hanyaAngka(event)"/>
                                <span><label class="text-info"><span><i class="fa fa-info" aria-hidden="true">
                                      </i> Note : Just Number</span></label></span>
                              </div>
                            </div>

                            <div class="form-group  row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Email">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Username</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username">
                                <span id="username_result"></span>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                              <div class="col-sm-9">
                                <input type="password" class="form-control form-password form-control-sm" id="password" name="password" placeholder="Password">
                                <br/>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input form-checkbox" type="checkbox" id="customCheckbox1" value="option1">
                                  <label for="customCheckbox1" class="custom-control-label">Show Password</label>
                                </div>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Akses</label>
                              <div class="col-sm-9">
                                <div class="input-group input-group-sm mb-2">
                                    <select class="custom-select" id="akses" name="akses">

                                    </select>
                                </div>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Address</label>
                              <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" name="alamat" id="alamat"></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-outline-success btn-xs" id="saveemplo">Save</button>
                            <button class="btn btn-outline-secondary btn-xs float-right" id="clear">Cancel</button>
                        </div>
                    </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card">
                      <div class="card-header bg-dark">
                        <h3 class="card-title">ALL EMPLOYESS</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0" style="height: 550px;">
                        <table class="table table-hover table-sm table-striped text-nowrap">
                          <thead>
                            <tr>
                              <th style="width: 50px;">NO</th>
                              <th>FULL NAME</th>
                              <th>USERNAME</th>
                              <th>DIVISION</th>
                              <th>NO TELP</th>
                              <th>EMAIL</th>
                            </tr>
                          </thead>
                          <tbody id="vemplo">
                            
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
          </div>
        </div>
        <!-- MOdal -->
        <!-- Modal Divisi -->
            <div class="modal fade" id="modal-divisi">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Division</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-12 col-sm-7">
                          <input class="form-control-sm" type="hidden" id="iddiv" name="iddiv">
                          <input type="text" class="form-control form-control-border" id="newdiv" name="newdiv" placeholder="Divisi" onkeyup="mycapital()">
                        </div>
                        <div class="col-12 col-sm-3"  style="padding-top: 10px;" id="btnsave">
                          <button type="button" class="btn btn-block btn-success btn-xs" id="savediv">Save</button>
                        </div>
                        <div class="col-12 col-sm-3"  style="padding-top: 10px;" id="btnupdate">
                          <button type="button" class="btn btn-block btn-success btn-xs" id="updatediv">Update</button>
                        </div>
                        <div class="col-12 col-sm-2" style="padding-top: 10px;">
                          <button type="button" class="btn btn-block btn-default btn-xs" id="candiv">cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-body table-responsive" style="height: 400px;">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="5%">NO</th>
                          <th>DIVISION</th>
                          <th width="20%">#</th>
                        </tr>
                      </thead>
                      <tbody id="ddivisi"> 
                                              
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer justify-content-between">
                                          
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Divisi -->
            <!-- Modal Divisi -->
            <div class="modal fade" id="modal-akses">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Akses</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputBorder">Akses</label>
                        <input type="hidden" class="form-control form-control-border" id="editakses" name="editakses">
                        <input type="text" class="form-control form-control-border" id="newakses" name="newakses" placeholder="Akses">
                      </div>
                  </div>
                  <div class="modal-body table-responsive" style="height: 400px;">
                    <table class="table table-hover table-sm table-striped text-nowrap">
                        <thead>
                          <tr>
                            <th width="5%">NO</th>
                            <th>AKSES</th>
                            <th width="20%">#</th>
                          </tr>
                        </thead>
                        <tbody id="dakses"> 
                                                
                        </tbody>
                      </table>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button class="btn btn-outline-success btn-xs" id="saveakses">Save</button>
                      <button class="btn btn-outline-success btn-xs" id="updateakses">Save</button>
                      <button class="btn btn-outline-secondary btn-xs float-right">Cancel</button>                  
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Divisi -->
            <!-- ENd MOddal -->
      </div>
    </section>
</div>
<?php $this->load->view('Link/Footer')?>
<?php $this->load->view('Link/Js')?>
<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
  }

function mycapital() {
    var x = document.getElementById("newdiv");
    x.value = x.value.toUpperCase();
}

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });

    $('#hide').hide();
    $('#update').hide();
    $('#btnupdate').hide();
    $('#updateakses').hide();

    $('#newemplo').click(function(){
      $('#hide').show();
      $('#newemplo').hide();
      $('#selectemplo').hide();
    })

    $('#canemplo').click(function(){
      $('#hide').hide();
      $('#newemplo').show();
      $('#selectemplo').show();
    })

    $('#clear').click(function(){
      $('#hide').hide();
      $('#show').show();
      clear();
    })

    opdivisi();
    opemplo();
    opakses();
    viewdivisi();
    vemplo();
    viewakses();

    function opakses(){
      $.ajax({
            type      : 'GET',
            url       : '<?php echo base_url()?>index.php/C_User/opakses',
            async     : false,
            dataType  : 'json',
            success : function(data){
              var html = '';
              var i;     
                
                for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id+'>'+data[i].akses+'</option>';
                }
              
                $('#akses').html(html);
            }   
      });
    }

    // Function Divisi
    function opdivisi(){
      $.ajax({
            type      : 'GET',
            url       : '<?php echo base_url()?>index.php/C_User/opdivisi',
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

    function viewdivisi(){
      $.ajax({
        type    : 'GET',
        url     : '<?php echo base_url()?>index.php/C_User/v_divisi',
        async   : true,
        dataType: 'json',
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                  for(i=0; i<data.length; i++){
                    html += '<tr >'+
                            '<td style="vertical-align: middle;">'+no+++'</td>'+       
                            '<td style="vertical-align: middle;">'+data[i].divisi+'</td>'+
                            '<td style="text-align:right; vertical-align: middle;">'+
                              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].divisi+'" data1="'+data[i].id+'"><i class="fa fa-edit" title="Edit Data"></i></a>'+' '+
                              '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'"><i class="fa fa-ban" title="Delete Data"></i></a>'+
                            '</td>'+
                            '</tr >';
                  }
              $('#ddivisi').html(html);
            }
     
      });
    }

    $('#savediv').on('click',function(){
      var newdiv =$('#newdiv').val();
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_User/simpandiv',
          dataType : "JSON",
          data : {newdiv:newdiv},
          success: function(data){
                $('[name="newdiv"]').val("");
                // sessionStorage.setItem("reloading",true);
                // document.location.reload();
                viewdivisi();
                opdivisi();
          }
        });
      return false;
    });

    $('#updatediv').on('click',function(){
      var id     =$('#iddiv').val();
      var newdiv =$('#newdiv').val();
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_User/updatediv',
          dataType : "JSON",
          data : {id:id,newdiv:newdiv},
          success: function(data){
            $('[name="newdiv"]').val("");
            sessionStorage.setItem("reloading",true);
            document.location.reload();
          }
        }); 
      return false;
    });

    $('#ddivisi').on('click','.item_hapus',function(){
        var id = $(this).attr("data");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('index.php/C_User/delete_divisi/')?>'+id,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#"+id).remove();
                        sessionStorage.setItem("reloading",true);
                        document.location.reload();
                    }
                });
            }
        })
    });

    $('#ddivisi').on('click','.item_edit',function(){
      var id = $(this).attr("data1");
      var divisi = $(this).attr("data");
      $('#btnupdate').show();
      $('#btnsave').hide();
      $('[name="iddiv"]').val(id);
      $('[name="newdiv"]').val(divisi);
    })

    $('#candiv').on('click',function(){
      $('#btnupdate').hide();
      $('#btnsave').show();
      $('[name="newdiv"]').val("");
    })
    // End Function
    // Function Eplo
    function opemplo(){
      $.ajax({
        type      : 'GET',
        url       : '<?php echo base_url()?>index.php/C_User/opemplo',
        async     : false,
        dataType  : 'json',
        success : function(data){
              var html = '';
              var i;
                       
                  html += '<option value="0">Select Employees</option>';
                for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id+'>'+data[i].name+'</option>';
                }             
              $('#opemplo').html(html);
        }   
      });
    }
    
    function clear(){
      $('[name="notel"]').val("");
      $('[name="email"]').val("");
      $('[name="username"]').val("");
      $('[name="password"]').val("");
      $('[name="alamat"]').val("");
      opdivisi();
      opemplo();
      opakses();
    }

    function vemplo(){
      $.ajax({
        type    : 'GET',
        url     : '<?php echo base_url()?>index.php/C_User/vemplo',
        async   : false,
        dataType: 'JSON',
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                    
                    for(i=0; i<data.length; i++){

                        html += '<tr>'+
                                '<td>'+no+++'</td>'+
                                '<td>'+data[i].name+'</td>'+
                                '<td>'+data[i].username+'</td>'+
                                '<td>'+data[i].divisi+'</td>'+
                                '<td>'+data[i].no_telpon+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td style="text-align:right; vertical-align: middle;">'+
                                  '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'"><i class="fa fa-ban" title="Delete Data"></i></a>'+
                                '</td>'+
                                '</tr>';
                    }
                  $('#vemplo').html(html);
                }
      });
    }

    $('#vemplo').on('click','.item_hapus',function(){
      var autokode=$(this).attr('data');
      Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
              type : "POST",
              url  : "<?php echo base_url('index.php/C_User/hapusemplo')?>",
              dataType : "JSON",
                data : {autokode:autokode},
                error: function() {
                alert('Something is wrong');
              },
                success: function(data){
                 viewdivisi();
                opdivisi();
                vemplo();
                clear();
                         Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
                    }
                });
            return false;
        
      }
    })
    });

    $('#saveemplo').on('click',function(){
      var newemplo  =$('#inemplo').val();
      var opemplo   =$('#opemplo').val();
      var divisi    =$('#divisi').val();
      var notel     =$('#notel').val();
      var email     =$('#email').val();
      var username  =$('#username').val();
      var password  =$('#password').val();
      var alamat    =$('#alamat').val();
      var akses     =$('#akses').val();
      if (newemplo != '') {
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_User/simemplo',
          dataType : "JSON",
          data : {newemplo:newemplo,divisi:divisi,notel:notel,email:email,username:username,password:password,alamat:alamat,akses:akses},
          success: function(data){
                viewdivisi();
                opdivisi();
                vemplo();
                clear();
                Toast.fire({
                  icon: 'success',
                  title: 'Save Data Success.'
                })
          }
        });
        return false;
      }else{
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_User/updemplo',
          dataType : "JSON",
          data : {opemplo:opemplo,divisi:divisi,notel:notel,email:email,username:username,password:password,alamat:alamat,akses:akses},
          success: function(data){
                viewdivisi();
                opdivisi();
                vemplo();
                clear();
                Toast.fire({
                  icon: 'success',
                  title: 'Update Data Success.'
                })
          }
        });
        return false;
      }
        
    });

    $('#opemplo').change(function(){
      var id=$(this).val();
        $.ajax({
          type      : "GET",
          url       : '<?php echo base_url()?>index.php/C_User/getemplo',
          dataType  : "JSON",
          data      : {id:id},
          success   : function(data){
                    $.each(data,function(no_telpon,id_divisi,alamat,email,username,password,akses){   
                        $('[name="divisi"]').val(data.id_divisi);
                        $('[name="email"]').val(data.email);
                        $('[name="notel"]').val(data.no_telpon);
                        $('[name="alamat"]').val(data.alamat);
                        $('[name="username"]').val(data.username);
                        $('[name="password"]').val(data.password);
                        $('[name="akses"]').val(data.akses);
                    });
          }
        });
        return false;
    })
    // End Function Eplo
    $('#username').keyup(function(){
     var username = $('#username').val();
     if(username != ''){
      $.ajax({
       url: "<?php echo base_url(); ?>index.php/C_User/checkUsername",
       method: "POST",
       data: {username:username},
       success: function(data){
        $('#username_result').html(data);
       }
      });
     }
    });

    $('#saveakses').click(function(){
      var akses = $('#newakses').val();
      $.ajax({
        type : "POST",
        url  : '<?php echo base_url()?>index.php/C_User/simpanakses',
        dataType : "JSON",
        data : {akses},
        success: function(data){
                $('[name="newakses"]').val("");
                viewakses();
                Toast.fire({
                  icon: 'success',
                  title: 'Save Data Success.'
                })
        }
      });
      return false;
    });

    function viewakses(){
      $.ajax({
        type    : 'GET',
        url     : '<?php echo base_url()?>index.php/C_User/v_akses',
        async   : true,
        dataType: 'json',
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                  for(i=0; i<data.length; i++){
                    html += '<tr >'+
                            '<td style="vertical-align: middle;">'+no+++'</td>'+       
                            '<td style="vertical-align: middle;">'+data[i].akses+'</td>'+
                            '<td style="text-align:right; vertical-align: middle;">'+
                              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].akses+'" data1="'+data[i].id+'"><i class="fa fa-edit" title="Edit Data"></i></a>'+
                            '</td>'+
                            '</tr >';
                  }
              $('#dakses').html(html);
            }
     
      });
    }

    $('#dakses').on('click','.item_edit',function(){
      var id = $(this).attr("data1");
      var divisi = $(this).attr("data");
      $('#updateakses').show();
      $('#saveakses').hide();
      $('[name="editakses"]').val(id);
      $('[name="newakses"]').val(divisi);
    })

    $('#updateakses').on('click',function(){
      var id     =$('#editakses').val();
      var akses = $('#newakses').val();
        $.ajax({
          type : "POST",
          url  : '<?php echo base_url()?>index.php/C_User/updateakses',
          dataType : "JSON",
          data : {id:id,akses:akses},
          success: function(data){
                $('[name="newakses"]').val("");
                viewakses();
                Toast.fire({
                  icon: 'success',
                  title: 'Update Data Success.'
                })
          }
        }); 
      return false;
    });

  })
</script>
</body>
</html>
