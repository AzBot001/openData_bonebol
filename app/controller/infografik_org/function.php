<?php

function tampil_kategori($mysqli)
{
    $query = $mysqli->query("SELECT * FROM kategori_data");
    while ($d = $query->fetch_assoc()) {
?>
        <option value="<?= $d['id_kategori'] ?>"><?= $d['nama_kategori'] ?></option>
    <?php
    }
}

function tampil_infoorg($id, $base_url, $mysqli)
{
    $no = 1;
    $query = $mysqli->query("SELECT * FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori WHERE id_organisasi = '$id'");
    while ($d = $query->fetch_assoc()) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['judul'] ?></td>
            <td><?= $d['nama_kategori'] ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $d['id_infografik'] ?>">
                    <input type="hidden" name="gambar_s" value="<?= $d['gambar'] ?>">
                    <a href="detail_info/<?= $d['id_infografik'] ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></a>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?= $d['id_infografik'] ?>"><i class="fas fa-edit"></i></button>
                    <button onclick="return confirm('Anda yakin menghapus data ini ?')" type="submit" name="hapus_info" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <div class="modal fade" id="modal_edit<?= $d['id_infografik'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h6 class="modal-title text-white" id="modal-title-default">Edit Infografik</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group f-jdl">
                                        <input type="hidden" name="id" value="<?= $d['id_infografik'] ?>">
                                        <input type="hidden" name="file_s" value="<?= $d['file'] ?>">
                                        <input type="text" name="judul" value="<?= $d['judul'] ?>" placeholder="Judul" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <option value="<?= $d['id_kategori'] ?>"><?= $d['nama_kategori'] ?></option>
                                            <?php tampil_kategori($mysqli); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">File <small class="text-danger">*PDF (.pdf)</small></label>
                                        <input type="file" name="file" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">
                    <?= $d['deskripsi'] ?>
                  </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit_infografik" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
}

?>