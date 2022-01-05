<?php
  $id = $_GET['id'];
  $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_kategori = '$id'");
  $datasetx = $dataset->fetch_assoc();
  $datasety = mysqli_num_rows($dataset);

  $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_kategori = '$id'");
  $infografikx = $infografik->fetch_assoc();
  $infografiky = mysqli_num_rows($infografik);

  $kategori = $mysqli->query("SELECT * FROM kategori_data WHERE id_kategori = '$id'");
  $kategorix = $kategori->fetch_assoc();
  $kategoriy = mysqli_num_rows($kategori);
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
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page">Topik</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-section">
    <div class=" container">
      <div class="row">
        <div class="col-8">
          <h1>Topik</h1>
        </div>
        <div class="col-12 mt-2">Berikut dataset dan infografik berdasarkan topik. Open Data Bone Bolango menyediakan akses ke beragam koleksi dataset dari seluruh Organisasi Perangkat Daerah di Kabupaten Bone Bolango.</div>
      </div>
      <div class="row">
        <div class="col-lg-12 py-3">
          <hr>
        </div>
        <div class="col-12">
          <div class="badge p-2 badge-primary"><?= $kategorix['nama_kategori'] ?></div>
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
              <?php tampil_dataset_topik($id, $base_url, $mysqli) ?>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php tampil_infografik_topik($id, $base_url, $mysqli) ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>