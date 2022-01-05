<?php

$cari = $_GET['cari'];
$judul = $_GET['judul'];
$organisasi = $_GET['organisasi'];
$kategori = $_GET['kategori'];

//default
if(empty($cari) && empty($judul) && empty($organisasi) && empty($kategori)){
  $dataset = $mysqli->query("SELECT * FROM dataset");
  $infografik = $mysqli->query("SELECT * FROM infografik");
}

//beranda
else if(isset($cari) && empty($judul) && empty($kategori) && empty($organisasi)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE judul LIKE '%$cari%'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE judul LIKE '%$cari%'");
}

//judul
else if(empty($cari) && empty($kategori) && empty($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE judul LIKE '%$judul%'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE judul LIKE '%$judul%'");
}

//kategori
else if(empty($cari) && isset($kategori) && empty($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_kategori = '$kategori'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_kategori = '$kategori'");
}

//organisasi
else if(empty($cari) && empty($kategori) && isset($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$organisasi'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '$organisasi'");
}

//kategori + organisasi
else if(empty($cari) && isset($kategori) && isset($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_kategori = '$kategori' AND id_organisasi = '$organisasi'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_kategori = '$kategori' AND id_organisasi = '$organisasi'");
}

//kategori + judul
else if(empty($cari) && isset($kategori) && empty($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_kategori = '$kategori' AND judul LIKE '%$judul%'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_kategori = '$kategori' AND judul LIKE '%$judul%'");
}

//organisasi + judul
else if(empty($cari) && empty($kategori) && isset($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$organisasi' AND judul LIKE '%$judul%'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '$organisasi' AND judul LIKE '%$judul%'");
}

//organisasi + judul + kategori
else if(empty($cari) && isset($kategori) && isset($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$organisasi' AND judul LIKE '%$judul%' AND id_kategori = '$kategori'");
  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '$organisasi' AND judul LIKE '%$judul%' AND id_kategori = '$kategori'");
}

$datasetx = $dataset->fetch_assoc();
$datasety = mysqli_num_rows($dataset);


$infografikx = $infografik->fetch_assoc();
$infografiky = mysqli_num_rows($infografik);


?>
<?php include 'app/controller_user/post_dataset.php'; ?>
<main>
  <div class="page-hero-section bg-image hero-mini" style="height:500px; background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
    <div class="hero-caption">
      <div class="container fg-white h-100">
        <div class="row justify-content-center align-items-center text-center h-100">
          <div class="col-lg-9">
            <img src="<?= $base_url ?>public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-light">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3">
          <li class="breadcrumb-item" style="font-size: 13px;"><a href="<?= $base_url ?>">Beranda</a></li>
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page">Pencarian</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-section">
    <div class=" container">
      <div class="row">
        <div class="col-8">
          <h1>Pencarian</h1>
        </div>
        <div class="col-12 mt-2">Berikut dataset dan infografik berdasarkan pencarian. Open Data Bone Bolango menyediakan akses ke beragam koleksi dataset dari seluruh Organisasi Perangkat Daerah di Kabupaten Bone Bolango.</div>
      </div>
      <div class="row">
        <div class="col-lg-12 py-3">
          <form action="" method="GET">
            <div class="d-flex mt-4">
              <div class="input-group mb-3">
                <input type="text" name="judul" class="form-control col-5" placeholder="Judul Dataset">
                <select name="organisasi" class="form-control col-5 selek" id="select-1">
                  <option></option>
                  <?php
                  tampil_organisasi($mysqli);
                  ?>
                </select>
                <select name="kategori" class="form-control col-2 selek2" id="select2">
                  <option value="" hidden>Kategori</option>
                  <?php
                  tampil_kategori($mysqli);
                  ?>
                </select>
                <div class="input-group-prepend">
                  <button type="submit" class="rounded-right btn btn-light"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
          <hr>
        </div>
      </div>
      <div class="row mb-3">
    <div class="col-12">
      <?php
        if(isset($organisasi)){
          $o = $mysqli->query("SELECT * FROM organisasi WHERE id_organisasi = '$organisasi'");
          $do = $o->fetch_assoc();
          ?>
          <div class="p-2 badge badge-primary"><?= $do['nama_organisasi'] ?></div>
          <?php
        }
        if(isset($kategori)){
          $k = $mysqli->query("SELECT * FROM kategori_data WHERE id_kategori = '$kategori'");
          $dk = $k->fetch_assoc();
          ?>
          <div class="p-2 badge badge-primary"><?= $dk['nama_kategori'] ?></div>
          <?php
        }
        if(!empty($organisasi) || !empty($kategori)){
          ?>
          <a style="font-size:12px" class="ml-3" href="search"><i class="fas fa-times"></i> Hapus Pencarian</a>
          <?php
        }
      ?>
    </div>
  </div>
        <div class="row">  
        <div class="col-12">  
          <ul class="nav nav-pills nav-fill mb-3 mt-3" id="pills-tab" role="tablist">
            <li class="nav-item mr-2">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dataset (<?= $datasety ?>)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Infografik (<?= $infografiky ?>)</a>
            </li>

          </ul>
          
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php tampil_dataset_search($cari, $kategori, $organisasi,$judul,$base_url, $mysqli) ?>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php tampil_infografik_search($cari, $kategori, $organisasi,$judul,$base_url, $mysqli)  ?>
            </div>
          </div>


        </div>
      </div>

    </div>
  </div>
</main>