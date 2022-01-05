<!-- Page content -->
<?php include 'app/controller/userdatas/akun.php'; ?>
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
              <div class="col-4 text-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-edit"></i> Edit Profil
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8" style="font-size:13px;">
                <div class="row">
                  <div class="col-3"><i class="fas fa-building"></i> Nama Organisasi</div>
                  <div class="col-1">:</div>
                  <div class="col-8"><?= $nama_organ ?></div>
                </div>
                <div class="row mt-4">
                  <div class="col-3"><i class="fas fa-map-marker-alt"></i> Alamat</div>
                  <div class="col-1">:</div>
                  <div class="col-8"><?= $alamat ?></div>
                </div>
                <div class="row mt-4">
                  <div class="col-3"><i class="fas fa-globe"></i> Website</div>
                  <div class="col-1">:</div>
                  <div class="col-8"><?= $website ?></div>
                </div>
                <div class="row mt-4">
                  <div class="col-3"><i class="fas fa-envelope"></i> Email</div>
                  <div class="col-1">:</div>
                  <div class="col-8"><?= $email ?></div>
                </div>
                <div class="row mt-4">
                  <div class="col-3"><i class="fas fa-phone"></i> Telepon</div>
                  <div class="col-1">:</div>
                  <div class="col-8"><?= $no ?></div>
                </div>
                <div class="row mt-4">
                  <div class="col-3"><i class="fas fa-file-alt"></i> Deskripsi</div>
                  <div class="col-1">:</div>
                  <div class="col-8" style="text-align: justify;"><?= $desk ?></div>
                </div>
              </div>
              <div class="col-4">
                <img class="p-1" src="<?= $base_url ?>public/uploads/kategori/<?= $foto_organ ?>" height="200" width="350" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-user-cog mr-2"></i> Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-user-lock"></i> Kata Sandi</a>
              </li>
            </ul>
          </div>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
              <form class="mt-3" action="" enctype="multipart/form-data" method="post">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nama Organisasi</label>
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <input type="text" name="nama_organisasi" value="<?= $nama_organ ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>No Telpon</label>
                      <input type="text" name="notelp" class="form-control" value="<?= $no ?>">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Logo</label>
                      <input type="hidden" name="logo_sebelum" value="<?= $foto_organ ?>">
                      <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="<?= $email ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Website</label>
                      <input type="text" name="website" value="<?= $website ?>" class="form-control">
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control"><?= $alamat ?></textarea>
                  </div>
                  <div class="form-group">
                  <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?= $desk ?></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="ubah_akun" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
                  </div>
              </form>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
             <form action="" method="post">
               <div class="form-group">
                 <label>Password Lama</label>
                 <input class="form-control" type="password" name="pass_lama" required>
                 <input type="hidden" name="pass_asli" value="<?= $pass ?>" class="form-control">
               </div>
               <div class="form-group">
                 <label>Password Baru</label>
                 <input class="form-control" type="password" name="pass_baru" required>
               </div>
               <div class="form-group">
                 <label>Konfirmasi Password</label>
                 <input class="form-control" type="password" name="konfirmasi" required>
               </div>
               <div class="form-group">
                 <button type="submit" name="ganti" class="btn-primary btn btn-block"><i class="fas fa-save"></i> Simpan</button>
               </div>
             </form>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>

  