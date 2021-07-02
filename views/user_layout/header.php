<?php
include 'app/aksi_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="description" content="Mobile Application HTML5 Template">

  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">
  

  <title>Open Data Bone Bolango</title>

  <link rel="shortcut icon" href="<?= $base_url ?>public/assets/img/icons.ico" type="image/x-icon">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/maicons.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets2/vendor/animate/animate.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets2/vendor/owl-carousel/css/owl.carousel.min.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets/vendor/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/bootstrap.css">

  <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/mobster.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  
  <style>
.img-place > img {
    width: 100%;
    height: 100%;
}
.fg-sekon{
    color: #6e44f9;
}
.aza{
  align-items: center;
  justify-content: center;
}
.text-ungu{
  color: #A52EFF;
}
.jdl{
  font-size: 17px;
  text-align: left;
  margin: 0 0 10px 0;
  color: #616161;
}
.sjdl{
  font-size: 13px;
  margin: 0 0 0 0 ;
  color: #616161;
}
.btn-file{
  /* padding: 5px;    */
  padding: 5px 25px;
  border-radius: 0;
}
.btn-dark{
  padding: 5px;
}
.btn-group, .btn-group-vertical {
    position: sticky;
    left: 0;
    display: inline-flex;
    vertical-align: middle;   
}
#bc::before {
    content: '>';
}
.page-section {
    position: relative;
    padding-top: 50px;
    padding-bottom: 100px;
}
input:focus{
  border: 0px;
}
.input-group-text{
  background-color: #fff;
}
option:first {
  color: #ff0;
}
.bgbg{
  padding: 20px 20px;
  font-size: 25px;
  text-shadow: 1px 1px 2px #000 ;
}
 table{
   font-size: 13px;
 }
 .select2-container--default .select2-selection--single {
    background-color: #fff;
    border-radius: 0;
    border-top: 1px solid #ced4da;
    border-bottom: 1px solid #ced4da;
    border-left: 0;
    border-right: 1px solid #ced4da;
    height: 48px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 47px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 47px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
}
  </style>
</head>
<body>
<?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="user" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="login" class="btn btn-secondary btn-block">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?= $base_url ?>public/assets2/opd_putih.png" alt="" width="90">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="<?= $base_url; ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>dataset">Dataset</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>infografik">Infografik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base_url ?>organisasi">Organisasi</a>
        </li>
      </ul>
      <div class="ml-auto my-2 my-lg-0">
        <?php if(!isset($_SESSION['unique_user'])): ?>
        <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#exampleModal">Login</button>
        <?php elseif($_SESSION['type_user'] == 'organisasi'): ?>
          <a href="beranda_organisasi" class="btn btn-light rounded-pill">Dashboard</a>
        <?php else: ?>
          <a href="beranda_admin" class="btn btn-light rounded-pill">Dashboard</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<!-- Modal -->
