<?php

$judul = $_GET['judul'];
$organisasi = $_GET['organisasi'];
$kategori = $_GET['kategori'];

?>
<?php include 'app/controller/userdatas/req.php' ?>
<?php include 'app/controller_user/post_dataset.php'; ?>
<main>
  <div class="page-hero-section bg-image hero-mini" style="height:500px; background-image: url(public/assets2/hero_mini.jpg);">
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
          <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page">Dataset</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-section">
    <div class=" container">
      <div class="row">
        <div class="col-8">
          <h1>Dataset</h1>
        </div>
        <div class="col-4"><button class="btn btn-sm btn-light" style="margin-top: 12px; float:right" data-toggle="modal" data-target="#exampleModalx">Request Data</button></div>
        <div class="col-12 mt-2">Temukan kumpulan data-data mentah berupa tabel yang bisa diolah lebih lanjut di sini. Open Data Bone Bolango menyediakan akses ke beragam koleksi dataset dari seluruh Organisasi Perangkat Daerah di Kabupaten Bone Bolango.</div>
      </div>
      <div class="row">
        <div class="col-lg-12 py-3">
        <form action="" method="GET">
          <div class="d-flex mt-4">
            <div class="input-group mb-3">
              <input autocomplete="off" type="text" name="judul" class="form-control col-5" placeholder="Judul Infografik">
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
        </div>
        <div class="col-12">
       
              <?php
                tampil_dataset($judul,$organisasi,$kategori,$mysqli);
              ?>
    
        </div>
      </div> <!-- .row -->
    </div>
  </div>
  <div class="modal fade" id="exampleModalx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form action="" method="post">
              <div class="form-group">
                <p class="text-ungu">Identitas</p>
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
              </div>
              <div class="form-group mt-5">
                <p class="text-ungu">Informasi Kebutuhan DataSet</p>
                <label for="">Judul dataset yang dimohon</label>
                <input type="text" name="judul" class="form-control">
              </div>
              <div class="form-group" id="pilihgr">
                <label for="">Apakah anda mengetahui Organisasi Perangkat Daerah Penghasil Sumber Dataset terkait?</label><br>
                <input type="radio" class="pilih_opsi" name="pilihan[]" id="pilihan" value="Ya">Ya
                <input type="radio" class="pilih_opsi" name="pilihan[]" id="pilihan2" value="Tidak">Tidak
              </div>
              <div class="form-group">
                <label for="">Deskripsi Kebutuhan Dataset</label>
                <textarea name="desk" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Tujuan Penggunaan Dataset</label>
                <input type="text" class="form-control" name="tujuan">
              </div>
              <div class="form-group">
                <button type="submit" name="req" class="btn btn-secondary btn-block">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>