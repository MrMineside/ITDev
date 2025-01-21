<!-- jQuery -->
<script src="<?php echo base_url()?>assets/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script><script>
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
</script>