<?php
require_once('config.php');
require_once('database.php');

$connection = new Database($host, $user, $pass, $database);

if(isset($_POST['updatedata'])) {
	$id_dokter = $_POST['id_dokter'];
	$nama_dokter = $_POST['nama_dokter'];
	$foto = $_POST['foto'];
	$id_poli = $_POST['id_poli'];
	$id_jadwal = $_POST['id_jadwal'];

	$query = "UPDATE dokter SET id_dokter='$id_dokter', nama_dokter='$nama_dokter', foto='$foto', id_poli='$id_poli', id_jadwal='$id_jadwal' WHERE id_dokter='$id_dokter' ";
	$query_run = mysqli_query($connection, $query);

	// if($query_run) {
	// 	echo '<script> alert("Data telah dirubah!")</script>';
	// 	header('location: tambah_dokter.php');
	// } else {
	// 	echo '<script> alert("Data tidak dirubah!")</script>';
	// }
}
?>