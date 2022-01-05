<?php
    $idx = $_GET['id'];
    $query = $mysqli->query("SELECT *, dataset.deskripsi AS ddata FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE id_dataset = '$idx'");
    $d = $query->fetch_assoc();
    $update = $mysqli->query("UPDATE dataset SET view = $d[view] + 1 WHERE id_dataset = '$idx'");
?>
<main>
    <div class="page-hero-section bg-image hero-mini" style="height:500px;background-image: url(<?= $base_url ?>public/assets2/hero_mini.jpg);">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-9">
                        <img src="<?= $base_url ?>public/assets/img/logo2putih.png" width="400" class="mt-5" alt="">
                        
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
                    <li class="breadcrumb-item" style="font-size: 13px;" id="bc" aria-current="page"><a href="<?= $base_url ?>dataset">Dataset</a></li>
                    <li class="breadcrumb-item active" style="font-size: 13px;" id="bc" aria-current="page"><?= $d['judul'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div style="background: url('<?= $base_url ?>public/assets2/hero_mini.jpg'); background-size:cover; width:100%; height:auto">
                        <div class="container">
                            <div class="bgbg col-12 text-white">
                                <?= $d['judul'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <p class="card-text sjdl"><i class="fas fa-building"></i> <?= $d['nama_organisasi'] ?> | <i class="fas fa-book"></i> <?= $d['nama_kategori'] ?> | <i class="fas fa-calendar"></i> <?= tgl_indo($d['tgl_input']) ?> | <i class="fas fa-eye"></i> <?= $d['view'] ?></p> 
                    </div>
                    </div> 
                    <nav class="mt-4">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informasi Lainnya</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="entry-content mt-3">
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
                                <?php
                                require_once 'public/Classes/PHPExcel.php';
                                $path = 'public/uploads/kategori/' . $d['file'] . '';
                                $reader = PHPExcel_IOFactory::createReaderForFile($path);
                                $excel_Obj = $reader->load($path);
                                $worksheet = $excel_Obj->getSheet('0');

                                $lastRow = $worksheet->getHighestRow();
                                $colomncount = $worksheet->getHighestDataColumn();
                                $colomncount_number = PHPExcel_Cell::columnIndexFromString($colomncount);
                                echo "<div class='table-responsive'>";
                                echo "<table class='table table-hover' id='tb_data'>";
                                
                                for ($row = 1; $row < 2; $row++){
                                    echo "<thead>";
                                    echo "<tr style='background:linear-gradient(to bottom right, #3D58F3, #9548F9);color:#fff'>";
                                    for ($col = 0; $col < $colomncount_number; $col++) {
                                        echo "<td>";
                                        echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col) . $row)->getValue();
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                    echo "</thead>";
                                   
                                }
                                for ($row = 2; $row < $lastRow; $row++){
                                    
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
            </div>
        </div>
    </div>
</main>