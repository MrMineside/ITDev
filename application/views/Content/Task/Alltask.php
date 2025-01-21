<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tasksales</title>
    <link rel="icon" href="<?php echo base_url()?>assets/Image/rg title.png" type="image/gif" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/mdb.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
  </head>
  <body>

    <!-- Start your project here-->
    <div style="background-image:url('<?php echo base_url()?>assets/Image/61769.jpg')">
      
      <section class="vh-100">
        <div class="container py-0 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card shadow">
                         <div class="card-header">
                             <h1 class="m-0" style="font-family: ProximaNova,Arial,Sans-serif; font-style: normal; font-weight:100; font-size:13pt; color: black;">
                                <span id="jam"></span>
                            </h1>
                            <div class="card-tools">
                                <div class="row">
                      <div class="col-6 col-md-3">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="date" id="pilihtgl" name="pilihtgl" value="<?php echo date('Y-m-d')?>" class="form-control float-right">
                            <div class="input-group-append">
                          </div>
                        </div>
                      </div>
                    </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style="max-height: 700px;">
                            <table class="table table-sm table-hover">
                              <thead>
                                <th style="width:5%;">No</th>
                                <th>Store</th>
                                <th>Total Session</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Detail</th>
                              </thead>
                              <tbody id="dataview"></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>
          </div>

          <div class="modal fade" id="modaltimeline">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div id="headmodalcctv"></div>
                        </div>
                        <div class="modal-body">
                            <table class="table table-sm table-hover">
                              <thead>
                                <th>Store</th>
                                <th>User</th>
                                <th>Time</th>
                              </thead>
                              <tbody id="datatimeline"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
        </div>
      </section>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/mdb.min.js"></script>
    <script src="<?php echo base_url()?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Custom scripts -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    
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
            var gettanggal = $('#pilihtgl').val();
            $.ajax({
              type  : 'POST',
              url   : '<?php echo base_url()?>index.php/C_Nologin/datatask',
              async : true,
              dataType : 'json',
              data : {gettanggal:gettanggal},
              success: function (response) {
                      const tbody = $('#dataview'); // Pastikan elemen ini ada di DOM
                      tbody.empty(); // Kosongkan tabel sebelum menambahkan data baru

                      if (response.data && response.data.length > 0) {
                          let no = 1; // Inisialisasi nomor urut
                          response.data.forEach(function (item) {
                              // Tentukan ikon berdasarkan status
                              let icon = item.status == 1
                                  ? '<i class="fa fa-check-circle" title="Success" style="color: green;"></i> Success'
                                  : '<i class="fa fa-spinner" title="Failed" style="color: red;"></i> Not Success';

                              // Cek apakah total_tarik adalah 0
                              let buttonClass = item.total_tarik == 0 ? 'disabled' : '';
                              let buttonAction = item.total_tarik == 0 ? 'javascript:void(0);' : 'javascript:;';

                              // Tambahkan baris data ke tabel
                              tbody.append(`
                                  <tr>
                                      <td>${no++}</td>
                                      <td>${item.store_name}</td>
                                      <td>${item.total_tarik}</td>
                                      <td>${icon}</td>
                                      <td>${item.tanggal}</td>
                                      <td>
                                          <a href="${buttonAction}" class="btn btn-info btn-xs item_timeline ${buttonClass}" 
                                             data="${item.id_store}" 
                                             data-store="${item.store_name}">
                                              <i class="fa fa-clock" title="Timeline"></i>
                                          </a>
                                      </td>
                                  </tr>
                              `);
                          });
                          // Tambahkan handler untuk mencegah klik tombol disabled
                          $('.item_timeline.disabled').on('click', function (e) {
                              e.preventDefault();
                              alert('Aksi tidak tersedia karena total tarik adalah 0.');
                          });

                      } else {
                          // Jika data kosong
                          tbody.append(`
                              <tr>
                                  <td colspan="6" style="text-align: center;">Tidak ada data</td>
                              </tr>
                          `);
                      }
                  },
                  error: function () {
                      alert('Terjadi kesalahan saat mengambil data.');
                  }
            });
        }

      $('#dataview').on('click','.item_timeline',function() {
        var storename = $(this).attr('data-store');
        $('#modaltimeline').modal('show');
        $('#headmodalcctv').html('<h4 class="modal-title">Timeline '+storename+'</h4>');

        var id_store = $(this).attr('data');
        var tanggal = $('#pilihtgl').val();

                $.ajax({
                    url: "<?php echo site_url('C_Nologin/get_data_by_store'); ?>",
                    type: "POST",
                    data: {id_store: id_store, tanggal: tanggal},
                    dataType: "json",
                    success: function(response) {
                        if (response.message) {
                            var resultHtml  = '<tr>'+
                                              '<td colspan="2">' + response.message + '</td>'+
                                              '</tr>';
                            $('#datatimeline').html(resultHtml);  // Menampilkan pesan jika tidak ada data
                        } else {
                            var resultHtml = '<tr>';
                            $.each(response, function(index, item) {
                                resultHtml += '<tr>'+
                                              '<td>' + item.store_name + '</td>'+
                                              '<td>' + item.name + '</td>'+
                                              '<td>' + item.jam + '</td>'+
                                              '</tr>';
                            });
                            resultHtml += '</tr>';
                            $('#datatimeline').html(resultHtml);  // Menampilkan data jika ada
                        }
                    },
                    error: function() {
                        $('#datatimeline').html('An error occurred.');
                    }
                });
      })
    </script>
  </body>
</html>