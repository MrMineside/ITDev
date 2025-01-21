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
                <div class="col-6">
                   <div class="small-box bg-info">
                      <div class="inner">
                        <h3><div id="totstore"></div></h3>

                        <p>TOKO</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-store-alt" style="color:black;"></i>
                      </div>
                      <!-- <a href="#" class="small-box-footer">
                        Detail info <i class="fas fa-arrow-circle-right"></i>
                      </a> -->
                    </div>
                </div>
                <div class="col-6">
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        <h3><div id="totnewcuti"></div></h3>

                        <p>Pengajuan Cuti Baru</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-file" style="color:black;"></i>
                      </div>
                      <!-- <a href="#" class="small-box-footer">
                        Detail info <i class="fas fa-arrow-circle-right"></i>
                      </a> -->
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-12">
            		<!-- Default box -->
                    <div class="card shadow">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">
                            	CUTI KARYAWAN
                            </h3>
                            <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 200px;">
                                <select class="form-control float-right" id="sorby" name="sorby">
                                    <option value="0">Semuanya</option>
                                    <option value="1">Menunggu Persutujuan</option>
                                    <option value="2">Direview</option>
                                    <option value="4">Disetujui</option>
                                    <option value="3">Ditolak</option>
                                </select>
                              </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                    <th style="width:5%;">NO</th>
                                    <th>Status</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>DIVISI</th>
                                    <th>LOKASI KERJA</th>
                                    <th>PERIHAL CUTI</th>
                                    <th>TANGGAL</th>
                                    <th>JUMLAH HARI</th>
                                    <th style="width:5%;">#</th>
                                </thead>
                                <tbody id="datacuti">
                                    
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
            <div class="modal fade" id="d_cuti">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <!-- <div class="modal-header">
                    
                  </div> -->
                  <div class="modal-body" id="dleave">
                    
                  </div>
                  
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="modal fade" id="d_reject">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Send Note</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="kodeju" id="kodeju">
                    <textarea class="form-control" placeholder="Note" id="note" name="note"></textarea>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" id="sendnote">Send Note</button>
                    <button type="button" class="btn btn-danger" id="withoutnote">Send Without Note</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->    
        </div>
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

    setInterval( function () {
      datacutikarawan();
      totalstore();
      totalnewcuti();
    }, 10000 );
    
    totalstore();
    totalnewcuti();

    function totalstore(){
      $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>index.php/C_Hrd/total_store',
        async : true,
        dataType : 'json',
        success : function(data){
          $('#totstore').html(data.tot);
        }
      });
    }

    function totalnewcuti(){
      $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url()?>index.php/C_Hrd/total_newcuti',
        async : true,
        dataType : 'json',
        success : function(data){
          $('#totnewcuti').html(data.tot);
        }
      });
    }

    $('#sorby').change(function(){
        datacutikarawan();
    })

    datacutikarawan();

    function datacutikarawan(){
    var sorby = $('#sorby').val();
      $.ajax({
        type    : 'POST',
        url     : '<?php echo base_url()?>index.php/C_Hrd/cutikaryawan',
        async   : true,
        dataType: 'json',
        data : {sorby:sorby},
        success : function(data){
                  var html = '';
                  var no = 1;
                  var i;
                  var sts = '';
                  for(i=0; i<data.length; i++){
                    if (data[i].status == 1) {
                      sts = '<div class="color-palette-set"><div class="bg-secondary color-palette" style="border-radius: 5px; text-align: center;"><label>New Cuti</label></div></div>';
                    }else if(data[i].status == 2){
                      sts = '<div class="color-palette-set"><div class="bg-info color-palette" style="border-radius: 5px; text-align: center;"><label>DIreview</label></div></div>';
                    }else if(data[i].status == 4){
                      sts = '<div class="color-palette-set"><div class="bg-success color-palette" style="border-radius: 5px; text-align: center;"><label>Disetujui</label></div></div>';
                    }else{
                      sts = '<div class="color-palette-set"><div class="bg-danger color-palette" style="border-radius: 5px; text-align: center;"><label>DItolak</label></div></div>';
                    }
                    html += '<tr >'+
                            '<td style="vertical-align: middle;">'+no+++'</td>'+
                            '<td style="vertical-align: middle;">'+sts+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].name+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].divisi+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].store_name+'</td>'+       
                            '<td style="vertical-align: middle;">'+data[i].Jenis+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].tglawal+' - '+data[i].tglakhir+'</td>'+
                            '<td style="vertical-align: middle;">'+data[i].jmlhari+' Hari</td>'+
                            '<td style="text-align:right; vertical-align: middle;">'+
                              '<a href="javascript:;" class="btn btn-info btn-xs cuti_detail" data="'+data[i].id+'" data1="'+data[i].status+'"><i class="fa fa-eye" title="Detail"></i></a>'+
                            '</td>'+
                            '</tr >';
                  }
              $('#datacuti').html(html);
            }
     
      });
    }

    $('#datacuti').on('click','.cuti_detail',function(){
      var id = $(this).attr('data');
      var sts = $(this).attr('data');
      $.ajax({
        type  : 'POST',
        url   : '<?php echo base_url()?>index.php/C_Hrd/d_cuti',
        async : false,
        dataType : 'JSON',
        data  : {id:id,sts:sts},
        success : function(data){
          var html = '';
          var i;
          var btn = '';

          for (i = 0; i<data.length; i++) {
            if (data[i].file == '-') {
              btn = '-';
            }else{
              btn = '<a href="<?php echo base_url()?>index.php/C_Hrd/download_file/'+data[i].file+'" class="btn btn-info btn-xs" ><i class="fa fa-download" title="download"></i> Download File</a>';
            }
            html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                    '<div class="row">'+
                      '<div class="col-12 col-sm-6">'+
                        '<center><h3>Detail Pengajuan</h3></center>'+
                        '<dl class="row">'+
                          '<dt class="col-sm-4">No Ajuan Cuti</dt>'+
                            '<dd class="col-sm-8">: '+data[i].nocuti+'</dd>'+
                          '<dt class="col-sm-4">Tanggal Kirim</dt>'+
                            '<dd class="col-sm-8">: '+data[i].tglkirim+'</dd>'+
                          '<dt class="col-sm-4">Nama Karyawan</dt>'+
                            '<dd class="col-sm-8">: '+data[i].name+'</dd>'+
                          '<dt class="col-sm-4">Divisi</dt>'+
                            '<dd class="col-sm-8">: '+data[i].divisi+'</dd>'+
                          '<dt class="col-sm-4">Lokasi Kerja</dt>'+
                            '<dd class="col-sm-8">: '+data[i].store_name+'</dd>'+
                            '<br><br><br>'+
                          '<dt class="col-sm-4"><a href="javascript:;" class="btn btn-success btn-xs cuti_approv" data="'+data[i].id+'" ><i class="fa fa-eye" title="Detail"> Disetujui</i></a></dt>'+
                            '<dd class="col-sm-8"><a href="javascript:;" class="btn btn-danger btn-xs cuti_rejec" data="'+data[i].id+'" ><i class="fa fa-eye" title="Detail"> Ditolak</i></a></dd>'+
                        '</dl>'+
                      '</div>'+
                      '<div class="col-12 col-sm-6">'+
                        '<center><h3>Detail Cuti</h3></center>'+
                        '<dl class="row">'+
                          '<dt class="col-sm-4">Perihal</dt>'+
                            '<dd class="col-sm-8">: '+data[i].Jenis+'</dd>'+
                          '<dt class="col-sm-4">Tanggal Cuti</dt>'+
                            '<dd class="col-sm-8">: '+data[i].tglawal+' - '+data[i].tglakhir+'</dd>'+
                          '<dt class="col-sm-4">Total Hari</dt>'+
                            '<dd class="col-sm-8">: '+data[i].jmlhari+' Hari</dd>'+
                          '<dt class="col-sm-4">Sisa Cuti</dt>'+
                            '<dd class="col-sm-8">:  '+data[i].cuti+' Hari</dd>'+
                          '<dt class="col-sm-4">Minus Pengambilan Hari</dt>'+
                            '<dd class="col-sm-8" style="color:red;">: '+data[i].minuscuti+' Hari</dd>'+
                          '<dt class="col-sm-4">File</dt>'+
                            '<dd class="col-sm-8">: '+btn+'</dd>'+
                        '</dl>'+
                      '</div>'+
                    '</div>';
          }

          $('#dleave').html(html);

        $('#d_cuti').modal('show');
        datacutikarawan();
        }
      })
    });

    $('#dleave').on('click','.cuti_approv',function(){
      var no_aju = $(this).attr('data');
      $.ajax({
        type  : 'POST',
        url   : '<?php echo base_url()?>index.php/C_Hrd/u_approv',
        async : false,
        dataType : 'JSON',
        data  : {no_aju:no_aju},
        success : function(data){
                    $('#d_cuti').modal('hide');
                     datacutikarawan();
                     totalnewcuti();
                    Toast.fire({
                      icon: 'success',
                      title: 'Approve Success.'
                    })
        }
      })
    });

    $('#dleave').on('click','.cuti_rejec',function(){
      var no_aju = $(this).attr('data');
      $('#d_reject').modal('show');
      $('#kodeju').val(no_aju);
    });

    $('#sendnote').on('click',function(){
      var kodeju = $('#kodeju').val();
      var note = $('#note').val();
      $.ajax({
        type  : 'POST',
        url   : '<?php echo base_url()?>index.php/C_Hrd/sendnote',
        async : false,
        dataType : 'JSON',
        data  : {kodeju:kodeju,note:note},
        success : function(data){
          datacutikarawan();
          $('#d_cuti').modal('hide');
          $('#d_reject').modal('hide');
          totalnewcuti();
          Toast.fire({
            icon: 'success',
            title: 'Send Note Success'
          })
        }
      })
    })

    $('#withoutnote').on('click',function(){
      var kodeju = $('#kodeju').val();
      $.ajax({
        type  : 'POST',
        url   : '<?php echo base_url()?>index.php/C_Hrd/withoutnote',
        async : false,
        dataType : 'JSON',
        data  : {kodeju:kodeju},
        success : function(data){
          datacutikarawan();
          $('#d_cuti').modal('hide');
          $('#d_reject').modal('hide');
          totalnewcuti();
          Toast.fire({
            icon: 'success',
            title: 'Send Note Success'
          })
        }
      })
    })
});
</script>
</body>
</html>