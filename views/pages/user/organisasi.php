<?php
$nama = $_GET['nama'];
?>
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
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page">Organisasi</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-section">
    <div class=" container">
      <div class="row">
        <div class="col-8">
          <h1>Organisasi</h1>
        </div>
        <div class="col-12 mt-4">Di halaman ini tersedia daftar Organisasi Perangkat Daerah (OPD) yang berkontribusi untuk membangun ekosistem data yang terbuka dan terpercaya melalui publikasi data di Open Data Bone Bolango.</div>
      </div>
      <div class="row">
        <div class="col-lg-12 py-3">
          <form action="" method="GET">
            <div class="d-flex mt-4">
              <div class="input-group mb-3">
                <input type="text" name="nama" class="form-control col-12" placeholder="Organisasi">
                <div class="input-group-prepend">
                  <button type="submit" class="rounded-right btn btn-light"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div> <!-- .row -->
      
      <div class="row">
        <div class="col-12">
          <?php
            if(!empty($nama)){
              ?>
              <div class="badge badge-primary p-2"><?= $nama ?></div>
              <a style="font-size:12px" class="ml-3" href="organisasi"><i class="fas fa-times"></i> Hapus Pencarian</a>
              <?php
            }
          ?>
        </div>
      </div>
      <div class="flx text-center aza">
        <?php
        if(empty($nama)){
          $query_kat = $mysqli->query("SELECT * FROM organisasi");
        }else{
          $query_kat = $mysqli->query("SELECT * FROM organisasi WHERE nama_organisasi LIKE '%$nama%'");          
        }
       
        while ($d = $query_kat->fetch_assoc()) {
          $dataset = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '{$d['id_organisasi']}'");
          $jd = mysqli_num_rows($dataset);
          $infografik = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '{$d['id_organisasi']}'");
          $ji = mysqli_num_rows($infografik);
        ?>
        <div class="box">
            <a href="<?= $base_url ?>detail_organisasi/<?= $d['id_organisasi'] ?>" class="ling">
                <div class="gambar">
                    <img src="<?= $base_url ?>public/uploads/kategori/<?= $d['gambar'] ?>" class="img-materi" alt="">
                </div>
                <div class="tulisan">
                    <div class="judul_materi mt-1"><?= $d['nama_organisasi'] ?></div>
                    <div class="mt-3"><i class="fas fa-file"></i>&nbsp;&nbsp;<?= $jd ?> &nbsp;&nbsp; <i class="fas fa-chart-bar"></i>&nbsp;&nbsp;<?= $ji ?></div>
                  </div>
            </a>
            </div>
            
        
      
        
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  </div> <!-- End clients -->

</main>