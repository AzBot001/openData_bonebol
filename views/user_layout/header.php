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
    .img-place>img {
      width: 100%;
      height: 100%;
    }

    .fg-sekon {
      color: #6e44f9;
    }

    .aza {
      align-items: center;
      justify-content: center;
    }

    .text-ungu {
      color: #A52EFF;
    }

    .jdl {
      font-size: 17px;
      text-align: left;
      margin: 0 0 10px 0;
      color: #616161;
    }

    .sjdl {
      font-size: 13px;
      margin: 0 0 0 0;
      color: #616161;
    }

    .btn-file {
      /* padding: 5px;    */
      padding: 5px 25px;
      border-radius: 0;
    }

    .btn-dark {
      padding: 5px;
    }

    .btn-group,
    .btn-group-vertical {
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

    input:focus {
      border: 0px;
    }

    .input-group-text {
      background-color: #fff;
    }

    option:first {
      color: #ff0;
    }

    .bgbg {
      padding: 20px 20px;
      font-size: 25px;
      text-shadow: 1px 1px 2px #000;
    }

    table {
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

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 40rem;
      padding: 0.5rem 0;
      margin: 10px 0 100px -200px;
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      list-style: none;
      background-color: #fff;
      background-clip: padding-box;

      border-radius: 0.25rem;
    }

    a:hover {
      text-decoration: none;
    }

    .ling {
      color: #000;
    }

    .ling:hover {
      color: #000;
    }

    .badge-ungu {
      background-color: #A52EFF;
      color: #fff;
    }

    .badge-white {
      background-color: #fff;
      color: #007bff;
    }

    .nav-fill .nav-link {
      background-color: #fff;
      border: 1px solid #007bff;

    }

    .nav-fill .active {
      transition: 0.5s;
    }

    .box {
      border-top: 2px solid #6e44f9;
      margin: 25px 25px;
      width: 320px;
      min-height: 90px;
      box-shadow: 1px 1px 10px #eceeef;
      padding: 30px;
      border-radius: 10px;
    }

    .box:hover {
      border-top: 3px solid #6e44f9;
      margin: 25px 25px;
      width: 320px;
      min-height: 90px;
      box-shadow: 1px 1px 10px #eceeef;
      padding: 30px;
      border-radius: 10px;
    }

    .tulisan {
      text-align: left;
    }

    .judul_materi {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .img-materi {
      height: 125px;
      width: 100px;
      object-fit: cover;
      border-radius: 10px;
      float: left;
      margin-right: 20px;
    }

    .img-org {
      height: 180px;
      width: 200px;
      object-fit: cover;
      border-radius: 10px;
      float: left;
    }

    .flx {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 15px;
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
        <div class="modal-header bg-secondary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Login | Open Data Bone Bolango</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="">Email</label>   
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="text" placeholder="Masukan Email" name="user" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock-alt"></i></span>
                </div>
                <input type="password" placeholder="Masuk Password" name="password" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="login" class="btn btn-secondary btn-block">Login</button>
            </div>
            <div class="form-group text-center">
              <a href="<?= $base_url ?>verifikasi">Lupa Password ?</a>
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
            <a class="nav-link text-white" href="<?= $base_url; ?>">Beranda</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Topik
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <div class="container">
                  <div class="row">
                    <?php
                    $query = $mysqli->query("SELECT * FROM kategori_data");
                    while ($data = $query->fetch_assoc()) {
                    ?>
                      <div class="col-3 mt-2 text-center">
                        <a class="ling" href="<?= $base_url ?>topik/<?= $data['id_kategori'] ?>">
                          <img class="rounded" width="80" src="<?= $base_url ?>public/uploads/kategori/<?= $data['gambar'] ?>" alt="">
                          <div style="font-size: 12px;"><?= $data['nama_kategori'] ?></div>
                        </a>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= $base_url ?>dataset">Dataset</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= $base_url ?>infografik">Infografik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= $base_url ?>organisasi">Organisasi</a>
          </li>
        </ul>
        <div class="ml-auto my-2 my-lg-0">
          <?php if (!isset($_SESSION['unique_user'])) : ?>
            <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#exampleModal">Login</button>
          <?php elseif ($_SESSION['type_user'] == 'organisasi') : ?>
            <a href="beranda_organisasi" class="btn btn-light rounded-pill">Dashboard</a>
          <?php else : ?>
            <a href="beranda_admin" class="btn btn-light rounded-pill">Dashboard</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- Modal -->