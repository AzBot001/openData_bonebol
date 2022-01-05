
<?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
<?php
include 'env.php';
$query = $mysqli->query("SELECT *, kategori_data.gambar AS gb FROM dataset JOIN kategori_data ON dataset.id_kategori = kategori_data.id_kategori JOIN organisasi ON dataset.id_organisasi = organisasi.id_organisasi WHERE id_dataset < '".$_POST['id']."' ORDER BY id_dataset DESC LIMIT 2");
$jumlah_data = mysqli_num_rows($query);
$output = "";

while ($d = $query->fetch_assoc()) {
   $output .= '
    <tr>
        <td width="5%"><img src="public/uploads/kategori/'.$d['gb'].'" width="100" class="rounded" alt=""></td>
        <td width="75%" style="vertical-align: middle;">
          <h5 class="jdl"> '.$d["judul"].'</h5>
          <h6 class="sjdl mt-2"><i class="fas fa-building"></i>  '.$d["nama_organisasi"].'</h6>
          <h6 class="sjdl mt-2"><i class="fas fa-book"></i>  '.$d["nama_kategori"].' <i class="fas fa-calendar"></i>  '.tgl_indo($d["tgl_input"]).'</h6>
        </td>
        <td class="sjdl" style="vertical-align: middle;"><i class="fas fa-eye"></i>  '.$d["view"].'</td>
        <td style="vertical-align: middle;">
          <a href="detail_dataset/'.$d['id_dataset'].'" class="btn btn-dark btn-sm"><i class="mai-search"></i> Lihat</a>
        </td>
      </tr>
      ';

    $id = $d['id_dataset'];
  
  
}
if(isset($id)){
$output .= '
<tr id="remove">
<td colspan="4">
<button id="load_more" data-id="'.$id.'" class="btn btn-success btn-sm btn-block">Muat Lebih Banyak</button>
</td>
</tr>
';
}

echo $output;
?>