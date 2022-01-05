<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('public/assets2/vendor/PHPMailer/Exception.php');
include('public/assets2/vendor/PHPMailer/PHPMailer.php');
include('public/assets2/vendor/PHPMailer/SMTP.php');

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
    $waktu_kirim = date('Y-m-d');
    // error_reporting(1);
    $query = $mysqli->query("INSERT INTO request_data VALUES('','$id_organisasi','$nama','$email','$judul','$desk','$tujuan','Pending','$waktu_kirim',NULL)");
   

    $email_pengirim = 'opendata.bonebol@gmail.com';
    $nama_pengirim = 'Admin OpenData Bone Bolango';
    $email_penerima = $email;
    $subjek = 'Permintaan Dataset Opendata Bone Bolango';
    $pesan = '<div style="background-color: #eceeef; padding: 2px;">
    <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <p>Yth. '.$nama.'</p>
        <p>Berikut adalah informasi tentang permintaan dataset yang anda ajukan :</p>
        <table cellpadding="4" border="1" style="border-collapse: collapse; min-width: 90%;">
            <tr style="height: 40px; background-color: #eceeef;">
                <td>Tanggal</td>
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
    
    if($send){
        echo "<script>alert('Berhasil Mengirim Permintaan Data')</script>";
    }else{
        echo "<script>alert('sdsdsdsdsd')</script>";
    }



}

?>