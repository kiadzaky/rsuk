<?php
	include '../config.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$username = $_POST['username'];
		$password= $_POST['password'];

	//$sql = "select * from login JOIN akun on login.nik = akun.nik where username = '$username' and password = '$password' ";
	$sql = "select * from akun where username = '$username' and password = '$password' and level = '1' ";
	$response = mysqli_query($link,$sql);
	$result=array();
	$result ['login'] = array();
		if (mysqli_num_rows($response)==1) {
			$row = mysqli_fetch_assoc($response);
			$index['nama'] = $row['nama'];
			$index['nik'] = $row['nik'];
			array_push($result['login'], $index);

			$result['success'] = "1";
			echo json_encode($result);
		}
	}else{
		$result['message'] = "error";
		echo json_encode($result);
	}
?>