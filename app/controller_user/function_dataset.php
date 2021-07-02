<?php

function tampil_organisasi($mysqli){
    $query = $mysqli->query("SELECT * FROM organisasi");
    while($data = $query->fetch_assoc()){
      ?>
      <option value="<?= $data['id_organisasi'] ?>"><?= $data['nama_organisasi'] ?></option>
      <?php
    }
}

function tampil_kategori($mysqli){
    $query = $mysqli->query("SELECT * FROM kategori_data");
    while($data = $query->fetch_assoc()){
      ?>
      <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
      <?php
    }
}
function tampil_dataset($mysqli){
    $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi ORDER BY id_dataset DESC");
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
    }
}
?>