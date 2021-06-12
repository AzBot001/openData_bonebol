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
    $query = $mysqli->query("SELECT *, dataset.deskripsi AS ddata FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE id_dataset = '$idx'");
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
                        <div class="post-date" style="box-shadow: 1px 1px 5px #000;">
                            <h3><?= date("d", strtotime($d['tgl_input'])) ?></h3>
                            <span><?= date('M', strtotime($d['tgl_input'])) ?></span>
                            <span><?= date('Y', strtotime($d['tgl_input'])) ?></span>
                        </div>
                    </div>
                    <div class="post-title mt-5"><?= $d['judul'] ?></div>
                    <div class="entry-meta mb-2">
                        <div class="meta-item entry-author">
                            <div class="icon">
                                <span class="mai-person"></span>
                            </div>
                            by <a href="#"><?= $d['nama_organisasi'] ?></a>
                        </div>
                        <div class="meta-item">
                            <div class="icon">
                                <span class="mai-pricetags"></span>
                            </div>
                            Category:
                            <a href="#"><?= $d['nama_kategori'] ?></a>
                        </div>
                        <div class="mt-4">
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Unduh
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?= $base_url ?>public/uploads/kategori/<?= $d['file'] ?>" download='<?= $d['judul'] ?>'>
                                        excel
                                    </a>
                                </div>
                            </div>
                        </div>

                        <nav class="mt-5">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informasi Lainnya</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="entry-content mt-5">
                                    <p><?= $d['ddata'] ?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary">Tanggal Input</div>
                                        </td>
                                        <td>:</td>
                                        <td><?= tgl_indo($d['tgl_input']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary">Tanggal Edit</div>
                                        </td>
                                        <td>:</td>
                                        <td><?= isset($d['tgl_update']) ? tgl_indo($d['tgl_update']) : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary">Cakupan</div>
                                        </td>
                                        <td>:</td>
                                        <td><?= $d['cakupan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="badge badge-primary">Frekuensi</div>
                                        </td>
                                        <td>:</td>
                                        <td><?= $d['frekuensi'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div>
                            <div class="" style="border: 1px solid #eee;">
                                <?php
                                require_once 'public/Classes/PHPExcel.php';
                                $path = 'public/uploads/kategori/' . $d['file'] . '';
                                $reader = PHPExcel_IOFactory::createReaderForFile($path);
                                $excel_Obj = $reader->load($path);
                                $worksheet = $excel_Obj->getSheet('0');

                                $lastRow = $worksheet->getHighestRow();
                                $colomncount = $worksheet->getHighestDataColumn();
                                $colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
                                echo "<div class='table-responsive tb'>";
                                echo "<table class='table table-bordered table-hover' id='datatable2'>";
                                for ($row = 1; $row < $lastRow; $row++) {
                                    echo "<tr>";
                                    for ($col = 0; $col < $colomncount_number; $col++) {
                                        echo "<td>";
                                        echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue();
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</table>";
                                echo "</div>";

                                ?>
                            </div>
                        </div>
                </article>
            </div>
        </div>
</main>