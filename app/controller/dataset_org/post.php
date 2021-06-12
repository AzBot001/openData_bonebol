<?php
include 'app/controller/dataset_org/function.php';
include 'app/excel_upload.php';
include 'app/flash_message.php';

if(isset($_POST['simpan_dataset'])){
    $judul = $_POST['judul'];
    $cakupan = $_POST['cakupan'];
    $frekuensi = $_POST['frekuensi'];
    $tgl_input = date("Y-m-d");
    $deskripsi = $_POST['deskripsi'];
    $media = upload_file();
    if (!$media) {
        return false;
    }
    $id_org = $_POST['id_organisasi'];
    $kategori = $_POST['kategori'];

    $query = $mysqli->query("INSERT INTO dataset VALUES ('','$id_org','$kategori','$judul','$cakupan','$frekuensi','$tgl_input',NULL,'$deskripsi','$media')");
    flash('msg_simpan_dataset','Data berhasil disimpan');
}
if(isset($_POST['edit_dataset'])){
    $judul = $_POST['judul'];
    $cakupan = $_POST['cakupan'];
    $frekuensi = $_POST['frekuensi'];
    $tgl_input = date("Y-m-d");
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $id = $_POST['id'];
    $file_sebelumnya = $_POST['file_s'];
    if ($_FILES['file']['error'] === 4) {
        $file_baru = $file_sebelumnya;
    } else {
        $file_baru = upload_file();
        unlink("public/uploads/kategori/$file_sebelumnya");
    }

    $query = $mysqli->query("UPDATE dataset SET judul = '$judul', id_kategori='$kategori', cakupan = '$cakupan', frekuensi = '$frekuensi', tgl_update='$tgl_input', deskripsi='$deskripsi', file = '$file_baru' WHERE id_dataset = '$id'");
    flash('msg_edit_dataset','Data berhasil diedit');
    echo "<script>alert('Dataset berhasil diedit');</script>";
    echo "<script>window.location.href='".$base_url."dataset_org';</script>";
}

if(isset($_POST['hapus_dataset'])){
    $id = $_POST['id'];
    $file_s = $_POST['file_s'];
    unlink("public/uploads/kategori/$file_s");
    $query = $mysqli->query("DELETE FROM dataset WHERE id_dataset = '$id'");
    flash('msg_hapus_dataset','Data berhasil dihapus');
    echo "<script>alert('Dataset berhasil dihapus');</script>";
    echo "<script>window.location.href='".$base_url."dataset_org';</script>";
}
?>