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
                <?php if ($this->session->userdata('divisi')=='IT'):?>
                    <div class="card shadow">
                         <div class="card-header bg-dark">
                            <h3 class="card-title">
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search Store">

                                    <div class="input-group-append">
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalstore">
                                        <i class="fas fa-plus">New Store</i>
                                      </button>
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#">
                                        <i class="fas fa-print">Print</i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="max-height: 700px;">
                            <table class="table table-sm table-head-fixed ">
                                <thead>
                                    <th>No</th>
                                    <th>Store Number</th>
                                    <th>Store Name</th>
                                    <th>ID Ultra Viewer</th>
                                    <th>ID AnyDesk</th>
                                    <th>Ip Vpn</th>
                                    <th>Account Vpn</th>
                                    <th>No Telefon</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="datastore">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Store Total : 27 
                            ID Divisi : <?php echo $this->session->userdata('id');?>
                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->
                    <?php else:?>
                     <!-- Default box -->
                    <div class="card shadow">
                         <div class="card-header bg-dark">
                            <h3 class="card-title">
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search Store">

                                    <div class="input-group-append">
                                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#">
                                        <i class="fas fa-print">Print</i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="max-height: 700px;">
                            <table class="table table-sm table-head-fixed ">
                                <thead>
                                    <th>No</th>
                                    <th>Store Name</th>
                                    <th>No Telefon</th>
                                    <th>Email</th>
                                </thead>
                                <tbody id="datastorehrd">
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Store Total : 27 
                            ID Divisi : <?php echo $this->session->userdata('id');?>
                        </div>
                        <!-- /.card-footer-->

                    </div>
                    <!-- /.card -->
                <?php endif;?>
                    
                </div>
            </div>

            <div class="modal fade" id="modalstore">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Store</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-border" id="idupdate" name="idupdate">
                            <input type="text" class="form-control form-control-border" id="idstore" name="idstore" placeholder="Store Number" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="store_name" name="store_name" placeholder="store name" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="noremote" name="noremote" placeholder="ID Ultra Viewer" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="noany" name="noany" placeholder="ID AnyDesk" required="" >
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-border" id="type">
                                <option value="1">Store</option>
                                <option value="2">Office</option>
                                <option value="3">Store & Office</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="ip_vpn" name="ip_vpn" placeholder="ip vpn" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="acc_vpn" name="acc_vpn" placeholder="account vpn" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="telepon" name="telepon" placeholder="Phone" required="" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-border" id="email" name="email" placeholder="email" required="" >
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder">Operasional Time</label>
                                <div class="row">
                                  <div class="col- 12 col-sm-5"> <input class="form-control form-control-border" type="time" id="jambuka" name="jambuka" value="<?php echo date('H:i')?>"></div>
                                  &nbsp;&nbsp;-&nbsp;&nbsp;
                                  <div class="col-12 col-sm-5"> <input class="form-control form-control-border" type="time" id="jamtutup" name="jamtutup" value="<?php echo date('H:i')?>"></div>
                                </div>
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control form-control-border" required="" placeholder="Address"></textarea>
                        </div>
                    </div> 
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default">Clear</button>
                      <button type="button" class="btn btn-success" id="simpanstore">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="modalcctv">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div id="headmodalcctv"></div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="card shadow">
                                        <div class="card-header bg-orange">
                                            <h3 class="card-title">
                                                Form CCTV
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-border" type="text" id="idstorecctv">
                                                <input type="text" class="form-control form-control-border" id="idcctv" placeholder="Vendor" required="" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-border" id="dvr" placeholder="DVR" required="" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-border" id="ipcctv" placeholder="IP" required="" >
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control form-control-border"></select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-border" id="usercctv" placeholder="User" required="" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-border" id="passcctv" placeholder="password" required="" >
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                        
                                        </div>
                                        <!-- /.card-footer-->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-12 col-md-8">
                                    <table class="table table-sm table-head-fixed ">
                                        <thead>
                                            <th>No</th>
                                            <th>Vendor</th>
                                            <th>DVR</th>
                                            <th>IP</th>
                                            <th>Type</th>
                                            <th>User</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="datacctv">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('Link/Footer')?>
<?php $this->load->view('Link/Js')?>
<script type="text/javascript">
    $(function () {

    var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
    });

    tampil_store();
    tampil_storehrd();

    function tampil_store(){
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url()?>index.php/C_Store/datastore',
            async   : false,
            dataType: 'JSON',
            success : function(data){
                    var html = '';
                    var no = 1;
                    var jenis = '';
                    var i;
                    
                    for(i=0; i<data.length; i++){
                        if (data[i].jenis == '1') {
                            jenis = 'Store';
                        }else{
                            jenis = 'Office'
                        }
                        html += '<tr>'+
                                '<td>'+no+++'</td>'+
                                '<td>'+data[i].id_store+'</td>'+
                                '<td>'+data[i].store_name+'</td>'+
                                '<td>'+data[i].noremote+'</td>'+
                                '<td>'+data[i].noany+'</td>'+
                                '<td>'+data[i].ip_vpn+'</td>'+
                                '<td>'+data[i].account_vpn+'</td>'+
                                '<td>'+data[i].telepon+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td style="text-align:center;">'+
                                    '<div class="btn-group">'+
                                        '<button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                                          '<span class="sr-only"></span>'+
                                        '</button>'+
                                        '<div class="dropdown-menu" role="menu">'+
                                            '<a href="javascript:;" class="dropdown-item item_edit" data="'+data[i].id+'"><i class="fa fa-edit" title="Edit Data"></i> Edit Data</a>'+
                                            '<a href="javascript:;" class="dropdown-item item_hapus" data="'+data[i].id+'"><i class="fa fa-ban" title="Delete Data"></i> Delete Data</a>'+

                                            '<a href="javascript:;" class="dropdown-item item_cctv" data="'+data[i].store_name+'" data1="'+data[i].id+'"><i class="fa fa-video" title="CCTV Data"></i> CCTV Data</a>'+

                                            '<a href="javascript:;" class="dropdown-item item_internet" data="'+data[i].store_name+'" data1="'+data[i].id+'"><i class="fa fa-wifi" title="Network Data"></i> Network Data</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#datastore').html(html);
            }
 
        });
    }

    function tampil_storehrd(){
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url()?>index.php/C_Store/datastore',
            async   : false,
            dataType: 'JSON',
            success : function(data){
                    var html = '';
                    var no = 1;
                    var jenis = '';
                    var i;
                    
                    for(i=0; i<data.length; i++){
                        if (data[i].jenis == '1') {
                            jenis = 'Store';
                        }else{
                            jenis = 'Office'
                        }
                        html += '<tr>'+
                                '<td>'+no+++'</td>'+
                                '<td>'+data[i].store_name+'</td>'+
                                '<td>'+data[i].telepon+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '</tr>';
                    }
                    $('#datastorehrd').html(html);
            }
 
        });
    }


    $('#datastore').on('click','.item_cctv',function() {
        var storename = $(this).attr('data');
        $('#modalcctv').modal('show');
        $('#headmodalcctv').html('<h4 class="modal-title">CCTV '+storename+'</h4>');
    })

    $('#simpanstore').on('click',function() {
       //updatestore();
        var idupdate = $('#idupdate').val();
        if (idupdate == '') {
            simpanstore();
        }else{
            updatestore();
        }
    })

    function simpanstore(){
        var id        =$('#idstore').val();
        var store     =$('#store_name').val();
        var noremote    =$('#noremote').val();
        var noany       =$('#noany').val();
        var ipvpn     =$('#ip_vpn').val();
        var accvpn    =$('#acc_vpn').val();
        var telepon   =$('#telepon').val();
        var type      =$('#type').val();
        var jambuka   =$('#jambuka').val();
        var jamtutup  =$('#jamtutup').val();
        var email     =$('#email').val();
        var alamat     =$('#alamat').val();
        $.ajax({
            type : "POST",
            url  : '<?php echo base_url()?>index.php/C_Store/simpan_store',
            dataType : "JSON",
            data : {id:id,store:store,ipvpn:ipvpn,accvpn:accvpn,telepon:telepon,type:type,jambuka:jambuka,jamtutup:jamtutup,email:email,alamat:alamat,noremote:noremote,noany:noany},
            success: function(data){
                    $('#modalstore').modal('hide');
                    $('#idstore').val("");
                    $('#store_name').val("");
                    $('#ip_vpn').val("");
                    $('#type').val("1");
                    $('#acc_vpn').val("");
                    $('#telepon').val("");
                    $('#email').val("");
                    $('#alamat').val("");
                    // sessionStorage.setItem("reloading",true);
                    // document.location.reload();
                    tampil_store();
                          Toast.fire({
                            icon: 'success',
                            title: 'Save Data Success.'
                          })
            }
        });
        return false;
    }

    function updatestore(){
        var idupdate    =$('#idupdate').val();
        var id          =$('#idstore').val();
        var store       =$('#store_name').val();
        var noremote    =$('#noremote').val();
        var noany       =$('#noany').val();
        var ipvpn       =$('#ip_vpn').val();
        var accvpn      =$('#acc_vpn').val();
        var type        =$('#type').val();
        var telepon     =$('#telepon').val();
        var jambuka     =$('#jambuka').val();
        var jamtutup    =$('#jamtutup').val();
        var email       =$('#email').val();
        var alamat      =$('#alamat').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/C_Store/update_store')?>",
            dataType : "JSON",
            data : {idupdate:idupdate,id:id,store:store,noremote:noremote,ipvpn:ipvpn,accvpn:accvpn,type:type,telepon:telepon,jambuka:jambuka,jamtutup:jamtutup,email:email,alamat:alamat,noany:noany},
            success: function(data){
                    $('#idupdate').val("");
                    $('#modalstore').modal('hide');
                    $('#idstore').val("");
                    $('#store_name').val("");
                    $('#ip_vpn').val("");
                    $('#type').val("1");
                    $('#acc_vpn').val("");
                    $('#telepon').val("");
                    $('#email').val("");
                    $('#alamat').val("");
                    // sessionStorage.setItem("reloading",true);
                    // document.location.reload();
                    tampil_store();
                          Toast.fire({
                            icon: 'success',
                            title: 'Update Data Success.'
                          })

                }
            });
            return false;
    }

    $('#datastore').on('click','.item_edit',function(){
        var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : '<?php echo base_url()?>index.php/C_Store/get_store',
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id_store,store_name, ip_vpn, account_vpn, telepon,jambuka,jamtutup,noremote,noany){
                        $('#modalstore').modal('show');
                        $('#idupdate').val(id);
                        $('[name="noremote"]').val(data.noremote);
                        $('[name="idstore"]').val(data.id_store);
                        $('[name="acc_vpn"]').val(data.account_vpn);
                        $('[name="store_name"]').val(data.store_name);
                        $('[name="noremote"]').val(data.noremote);
                        $('[name="noany"]').val(data.noany);
                        $('[name="ip_vpn"]').val(data.ip_vpn);
                        $('[name="telepon"]').val(data.telepon);
                        $('[name="jambuka"]').val(data.jambuka);
                        $('[name="jamtutup"]').val(data.jamtutup);
                        $('[name="email"]').val(data.email);
                        $('[name="alamat"]').val(data.alamat);
                    });
                }
            });
            return false;
    })

    $('#datastore ').on('click','.item_hapus',function(){
        var id = $(this).attr("data");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't see this data again!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url('index.php/C_Store/delete_store/')?>'+id,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#"+id).remove();
                          // sessionStorage.setItem("reloading",true);
                          // document.location.reload();
                        tampil_store();
                        Toast.fire({
                            icon: 'success',
                            title: 'Delete Data Success.'
                        })
                    }
                });
            }
        })
    });

})
</script>
</body>
</html>