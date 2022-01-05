<?php
include 'app/excel_upload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('public/assets2/vendor/PHPMailer/Exception.php');
include('public/assets2/vendor/PHPMailer/PHPMailer.php');
include('public/assets2/vendor/PHPMailer/SMTP.php');

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

    $data_permintaan = $mysqli->query("SELECT * FROM request_data WHERE id_request = '$id'");
    $d_permintaan = $data_permintaan->fetch_assoc();
    $email = $d_permintaan['email'];
    $nama = $d_permintaan['nama'];
    $waktu_kirim = $d_permintaan['waktu_kirim'];
    $waktu_input = date('Y-m-d');
    $update = $mysqli->query("UPDATE request_data SET status = 'Selesai', waktu_input = '$waktu_input' WHERE id_request = '$id'");
    $query = $mysqli->query("INSERT INTO dataset VALUES ('','$id_org','$kategori','$judul','$cakupan','$frekuensi','$tgl_input',NULL,'$deskripsi','$media',0)");
    $id_terakhir = $mysqli->insert_id;
    
    $email_pengirim = 'opendata.bonebol@gmail.com';
    $nama_pengirim = 'Admin OpenData Bone Bolango';
    $email_penerima = $email;
    $subjek = 'Dataset Opendata Bone Bolango';
    $pesan = '<div style="background-color: #eceeef; padding: 2px;">
    <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <p>Yth. '.$nama.'</p>
        <p><div style="color:green;"><b>Dataset yang anda ajukan telah direspon oleh opd yang bersangkutan</b></div> <br>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
        <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
            <tr style="height: 40px; background-color: #eceeef;">
                <td>Tanggal Permintaan</td>
                <td>Judul Dataset</td>
            </tr>
            <tr style="height: 40px;">
                <td>'.$waktu_kirim.'</td>
                <td>'.$judul.'</td>
            </tr>
        </table>
        <br>
        cek disini : '.$base_url.'detail_dataset/'.$id_terakhir.'
        <p>Untuk pertanyaan lebih lanjut, anda dapat langsung menghubungi Hotline Open Data Bone Bolango melalui:</p>
        <p>Email : opendata.bonebol@gmail.com</p>
   </div>
   </div>';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = $email_pengirim;
    $mail->Password = 'diskominfobonebol1';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    // $mail->SMTPDebug = 3;

    $mail->setFrom($email_pengirim,$nama_pengirim);
    $mail->addAddress($email_penerima);
    $mail->isHTML(true);
    $mail->Subject = $subjek;
    $mail->Body = $pesan;

    $send = $mail->send();
  
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

if(isset($_POST['tolak'])){
    $id_req = $_POST['id_req'];
    $alasan = $_POST['alasan'];
    $sql = $mysqli->query("SELECT * FROM request_data WHERE id_request = '$id_req'");
    $x = $sql->fetch_assoc();

    $email = $x['email'];
    $nama = $x['nama'];
    $waktu_kirim = $x['waktu_kirim'];
    $judul = $x['judul'];
    $waktu_input = date('Y-m-d');


    $query = $mysqli->query("UPDATE request_data SET status = 'Ditolak', waktu_input = '$waktu_input' WHERE id_request = '$id_req'");
     
    if($alasan == '1'){
        $email_pengirim = 'opendata.bonebol@gmail.com';
        $nama_pengirim = 'Admin OpenData Bone Bolango';
        $email_penerima = $email;
        $subjek = 'Dataset Opendata Bone Bolango';
        $pesan = '<div style="background-color: #eceeef; padding: 2px;">
        <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <p>Yth. '.$nama.'</p>
            <p><div style="color:red;"><b>Dataset yang anda ajukan ditolak oleh OPD yang bersangkutan dengan alasan Dataset Bersifat Rahasia</b></div> <br>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
            <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
                <tr style="height: 40px; background-color: #eceeef;">
                    <td>Tanggal Permintaan</td>
                    <td>Judul Dataset</td>
                </tr>
                <tr style="height: 40px;">
                    <td>'.$waktu_kirim.'</td>
                    <td>'.$judul.'</td>
                </tr>
            </table>
            <br>
            <p>Untuk pertanyaan lebih lanjut, anda dapat langsung menghubungi Hotline Open Data Bone Bolango melalui:</p>
            <p>Email : opendata.bonebol@gmail.com</p>
       </div>
       </div>';
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'diskominfobonebol1';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 3;
    
        $mail->setFrom($email_pengirim,$nama_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
    
        $send = $mail->send();
      
        echo "<script>alert('Berhasil Dikirim');</script>";
        echo "<script>window.location.href='".$base_url."permintaan_dataset';</script>";
    
    }else if($alasan == '2'){
        $email_pengirim = 'opendata.bonebol@gmail.com';
        $nama_pengirim = 'Admin OpenData Bone Bolango';
        $email_penerima = $email;
        $subjek = 'Dataset Opendata Bone Bolango';
        $pesan = '<div style="background-color: #eceeef; padding: 2px;">
        <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <p>Yth. '.$nama.'</p>
            <p><div style="color:red;"><b>Dataset yang anda ajukan ditolak oleh OPD yang bersangkutan dengan alasan Dataset Sudah Pernah Diinput</b></div> <br>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
            <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
                <tr style="height: 40px; background-color: #eceeef;">
                    <td>Tanggal Permintaan</td>
                    <td>Judul Dataset</td>
                </tr>
                <tr style="height: 40px;">
                    <td>'.$waktu_kirim.'</td>
                    <td>'.$judul.'</td>
                </tr>
            </table>
            <br>
            <p>Untuk pertanyaan lebih lanjut, anda dapat langsung menghubungi Hotline Open Data Bone Bolango melalui:</p>
            <p>Email : opendata.bonebol@gmail.com</p>
       </div>
       </div>';
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'diskominfobonebol1';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 3;
    
        $mail->setFrom($email_pengirim,$nama_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
    
        $send = $mail->send();
      
        echo "<script>alert('Berhasil Dikirim');</script>";
        echo "<script>window.location.href='".$base_url."permintaan_dataset';</script>";
    }else if($alasan == '3'){
        $email_pengirim = 'opendata.bonebol@gmail.com';
        $nama_pengirim = 'Admin OpenData Bone Bolango';
        $email_penerima = $email;
        $subjek = 'Dataset Opendata Bone Bolango';
        $pesan = '<div style="background-color: #eceeef; padding: 2px;">
        <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <p>Yth. '.$nama.'</p>
            <p><div style="color:red;"><b>Dataset yang anda ajukan ditolak oleh OPD yang bersangkutan dengan alasan Dataset Tidak Tersedia</b></div> <br>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
            <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
                <tr style="height: 40px; background-color: #eceeef;">
                    <td>Tanggal Permintaan</td>
                    <td>Judul Dataset</td>
                </tr>
                <tr style="height: 40px;">
                    <td>'.$waktu_kirim.'</td>
                    <td>'.$judul.'</td>
                </tr>
            </table>
            <br>
            <p>Untuk pertanyaan lebih lanjut, anda dapat langsung menghubungi Hotline Open Data Bone Bolango melalui:</p>
            <p>Email : opendata.bonebol@gmail.com</p>
       </div>
       </div>';
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'diskominfobonebol1';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 3;
    
        $mail->setFrom($email_pengirim,$nama_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
    
        $send = $mail->send();
      
        echo "<script>alert('Berhasil Dikirim');</script>";
        echo "<script>window.location.href='".$base_url."permintaan_dataset';</script>";
    }else{
        $email_pengirim = 'opendata.bonebol@gmail.com';
        $nama_pengirim = 'Admin OpenData Bone Bolango';
        $email_penerima = $email;
        $subjek = 'Dataset Opendata Bone Bolango';
        $pesan = '<div style="background-color: #eceeef; padding: 2px;">
        <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <p>Yth. '.$nama.'</p>
            <p><div style="color:red;"><b>Anda mengirim permintaan dataset dengan tujuan yang salah</b></div> <br>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
            <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
                <tr style="height: 40px; background-color: #eceeef;">
                    <td>Tanggal Permintaan</td>
                    <td>Judul Dataset</td>
                </tr>
                <tr style="height: 40px;">
                    <td>'.$waktu_kirim.'</td>
                    <td>'.$judul.'</td>
                </tr>
            </table>
            <br>
            <p>Untuk pertanyaan lebih lanjut, anda dapat langsung menghubungi Hotline Open Data Bone Bolango melalui:</p>
            <p>Email : opendata.bonebol@gmail.com</p>
       </div>
       </div>';
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'diskominfobonebol1';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 3;
    
        $mail->setFrom($email_pengirim,$nama_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
    
        $send = $mail->send();
      
        echo "<script>alert('Berhasil Dikirim');</script>";
        echo "<script>window.location.href='".$base_url."permintaan_dataset';</script>";
    }

   
    }



?>