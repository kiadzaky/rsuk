<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
  $id = $_GET['id'];
  $query = "DELETE FROM jadwal WHERE id_jadwal='$id'";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Delete");
window.location.replace("http://127.0.0.1/rsuk/index/?dokter=tambah_jadwal");
    </script>';
  }else{
  echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=tambah_jadwal");
    </script>'; 
}
?>