<?php

if(isset($_POST['req'])){


    if(isset($_POST['organisasi'])){
        $id_organisasi = $_POST['organisasi'];
    }else{
        $id_organisasi = 'NULL';
    }
   
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $judul = $_POST['judul'];
    $desk = $_POST['desk'];
    $tujuan = $_POST['tujuan'];

    $query = $mysqli->query("INSERT INTO request_data VALUES('','$id_organisasi','$nama','$email','$judul','$desk','$tujuan','Pending')");
    echo "<script>alert('Berhasil Mengirim Permintaan Dataset')</script>";

}

?>