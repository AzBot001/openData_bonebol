<?php
include 'app/excel_upload.php';
if(isset($_POST['kirim_dataset'])){
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
    $id = $_POST['id'];
    $query = $mysqli->query("INSERT INTO dataset VALUES ('','$id_org','$kategori','$judul','$cakupan','$frekuensi','$tgl_input',NULL,'$deskripsi','$media')");
    $update = $mysqli->query("UPDATE request_data SET status = 'Selesai' WHERE id_request = '$id'");
    echo "<script>alert('Dataset berhasil dikirim');</script>";
    echo "<script>window.location.href='".$base_url."permintaan_dataset';</script>";
}
if(isset($_POST['teruskan'])){
    $organisasi = $_POST['organisasi'];
    $id = $_POST['id'];
    $update = $mysqli->query("UPDATE request_data SET id_organisasi = '$organisasi' WHERE id_request='$id'");
    echo "<script>alert('Dataset berhasil dikirim');</script>";
    echo "<script>window.location.href='".$base_url."admin_permintaan_dataset';</script>";
}


?>