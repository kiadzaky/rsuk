<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      text-align: center;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 26.5%;
      text-align: center;
    }
    table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.style37 {
    font-size: 12px;
    
}
.style38 {font-size: 12px}
.style14 {font-size: 10px}
  </style>
   
</head>
<body>
    <bookmark title="Lettre" level="0" ></bookmark>
    <table style="width: 100%; text-align: center; font-size: 16px; font-weight: bold">
        <tr>
          <td style="width:8%" rowspan="3"><img src="../img/rolas-medika-nu.png" alt="Logo" width="80" height="78"></td>
          <td style="width:85%">RUMAH SAKIT UMUM KALIWATES JEMBER</td>
        </tr>
        <tr>
          <td class="style37">Jl. Diah Pitaloka No.4A, Kaliwates Kidul, Kaliwates, Jember </td>
        </tr>
        <tr>
          <td class="style38">Telp : (0331) 483505, (0331) 483309</td>
        </tr>

        <tr>
            <td colspan="2"></td>
        </tr>
        <hr>
    </table>
    <br>
    <br>
<?php
        // Load file functions.php  
        include "../functions.php";
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            // Cek apakah user telah memilih filter    
            $filter = $_GET['filter'];
            // Ambil data filder yang dipilih user    
            if ($filter == '1') {
                // Jika filter nya 1 (per tanggal)      
                $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                echo '<b>Data Laporan Ambulance Tanggal ' . $tgl . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE DATE(tanggal)='" . $_GET['tanggal'] . "'";
                // Tampilkan data Laporan Ambulance sesuai tanggal yang diinput oleh user pada filter    
            } else if ($filter == '2') {
                // Jika filter nya 2 (per bulan)      
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                echo '<b>Data Laporan Ambulance Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE MONTH(tanggal)='" . $_GET['bulan'] . "' AND YEAR(tanggal)='" . $_GET['tahun'] . "'";
                // Tampilkan data Laporan Ambulance sesuai bulan dan tahun yang diinput oleh user pada filter   
            } else {
                // Jika filter nya 3 (per tahun)      
                echo '<b>Data Laporan Ambulance Tahun ' . $_GET['tahun'] . '</b><br /><br />';
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE YEAR(tanggal)='" . $_GET['tahun'] . "'";
                // Tampilkan data Laporan Ambulance sesuai tahun yang diinput oleh user pada filter   
            }
        } else {
            // Jika user tidak memilih filter    
            echo '<b>Semua Data Laporan Ambulance</b><br /><br />';
            $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik ORDER BY tanggal";
            // Tampilkan semua data Laporan Ambulance diurutkan berdasarkan tanggal  
        }
        ?>
<br>
  <table border="1" cellpadding="8" width="680">
  <tr>
                                        <th>Jenis Penjemputan</th>
                    <th>Nama</th>
                    <th>Keluhan</th>
                    <th>Tanggal</th>
                    <th>Alamat</th>
                    <th>Link Alamat</th>
  </tr>
  <?php
  $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
     // $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
      
            echo "<tr>";
                    echo "<td>" . $data['ambulance'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['keluhan'] . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['link'] . "</td>";
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
require_once('../html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A3','en');
$pdf->WriteHTML($html);
$pdf->Output();
?>