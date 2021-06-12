<main>
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-9">
                        <img src="<?= $base_url ?>public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
                        <!-- <h3 class="mb-4 fw-medium mt-5">infografik</h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $idx = $_GET['id'];
    $query = $mysqli->query("SELECT *, infografik.deskripsi AS ddata FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE id_infografik = '$idx'");
    $d = $query->fetch_assoc();
    
    ?>
    <div class="page-section">
        <div class="container">
            <div class="row">
            <div class="col-6">
                                    <object height="760" width="500" data="<?= $base_url?>public/uploads/kategori/<?= $d['file'] ?>" type=""></object>
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
</main>