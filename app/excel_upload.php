<?php

function upload_file() {
    $namaFile = $_FILES['file']['name'];
   $ukuranFile = $_FILES['file']['size'];
   $error = $_FILES['file']['error'];
   $tmpName = $_FILES['file']['tmp_name'];

   // cek apakah tidak ada file yang di upload
   if($error === 4) {
       echo "
           <script>
               alert('pilih foto terlebih dahulu');
           </script>
       ";
       return false;
   }

   // cek apakah yang di upload file
   $extensifotoValid = ['xlsx'];
   $extensifoto = explode('.', $namaFile);
   $extensifoto = strtolower(end($extensifoto));
   if(!in_array($extensifoto, $extensifotoValid)) {
       echo "
           <script>
               alert('yang anda upload bukan foto');
           </script>
       ";
       return false;
   }

   // cek ukuran file file
   if($ukuranFile > 40943040) {
       echo "
           <script>
               alert('ukuran foto terlalu besar!');
           </script>
       ";
       return false;
   }
   // generate nama file baru
   $cakacakacak = uniqid(microtime(true));
   $namaFileBaru = $cakacakacak;
   $namaFileBaru .= '.';
   $namaFileBaru .= $extensifoto;

   // jika lolos pengecekan
   move_uploaded_file($tmpName, 'public/uploads/kategori/' . $namaFileBaru);
   return $namaFileBaru;
}

?>