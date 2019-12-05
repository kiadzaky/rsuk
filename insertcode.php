<?php
$conn = mysqli_connect("localhost","root","","newrsuk");
$db = mysqli_select_db($conn,'newrsuk');

if(isset($_POST['insertdata']))
{
  $id_dokter = $_POST['id_dokter'];
  $nama_dokter = $_POST['nama_dokter'];
  $no_hp = $_POST['no_hp'];
  $id_poli = $_POST['id_poli'];
  $id_jadwal = $_POST['id_jadwal'];

  $query = "INSERT INTO dokter (`id_dokter`,`nama_dokter`,`no_hp`,'id_poli','id_jadwal') VALUES ('$id_dokter','$nama_dokter','$no_hp','$id_poli','$id_jadwal')";
  $query_run = mysqli_query($conn, $query);

  if($query_run)
  {
    echo '<script> alert("Data Saved")</script>';
    header('Location: tracking_obat.php');
  }
  else
{
  echo '<script> alert("Data not Saved")</script>';
}

}


?>
