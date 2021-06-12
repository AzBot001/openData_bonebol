<main>
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-9">
                        <img src="<?= $base_url ?>public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
                        <!-- <h3 class="mb-4 fw-medium mt-5">Dataset</h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $idx = $_GET['id'];
    $query = $mysqli->query("SELECT *, organisasi.deskripsi AS ddes FROM organisasi JOIN dataset ON organisasi.id_organisasi = dataset.id_organisasi JOIN infografik ON organisasi.id_organisasi = infografik.id_organisasi WHERE organisasi.id_organisasi = '$idx'");
    $d = $query->fetch_assoc();

    ?>
    <div class="page-section">
        <div class="container">
            <div class="col-lg-12 py-3">
                <article class="blog-entry">
                    <div class="entry-header">
                        <div class="post-thumbnail">
                            <img src="<?= $base_url ?>public/assets2/img/heromax.jpg" alt="">
                        </div>

                    </div>
                    <div class="post-title mt-5"><?= $d['nama_organisasi'] ?></div>
                    <p><?= $d['ddes'] ?></p>

                    <nav class="mt-5">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profil</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Dataset <?php $hd = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$idx'"); ?> <small class="badge badge-primary"><?= mysqli_num_rows($hd) ?></small></a>
                            <a class="nav-item nav-link" id="nav-x-tab" data-toggle="tab" href="#nav-x" role="tab" aria-controls="nav-profile" aria-selected="false">Infografik <?php $hx = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '$idx'"); ?> <small class="badge badge-primary"><?= mysqli_num_rows($hx) ?></small></a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="p-5">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>No Telepon</td>
                                        <td>:</td>
                                        <td><?= $d['no_telp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $d['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $d['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Website</td>
                                        <td>:</td>
                                        <td><?= $d['website'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="60%"></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryx = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi JOIN kategori_data ON kategori_data.id_kategori = dataset.id_kategori WHERE dataset.id_organisasi = '$idx'");
                                    while ($dx = $queryx->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><img src="<?= $base_url ?>public/uploads/kategori/<?= $dx['gb'] ?>" width="150" alt=""></td>
                                            <td style="vertical-align: middle;">
                                                <h5 class="jdl"><?= $dx['judul'] ?></h5>
                                                <h6 class="sjdl"><?= $dx['nama_organisasi'] ?></h6>
                                                <h6 class="sjdl"><?= $dx['nama_kategori'] ?> - <?= tgl_indo($dx['tgl_input']) ?></h6>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?= $base_url ?>detail_dataset/<?= $dx['id_dataset'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat Dataset</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-x" role="tabpanel" aria-labelledby="nav-x-tab">
                        <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="60%"></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryy = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE infografik.id_organisasi = '$idx'");
                                    while ($dy = $queryy->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><img src="<?= $base_url ?>public/uploads/kategori/<?= $dy['gb'] ?>" width="150" alt=""></td>
                                            <td style="vertical-align: middle;">
                                                <h5 class="jdl"><?= $dy['judul'] ?></h5>
                                                <h6 class="sjdl"><?= $dy['nama_organisasi'] ?></h6>
                                                <h6 class="sjdl"><?= $dy['nama_kategori'] ?></h6>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?= $base_url ?>detail_infografik/<?= $dy['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat Infografik</a>
                                            </td>
                                        </tr>
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
</main>