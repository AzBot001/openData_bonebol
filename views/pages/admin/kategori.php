    <!-- Page content -->
    <?php include 'app/controller/kategori/post.php' ?>
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
              <?php
                if (isset($_SESSION['msg_simpan_kategori'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_simpan_kategori'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['msg_gagal_kategori'])) {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="fas fa-exclamation-triangle fe-16 mr-2"></span> <?= flash('msg_gagal_kategori'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['msg_edit_kategori'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_edit_kategori'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                 <?php
                if (isset($_SESSION['msg_hapus_kategori'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_hapus_kategori'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
              <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Kategori Data</button>
                <table class="table table-hover table-flush mt-4" id="datatable1">
                  <thead class="thead-light">
                    <tr>
                      <th class="sort">No</th>
                      <th class="sort"">Nama Kategori</th>
                      <th class=" sort">Gambar</th>
                      <th class="sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      <?php tampil_data_kategori($mysqli);?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h6 class="modal-title text-white" id="modal-title-default">Input Kategori Data</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" autocomplete="off" name="nama_kategori" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="simpan_kategori" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          </form>
        </div>
      </div>
  