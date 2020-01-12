<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['deletedata']))
{
  $id = $_POST['delete_id'];
  $query = "DELETE FROM jadwal WHERE id_jadwal='$id'";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Delete")</script>';
    header('Location: index_jadwal.php');
  }else
{
  echo '<script> alert("Data not Delete")</script>';
}
}
?>