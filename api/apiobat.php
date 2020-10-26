<?php
	require_once '../konek.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$no_resep = $_POST['no_resep'];
	$query = "select * from status_obat where no_resep=$no_resep";
	$sql = mysqli_query($link, $query);
	$ray = array();
	while ($row = mysqli_fetch_array($sql)) {
		array_push($ray, array(
			"id_obat" => $row['id_obat'],
			"no_resep" => $row['no_resep'],
			"jml_obat" => $row['jml_obat'],
			"status" => $row['status']
		));
	}

	echo json_encode($ray);

	mysqli_close($link);
}
?>