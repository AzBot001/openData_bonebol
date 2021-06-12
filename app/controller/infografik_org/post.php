<?php
include 'app/controller/infografik_org/function.php';
include 'app/pdf_upload.php';
include 'app/flash_message.php';

if(isset($_POST['simpan_infografik'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $media = upload_pdf();
    if (!$media) {
        return false;
    }
    $id_org = $_POST['id_organisasi'];
    $kategori = $_POST['kategori'];

    $query = $mysqli->query("INSERT INTO infografik VALUES ('','$kategori','$id_org','$judul','$deskripsi','$media')");
    flash('msg_simpan_info','Data berhasil disimpan');
}
if(isset($_POST['edit_infografik'])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $id = $_POST['id'];
    $file_sebelumnya = $_POST['file_s'];
    if ($_FILES['file']['error'] === 4) {
        $file_baru = $file_sebelumnya;
    } else {
        $file_baru = upload_pdf();
        unlink("public/uploads/kategori/$file_sebelumnya");
    }
    $query = $mysqli->query("UPDATE infografik SET judul = '$judul', deskripsi='$deskripsi', id_kategori='$kategori', file='$file_baru' WHERE id_infografik='$id'");
    flash('msg_edit_info','Data berhasil diedit');
}
if(isset($_POST['hapus_info'])){

    $id = $_POST['id'];
    $file_s = $_POST['file_s'];
    unlink("public/uploads/kategori/$file_s");
    $query = $mysqli->query("DELETE FROM infografik WHERE id_infografik = '$id'");
   
}


?>