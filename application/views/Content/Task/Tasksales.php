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
                            </h3>
                            <div class="card-tools">
                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                  <label class="custom-control-label" for="customSwitch1">Store Scheduler</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <button type="button" id="databaru" class="btn btn-sm btn-info">Create</button>
                                      </div>
                                      <!-- /btn-group -->
                                       <select class="custom-select rounded-0" id="filter" name="filter">
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <input type="date" class="form-control form-control-sm" id="pilihtgl" name="pilihtgl" value="<?php echo date('Y-m-d')?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card shadow" id="myCard">
                        <div class="card-header bg-dark">
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <select name="opstore" id="opstore" class="form-control select2 form-control-sm" style="width:100%"></select>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <input type="text" class="form-control form-control-sm" id="labremote" placeholder="Ultraviewer" readonly>
                                      </div>
                                      <input type="text" class="form-control form-control-sm" id="labany" placeholder="Anydesk" readonly>
                                    </div>
                                    <input type="hidden" name="type" id="type" value="1">
                                    <input type="hidden" name="idhead" id="idhead">
                                    <input type="hidden" class="form-control" id="idreport" placeholder="" value="rpt/<?php echo date('Y').('/').date('m')?>">
                                </div>
                                <div class="col-12 col-md-1">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-gradient-success btn-sm" id="simpandata" disabled>Save</button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="card-body table-responsive p-0">
                            <div class="card">
                              <div class="card-header">

                                <div class="card-tools">
                                  
                                </div>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body table-responsive p-0">
                                <table id="example1" class="display table table-sm table-hover text-nowrap">
                                  <thead>
                                    <th style="width:5%;">No</th>
                                    <th>id</th>
                                    <th>Store</th>
                                    <th>Id Viewer</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>User</th>
                                    <th style="width:5%;">Action</th>
                                </thead>
                                <tbody></tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                            </div>
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
    </section>

    
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php $this->load->view('Link/Footer')?>
<?php $this->load->view('Link/Js')?>
<script>
$(function () {
    bsCustomFileInput.init();

    var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000
    });

     //Initialize Select2 Elements
    $('.select2').select2({
        theme: "classic",
    });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $(document).on('select2:open', () => {
      document.querySelector('.select2-search__field').focus();
    });

    setInterval( function () {
        datatask();
    }, 10000 );

    
    op_store();
    //datatask();
    fetchData();
    opcreat();

    $('.card-title').html('Withdraw Sales');

    $('#idhead').on('input', function() {
        var inputVal = $(this).val();

        if (inputVal.trim() === '') {
            $('#simpandata').attr('disabled', 'disabled');
        } else {
            $('#simpandata').removeAttr('disabled');
        }
    });

    $('#customSwitch1').change(function () {
        if ($(this).prop("checked")) { // checked
            $('.card-title').html('Store Shceduler');
            $('#type').val("2");
            op_store();
            opcreat();
            //datatask();
            fetchData();
            Toast.fire({
                icon: 'success',
                title: 'Beralih Store Shceduler.'
            })
        }else{ // not checked
            $('.card-title').html('Withdraw Sales');
            $('#type').val("1");
            op_store();
            opcreat();
            //datatask();
            fetchData();
            Toast.fire({
                icon: 'success',
                title: 'Beralih Withdraw Sale.'
            })
        }
    });

    $('#pilihtgl').change(function(){
        op_store();
        opcreat();
        //datatask();
        fetchData();
    })

    $('#databaru').click(function(){
        create();
    })

    function create(){
        var type = $('#type').val();
        $.ajax({
            type : "POST",
            url  : '<?php echo base_url()?>index.php/C_Newtask/create',
            dataType : "JSON",
            data : {type:type},
            success: function(data){
                $('#idhead').val(data);
                op_store();
                opcreat();
                $('#myCard').show(); 
                Toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Dibuat'
                })    
            }
        });
        return false;

    }

    function opcreat(){
        var gettanggal = $('#pilihtgl').val();
        var type = $('#type').val();
        $.ajax({
            type      : 'POST',
            url       : '<?php echo base_url()?>index.php/C_Newtask/op_creat',
            async     : false,
            dataType  : 'json',
            data      : {gettanggal:gettanggal,type:type},
            success: function(data) {
                    $('#filter').empty(); // Kosongkan select option terlebih dahulu

                    if (data.length > 0) {
                        $('#filter').append('<option value="">-- Pilih Data --</option>');
                        $.each(data, function(key, value) {
                            $('#filter').append('<option value="'+ value.id +'">Penarikan Jam :'+ value.jam +'</option>');
                        });

                        //$('#simpandata').prop('disabled', false); // Disable tombol save
                    } else {
                        $('#filter').append('<option value="">-- Tidak Ada Data --</option>');
                        //$('#simpandata').prop('disabled', true); // Disable tombol save jika tidak ada data
                    }
            }
     
        });
    }

    $('#filter').change(function(){
        var id = $(this).val();
        $.ajax({
                type : "GET",
                url  : '<?php echo base_url()?>index.php/C_Newtask/gethead',
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id){
                        $('#idhead').val(data.id);
                    });
                    fetchData();
                    op_store();
                }
        });
        return false;
    })

    $('#opstore').change(function(){
        var id = $(this).val();
        var idhead = $('#idhead').val();
        $.ajax({
                type : "GET",
                url  : '<?php echo base_url()?>index.php/C_Newtask/getstore',
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    if (idhead=="") {
                        Toast.fire({
                            icon: 'error',
                            title: 'Silahkan pilih data penarikan'
                        })
                        $('#simpandata').prop('disabled', true);
                    } else {
                        $.each(data,function(noremote,noany){
                            $('#labremote').val(data.noremote);
                            $('#labany').val(data.noany);
                            $('#simpandata').prop('disabled', false);
                        }); 
                    }
                }
        });
        return false;
    })


    function fetchData() {
        var date = $('#pilihtgl').val();
        var type = $('#type').val();
        var idhead = $('#idhead').val();
                var table = $('#example1').DataTable({
                    'ajax': {
                        'url': '<?php echo site_url('/C_Newtask/get_data'); ?>',
                        'type': 'GET',
                        'data': { 'date': date , 'type': type , 'idhead': idhead},
                        'dataSrc': function(json) {
                            if (json.status === 'no_data') {
                                $('#no-data-notif').show();
                                return [];
                            } else {
                                $('#no-data-notif').hide();
                                return json.data;
                            }
                        },
                        'error': function (xhr, error, code) {
                            console.log('XHR:', xhr);
                            console.log('Error:', error);
                            console.log('Code:', code);
                        }
                    },
                     'columns': [
                        { 
                            'data': null, 
                            'render': function (data, type, row, meta) {
                                return meta.row + 1; // Menambahkan nomor urut berdasarkan indeks baris
                            }
                        },
                        { 'data': 'idtask' },
                        { 'data': 'store_name' },
                        { 'data': 'noremote' },
                        { 
                            'data': 'status',
                            'render': function (data, type, row) {
                                if (data == 1) {
                                    return '<span class="icon">✔Success</span>';
                                }else {
                                    return '<span class="icon">✘Failed</span>';
                                }
                            }
                        },
                        { 'data': 'jam' },
                        { 'data': 'name' },
                        {
                            'data': null,
                            'render': function (data, type, row) {
                                return '<button class="delete-btn btn btn-block bg-gradient-danger btn-sm"" value="' + row.idtask + '">Delete</button>';
                            },
                            'orderable': false
                        }
                    ],
                    'columnDefs': [
                        {
                            'targets': [1], // Kolom ke-2 (index 1) yang akan disembunyikan dalam tampilan biasa
                            'visible': false // Menyembunyikan kolom ID dalam tampilan biasa
                        },
                        {
                            'targets': [7], // Kolom ke-8 (index 7) yang akan disembunyikan saat print
                            'className': 'no-print' // Kelas ini akan digunakan untuk menyembunyikan kolom saat print
                        }
                    ],
                    'dom': 'Bfrtip',  // Menambahkan tombol-tombol di atas tabel
                    'buttons': [
                        {
                            'extend': 'print',
                            'text': 'Print Report',
                            'exportOptions': {
                                'columns': ':visible:not(.no-print)'  // Hanya mencetak kolom yang tidak memiliki kelas 'no-print'
                            },
                            customize: function (win) {
                                // Add custom title and information to the printout
                                $(win.document.body).prepend(
                                    '<h1>Report Tasksales</h1>' +
                                    '<p>Date: ' + new Date().toLocaleDateString() + '</p>' 
                                );
                                
                                // Style the title and additional information
                                $(win.document.body).find('h1').css({
                                    'text-align': 'center',
                                    'font-size': '20px'
                                });
                                $(win.document.body).find('p').css({
                                    'text-align': 'center',
                                    'font-size': '14px'
                                });
                                
                                // Optionally, customize the table
                                $(win.document.body).find('h1').css('text-align', 'center');
                                $(win.document.body).find('table').addClass('display').css('font-size', '14px');
                            }
                        }
                    ],
                   'destroy': true // Menambahkan destroy untuk menginisialisasi ulang DataTable
                });
            }

    $('#example1').on('click', '.delete-btn', function() {
                var id = $(this).val(); // Mengambil ID dari kolom pertama
                
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: '<?php echo site_url('/C_Newtask/delete_data'); ?>',
                        type: 'POST',
                        data: { id: id },
                        success: function(response) {
                            var json = JSON.parse(response);
                            if (json.status === 'success') {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Delete Success'
                                })
                                //alert(json.message);
                                $('#example1').DataTable().ajax.reload(); // Memuat ulang data
                            } else {
                                //alert(json.message);
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Delete Failed'
                                })
                            }
                        },
                        error: function(xhr, error, code) {
                            console.log('XHR:', xhr);
                            console.log('Error:', error);
                            console.log('Code:', code);
                        }
                    });
                }
            });

    function op_store(){
        var gettanggal = $('#pilihtgl').val();
        var type = $('#type').val();
        var idhead = $('#idhead').val();
        $.ajax({
            type      : 'POST',
            url       : '<?php echo base_url()?>index.php/C_Newtask/op_store',
            async     : false,
            dataType  : 'json',
            data      : {gettanggal:gettanggal,type:type,idhead:idhead},
            success: function(data) {
                    $('#opstore').empty(); // Kosongkan select option terlebih dahulu

                    if (data.length > 0) {
                        $('#opstore').append('<option value="">-- Pilih Store --</option>');
                        $.each(data, function(key, value) {
                            $('#opstore').append('<option value="'+ value.id_store +'">'+ value.store_name +'</option>');
                        });
                    } else {
                        $('#opstore').append('<option value="">-- Store Kosong --</option>');
                    }
            }
     
        });
    }


    // function op_store(){
    //     var gettanggal = $('#pilihtgl').val();
    //     var type = $('#type').val();
    //     $.ajax({
    //         type      : 'POST',
    //         url       : '<?php echo base_url()?>index.php/C_Newtask/op_store',
    //         async     : false,
    //         dataType  : 'json',
    //         data      : {gettanggal:gettanggal,type:type},
    //         success : function(data){
    //           var html = '';
    //           var i;
    //             $('#opstore').append('<option value="">-- Pilih Store --</option>');        
    //             for(i=0; i<data.length; i++){
    //                 html += '<option value='+data[i].id_store+'>'+data[i].id_store+' - '+data[i].store_name+'</option>';
    //             }
              
    //             $('#opstore').html(html);
    //         }
     
    //     });
    // }

    $('#simpandata').on('click',function(){
        simpan();
    })

   function simpan(){
        var idreport        =$('#idreport').val();
        var store           =$('#opstore').val();
        var type            =$('#type').val();
        var pilihtgl        =$('#pilihtgl').val();
        var idhead        =$('#idhead').val();
        $.ajax({
            type : "POST",
            url  : '<?php echo base_url()?>index.php/C_Newtask/simpantask',
            dataType : "JSON",
            data : {idreport:idreport,store:store,type:type,pilihtgl:pilihtgl,idhead:idhead},
            success: function(data){
                    $('[name="status"]').val("1");
                    $('[name="note"]').val("");
                    op_store();
                    $('#example1').DataTable().ajax.reload();
                    Toast.fire({
                        icon: 'success',
                        title: 'Save Data Success.'
                    })
                }
            });
        return false;
    }

    $('#datatask').on('click','.item_hapus',function(){
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
                    url: '<?php echo base_url('index.php/C_Newtask/delete_task/')?>'+id,
                    type: 'DELETE',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#"+id).remove();
                        op_store();
                        datatask();
                        Toast.fire({
                            icon: 'success',
                            title: 'Delete Data Success.'
                        })
                    }
                });
            }
        })
    });

});
</script>
</body>
</html>