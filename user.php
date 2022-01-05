<?php
error_reporting(0);
session_start();
include 'app/env.php';
include 'base_url.php';

if($_GET['t_user'] == 'verifikasi'){
    include 'views/pages/user/verifikasi.php';
}else if($_GET['t_user'] == 'reset'){
    include 'views/pages/user/reset.php';
}
else{


include 'views/user_layout/header.php';

if($_GET['t_user'] == 'dataset'){
    include 'views/pages/user/dataset.php';
}else if($_GET['t_user'] == 'detail_dataset'){
    include 'views/pages/user/detail_dataset.php';
}else if($_GET['t_user'] == 'infografik'){
    include 'views/pages/user/infografik.php';
}else if($_GET['t_user'] == 'detail_infografik'){
    include 'views/pages/user/detail_infografik.php';
}else if($_GET['t_user'] == 'organisasi'){
    include 'views/pages/user/organisasi.php';
}else if($_GET['t_user'] == 'detail_organisasi'){
    include 'views/pages/user/detail_organisasi.php';
}else if($_GET['t_user'] == 'topik'){
    include 'views/pages/user/topik.php';
}else if($_GET['t_user'] == 'search'){
    include 'views/pages/user/search.php';
}
else{
    include 'views/pages/user/beranda.php';
}

include 'views/user_layout/footer.php';
}
?>