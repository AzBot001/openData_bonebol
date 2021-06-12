 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?= $base_url ?>public/assets/img/logo2.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <?php if(isset($_GET['t_admin'])): ?>
          <li class="nav-item">
              <a class="nav-link" href="<?= $base_url; ?>beranda_admin">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-briefcase-24 text-primary"></i>
                <span class="nav-link-text">Master Data</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= $base_url ?>kategori" class="nav-link">
                      <span class="fas fa-bookmark text-primary">&nbsp;</span>
                      <span class="sidenav-normal"> Kategori Data</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $base_url ?>organisasi_perusahaan" class="nav-link">
                    <span class="fas fa-city text-primary">&nbsp;</span>
                      <span class="sidenav-normal"> Organisasi / Perusahaan</span>
                    </a>
                  </li>              
                </ul>
              </div>
            </li>  
            <!-- <li class="nav-item">
              <a class="nav-link" href="examples/icons.html">
                <i class="fas fa-file text-primary"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
            </li>     -->
            <?php endif; ?>  

            <?php if(isset($_GET['t_opd'])): ?>
          <li class="nav-item">
              <a class="nav-link" href="<?= $base_url ?>beranda_organisasi">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $base_url ?>dataset_org">
                <i class="fas fa-server text-primary"></i>
                <span class="nav-link-text">Dataset</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $base_url ?>info">
                <i class="fas fa-chart-pie text-primary"></i>
                <span class="nav-link-text">Infografik</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $base_url ?>permintaan_dataset">
                <i class="fas fa-box text-primary"></i>
                <span class="nav-link-text">Permintaan Dataset</span>
              </a>
            </li>
          
            <?php endif; ?>  
          </ul>
        
        </div>
      </div> 
    </div>
  </nav>