<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
  <?php
  // Load file koneksi.php
  include "konek.php";
  

  
  ?>
  <table border="1" cellpadding="8">
  <tr>
     <th>ID Obat</th>
    <th>No. Resep</th>
                                        <th>Jumlah Obat</th>
                                        <th>Status</th>
  </tr>
  <?php
  $query = "SELECT * FROM status_obat"; 
  $sql = mysqli_query($link, $query); // Eksekusi/Jalankan query dari variabel $query
  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
     // $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
          echo "<tr>";
            echo "<td>".$data['id_obat']."</td>";
            echo "<td>".$data['no_resep']."</td>";
            echo "<td>".$data['jml_obat']."</td>";
            echo "<td>".$data['status']."</td>";
            echo "</tr>";
    }
  }else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
  }
  ?>
  </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A5','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Obat.pdf', 'D');
?>