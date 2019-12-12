<?php 
include 'config.php';
$query = $link->query("SELECT *,COUNT(id) as jml FROM `antrian` JOIN pasien on antrian.no_registrasi = pasien.no_registrasi JOIN akun on pasien.nik = akun.nik WHERE status_antrian = '0' ORDER BY no_antrian DESC LIMIT 1");
$row = mysqli_fetch_assoc($query);
return $row;
?>