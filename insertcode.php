<?php

if(isset($_POST['insertdata']))
{

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
