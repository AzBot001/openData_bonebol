<?php
$idx = $_GET['id'];
$query = $mysqli->query("SELECT *, infografik.deskripsi AS ddata FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi WHERE id_infografik = '$idx'");
$d = $query->fetch_assoc();
$update = $mysqli->query("UPDATE infografik SET view = $d[view] + 1 WHERE id_infografik = '$idx'");
?>
<main>
    <div class="page-hero-section bg-image hero-mini" style="height:500px;background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
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
    <div class="bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3">
                    <li class="breadcrumb-item" style="font-size: 13px;"><a href="<?= $base_url ?>">Beranda</a></li>
                    <li class="breadcrumb-item" style="font-size: 13px;" id="bc" aria-current="page"><a href="<?= $base_url ?>infografik">Infografik</a></li>
                    <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page"><?= $d['judul'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h3><?= $d['judul']; ?></h3>
                </div>
                <div class="col-2">
                    <a href="<?= $base_url ?>public/uploads/kategori/<?= $d['file'] ?>" download="<?= $d['judul'] ?>" class="btn btn-sm btn-light"><i class="fas fa-download"></i> Unduh</a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-muted" style="font-size: 14px;"><i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?> | <i class="fas fa-eye"></i> <?= $d['view'] ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <object height="620" width="500" data="<?= $base_url ?>public/uploads/kategori/<?= $d['file'] ?>#toolbar=0&navpanes=0&scrollbar=0" type=""></object>
                </div>
                <div class="col-6">
                    <div class="tab-content mb-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="entry-content mt-3">
                                <p><?= $d['ddata'] ?></p>
                            </div>
                        </div>
                        <div style="font-size: 13px;"><i class="fas fa-book"></i> <?= $d['nama_kategori'] ?></div>
                        <div style="font-size: 13px;"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?></div>
                    </div>
                </div>
            </div>
        </div>
</main>