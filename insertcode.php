<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['insertdata']))
{
  $no_resep  = $_POST['no_resep'];
  $jml_obat  = $_POST['jml_obat'];
  $status    = status_obat(', ', $_POST['status']);
  $query = "INSERT INTO status_obat ('',`no_resep`,`jml_obat`,`status`) VALUES ('$no_resep','$jml_obat','$status')";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Saved")</script>';
    header('Location: tracking_obat.php');
  }else
{
  echo '<script> alert("Data not Saved")</script>';
}
}
?>