<?php

function tampil_data_organisasi($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM organisasi ORDER BY id_organisasi DESC");
    while ($d = $query->fetch_assoc()) {
?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $d['nama_organisasi'] ?></td>
            <td><?= $d['no_telp'] ?></td>
            <td><?= $d['email'] ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $d['id_organisasi'] ?>">
                    <input type="hidden" name="gambar_s" value="<?= $d['gambar'] ?>">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_detail<?= $d['id_organisasi'] ?>"><i class="fas fa-info-circle"></i></button>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_edit<?= $d['id_organisasi'] ?>"><i class="fas fa-edit"></i></button>
                    <button onclick="return confirm('Anda yakin menghapus data ini ?')" type="submit" name="hapus_organisasi" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
            <!-- modal-detail -->
            <div class="modal fade" id="modal_detail<?= $d['id_organisasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card card-profile">
                                    <img src="public/assets/img/theme/bg.jpg" alt="Image placeholder" class="card-img-top bg-info">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-5 order-lg-2">
                                            <div class="card-profile-image">
                                                <img src="public/uploads/kategori/<?= $d['gambar'] ?>" class="rounded-circle" style=" height:150px; width:150px; border: 1px solid #5e72e4;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                    </div>
                                    <div class="card-body pt-0"><br><br><br>
                                        <!-- <div class="row">
                                            <div class="col">
                                                <div class="card-profile-stats d-flex justify-content-center mt-5">
                                                    <div>
                                                        <span class="heading">$query = ''</span>
                                                        <span class="description">Data Set</span>
                                                    </div>
                                                    <div>
                                                        <span class="heading">10</span>
                                                        <span class="description">Infografik</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="text-center">
                                            <h5 class="h3">
                                                <?= $d['nama_organisasi'] ?>
                                            </h5>
                                            <p style="font-size:12px">
                                                <i class="fas fa-map-marker-alt"></i> <?= $d['alamat'] ?>
                                            </p>
                                            <p style="font-size:12px">
                                                <i class="fas fa-globe"></i> <?= $d['website'] ?>
                                            </p>
                                            <p style="font-size:12px">
                                                <i class="fas fa-at"></i> <?= $d['email'] ?>
                                            </p>
                                            <p style="font-size:12px">
                                                <i class="fas fa-phone"></i> <?= $d['no_telp'] ?>
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- modal edit -->
            <div class="modal fade" id="modal_edit<?= $d['id_organisasi'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h6 class="modal-title text-white" id="modal-title-default">Edit Data Organisasi</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Nama Organisasi</label>
                                                <input type="hidden" value="<?= $d['id_organisasi'] ?>" name="id">
                                                <input type="text" value="<?= $d['nama_organisasi'] ?>" name="nama_organisasi" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text" value="<?= $d['no_telp'] ?>" class="form-control" name="no_telp">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" name="gambar" class="form-control">
                                                <input type="hidden" value="<?= $d['gambar'] ?>" name="gambars">
                                            </div>
                                            <div class="form-group">
                                                <label>E-Mail</label>
                                                <input type="email" value="<?= $d['email'] ?>" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" value="<?= $d['website'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" id="" cols="10" rows="10"><?= $d['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Deskripsi Singkat Kantor</label>
                                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"><?= $d['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-danger">*Kosongkan jika tidak memiliki data</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="edit_organisasi" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </tr>
<?php
    }
}

?>