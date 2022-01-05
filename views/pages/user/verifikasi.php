<?php include 'app/controller/lupapass/post.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>
    <link rel="shortcut icon" href="<?= $base_url ?>public/assets/img/icons.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/maicons.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets2/vendor/animate/animate.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets2/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/bootstrap.css">
    <link rel="stylesheet" href="<?= $base_url ?>public/assets2/css/mobster.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
<style>
body {
  font-family: "Quicksand", sans-serif;
}
</style>
</head>
<body class="bg-light">

  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5  col-md-7">
          <div class="card shadow border-0 mb-0" style="margin-top: 50px;">
            <div class="card-body">
            <div class="px-lg-3 py-lg-3">
              <div class="text-center text-muted mb-4">
                <h5>Lupa Password ?</h5>
                <img src="<?= $base_url ?>public/assets/img/forgot.png" width="300" alt="">
              </div>
              <form action="" method="post">
                <div class="text-center">
                    <div style="font-size:18px;">Masukan Email Anda</div>
                    <div style="font-size: 16px;">Kami akan mengirim email untuk mereset password anda</div>
                </div>

                <input type="text" name="email" class="form-control mt-2" placeholder="Email">
                <div class="text-center">
                  <button type="submit" name="kirim" style="background-color:#6F80E2;" class="btn btn-sm text-white my-4"><i class="fas fa-paper-plane"></i> Kirim</button>
                </div>
              </form>
            </div>
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
  <script  src="public/assets/js/argon.js?v=1.2.0"></script>
</body>

<script src="<?= $base_url ?>public/assets2/js/jquery-3.5.1.min.js"></script>
<script src="<?= $base_url ?>public/assets2/js/bootstrap.bundle.min.js"></script>
<script src="<?= $base_url ?>public/assets2/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="<?= $base_url ?>public/assets2/vendor/wow/wow.min.js"></script>
<script src="<?= $base_url ?>public/assets2/js/mobster.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= $base_url ?>public/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

</html>