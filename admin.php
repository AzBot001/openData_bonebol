<?php
session_start();
include 'app/env.php';
include 'app/getapp.php';
include 'base_url.php';
include 'app/session.php';
if (!isset($_SESSION['unique_user'])) {
?>
    <script>
        alert('Anda harus login untuk mengakses halaman ini!');
        window.location.href = 'login';
    </script>
<?php
    return false;
}

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] != "admin") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = 'login';
    </script>
<?php
    return false;
}
if($_GET['t_admin'] == 'beranda_admin'){
    $title = 'Beranda';
    $icon = 'fas fa-tv';
} else if($_GET['t_admin'] == 'contoh'){
    $title = 'Blank Page';
    $icon = 'fas fa-file';
} else if($_GET['t_admin'] == 'kategori'){
    $title = 'Kategori Data';
    $icon = 'fas fa-bookmark';
} else if($_GET['t_admin'] == 'organisasi_perusahaan'){
    $title = 'Organisasi / Perusahaan';
    $icon = 'fas fa-city';
}






include 'views/layout/header.php';
include 'views/layout/sidebar.php';
include 'views/layout/navbar.php';





if($_GET['t_admin'] == 'beranda_admin'){
    include 'views/pages/admin/beranda.php';
}else if($_GET['t_admin'] == 'contoh'){
    include 'views/pages/admin/contoh.php';
}else if($_GET['t_admin'] == 'kategori'){
    include 'views/pages/admin/kategori.php';
}else if($_GET['t_admin'] == 'organisasi_perusahaan'){
    include 'views/pages/admin/organisasi.php';
}else{
    include 'views/pages/admin/beranda.php';
}


include 'views/layout/footer.php';

?>