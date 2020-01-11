<?php
$conn = mysqli_connect("localhost","root","kkhia1","db_rsuk");
$db = mysqli_select_db($conn,'db_rsuk');
$query = "SELECT max(no_resep) as maxKode FROM status_obat";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$no_resep = $data['maxKode'];
$noUrut = (int) substr($no_resep, 2, 5);
$noUrut++;
$char = "NR";
$no_resep = $char . sprintf("%03s", $noUrut);
echo $no_resep;
 ?>