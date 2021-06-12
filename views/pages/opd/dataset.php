    <!-- Page content -->
    <?php include 'app/controller/dataset_org/post.php'; ?>
    <div class="container-fluid mt--6">
    <div  style="min-height: 515px;">
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
                if (isset($_SESSION['msg_simpan_dataset'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_simpan_dataset'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                 <?php
                if (isset($_SESSION['msg_edit_dataset'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_edit_dataset'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['msg_hapus_dataset'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_hapus_dataset'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                }
                ?>
            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Dataset</button>
                <table class="table table-hover table-flush mt-4" id="datatable1">
                  <thead class="thead-light">
                    <tr>
                      <th class="sort">No</th>
                      <th class="sort"">Judul</th>
                      <th class=" sort">Kategori</th>
                      <th class="sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      <?php tampil_datasetorg($id,$base_url,$mysqli);?>
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
              <h6 class="modal-title text-white" id="modal-title-default">Input Dataset</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
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
                    <?php tampil_kategori($mysqli); ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="">Cakupan</label>
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
            </div>
            <div class="modal-footer">
              <button type="submit" name="simpan_dataset" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          </form>
        </div>
      </div>