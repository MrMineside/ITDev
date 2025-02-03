<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RG Office V2</title>
  <link rel="icon" href="<?php echo base_url()?>assets/Image/rg title.png" type="image/gif" /> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/AdminLTE/dist/css/adminlte.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/toastr/toastr.min.css">
 <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style type="text/css">
    .bg-rg{
      background-color: #C99A45;
    }
    @media print {
      table.dataTable thead th:nth-child(2),  /* Sembunyikan kolom ID Task */
      table.dataTable tbody td:nth-child(2),  /* Sembunyikan isi kolom ID Task */
      table.dataTable thead th:nth-child(8),
      table.dataTable tbody td:nth-child(8) {
        display: none !important;
      }
    }
  </style>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed accent-orange text-sm sidebar-collapse">
<div class="wrapper">