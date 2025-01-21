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
            	<div class="col-12">
            		<!-- Default box -->
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">
                              <button type="button" class="btn btn-xs btn-primary" id="update">Update</button>
                            </h3>
                            <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 200px;">
                                <select class="form-control float-right" id="divisi" name="divisi">
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <th style="width:5%;" colspan="2">NO</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>NO TELEPON</th>
                                    <th>EMAIIL</th>
                                    <th>DIVISI</th>
                                    <th>LOKASI KERJA</th>
                                    <th>JATAH CUTI</th>
                                    <th>CUTI MINUS</th>
                                    <th style="width:5%;">#</th>
                                </thead>
                                <tbody id="datakaryawan">
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            
                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->
            	</div>
            </div>
  
        </div>
        <!-- Modal Update Cuti -->
            <div class="modal fade" id="mleave">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">UPDATE JATAH CUTI</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>JUMLAH HARI</label>
                      <input type="text" class="form-control" name="jmlleave" id="jmlleave" placeholder="Amount Leave" value="14">
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button style="margin-bottom: 10px" class="btn btn-success btn-xs update_all">Update Now</button>
                  </div>
                </div>
              <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- End Modal Cuti -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('Link/Footer')?>
<?php $this->load->view('Link/Js')?>
<script>
$(function () {
    var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
    });

    opdivisi();
    viewkaryawan();

    setInterval( function () {
      opdivisi();
    viewkaryawan();
    }, 10000 );

     function opdivisi(){
      $.ajax({
            type      : 'GET',
            url       : '<?php echo base_url()?>index.php/C_User/opdivisi',
            async     : false,
            dataType  : 'json',
            success : function(data){
              var html = '';
              var i;

                  html += '<option value="0">Semua Divisi</option>';    
                
                for(i=0; i<data.length; i++){
                  html += '<option value='+data[i].id+'>'+data[i].divisi+'</option>';
                }
              
                $('#divisi').html(html);
            }   
      });
    }

    $('#divisi').change(function(){
      viewkaryawan();
    })

    function viewkaryawan(){
      var divisi = $('#divisi').val();
      $.ajax({
        type    : 'POST',
        url     : '<?php echo base_url()?>index.php/C_User/vemplobtdivisi',
        async   : true,
        dataType: 'json',
        data    : {divisi:divisi},
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                  for(i=0; i<data.length; i++){
                    html += '<tr >'+
                            '<td style="vertical-align: middle;"><input type="checkbox" class="sub_chk" data-id="'+data[i].id+'"></td>'+
                            '<td style="vertical-align: middle;">'+no+++'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].name+'</td>'+       
                            '<td style="vertical-align: middle;">'+data[i].no_telpon+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].email+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].divisi+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].store_name+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].cuti+' Hari</td>'+
                            '<td style="vertical-align: middle; background-color:red; color:white;">'+data[i].minuscuti+' Hari</td>'+
                            '<td style="text-align:center;">'+
                                    '<div class="btn-group">'+
                                        '<button type="button" class="btn btn-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                                          '<span class="sr-only"></span>'+
                                        '</button>'+
                                        '<div class="dropdown-menu" role="menu">'+
                                            '<a href="javascript:;" class="dropdown-item item_detail" data="'+data[i].id+'"><i class="fa fa-key" title="History"></i> Update Password</a>'+
                                            '<a href="javascript:;" class="dropdown-item item_detail" data="'+data[i].id+'"><i class="fa fa-edit" title="History"></i> Edit User</a>'+
                                            '<a href="javascript:;" class="dropdown-item item_detail" data="'+data[i].id+'"><i class="fa fa-ban" title="History"></i> Hapus User</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                            '</tr >';
                  }
              $('#datakaryawan').html(html);
            }
     
      });
    }


     $('#update').on('click',function(){
        var allVals = [];  
        var jmlleave  = $('#jmlleave').val();
        $(".sub_chk:checked").each(function() {  
          allVals.push($(this).attr('data-id'));
        });
        if(allVals.length <=0){  
          alert("Silahkan pilih karyawan"); 
        } else {
          $('#mleave').modal('show');
        }
      });

      $('.update_all').on('click', function(e) {
        var allVals = [];  
        var jmlleave  = $('#jmlleave').val();
        $(".sub_chk:checked").each(function() {  
          allVals.push($(this).attr('data-id'));
        });  
      
        if(allVals.length <=0)  
        {  
          alert("Please select Employess.");  
        } else {  
          var check = confirm("Kamu yakin ingin mengupdate cuti?");  
          if(check == true){  
          var join_selected_values = allVals.join(","); 
          $.ajax({
            url: '<?php echo base_url()?>index.php/C_Kary/updateAll',
            type: 'POST',
            dataType: 'json',
            data: {ids:join_selected_values,jmlleave:jmlleave},
            success: function (data) {
                console.log(data);
                $(".sub_chk:checked").each(function() {  
                  $(this).parents("tr").remove();
                });
                viewkaryawan();
                $('#mleave').modal('hide');
                Toast.fire({
                  icon: 'success',
                  title: 'Update Success.'
                })
            },
            error: function (data) {
              alert(data.responseText);
            }
          });
          }  
        }  
      });
});
</script>
</body>
</html>