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
  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    if($filter == '1'){ // Jika filter nya 1 (per tanggal)
      $tgl = date('d-m-y', strtotime($_GET['tanggal']));
      echo '<b>Laporan Registrasi Pasien Tanggal '.$tgl.'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal WHERE DATE(tanggal)='".$_GET['tanggal']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tanggal yang diinput oleh user pada filter
    }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
      echo '<b>Laporan Registrasi Pasien Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai bulan dan tahun yang diinput oleh user pada filter
    }else{ // Jika filter nya 3 (per tahun)
      echo '<b>Laporan Registrasi Pasien Tahun '.$_GET['tahun'].'</b><br /><br />';
      $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal WHERE YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tahun yang diinput oleh user pada filter
    }
  }else{ // Jika user tidak memilih filter
    echo '<b>Semua Laporan Registrasi Pasien</b><br /><br />';
    $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli, dokter.nama_dokter, jadwal.jadwal FROM pasien
                                            JOIN dokter ON pasien.id_dokter = dokter.id_dokter join akun on 
                                            pasien.nik = akun.nik join poli on dokter.id_poli = poli.id_poli 
                                            join jadwal on dokter.id_jadwal = jadwal.id_jadwal ORDER BY tanggal"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
  }
  ?>
  <table border="1" cellpadding="8">
  <tr>
    <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Jadwal</th>
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
            echo "<td>".$data['nama_dokter']."</td>";
            echo "<td>".$data['tanggal']."</td>";
            echo "<td>".$data['jadwal']."</td>";
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
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A3','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Registrasi Pasien.pdf', 'D');
?>