    <!-- Page content -->
    <div class="container-fluid mt--6">
    
      <div class="row">



            <div class="col-xl-4 col-md-6" style="line-height: 100px;">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Dataset</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $query = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$id'"); echo mysqli_num_rows($query); ?> Data</span></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fas fa-file"></i>
                      </div>
                    </div>
                  </div>
                
                </div>
              </div>
            </div>


            <div class="col-xl-4 col-md-6" style="line-height: 100px;">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Infografik</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $query = $mysqli->query("SELECT * FROM infografik WHERE id_organisasi = '$id'"); echo mysqli_num_rows($query); ?> Data</span></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6" style="line-height: 100px;">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Permintaan Dataset</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $query = $mysqli->query("SELECT * FROM request_data WHERE id_organisasi = '$id'"); echo mysqli_num_rows($query); ?> Data</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fas fa-database"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
              <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase ls-1 mb-1"><?= $title ?></h6>
                  <h5 class="h3 mb-0">Permintaan dataset yang belum direspon <div class="badge badge-danger">Pending</div></h5>
                </div>
              </div>
            </div>
                <div class="card-body">
                  <table class="table" id="datatable1">
                    <thead>
                      <tr class="thead-light">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Judul Dataset</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $nomor = 1;
                        $query = $mysqli->query("SELECT * FROM request_data WHERE id_organisasi = '$id' AND status = 'Pending'");
                        while($d = $query->fetch_assoc()){
                          ?>
                          <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['judul'] ?></td>
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
      