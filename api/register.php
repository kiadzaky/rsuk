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
		$level = 'pelanggan';
		$username = $_POST['username'];
		$password= $_POST['password'];

	$sql = "INSERT INTO `akun` (`nik`, `nama`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `no_telepon`, `foto`, `level`) VALUES ('$nik', '$nama', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$no_telepon', '$foto', '$level')";
	$sql1 = "INSERT INTO `login` (`nik`, `username`, `password`) VALUES ('$nik', '$username', '$password')";	

	$response = mysqli_query($link,$sql);
	$response1 = mysqli_query($link,$sql1);

	if ($response && $response1) {
		$result['message'] = "sukses";
		
	}else{
		$result['message'] = "gagal";
		$result['mysql'] = mysqli_error($sql);
	}
	echo json_encode($result);
	}else{
		$result['message'] = "error";
		echo json_encode($result);
	}
?>