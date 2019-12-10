<?php
$conn = mysqli_connect("localhost", "root", "", "db_rsuk");
$db = mysqli_select_db($conn, 'db_rsuk');

if (isset($_POST['insertdata'])) {
  $no_registrasi = $_POST['no_registrasi'];
  $nama = $_POST['nama'];
  $id_poli = $_POST['id_poli'];
  $id_dokter = $_POST['id_dokter'];
  $id_jadwal = $_POST['id_jadwal'];
  $keluhan = $_POST['keluhan'];
  $riwayat_sakit = $_POST['riwayat_sakit'];

  $query = mysqli_query($conn, "INSERT INTO pasien VALUES ('$no_registrasi','$nama','$id_poli','$id_dokter','', 
    $id_jadwal','$keluhan','$riwayat_sakit')");

  if ($query) {
    echo '<script> alert("Data Saved")</script>';
    header('Location: registrasi_pasien.php');
  } else {
    echo '<script> alert("Data not Saved")</script>';
  }
}
