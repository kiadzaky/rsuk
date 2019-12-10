<?php
	include '../config.php';
	include 'kode_pasien.php';
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$nik = $_POST['nik'];
		$id_dokter= $_POST['id_dokter'];
		$keluhan = $_POST['keluhan'];
		$riwayat_sakit = $_POST['riwayat_sakit'];
		// no resep itu nomer registrasi

		//insert ke tabel pasien
	$sql = "INSERT INTO `pasien` (`no_registrasi`, `nik`, `id_dokter`, `tanggal`, `keluhan`, `riwayat_sakit`) VALUES ('$no_resep', '$nik', '$id_dokter', CURRENT_TIMESTAMP, '$keluhan', '$riwayat_sakit')";
	$response = mysqli_query($link,$sql);
	///////////// ambil data
	$query = "SELECT * FROM `pasien` JOIN akun ON pasien.nik = akun.nik JOIN dokter  on dokter.id_dokter = pasien.id_dokter JOIN poli on dokter.id_poli = poli.id_poli where no_registrasi = '$no_resep'";
	$response1 = mysqli_query($link,$query);
	$result=array();
	$result ['data'] = array();
		if (mysqli_num_rows($response1)==1) {
			$row = mysqli_fetch_assoc($response1);
			$index['nik'] = $row['nik'];
			$index['nama'] = $row['nama'];
			$index['nama_dokter'] = $row['nama_dokter'];
			$index['poli'] = $row['poli'];
			array_push($result['data'], $index);
			////// insert data ke table antrian

				$sql1 = "SELECT * FROM `no_antri`  WHERE status_antrian = 'tersedia' ORDER BY no_antrian ASC limit 1";
				$query2 = mysqli_query($link,$sql1);
				$rows = mysqli_fetch_array($query2);
				$no_antrian = $rows['no_antrian'];
				//dapatkan tersedianya antrian, ambil no antrian
				if($no_antrian!=null){
					$sql = "INSERT INTO `antrian` (`id`, `waktu`, `no_registrasi`, `no_antrian`, `status_antrian`) VALUES (NULL, CURRENT_TIMESTAMP, '$no_resep', '$no_antrian', '0')";
					$query3 = mysqli_query($link,$sql);
					//insert data
					if ($query3) {
					$sql_update = "UPDATE `no_antri` SET `status_antrian` = 'tidak' WHERE `no_antri`.`no_antrian` = '$no_antrian' ";
					$query1 = $link->query($sql_update);
					//update
					$result['success'] = "1";
					echo json_encode($result);
					}else{
						mysqli_error($link);
					}
				}else{
					mysqli_error($link);
				}			
		}
	}else{
		$result['message'] = "error";
		echo json_encode($result);
	}
?>