<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['insertdata']))
{
  $hari  = $_POST['hari'];
  $mulai  = $_POST['mulai'];
  $selesai    = $_POST['selesai'];
  $query = "INSERT INTO `jadwal` (`id_jadwal`, `hari`, `mulai`, `selesai`) VALUES (NULL, '$hari', '$mulai', '$selesai')";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Saved")</script>';
    echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=index");
    </script>'; 
  }else
{
  echo '<script> alert("Data not Saved")</script>';
}
}
?>