<?php
	include '../konek.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$id_obat = $_POST['id_obat'];

	$sql = "select * from status_obat where id_obat = '$id_obat'";
	$response = mysqli_query($link,$sql);
	$result=array();
	$result ['status'] = array();
		if (mysqli_num_rows($response)==1) {
			$row = mysqli_fetch_assoc($response);
			$index['id_obat'] = $row['id_obat'];
			$index['no_resep'] = $row['no_resep'];
			$index['jml_obat'] = $row['jml_obat'];
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