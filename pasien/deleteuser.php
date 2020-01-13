<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
  $id = $_GET['id'];
  $query = "DELETE FROM akun WHERE nik='$id'";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Delete")</script>';
    echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?pasien=index");
    </script>'; 
  }else
{
 echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?pasien=index");
    </script>'; 
}