<?php
$judul = $_GET['judul'];
$organisasi = $_GET['organisasi'];
$kategori = $_GET['kategori'];
?>
<?php include 'app/controller_user/post_dataset.php'; ?>
<main>
<div class="page-hero-section bg-image hero-mini" style="height:500px;background-image: url(public/assets2/hero_mini.jpg);">
    <div class="hero-caption">
      <div class="container fg-white h-100">
        <div class="row justify-content-center align-items-center text-center h-100">
          <div class="col-lg-9">
            <img src="public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
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
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page">Infografik</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-section">
    <div class=" container">
      <div class="row">
        <div class="col-8">
          <h1>Infografik</h1>
        </div>
        <div class="col-12 mt-4">Infografik adalah informasi yang disajikan dalam bentuk grafik agar lebih mudah dipahami.</div>
      </div>

      <div class="row">
        <div class="col-lg-12 py-3">
        <form action="" method="GET">
          <div class="d-flex mt-4">
            <div class="input-group mb-3">
              <input type="text" name="judul" class="form-control col-5" placeholder="Judul Dataset">
              <select name="organisasi" id="" class="form-control col-5 selek" id="select-1">
              <option></option>
                <?php 
                  tampil_organisasi($mysqli);
                ?>
              </select>
              <select name="kategori" id="" class="form-control col-2 selek2" id="select2">
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
        </div>
        <div class="col-12">
        
              <?php
                tampil_infografik($judul,$organisasi,$kategori,$mysqli);
              ?>

        </div>
      </div> <!-- .row -->
    </div>
  </div>

</main>