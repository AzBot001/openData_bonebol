<?php
include 'app/controller/kategori/function.php';
include 'app/file_upload.php';
include 'app/flash_message.php';

if(isset($_POST['simpan_kategori'])){
    $nama_kategori = $_POST['nama_kategori'];
    $media = upload_gambar();
    if (!$media) {
        return false;
    }
    $query = $mysqli->query("SELECT * FROM kategori_data WHERE nama_kategori = '$nama_kategori'");
    $cek = mysqli_num_rows($query);
    if($cek >= 1){
        flash('msg_gagal_kategori','Data Kategori Sudah Ada');
    }else{
    $sql = $mysqli->query("INSERT INTO kategori_data VALUES ('','$nama_kategori','$media')");
    flash('msg_simpan_kategori','Data Berhasil Diinput');
    }
}

if(isset($_POST['edit_kategori'])){
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];
    $gambar_sebelumnya = $_POST['gambars'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar_baru = $gambar_sebelumnya;
    } else {
        $gambar_baru = upload_gambar();
        unlink("public/uploads/kategori/$gambar_sebelumnya");
    }
    $sql = $mysqli->query("UPDATE kategori_data SET nama_kategori ='$nama_kategori', gambar='$gambar_baru' WHERE id_kategori = '$id' ");
    flash('msg_edit_kategori','Data Berhasil Diedit');
}

if(isset($_POST['hapus_kategori'])){
    $id = $_POST['id'];
    $gambar_s = $_POST['gambar_s'];
    unlink("public/uploads/kategori/$gambar_s");
    $query = $mysqli->query("DELETE FROM kategori_data WHERE id_kategori = '$id'");
    flash('msg_hapus_kategori','Data Berhasil Dihapus');
}