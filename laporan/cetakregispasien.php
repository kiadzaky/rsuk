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
      width: 20%;
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
  // Load file koneksi.php
  include "../konek.php";
  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    if($filter == '1'){ // Jika filter nya 1 (per tanggal)
      $tgl = date('d-m-y', strtotime($_GET['tanggal']));
      echo '<b>Laporan Registrasi Pasien Tanggal '.$tgl.'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli WHERE DATE(tanggal)='".$_GET['tanggal']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tanggal yang diinput oleh user pada filter
    }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
      echo '<b>Laporan Registrasi Pasien Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai bulan dan tahun yang diinput oleh user pada filter
    }else{ // Jika filter nya 3 (per tahun)
      echo '<b>Laporan Registrasi Pasien Tahun '.$_GET['tahun'].'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli WHERE YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tahun yang diinput oleh user pada filter
    }
  }else{ // Jika user tidak memilih filter
    echo '<b>Semua Laporan Registrasi Pasien</b><br /><br />';
    $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli ORDER BY tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
  }
  ?>
<br>
  <table border="1" cellpadding="8" width="900">
  <tr>
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        
                                        <th>Tanggal</th>
                                        
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
  </tr>
  <?php
  $sql = mysqli_query($link, $query); // Eksekusi/Jalankan query dari variabel $query
  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
     // $tgl = date('d-m-Y', strtotime($data['tgl'])); // Ubah format tanggal jadi dd-mm-yyyy
      echo "<tr>";
            echo "<td>".$data['no_registrasi']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['poli']."</td>";
           
            echo "<td>".$data['tanggal']."</td>";
           
            echo "<td>".$data['keluhan']."</td>";
            echo "<td>".$data['riwayat_sakit']."</td>";
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