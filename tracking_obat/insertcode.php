<?php
$conn = mysqli_connect("localhost","root","","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
if(isset($_POST['insertdata']))
{
  $no_resep  = $_POST['no_resep'];
  $jml_obat  = $_POST['jml_obat'];
  $status    = implode(', ', $_POST['status']);
  $query = "INSERT INTO status_obat ('',`no_resep`,`jml_obat`,`status`) VALUES ('$no_resep','$jml_obat','$status')";
  $query_run = mysqli_query($conn, $query);
  if($query_run)
  {
    echo '<script> alert("Data Saved")</script>';
    echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?obat=index");
    </script>'; 
  }else
{
  echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?obat=index");
    </script>'; 
}
}
?>