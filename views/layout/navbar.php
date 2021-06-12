 <!-- Main content -->
 <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
         <div class="container-fluid">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <!-- Search form -->
                 <h2 class="text-white pt-2">OpenData Diskominfo</h2>
                 <!-- Navbar links -->
                 <ul class="navbar-nav align-items-center  ml-md-auto ">
                     <li class="nav-item d-xl-none">
                         <!-- Sidenav toggler -->
                         <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                             <div class="sidenav-toggler-inner">
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                             </div>
                         </div>
                     </li>
                 </ul>
                 <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                     <li class="nav-item dropdown">
                         <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <div class="media align-items-center">
                                
                                 <div class="media-body  ml-2  d-none d-lg-block">
                                     <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['type_user'] == 'admin' ? $nama : $nama_organ ?></span>
                                 </div>
                             </div>
                         </a>
                         <div class="dropdown-menu  dropdown-menu-right ">
                             <a href="<?= $base_url ?>app/logout.php" class="dropdown-item">
                                 <i class="ni ni-user-run"></i>
                                 <span>Logout</span>
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Header -->
     <!-- Header -->
     <div class="header bg-primary pb-6">
         <div class="container-fluid">
             <div class="header-body" >
                 <div class="row align-items-center py-4">
                     <div class="col-lg-6 col-7">
                         <h6 class="h2 text-white d-inline-block mb-0"><i class="<?= $icon ?>"></i> <?= $title ?></h6>
                     </div>
                 </div>
             </div>
         </div>
     </div>