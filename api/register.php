<?php
	include '../config.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$no_telepon = $_POST['no_telepon'] ;
		$foto = $_POST['foto'] ;
		
		$username = $_POST['username'];
		$password= $_POST['password'];
		$level = 'pelanggan';

	$sql = "INSERT INTO `akun` (`nik`, `nama`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `no_telepon`, `foto`,`username`,`password`, `level`) VALUES ('$nik', '$nama', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$no_telepon','$foto','$username','$password', '$level')";
	

	$response = mysqli_query($link,$sql);
	

	if ($response) {
		$result['message'] = "sukses";
		$result['success'] = "1";
		
	}else{
		$result['message'] = "gagal";
		$result['mysql'] = mysqli_error($link);
	}
	echo json_encode($result);
	}else{
		$result['message'] = "error";
		echo json_encode($result);
	}
?>