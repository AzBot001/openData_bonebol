    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div  style="min-height: 515px;">
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
            <!-- <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Dataset</button> -->
            <div class="table-responsive">
                <table class="table table-hover table-flush mt-4" id="datatable1">
                  <thead class="thead-light">
                    <tr>
                      <th class="sort">No</th>
                      <th class="sort">Nama</th>
                      <th class="sort"">Judul</th>
                      <th class="sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      <?php
                        $nomor = 1;
                        $query = $mysqli->query("SELECT *,request_data.deskripsi AS req FROM request_data JOIN organisasi ON request_data.id_organisasi = organisasi.id_organisasi WHERE request_data.id_organisasi = '$id'");
                        while($d = $query->fetch_assoc()){
                            ?>
                            <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['judul'] ?></td>
                            <td>
                            <button class="btn btn-sm btn-success"><i class="fas fa-info-circle"></i></button>
                            <button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button>
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
    </div>
     