<?php
    $idx = $_GET['id'];
    $query = $mysqli->query("SELECT * FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori WHERE id_infografik = '$idx'");
    $d = $query->fetch_assoc();
    $nama_file = $d['file'];


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
                                   <h5 class="h3 mb-0">DISKOMINFO - BONEBOL</h5>
                               </div>
                           </div>
                       </div>
                       <div class="card-body">
                           <div class="row">
                                <div class="col-6">
                                    <object height="760" width="500" data="<?= $base_url?>public/uploads/kategori/<?= $nama_file ?>" type=""></object>
                                </div>
                               <div class="col-6">
                                   <h1><?= $d['judul'] ?></h1>
                                   <p style="font-size: 14px;">Kategori : <?= $d['nama_kategori'] ?></p>
                                  
                                   <div class="tab-content mb-5" id="nav-tabContent">
                                       <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                           <div class="entry-content mt-3">
                                               <p><?= $d['deskripsi'] ?></p>
                                           </div>
                                       </div>
                                       <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table class="table">
                                            <tr>
                                                <td><div class="badge badge-primary">Tanggal Input</div></td>
                                                <td>:</td>
                                                <td><?= tgl_indo($d['tgl_input']) ?></td>
                                            </tr>
                                            <tr>
                                                <td><div class="badge badge-primary">Tanggal Edit</div></td>
                                                <td>:</td>
                                                <td><?= isset($d['tgl_update']) ? tgl_indo($d['tgl_update']) : '-'; ?></td>
                                            </tr>
                                            <tr>
                                                <td><div class="badge badge-primary">Cakupan</div></td>
                                                <td>:</td>
                                                <td><?= $d['cakupan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><div class="badge badge-primary">Frekuensi</div></td>
                                                <td>:</td>
                                                <td><?= $d['frekuensi'] ?></td>
                                            </tr>
                                        </table>
                                       </div>
                                   </div>                      
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>