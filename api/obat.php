<?php
	include '../config.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$no_resep = $_POST['no_resep'];

	$sql = "select * from status_obat where no_resep = '$no_resep'";
	$response = mysqli_query($link,$sql);
	$result=array();
	$result ['status'] = array();
		if (mysqli_num_rows($response)==1) {
			$row = mysqli_fetch_assoc($response);
			$index['no_resep'] = $row['no_resep'];
			$index['jumlah_obat'] = $row['jml_obat'];
			$index['status'] = $row['status'];
			array_push($result['status'], $index);

			$result['success'] = "1";
			echo json_encode($result);
		}
	}else{
		$result['message'] = "error";
		echo json_encode($result);
	}
?>