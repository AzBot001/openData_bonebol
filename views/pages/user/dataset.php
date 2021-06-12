<?php include 'app/controller/userdatas/req.php' ?>
<main>
  <div class="page-hero-section bg-image hero-mini" style="background-image: url(public/assets2/hero_mini.jpg);">
    <div class="hero-caption">
      <div class="container fg-white h-100">
        <div class="row justify-content-center align-items-center text-center h-100">
          <div class="col-lg-9">
            <img src="public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
            <h3 class="mb-4 fw-medium mt-5">Dataset</h3>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-section">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <img src="public/assets/img/open_data_biru.png" width="150" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 py-3">

          <h6 class="text-center wow fadeIn mt-2">Berikut Daftar Dataset Di Kabupaten BoneBolango</h6>
          <button class="btn btn-secondary mt-5" data-toggle="modal" data-target="#exampleModalx">Request Data</button>
          <table class="table table-hover wow fadeInUp"  id="datatable1">
            <thead>
              <tr>
                <td width="10%"></td>
                <td width="60%"></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
            <?php
              $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi");
              while($d = $query->fetch_assoc()){
                ?>
                  <tr>
                    <td><img src="<?= $base_url ?>public/uploads/kategori/<?= $d['gb'] ?>" width="150" alt=""></td>
                    <td style="vertical-align: middle;">
                  <h5 class="jdl"><?= $d['judul'] ?></h5>
                  <h6 class="sjdl"><?= $d['nama_organisasi'] ?></h6>
                  <h6 class="sjdl"><?= $d['nama_kategori'] ?> - <?= tgl_indo($d['tgl_input']) ?></h6>
                </td>
                <td style="vertical-align: middle;">
                  <a href="<?= $base_url ?>detail_dataset/<?= $d['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat Dataset</a>
                </td>
                  </tr>
                <?php
              }
            ?>

            
              

            </tbody>
          </table>
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
        <form action="" method="post">
          <div class="form-group">
          <p class="text-ungu">Identitas</p>
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
              <hr>
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
            <button type="submit" name="req" class="btn btn-secondary btn-block">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</main>