<?php

function tampil_data_kategori($mysqli){
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM kategori_data ORDER BY id_kategori DESC");
    while($d = $query->fetch_assoc()){
    ?>
    <tr>
        <td><?= $nomor++ ?></td>
        <td><?= $d['nama_kategori'] ?></td>
        <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_gambar<?= $d['id_kategori'] ?>"><i class="fas fa-image"></i></button></td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $d['id_kategori'] ?>">
                <input type="hidden" name="gambar_s" value="<?= $d['gambar'] ?>">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?= $d['id_kategori'] ?>"><i class="fas fa-edit"></i></button>
                <button onclick="return confirm('Anda yakin menghapus data ini ?')" type="submit" name="hapus_kategori" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    <!-- modal gmbar -->
    <div class="modal fade" id="modal_gambar<?= $d['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default"><?= $d['nama_kategori'] ?></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <img src="public/uploads/kategori/<?= $d['gambar'] ?>" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          </form>
        </div>
      </div>

     <!-- modal edit -->
      <div class="modal fade" id="modal_edit<?= $d['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Edit Data Kategori</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="hidden" name="id" value="<?= $d['id_kategori'] ?>">
                <input type="hidden" name="gambars" value="<?= $d['gambar'] ?>">
                <input type="text" autocomplete="off" name="nama_kategori" value="<?= $d['nama_kategori'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Gambar</label><br>
                <img class="mb-2" src="public/uploads/kategori/<?= $d['gambar'] ?>" width="100" alt="">
                <input type="file" name="gambar" class="form-control">            
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="edit_kategori" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
            </div>
            </form>
          </div>
          </form>
        </div>
      </div>
    <?php
    }
}

?>