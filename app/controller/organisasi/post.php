<?php
include 'app/controller/organisasi/function.php';
include 'app/file_upload.php';
include 'app/flash_message.php';

if(isset($_POST['simpan_organisasi'])){
    $nama_organisasi = $_POST['nama_organisasi'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $pass = 'bonebolcemerlang';
    $encrypt_pass = password_hash($pass, PASSWORD_DEFAULT);
    $media = upload_gambar();
    if (!$media) {
        return false;
    }
    $query = $mysqli->query("INSERT INTO organisasi VALUES('','$nama_organisasi','$no_telp','$alamat','$website','$email','$deskripsi','$media','$encrypt_pass')");
    flash('msg_simpan_organisasi','Data Berhasil Diinput');
}

if(isset($_POST['edit_organisasi'])){
    $id = $_POST['id'];
    $nama_organisasi = $_POST['nama_organisasi'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $gambar_sebelumnya = $_POST['gambars'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar_baru = $gambar_sebelumnya;
    } else {
        $gambar_baru = upload_gambar();
        unlink("public/uploads/kategori/$gambar_sebelumnya");
    }
    $query = $mysqli->query("UPDATE organisasi SET nama_organisasi = '$nama_organisasi', no_telp = '$no_telp', email='$email', website='$website',alamat = '$alamat',deskripsi='$deskripsi',gambar='$gambar_baru' WHERE id_organisasi = '$id'");
    flash('msg_edit_organisasi','Data Berhasil Diedit');
}

if(isset($_POST['hapus_organisasi'])){
    $id = $_POST['id'];
    $gambar_s = $_POST['gambar_s'];
    unlink("public/uploads/organisasi/$gambar_s");
    $query = $mysqli->query("DELETE FROM organisasi WHERE id_organisasi = '$id'");
    flash('msg_hapus_organisasi','Data Berhasil Dihapus');
}

?>