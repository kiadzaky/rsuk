<?php
$conn = mysqli_connect("localhost", "root", "", "db_rsuk");
$db = mysqli_select_db($conn, 'db_rsuk');

if (isset($_POST['insertdata'])) {
  $id_dokter = $_POST['id_dokter'];
  $nama_dokter = $_POST['nama_dokter'];
  $id_poli = $_POST['id_poli'];
  $id_jadwal = $_POST['id_jadwal'];
  $keterangan = $_POST['keterangan'];

  $query = mysqli_query($conn, "INSERT INTO dokter VALUES ('$id_dokter','$nama_dokter','$id_poli','$id_jadwal','$keterangan')");

  if ($query) {
    echo '<script> alert("Data Saved")</script>';
    header('Location: index_dokter.php');
  } else {
    echo '<script> alert("Data not Saved")</script>';
  }
}
