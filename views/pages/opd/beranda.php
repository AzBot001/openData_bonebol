    <!-- Page content -->
    <div class="container-fluid mt--6">
    
      <div class="row">
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
                        <i class="ni ni-active-40"></i>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Dataset</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $query = $mysqli->query("SELECT * FROM dataset WHERE id_organisasi = '$id'"); echo mysqli_num_rows($query); ?> Data</span></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
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
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
      </div>