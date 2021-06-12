<?php
$query_org = $mysqli->query("SELECT * FROM organisasi");
$jmlh_org = mysqli_num_rows($query_org);
$query_org_limit = $mysqli->query("SELECT * FROM organisasi LIMIT 5");
$query_kat = $mysqli->query("SELECT * FROM kategori_data");
?>
<main>
    <div class="page-hero-section bg-image hero-mini" style="background-image: url(public/assets2/hero_mini.jpg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-9">
                        <img src="public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
                        <h3 class="mb-4 fw-medium mt-5">Infografik</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <img src="public/assets/img/open_data_biru.png" width="150" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-4">
                        <div class="container">
                            <?php
                            $jmlh_topik = mysqli_num_rows($query_kat);
                            ?>
                            <h6 class="text-center wow fadeIn">Berikut daftar infografik yang ada di bone bolango</h6>
                            <table class="table table-hover wow fadeInUp" id="datatable1">
                                <thead>
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="60%"></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM infografik JOIN kategori_data ON infografik.id_kategori = kategori_data.id_kategori JOIN organisasi ON infografik.id_organisasi = organisasi.id_organisasi");
                                    while ($d = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><img src="<?= $base_url ?>public/uploads/kategori/<?= $d['gb'] ?>" width="150" alt=""></td>
                                            <td style="vertical-align: middle;">
                                                <h5 class="jdl"><?= $d['judul'] ?></h5>
                                                <h6 class="sjdl"><?= $d['nama_organisasi'] ?></h6>
                                                <h6 class="sjdl"><?= $d['nama_kategori'] ?></h6>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?= $base_url ?>detail_infografik/<?= $d['id_infografik'] ?>" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat Infografik</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div> <!-- End clients -->
                </div>

            </div> <!-- .row -->
        </div>
    </div>

</main>