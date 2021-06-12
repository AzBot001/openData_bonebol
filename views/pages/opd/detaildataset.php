   <?php

    $idx = $_GET['id'];
    $query = $mysqli->query("SELECT * FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori WHERE id_dataset = '$idx'");
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
                               <div class="col-12">
                                   <h1><?= $d['judul'] ?></h1>
                                   <p style="font-size: 14px;">Kategori : <?= $d['nama_kategori'] ?></p>
                                   <nav class="mt-5">
                                       <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                           <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                                           <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informasi Lainnya</a>

                                       </div>
                                   </nav>
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
                                   <div class="btn mb-2 btn-primary">Tabel</div>
                                   <div class="" style="border: 1px solid #eee;">
                                   <?php
                                    require_once 'public/Classes/PHPExcel.php';
                                    $path = 'public/uploads/kategori/' . $nama_file . '';
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
                       </div>
                   </div>
               </div>
           </div>
       </div>