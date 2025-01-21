<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>PERMOHONAN CUTI</title>
  <link rel="icon" href="assets/Image/rg.png" type="image/gif" />
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <style type="text/css">
    table{
    border-collapse:collapse;
    font:normal normal 12px roboto,Arial,Sans-Serif;
    color:#333333;
    }
    /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
    .table th {
        background:#00BFFF;
        color:#DCDCDC;
        font-weight:bold;
        font-size:14px;
    }
    /* Mengatur border dan jarak/ruang pada kolom */
    .table th,
    .table td {
        vertical-align:top;
        padding:5px 10px;
        border:1px solid #696969;
    }
    /* Mengatur warna baris */
    .table tr {
        background:#DCDCDC;
    }
    /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
    .table tr:nth-child(even) {
        background:#FFFAFA;
    }

    .tableuser th {
        color:black;
        font-weight:bold;
        font-size:12px;
    }
    /* Mengatur border dan jarak/ruang pada kolom */
    .tableuser th,
    .tableuser td {
        color: black;
        vertical-align:top;
        border:0px solid #696969;
    }
    /* Mengatur warna baris */
    .tableuser tr {
        background:white;
    }
    /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
    /*.tableuser tr:nth-child(even) {
        background:#FFFAFA;
    }*/

    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
    .header {
      padding: 10px;
      text-align: center;
      color: black;
      font-size: 30px;
    }

    p.test2 {
      writing-mode: vertical-lr; 
    }
  </style>
</head>
<body style="font-family: roboto,Sans-serif; font-style: normal; font-weight:100; color:black;">
    <div class="header">
      <p align="center" style="font-size: 15pt; ">
        <img src="assets/Image/rg.png">
        <b>SURAT PERMOHONAN CUTI KARYAWAN</b>
      </p>
    </div>
    <div>
      <p align="left" style="font-size: 10pt; ">
        <b>Dengan Hormat,</b>
      </p>
      <p align="left" style="font-size: 9pt; ">
        <b>SAYA YANG BERTANDA TANGAN DIBAWAH INI :</b>
      </p>
    </div>
    <table class="tableuser" width="100%">
      <tr>
        <td width="20%">NAMA KARYAWAN</td>
        <td>: <?php echo $datauser->name?></td>
      </tr>
      <tr>
        <td>DIVISI</td>
        <td>: <?php echo $datauser->divisi?></td>
      </tr>
      <tr>
        <td>LOKASI KERJA</td>
        <td>: <?php echo $datauser->store_name?></td>
      </tr>
    </table>
    <br>
    <div>
      <p align="left" style="font-size: 10pt; ">
        <b>DETAIL CUTI :</b>
      </p>
    </div>
    <div>
      <table class="table" width="100%" style="">
        <thead>
          <tr>
            <td>TANGGAL CUTI</td>
            <td>PERIHAL</td>
            <td>JUMLAH CUTI</td>
            <td>SISA CUTI</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $datacuti->tglawal?> - <?php echo $datacuti->tglakhir?></td>
            <td><?php echo $datacuti->jenis?></td>
            <td><?php echo $datacuti->jmlhari?> Hari</td>
            <td><?php echo $datauser->cuti?> Hari</td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <div>
      <table class="table" width="100%" style="">
        <tbody>
          <tr>
            <td width="25%" >NOTE TAMBAHAN</td>
            <td><?php echo $datacuti->note?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div>
      <p align="left" style="font-size: 9pt; ">
        <b>Demikian Surat Permohonan Cuti saya ajukan,Terima kasih atas perhatian bapak atau ibu.</b>
      </p>
    </div>
    <br>
    <table class="tableuser" width="100%">
      <tr>
        <td align="left">Jakarta, <?php echo date('d-M-Y')?></td>
      </tr>
      <tr>

        <td align="left"> Hormat Saya</td>
      </tr>
      <tr>
        <td height="10%"></td>
      </tr>
      <tr>
        <td align="left"> <?php echo $datauser->name?></td>
      </tr>
    </table>
  
  <div style="padding-top: 30px; font-size: 8pt;">
    <p><strong></strong></p>
  </div>

</body>
</html>