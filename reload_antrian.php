<?php
include 'config.php';
    $no_antrian = $_POST['no_antrian'];
  	$query = $link->query("UPDATE `antrian` SET `status_antrian` = '1' WHERE `no_antrian`='$no_antrian' ");
  	header('location: antrian_pasien.php');
?>