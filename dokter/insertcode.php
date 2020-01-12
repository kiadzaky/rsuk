<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['insertdata']))
{
  $hari  = $_POST['hari'];
  $mulai  = $_POST['mulai'];
  $selesai    = $_POST['selesai'];
  $query = "INSERT INTO jadwal ('',`hari`,`mulai`,`selesai`) VALUES ('$hari','$mulai','$selesai')";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Saved")</script>';
    header('Location: index_jadwal.php');
  }else
{
  echo '<script> alert("Data not Saved")</script>';
}
}
?>