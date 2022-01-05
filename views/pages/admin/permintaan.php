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
                <div class="nav-wrapper">
                  <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-cog"></i> Permintaan Dataset (Admin)</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-building"></i> Permintaan Dataset (OPD)</a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="">
              <div class="card-body">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    <div class="table-responsive">
                      <table class="table table-hover table-flush mt-4" id="datatable1">
                        <thead class="thead-light">
                          <tr>
                            <th class="sort">#</th>
                            <th class="sort">Nama</th>
                            <th class="sort"">Judul Dataset</th>
                            <th class=" sort">Status</th>
                            <th class=" sort">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $nomor = 1;
                          $query = $mysqli->query("SELECT * FROM request_data WHERE id_organisasi = '0'");
                          while ($d = $query->fetch_assoc()) {
                          ?>
                            <tr>
                              <td><?= $nomor++ ?></td>
                              <td><?= $d['nama'] ?></td>
                              <td><?= $d['judul'] ?></td>
                              <td><?= $d['status'] == 'Pending' ? "<div class='badge badge-danger'>Pending</div>" : "<div class='badge badge-success'>Selesai</div>" ?></td>
                              <td>
                                <button type="button" data-toggle="modal" data-target="#modal_info<?= $d['id_request'] ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></button>
                                <?php

                                if ($d['status'] == 'Pending') {
                                ?>
                                  <button type="button" data-toggle="modal" data-target="#modal_input<?= $d['id_request'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button>
                                <?php
                                }

                                ?>

                              </td>
                            </tr>

                            <div class="modal fade" id="modal_info<?= $d['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
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
                                    <p><?= $d['email'] ?></p>

                                    <h5>Judul</h5>
                                    <p><?= $d['judul'] ?></p>

                                    <h5>Deskripsi</h5>
                                    <p><?= $d['deskripsi'] ?></p>

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
                                  <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Input Organisasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <input type="hidden" value="<?= $d['id_request'] ?>" name="id">
                                        <label for="">Pilih Organisasi</label>
                                        <select class="form-control" name="organisasi" id="">
                                          <option hidden>-Pilih Organisasi-</option>
                                          <?php
                                          $queryx = $mysqli->query("SELECT * FROM organisasi");
                                          while ($dx = $queryx->fetch_assoc()) {
                                          ?>
                                            <option value="<?= $dx['id_organisasi']; ?>"><?= $dx['nama_organisasi'] ?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <button type="submit" name="teruskan" class="btn btn-block btn-primary">Teruskan</button>
                                      </div>
                                    </form>
                                  </div>

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
                  <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                  <div class="table-responsive">
                      <table class="table table-hover table-flush mt-4" id="datatable2">
                        <thead class="thead-light">
                          <tr>
                            <th class="sort">#</th>
                            <th class="sort">Nama</th>
                            <th class="sort">Organisasi</th>
                            <th class="sort"">Judul Dataset</th>
                            <th class=" sort">Status</th>
                            <th class="sort">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $nomor = 1;
                          $query = $mysqli->query("SELECT *, request_data.deskripsi AS rdesk FROM request_data JOIN organisasi ON request_data.id_organisasi = organisasi.id_organisasi WHERE request_data.id_organisasi != '0'");
                          while ($x = $query->fetch_assoc()) {
                          ?>
                            <tr>
                              <td><?= $nomor++ ?></td>
                              <td><?= $x['nama'] ?></td>
                              <td><?= $x['nama_organisasi'] ?></td>
                              <td><?= $x['judul'] ?></td>
                              <td><?= $x['status'] == 'Pending' ? "<div class='badge badge-danger'>Pending</div>" : "<div class='badge badge-success'>Selesai</div>" ?></td>
                              <td>
                                <button type="button" data-toggle="modal" data-target="#modal_info<?= $x['id_request'] ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></button>
                              </td>
                            </tr>

                            <div class="modal fade" id="modal_info<?= $x['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-primary">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Detail Permintaan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h5>Nama</h5>
                                    <p><?= $x['nama'] ?></p>

                                    <h5>Email</h5>
                                    <p><?= $x['email'] ?></p>

                                    <h5>Judul</h5>
                                    <p><?= $x['judul'] ?></p>

                                    <h5>Deskripsi</h5>
                                    <p><?= $x['rdesk'] ?></p>

                                    <h5>Tujuan</h5>
                                    <p><?= $x['tujuan'] ?></p>

                                    <h5>Waktu Kirim Permintaan</h5>
                                    <p><?= tgl_indo($x['waktu_kirim']) ?></p>

                                    <h5>Waktu Input Dataset</h5>
                                    <p><?= isset($x['waktu_input']) ? tgl_indo($x['waktu_input']) : '-' ?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
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
        </div>
      </div>
    </div>
  </div>