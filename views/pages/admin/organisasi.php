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
            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-square"></i> Kategori Data</button>
                <table class="table table-flush mt-4" id="datatable1">
                  <thead class="thead-light">
                    <tr>
                      <th class="sort">No</th>
                      <th class="sort"">Nama Kategori</th>
                      <th class=" sort">Gambar</th>
                      <th class="sort">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                      <?php tampil_data_kategori($mysqli);?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
     