<?php

if(isset($_SESSION['unique_user']) && $_SESSION['type_user'] == 'admin'){
    $query = $mysqli->query("SELECT * FROM admin WHERE id_admin = '$_SESSION[unique_user2]'");
    $d = $query->fetch_assoc();
    $nama = $d['nama'];
}else if(isset($_SESSION['unique_user']) && $_SESSION['type_user'] == 'organisasi'){
    $query = $mysqli->query("SELECT * FROM organisasi WHERE id_organisasi = '$_SESSION[unique_user2]'");
    $d = $query->fetch_assoc();
    $id = $d['id_organisasi'];
    $nama_organ = $d['nama_organisasi'];
    $foto_organ = $d['gambar'];
    $alamat = $d['alamat'];
    $website = $d['website'];
    $email = $d['email'];
    $desk = $d['deskripsi'];
    $no = $d['no_telp'];
    $pass = $d['pass'];
}


?>