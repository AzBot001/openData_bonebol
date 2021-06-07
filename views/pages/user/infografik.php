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
                            <form action="">
                                <input type="text" class="form-control m-5">
                            </form>
                            <div class="row text-center aza">
                                <?php
                                while ($d = $query_kat->fetch_assoc()) {
                                ?>
                                    <div class="col-sm-6 col-lg-3 py-3 wow zoomIn">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="public/uploads/kategori/<?= $d['gambar'] ?>" alt="Card image cap">
                                            <div class="card-body text-left">
                                                <p class="fw-bold" style="font-size: 12px;">Infografik data kependudukan Desa Wumioal </p>
                                                <div style="margin-top:0px">
                                                    <p>lorem</p>
                                                    <p style="margin-top: -50px;">lrom</p>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                    </div>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                    </div> <!-- End clients -->
                </div>

            </div> <!-- .row -->
        </div>
    </div>

</main>