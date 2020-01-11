<?php
include 'functions.php';
$id_req_ambulance	= $_POST['id_req_ambulance'];
$id_ambulance      	= $_POST['id_ambulance'];
$nik           		= $_POST['nik'];
$alamat           	= $_POST['alamat'];
$no_hp        		= $_POST['no_hp'];
$tanggal  			= $_POST['tanggal'];
$keluhan         	= $_POST['keluhan'];
$link        		= $_POST['link'];
$status_req         = $_POST['status_req'];
	$query = mysqli_query("UPDATE `req_ambulance` SET `status_req` = '1' WHERE `id_req_ambulance`='$row[id_req_ambulance]' ");
		header('location: ambulance-darurat.php');	
    
?>