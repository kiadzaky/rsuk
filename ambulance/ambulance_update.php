 <?php
require('functions.php');
$query=mysqli_query($conn, "UPDATE req_ambulance SET status_req='".$_POST['val']."' WHERE id_req_ambulance='".$_POST['id_req_ambulance']."' ");
if($query)
{
  $q=mysqli_query($conn, "SELECT * FROM req_ambulance WHERE id_req_ambulance='".$_POST['id_req_ambulance']."'");
  $data=mysqli_fetch_assoc($query);
  echo $data['$status_req'];
}

?>
