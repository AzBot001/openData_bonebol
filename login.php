<?php
 
  session_start();
  include 'app/session.php';

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "admin") {
?>
    <script>
        window.location.href = 'beranda_admin';
    </script>
<?php
    return false;
}
if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "organisasi") {
  ?>
      <script>
          window.location.href = 'beranda_organisasi';
      </script>
  <?php
      return false;
  }
  include 'app/aksi_login_admin.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="public/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="public/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0" style="margin-top: 160px;">
  
            <div class=" mt-5 card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <img src="public/assets/img/logo2.png" width="300" alt="">
              </div>
              <form role="form" method="post" action="">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="text" name="user">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="password" type="password">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="logon" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="public/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="public/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>