<main>
  <div class="page-hero-section bg-image hero-mini" style="background-image: url(public/assets2/hero_mini.jpg);">
    <div class="hero-caption">
      <div class="container fg-white h-100">
        <div class="row justify-content-center align-items-center text-center h-100">
          <div class="col-lg-9">
            <img src="public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
            <h3 class="mb-4 fw-medium mt-5">Organisasi</h3>

          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="page-section mt-5">
  
  <div class="container">
    <div class="row text-center">
                <div class="col-12">
                    <img src="public/assets/img/open_data_biru.png" width="150" alt="">
                </div>
            </div>
    <div class="row text-center aza">
      <?php
      $query_kat = $mysqli->query("SELECT * FROM organisasi");
      while ($d = $query_kat->fetch_assoc()) {
      ?>
        <div class="col-sm-6 shadow col-lg-3 py-3 mr-2 wow zoomIn">
          <div class="img-place">
            <img src="public/uploads/kategori/<?= $d['gambar'] ?>">
          </div>
          <p class="text-center"><?= $d['nama_organisasi'] ?></p>
          <a href="<?= $base_url ?>detail_organisasi/<?= $d['id_organisasi'] ?>" class="btn btn-primary">Detail</a>
        </div>
      <?php
      }
      ?>
    

    </div>
  </div>
</div> <!-- End clients -->

</main>