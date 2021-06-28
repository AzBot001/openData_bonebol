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
                <h5 class="h3 mb-0">DISKOMINFO - BONEBOL</h5>
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
                       
                       if($d['status'] == 'Pending'){
                        ?>
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
                            <p><?= $d['email'] ?></p>

                            <h5>Judul</h5>
                            <p><?= $d['judul'] ?></p>

                            <h5>Deskripsi</h5>
                            <p><?= $d['deskripsi'] ?></p>

                            <h5>Tujuan</h5>
                            <p><?= $d['tujuan'] ?></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modal_input<?= $d['id_request'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Organisasi</h5>
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
                                    while($dx = $queryx->fetch_assoc()){
                                    ?>
                                        <option value="<?= $dx['id_organisasi'];?>"><?= $dx['nama_organisasi'] ?><select>
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
        </div>
      </div>
    </div>
  </div>