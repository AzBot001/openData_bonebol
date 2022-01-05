    <?php
    include 'app/controller/organisasi/post.php';
    ?>
    <!-- Page content -->
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
                <?php
                if (isset($_SESSION['msg_simpan_organisasi'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_simpan_organisasi'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['msg_edit_organisasi'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_edit_organisasi'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Organisasi</button>
                <table class="table table-hover table-flush mt-4" id="datatable1">
                  <thead class="thead-light">
                    <tr>
                      <th class="sort">No</th>
                      <th class="sort"">Nama Organisasi</th>
                      <th class=" sort">No Telepon</th>
                      <th class="sort">Email</th>
                      <th class="sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <?php tampil_data_organisasi($mysqli); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h6 class="modal-title text-white" id="modal-title-default">Input Data Organisasi</h6>
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
                        <input type="text" name="nama_organisasi" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" name="no_telp">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="gambar" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="" cols="10" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label>Deskripsi Singkat Kantor</label>
                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                  <small class="text-danger">*Kosongkan jika tidak memiliki data</small>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="simpan_organisasi" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
                </div>
              </form>
            </div>
          </form>
        </div>
      </div>