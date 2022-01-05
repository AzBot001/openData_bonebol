<?php

function tampil_organisasi($mysqli)
{
  $query = $mysqli->query("SELECT * FROM organisasi");
  while ($data = $query->fetch_assoc()) {
?>
    <option value="<?= $data['id_organisasi'] ?>"><?= $data['nama_organisasi'] ?></option>
  <?php
  }
}

function tampil_kategori($mysqli)
{
  $query = $mysqli->query("SELECT * FROM kategori_data");
  while ($data = $query->fetch_assoc()) {
  ?>
    <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
  <?php
  }
}
function  tampil_dataset($judul,$organisasi,$kategori,$mysqli)
{
  ?>
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
          <a style="font-size:12px" class="ml-3" href="dataset"><i class="fas fa-times"></i> Hapus Pencarian</a>
          <?php
        }
      ?>
    </div>
  </div>
  <table class="table table-hover" id="table_data">
    <?php

     
      //kosong
      if(empty($judul) && empty($kategori) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi ORDER BY id_dataset DESC LIMIT 10");
      }else{
      //kategori
      if(isset($kategori) && empty($judul) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_kategori = '$kategori' ORDER BY id_dataset DESC LIMIT 10");
      }
      //organisasi
      else if(isset($organisasi) && empty($kategori) && empty($judul)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_organisasi = '$organisasi' ORDER BY id_dataset DESC LIMIT 10");
      }
      //judul
      else if(isset($judul) && empty($organisasi) && empty($kategori)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' ORDER BY id_dataset DESC LIMIT 10");
      }
      //kategori w/ organisasi
      else if(isset($organisasi) && isset($kategori) && empty($judul)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_organisasi = '$organisasi' AND dataset.id_kategori = '$kategori ' ORDER BY id_dataset DESC LIMIT 10");
      }
      //kategori w/ judul
      else if(isset($judul) && isset($kategori) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND dataset.id_kategori = '$kategori ' ORDER BY id_dataset DESC LIMIT 10");
      }
      //organisasi w/ judul
      else if(isset($judul) && empty($kategori) && isset($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND dataset.id_organisasi = '$organisasi ' ORDER BY id_dataset DESC LIMIT 10");
      }
      //semua
      else if(isset($judul) && isset($kategori) && isset($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND dataset.id_kategori = '$kategori ' AND dataset.id_organisasi = '$organisasi' ORDER BY id_dataset DESC LIMIT 10");
      }
    }

      
      
  
             
    $jmlh = mysqli_num_rows($query);
    if ($jmlh > 0) {
      while ($d = $query->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $d['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="detail_dataset/<?= $d['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>
    <?php
        $id = $d['id_dataset'];
      }
    } else {
      echo '
      <div class="text-center">
        <img src="public/assets2/nodata.png" width="400" alt="">
        <h4>Maaf, dataset yang anda cari belum ada di daftar</h4>
        <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
      </div>';
    } ?>
    <!-- <tr id="remove">
     <td colspan="4">
     <button id="load_more" data-id="<?= $id ?>" class="btn btn-success btn-sm btn-block">Muat Lebih Banyak</button>
     </td>
     
     </tr> -->
  </table>


  <?php
}
function tampil_infografik($judul,$organisasi,$kategori,$mysqli)
{
  ?>
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
          <a style="font-size:12px" class="ml-3" href="infografik"><i class="fas fa-times"></i> Hapus Pencarian</a>
          <?php
        }
      ?>
    </div>
  </div>
  <table class="table table-hover">
  <?php

      //kosong
      if(empty($judul) && empty($kategori) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi ORDER BY id_infografik DESC");
      }else{
      //kategori
      if(isset($kategori) && empty($judul) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_kategori = '$kategori' ORDER BY id_infografik DESC LIMIT 10");
      }
      //organisasi
      else if(isset($organisasi) && empty($kategori) && empty($judul)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_organisasi = '$organisasi' ORDER BY id_infografik DESC LIMIT 10");
      }
      //judul
      else if(isset($judul) && empty($organisasi) && empty($kategori)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' ORDER BY id_infografik DESC LIMIT 10");
      }
      //kategori w/ organisasi
      else if(isset($organisasi) && isset($kategori) && empty($judul)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_organisasi = '$organisasi' AND infografik.id_kategori = '$kategori ' ORDER BY id_infografik DESC LIMIT 10");
      }
      //kategori w/ judul
      else if(isset($judul) && isset($kategori) && empty($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND infografik.id_kategori = '$kategori ' ORDER BY id_infografik DESC LIMIT 10");
      }
      //organisasi w/ judul
      else if(isset($judul) && empty($kategori) && isset($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND infografik.id_organisasi = '$organisasi ' ORDER BY id_infografik DESC LIMIT 10");
      }
      //semua
      else if(isset($judul) && isset($kategori) && isset($organisasi)){
        $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%' AND infografik.id_kategori = '$kategori ' AND infografik.id_organisasi = '$organisasi' ORDER BY id_infografik DESC LIMIT 10");
      }
    }
  
  $jmlh = mysqli_num_rows($query);
  if ($jmlh > 0) {
    while ($d = $query->fetch_assoc()) {
  ?>
      <tr>
        <td width="5%"><img src="public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
        <td width="75%" style="vertical-align: middle;">
          <h5 class="jdl"><?= $d['judul'] ?></h5>
          <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
          <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
        </td>
        <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
        <td style="vertical-align: middle;">
          <a href="detail_infografik/<?= $d['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
        </td>
      </tr>
  <?php
    }
  } else {
    echo '
    <div class="text-center">
      <img src="public/assets2/nodata.png" width="400" alt="">
      <h4>Maaf, infografik yang anda cari belum ada di daftar</h4>
      <p>Mohon coba kembali dilain waktu untuk mendapat infografik yang anda cari</p>
    </div>';
  }?>
  </table>
  <?php
}

function tampil_dataset_topik($id, $base_url, $mysqli)
{
  ?>
  <table class="table table-hover" id="table_data">
    <?php
    $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_kategori = '$id' ORDER BY id_dataset DESC LIMIT 10");
    $jmlh = mysqli_num_rows($query);
    if ($jmlh > 0) {
      while ($d = $query->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="<?= $base_url; ?>public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $d['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="<?= $base_url ?>detail_dataset/<?= $d['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>
    <?php
        $id = $d['id_dataset'];
      }
    } else {
      echo '
      <div class="text-center">
        <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
        <h4>Maaf, Topik ini belum memiliki dataset yang dapat diakses</h4>
        <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
      </div>';
    } ?>
    <!-- <tr id="remove">
   <td colspan="4">
   <button id="load_more" data-id="<?= $id ?>" class="btn btn-success btn-sm btn-block">Muat Lebih Banyak</button>
   </td>
   
   </tr> -->
  </table>


<?php
}
function tampil_infografik_topik($id, $base_url, $mysqli)
{
?>
  <table class="table table-hover" id="table_data">
    <?php
    $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_kategori = '$id' ORDER BY id_infografik DESC");
    $jmlh = mysqli_num_rows($query);
    if ($jmlh > 0) {
      while ($d = $query->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="<?= $base_url ?>public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $d['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="<?= $base_url ?>detail_infografik/<?= $d['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>

    <?php
      }
    } else {
      echo '
  <div class="text-center">
    <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
    <h4>Maaf, Topik ini belum memiliki infografik yang dapat diakses</h4>
    <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
  </div>';
    } ?>
  </table>
<?php
}
?>

<?php
function tampil_dataset_search($cari, $kategori, $organisasi,$judul,$base_url, $mysqli) 
{
  ?>
    
  <table class="table table-hover" id="table_data">
    <?php
    //default
if(empty($cari) && empty($judul) && empty($organisasi) && empty($kategori)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi");
}

//beranda
else if(isset($cari) && empty($judul) && empty($kategori) && empty($organisasi)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$cari%'");
}

//judul
else if(empty($cari) && empty($kategori) && empty($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%'");
}

//kategori
else if(empty($cari) && isset($kategori) && empty($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE dataset.id_kategori = '$kategori'");
}

//organisasi
else if(empty($cari) && empty($kategori) && isset($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE organisasi.id_organisasi = '$organisasi'");
}

//kategori + organisasi
else if(empty($cari) && isset($kategori) && isset($organisasi) && empty($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_kategori = '$kategori' AND organisasi.id_organisasi = '$organisasi'");
}

//kategori + judul
else if(empty($cari) && isset($kategori) && empty($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_kategori = '$kategori' AND judul LIKE '%$judul%'");
}

//organisasi + judul
else if(empty($cari) && empty($kategori) && isset($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_organisasi = '$organisasi' AND judul LIKE '%$judul%'");
}

//organisasi + judul + kategori
else if(empty($cari) && isset($kategori) && isset($organisasi) && isset($judul)){
  $dataset = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE organisasi.id_organisasi = '$organisasi' AND judul LIKE '%$judul%' AND kategori_data.id_kategori = '$kategori'");
}
    $jmlh = mysqli_num_rows($dataset);
    if ($jmlh > 0) {
      while ($d = $dataset->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="<?= $base_url; ?>public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $d['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="<?= $base_url ?>detail_dataset/<?= $d['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>
    <?php
        $id = $d['id_dataset'];
      }
    } else {
      echo '
      <div class="text-center">
        <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
        <h4>Maaf, Dataset yang anda cari belum terdaftar</h4>
        <p>Mohon coba kembali dilain waktu untuk mendapat dataset yang anda cari</p>
      </div>';
    } ?>
    <!-- <tr id="remove">
   <td colspan="4">
   <button id="load_more" data-id="<?= $id ?>" class="btn btn-success btn-sm btn-block">Muat Lebih Banyak</button>
   </td>
   
   </tr> -->
  </table>


<?php
}
function tampil_infografik_search($cari, $kategori, $organisasi,$judul,$base_url, $mysqli) 
{
?>
  <table class="table table-hover" id="table_data">
  <?php
    //default
if(empty($cari) && empty($judul) && empty($organisasi) && empty($kategori)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi");
}

//beranda
else if(isset($cari) && empty($judul) && empty($kategori) && empty($organisasi)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$cari%'");
}

//judul
else if(empty($cari) && empty($kategori) && empty($organisasi) && isset($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE judul LIKE '%$judul%'");
}

//kategori
else if(empty($cari) && isset($kategori) && empty($organisasi) && empty($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_kategori = '$kategori'");
}

//organisasi
else if(empty($cari) && empty($kategori) && isset($organisasi) && empty($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE organisasi.id_organisasi = '$organisasi'");
}

//kategori + organisasi
else if(empty($cari) && isset($kategori) && isset($organisasi) && empty($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_kategori = '$kategori' AND organisasi.id_organisasi = '$organisasi'");
}

//kategori + judul
else if(empty($cari) && isset($kategori) && empty($organisasi) && isset($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_kategori = '$kategori' AND judul LIKE '%$judul%'");
}

//organisasi + judul
else if(empty($cari) && empty($kategori) && isset($organisasi) && isset($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE kategori_data.id_organisasi = '$organisasi' AND judul LIKE '%$judul%'");
}

//organisasi + judul + kategori
else if(empty($cari) && isset($kategori) && isset($organisasi) && isset($judul)){
  $infografik = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE organisasi.id_organisasi = '$organisasi' AND judul LIKE '%$judul%' AND kategori_data.id_kategori = '$kategori'");
}
    
    $jmlh = mysqli_num_rows($infografik);
    if ($jmlh > 0) {
      while ($d = $infografik->fetch_assoc()) {
    ?>
        <tr>
          <td width="5%"><img src="<?= $base_url ?>public/uploads/kategori/<?= $d['gb'] ?>" width="100" class="rounded" alt=""></td>
          <td width="75%" style="vertical-align: middle;">
            <h5 class="jdl"><?= $d['judul'] ?></h5>
            <h6 class="sjdl mt-2"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></h6>
            <h6 class="sjdl mt-2"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?></h6>
          </td>
          <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i> <?= $d['view']; ?></td>
          <td style="vertical-align: middle;">
            <a href="<?= $base_url ?>detail_infografik/<?= $d['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
          </td>
        </tr>

    <?php
      }
    } else {
      echo '
  <div class="text-center">
    <img src="'.$base_url.'public/assets2/nodata.png" width="400" alt="">
    <h4>Maaf, Infografik yang anda cari belum terdaftar</h4>
    <p>Mohon coba kembali dilain waktu untuk mendapat infografik yang anda cari</p>
  </div>';
    } ?>
  </table>
<?php
}
?>