<!-- Page content -->
<?php include 'app/controller/permintaan/post.php'; ?>
<div class="container-fluid mt--6">
  <div style="min-height: 515px;">
    <div class="row">
      <div class="col-xl-12">
        <div class="card ">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-uppercase ls-1 mb-1"><?= $title ?></h6>
                <h5 class="h3 mb-0">Open Data Bone Bolango</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Dataset</button> -->
            <div class="table-responsive">
              <table class="table table-hover table-flush mt-4" id="datatable1">
                <thead class="thead-light">
                  <tr>
                    <th class="sort">No</th>
                    <th class="sort">Nama</th>
                    <th class="sort"">Judul</th>
                    <th class=" sort">Status</th>
                    <th class=" sort">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php
                  $nomor = 1;
                  $query = $mysqli->query("SELECT *,request_data.deskripsi AS req,request_data.email AS imel FROM request_data JOIN organisasi ON request_data.id_organisasi = organisasi.id_organisasi WHERE request_data.id_organisasi = '$id'");
                  while ($d = $query->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?= $nomor++ ?></td>
                      <td><?= $d['nama'] ?></td>
                      <td><?= $d['judul'] ?></td>
                      <td>
                        <?php
                        if($d['status'] == 'Pending'){
                          ?>
                          <div class="badge badge-warning"><?= $d['status'] ?></div>
                          <?php
                        }else if($d['status'] == 'Selesai'){
                          ?>
                          <div class="badge badge-success"><?= $d['status'] ?></div>
                          <?php
                        }else{
                          ?>
                          <div class="badge badge-danger"><?= $d['status']?></div>
                          <?php
                        }
                        ?>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#modal_info<?= $d['id_request'] ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></button>
                       <?php
                       
                       if($d['status'] == 'Pending'){ 
                        ?>
                         <button type="button" data-toggle="modal" data-target="#modal_tolak<?= $d['id_request'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button> 
                        <button type="button" data-toggle="modal" data-target="#modal_input<?= $d['id_request'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button> 
                      <?php
                       }

                       ?>
                       
                      </td>
                    </tr>

                    <div class="modal fade" id="modal_info<?= $d['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Detail Permintaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5>Nama</h5>
                            <p><?= $d['nama'] ?></p>

                            <h5>Email</h5>
                            <p><?= $d['imel'] ?></p>

                            <h5>Judul</h5>
                            <p><?= $d['judul'] ?></p>

                            <h5>Deskripsi</h5>
                            <p><?= $d['req'] ?></p>

                            <h5>Tujuan</h5>
                            <p><?= $d['tujuan'] ?></p>

                            <h5>Waktu Kirim Permintaan</h5>
                            <p><?= tgl_indo($d['waktu_kirim']) ?></p>

                            <h5>Waktu Input Dataset</h5>
                            <p><?= isset($d['waktu_input']) ? tgl_indo($d['waktu_input']) : '-' ?></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modal_input<?= $d['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Dataset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group f-jdl">
                                  <input type="text" name="judul" placeholder="Judul" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="">Kategori</label>
                                  <select name="kategori" class="form-control">
                                    <option value="" hidden>-Pilih Kategori-</option>
                                    <?php
                                    $queryx = $mysqli->query("SELECT * FROM kategori_data");
                                    while ($dx = $queryx->fetch_assoc()) {
                                    ?>
                                      <option value="<?= $dx['id_kategori'] ?>"><?= $dx['nama_kategori'] ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Cakupan</label>
                                  <input type="hidden" name="id" value="<?= $d['id_request'] ?>">
                                  <input type="text" name="cakupan" class="form-control">
                                  <input type="hidden" name="id_organisasi" value="<?= $id ?>">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="">File <small class="text-danger">*Excel (.xlsx)</small></label>
                                  <input type="file" name="file" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Frekuensi</label>
                                  <input type="text" name="frekuensi" class="form-control">
                                </div>

                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <label for="">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10">

                                </textarea>
                                
                              </div>
                            </div>
                            <div class="row">
                                  <div class="col-12">
                                  <div class="form-group">
                                <button type="submit" name="kirim_dataset" class=" mt-5 btn btn-primary btn-block">Kirim</button>
                                </div>
                                  </div>
                            </div>
                          </form>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modal_tolak<?= $d['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Tolak Permintaan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" method="post">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Alasan</label>
                              <input type="hidden" name="id_req" value="<?= $d['id_request'] ?>" id="">
                              <select class="form-control" name="alasan">
                                <option hidden>-Pilih Alasan-</option>
                                <option value="1">Dataset Bersifat Rahasia</option>
                                <option value="2">Dataset Sudah Ada</option>
                                <option value="3">Data Tidak Ada</option>
                                <option value="4">Salah Tujuan</option>
                              </select>
                            </div> 
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="tolak" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>