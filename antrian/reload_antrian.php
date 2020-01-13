<?php
include '../config.php';
    $no_antrian = $_POST['no_antrian'];
  	$query = $link->query("UPDATE `antrian` SET `status_antrian` = '1' WHERE `no_antrian`='$no_antrian' ");
  	$query = $link->query("UPDATE `no_antri` SET `status_antrian` = 'tersedia' WHERE `no_antri`.`no_antrian` = '$no_antrian' ");
  	echo '<script>
    window.location.replace("http://127.0.0.1/rsuk/index/?antrian=index");
    </script>';	
?>