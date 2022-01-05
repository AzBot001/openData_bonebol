<?php

include 'app/file_upload.php';
include 'app/flash_message.php';

if(isset($_POST['ubah_akun'])){
    $id = $_POST['id'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $notelp = $_POST['notelp'];
    $gambar_sebelum = $_POST['logo_sebelum'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar_baru = $gambar_sebelum;
    } else {
        $gambar_baru = upload_gambar();
        unlink("public/uploads/kategori/$gambar_sebelum");
    }

    $update = $mysqli->query("UPDATE organisasi SET nama_organisasi = '$nama_organisasi', no_telp = '$notelp', alamat = '$alamat', website = '$website', email = '$email', deskripsi = '$deskripsi', gambar = '$gambar_baru' WHERE id_organisasi = '$id'");
    echo "<script>alert('Data Berhasil Disimpan');window.location.href='pengaturan_akun'</script>";

}

if(isset($_POST['ganti'])){
    $pass_lama = $_POST['pass_lama'];
    $pass_asli = $_POST['pass_asli'];
    $pass_baru = $_POST['pass_baru'];
    $konfirmasi = $_POST['konfirmasi'];

    if(password_verify($pass_lama,$pass_asli)){
        if($pass_baru == $konfirmasi){
            $pass = password_hash($pass_baru, PASSWORD_DEFAULT);
            $update = $mysqli->query("UPDATE organisasi SET pass = '$pass'");
            echo "<script>alert('Data Berhasil Disimpan');window.location.href='".$base_url."app/logout.php'</script>";
        }else{
            echo "<script>alert('Konfirmasi Password Salah');window.location.href='pengaturan_akun'</script>";
        }
    }else{
        echo "<script>alert('Password Lama Salah');window.location.href='pengaturan_akun'</script>";
    }
}

?>