<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['updatedata']))
{
  $id = $_POST['update_id'];
  $hari = $_POST['hari'];
  $mulai = $_POST['mulai'];
  $selesai = $_POST['selesai'];
  $query = "UPDATE jadwal SET hari='$hari',mulai='$mulai',selesai='$selesai' WHERE id_jadwal='$id' ";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Update")</script>';
    echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=tambah_jadwal");
    </script>'; 
  }else
{
  echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?dokter=tambah_jadwal");
    </script>'; 
}
}
?>
