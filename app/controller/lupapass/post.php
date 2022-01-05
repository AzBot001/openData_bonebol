<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('public/assets2/vendor/PHPMailer/Exception.php');
include('public/assets2/vendor/PHPMailer/PHPMailer.php');
include('public/assets2/vendor/PHPMailer/SMTP.php');

if(isset($_POST['kirim'])){
    $email_penerima = $_POST['email'];

    $query = $mysqli->query("SELECT * FROM organisasi WHERE email = '$email_penerima'");
    $cek = mysqli_num_rows($query);
    if($cek > 0){


    $email_pengirim = 'opendata.bonebol@gmail.com';
    $nama_pengirim = 'Admin OpenData Bone Bolango';
    $subjek = 'Reset Password';
    $pesan = '<div style="background-color: #eceeef; padding: 2px;">
    <div style=" font-family: calibri; background-color: #fff; width: 50%; margin: 50px auto; padding: 20px; border-radius: 10px;  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <p>Sepertinya anda lupa kata sandi untuk akun Open Data Bone Bolango. Jika ini benar, klik tombol di bawah ini untuk mengatur ulang kata sandi anda</p>
        <form method="post" action="'.$base_url.'reset">
        <input type="hidden" name="email" style="display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;" value="'.$email_penerima.'">
        <button type="submit">Reset Password</button>
        </form>
        <p>Jika anda tidak lupa kata sandi anda, anda dapat mengabaikan email ini</p>
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
        echo "<script>window.location.href='".$base_url."'</script>";
    }
}else{
    echo "<script>alert('Email Tidak Terdaftar Di Open Data Bone Bolango');window.location.href='".$base_url."'</script>";
}

}
