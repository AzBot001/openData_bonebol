<?php
  $idx = $_GET['id'];
  $query = $mysqli->query("SELECT * FROM organisasi WHERE id_organisasi = '$idx'");
  $d = $query->fetch_assoc();

  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_organisasi = '$idx'");
  $jmlh_dataset = mysqli_num_rows($dataset);

  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_organisasi = '$idx'");
  $jmlh_infografik = mysqli_num_rows($infografik);
?>
<main>
<div class="page-hero-section bg-image hero-mini" style="height:500px;background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
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
          <li class="breadcrumb-item" style="font-size: 13px;" id="bc" aria-current="page">Organisasi</li>
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page"><?= $d['nama_organisasi'] ?></li>
        </ol>
      </nav>
    </div>
  </div>
 
    <div class="page-section">
        <div class="container">
          <div class="card-page">
          <div class="row">
            <div class="col-3">
              <img class="img-org" src="<?= $base_url ?>public/uploads/kategori/<?= $d['gambar'] ?>" alt="">
            </div>
            <div class="col-8">
              <h5 class="fg-dark"><b><?= $d['nama_organisasi'] ?></b></h5>
              <div class=""><?= $d['deskripsi'] ?></div>
              <div style="font-size: 13.5px;">
              <div class="mt-2"><i class="fas fa-phone"></i> No Telp : <?= $d['no_telp'] ?></div>
              <div><i class="fas fa-building"></i> Alamat : <?= $d['alamat'] ?></div>
              <div><i class="fas fa-globe"></i> Website : <?= $d['website'] ?></div>
              <div><i class="fas fa-envelope"></i> Email : <?= $d['email'] ?></div>
              </div>
            </div>

          </div>
          </div>
          <ul class="nav nav-pills nav-fill mb-3 mt-3" id="pills-tab" role="tablist">
  <li class="nav-item mr-2">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dataset (<?= $jmlh_dataset ?>)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Infografik (<?= $jmlh_infografik ?>)</a>
  </li>
  
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <table class="table table-hover" id="table_data">
  <?php
  if($jmlh_dataset > 0){
  while ($ddataset = $dataset->fetch_assoc()) {
  ?>
    <tr>
      <td width="5%"><img src="<?= $base_url; ?>public/uploads/kategori/<?= $ddataset['gb'] ?>" width="100" class="rounded" alt=""></td>
      <td width="75%" style="vertical-align: middle;">
        <h5 class="jdl"><?= $ddataset['judul'] ?></h5>
        <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $ddataset['nama_organisasi'] ?></h6>
        <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $ddataset['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($ddataset['tgl_input']) ?></h6>
      </td>
      <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $ddataset['view']; ?></td>
      <td style="vertical-align: middle;">
        <a href="<?= $base_url ?>detail_dataset/<?= $ddataset['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
      </td>
    </tr>
  <?php
  $id = $ddataset['id_dataset'];
  }
}else{
  echo '
  <div class="text-center">
    <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
    <h4>Maaf, Organisasi ini belum memiliki dataset yang dapat diakses</h4>
    <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
  </div>';
}?>

    <!-- <tr id="remove">
   <td colspan="4">
   <button id="load_more" data-id="<?= $id ?>" class="btn btn-success btn-sm btn-block">Muat Lebih Banyak</button>
   </td>
   
   </tr> -->
   </table>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <table class="table table-hover" id="table_data">
    <?php
    if ($jmlh_infografik > 0) {
    while ($dinfo = $infografik->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="<?= $base_url ?>public/uploads/kategori/<?= $dinfo['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $dinfo['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $dinfo['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $dinfo['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($dinfo['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $dinfo['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="<?= $base_url ?>detail_infografik/<?= $dinfo['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>

    <?php
      }
    } else {
      echo '
      <div class="text-center">
        <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
        <h4>Maaf, Organisasi ini belum memiliki infografik yang dapat diakses</h4>
        <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
      </div>';
    } ?>
  </table>
  </div>
</div>
          
        </div>
    </div>
</main>