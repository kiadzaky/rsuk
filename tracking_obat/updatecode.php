<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['updatedata']))
{
  $id = $_POST['update_id'];
  $no_resep = $_POST['no_resep'];
  $jml_obat = $_POST['jml_obat'];
  $status = implode(', ', $_POST['status']);
  $query = "UPDATE status_obat SET no_resep='$no_resep',jml_obat='$jml_obat',status='$status' WHERE id_obat='$id' ";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Update")</script>';
    header('Location: tracking_obat.php');
  }else
{
  echo '<script> alert("Data not Update")</script>';
}
}
?>