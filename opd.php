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
        window.location.href = '<?= $base_url; ?>';
    </script>
<?php
    return false;
}

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] != "organisasi") {
?>
    <script>

        window.location.href = '<?= $base_url; ?>';
    </script>
<?php
    return false;
}
if($_GET['t_opd'] == 'beranda_organisasi'){
    $title = 'Beranda';
    $icon = 'fas fa-tv';
}elseif($_GET['t_opd'] == 'dataset_org'){
    $title = 'Dataset';
    $icon = 'fas fa-server';
}elseif($_GET['t_opd'] == 'detail_dataset_org'){
    $title = 'Detail Dataset';
    $icon = 'fas fa-server';
}elseif($_GET['t_opd'] == 'info'){
    $title = 'Infografik';
    $icon = 'fas fa-chart-pie';
}elseif($_GET['t_opd'] == 'detail_info'){
    $title = 'Detail Infografik';
    $icon = 'fas fa-chart-pie';
}
elseif($_GET['t_opd'] == 'permintaan_dataset'){
    $title = 'Permintaan Dataset';
    $icon = 'fas fa-box';
}



include 'views/layout/header.php';
include 'views/layout/sidebar.php';
include 'views/layout/navbar.php';





if($_GET['t_opd'] == 'beranda_organisasi'){
    include 'views/pages/opd/beranda.php';
}

else if($_GET['t_opd'] == 'dataset_org'){
    include 'views/pages/opd/dataset.php';
}

else if($_GET['t_opd'] == 'detail_dataset_org'){
    include 'views/pages/opd/detaildataset.php';
}

else if($_GET['t_opd'] == 'info'){
    include 'views/pages/opd/infografik.php';
}
else if($_GET['t_opd'] == 'detail_info'){
    include 'views/pages/opd/detailinfo.php';
}
else if($_GET['t_opd'] == 'permintaan_dataset'){
    include 'views/pages/opd/permintaan.php';
}

else{
    include 'views/pages/opd/beranda.php';
}


include 'views/layout/footer.php';

?>