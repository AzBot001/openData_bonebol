<?php
$query_org = $mysqli->query("SELECT * FROM organisasi");
$jmlh_org = mysqli_num_rows($query_org);

$query_org_limit = $mysqli->query("SELECT * FROM organisasi LIMIT 5");

$query_kat = $mysqli->query("SELECT * FROM kategori_data");

$query_dataset = $mysqli->query("SELECT * FROM dataset");
$jumlah_dataset = mysqli_num_rows($query_dataset);

$query_infografik = $mysqli->query("SELECT * FROM infografik");
$jumlah_infografik = mysqli_num_rows($query_infografik);

?>


<div class="page-hero-section bg-image hero-home-2" style="background-image: url(public/assets2/img/bg_hero_2.svg);">
  <div class="hero-caption">
    <div class="container fg-white h-100">
      <div class="row align-items-center h-100">
        <div class="col-lg-6 wow fadeInUp">
          <h2 class="mb-4 fw-bold">Cari Data Tentang <br> Bone Bolango <br>
            Kini bisa di mana saja, <br> kapan saja</h2>
          <p class="mb-4">Di sini Anda bisa akses koleksi dataset terlengkap di Bone Bolango dengan cepat, mudah, dan akurat</p>
          <div class="row">
            <div class="col-7">
              <input type="text" placeholder="Cari Dataset, Infografik" class="form-control">
            </div>
            <div class="col-3">
              <a href="#" class="btn btn-block btn-dark"><i class="mai-search"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block wow zoomIn">
          <div class="img-place floating-animate">
            <img src="public/assets2/bann.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-section no-scroll">
  <div class="container">
    <h2 class="text-center wow fadeIn">Statistik OpenData Bone Bolango</h2>

    <div class="row justify-content-center mt-5">
      <div class="col-lg-10">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 py-3 wow fadeInLeft">
            <div class="card card-body border-0 text-center shadow pt-5">
              <h1><?= $jumlah_dataset ?></h1>
              <h5 class="fg-gray">Total Dataset</h5>
              <p class="fs-small">Kumpulan data data mentah berupa tabel.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="card card-body border-0 text-center shadow pt-5">          
              <h1><?= $jumlah_infografik ?></h1>
              <h5 class="fg-gray">Total Infografik</h5>
              <p class="fs-small"> Informasi yang disajikan dalam bentuk grafik agar lebih mudah dipahami. </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 py-3 wow fadeInRight">
            <div class="card card-body border-0 text-center shadow pt-5">        
              <h1><?= $jmlh_org ?></h1>
              <h5 class="fg-gray">Total Organisasi</h5>
              <p class="fs-small"> OPD yang datanya tampil di OpenData Bone Bolango</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-section mt-5">
  <div class="container">
    <?php
    $jmlh_topik = mysqli_num_rows($query_kat);
    ?>
    <h2 class="text-center wow fadeIn">Topik</h2>
    <h6 class="text-center wow fadeIn">Mulai jelajahi <?= $jmlh_topik ?> kategori data pemerintahan untuk bantu kebutuhanmu setiap saat</h6>

    <div class="row text-center aza">
      <?php
      while ($d = $query_kat->fetch_assoc()) {
      ?>
        <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
          <div class="img-place">
            <img src="public/uploads/kategori/<?= $d['gambar'] ?>">
          </div>
          <p class="text-center"><?= $d['nama_kategori'] ?></p>
        </div>
      <?php
      }
      ?>


    </div>
  </div>
</div> <!-- End clients -->

<div class="page-section no-scroll">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 wow fadeIn">
        <div class="img-place">
          <img src="public/assets2/secondw.svg" alt="">
        </div>
      </div>
      <div class="col-lg-5 pl-lg-5 wow fadeInUp">
        <h2 class="mb-4">Mengapa Menggunakan OpenData Bone Bolango?</h2>
        <p class="mb-4">Cari data pemerintah Bone Bolango dalam beberapa klik, Nikmati proses akses data tanpa birokrasi panjang, Dapatkan data resmi dari organisasi perangkat daerah terkait</p>
        <p></p>
      
      </div>
    </div>
  </div>
</div>



<!-- Clients -->
<div class="page-section">
  <div class="container">
    <div class="text-center wow fadeIn">
      <h2 class="mb-4">Organisasi</h2>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center align-items-center mt-5">
      <?php
      while($r = $query_org_limit->fetch_assoc()){
      ?>
       <div class="p-3 wow zoomIn">
        <div class="img-place client-img">
          <img src="public/uploads/kategori/<?= $r['gambar'] ?>" alt="">
        </div>
      </div>
      <?php
      }
      ?>
    </div>
    <div class="text-center wow fadeIn">
      <h6 class="mb-4"><?= $jmlh_org > 5 ? 'dan lainnya' : '' ?></h6>
    </div>
  </div>
</div>