<?php
require 'functions.php';
$query = query("SELECT id_req_ambulance, nik, alamat, no_hp, tanggal, keluhan, link FROM `req_ambulance` WHERE id_ambulance='AMBL2' and (status_req = '0' or status_req = '1')");
?>

<!doctype html>
<html class="no-js" lang="">

<?php include '../part/head.php' ?>
<head>

<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<link rel="stylesheet" type="text/css" href="../css/wave/button.css">
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php include '../part/header.php' ?>
    <!-- End Header Top Area -->

    <!-- Navbar Horizontal -->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="index.php"><i class="notika-icon notika-menus"></i> Registrasi Pasien</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-alarm"></i> Ambulance</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Tracking Obat</a>
                        </li>
                        <li><a href="index.php"><i class="notika-icon notika-form"></i> Tambah Dokter</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Laporan</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="ambulance-darurat.php">Ambulance Darurat</a>
                                </li>
                                <li><a href="penjemputan-jenazah.php">Penjemputan Jenazah</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Input Data Obat</a>
                                </li>
                                <li><a href="index.php">History Obat</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Laporan Registrasi Pasien</a>
                                </li>
                                <li><a href="index.php">Laporan Tracking Obat</a>
                                </li>
                                <li><a href="index.php">Laporan Ambulance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Navbar Vertical-->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="index.php">Registrasi Pasien</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Ambulance</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="ambulance-darurat.php">Ambulance Darurat</a></li>
                                        <li><a href="penjemputan-jenazah.php">Penjemputan Jenazah</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Tracking Obat</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="index.php">Input Data Obat</a></li>
                                        <li><a href="index.php">History Obat</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="index.php">Tambah Dokter</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Laporan</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="index.php">Laporan Registrasi Pasien</a></li>
                                        <li><a href="index.php">Laporan Tracking Obat</a></li>
                                        <li><a href="index.php">Laporan Ambulance</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Tabel Ambulance Darurat </h2>
										<p>Selamat Datang di RSU Kaliwates <span class="bread-ntd">Admin</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>Ambulance Darurat</h2>
                            <p>Hak Ambulance diatur pada Pasal (...)</p>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>No Req</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No Hp</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                        <th>Koordinat (Maps)</th>
                                        <th>Tombol Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" method="post">
                                    <?php $i = 1; ?>
                                    <?php foreach ($query as $row) : ?>
                                    <tr>
                                        <td><?= $row["id_req_ambulance"]; ?></td>
                                        <td><?= $row["nik"]; ?></td>
                                        <td><?= $row["alamat"]; ?></td>
                                        <td><?= $row["no_hp"]; ?></td>
                                        <td><?= $row["keluhan"]; ?></td>
                                        <td><?= $row["tanggal"]; ?></td>
                                        <td><?= $row["link"]; ?></td>
                                        <td>
                                            <a href='update-req.php?id_req_ambulance=$row[id_req_ambulance]' id="Btn1" onclick="myFunction()" class="btn btn-danger">Terima</button>
                                        </td>
                                        <td>
                                            <button type="button" id="Btn2" onclick="myFunction()" class="btn btn-success">Selesai</button>
                                        </td>
                                        </tr>
                                        
                                        <script>
                                            var Btn1 = document.getElementById('Btn1');
                                                Btn2 = document.getElementById('Btn2');
                                            function myFunction() {
                                                if (Btn1.style.display === "block"){
                                                    Btn1.style.display = "none";
                                                    Btn2.style.display = "block";
                                                }
                                                else {
                                                    Btn1.style.display = "none";
                                                    Btn2.style.display = "block";
                                                }
                                            }
                                        </script>

                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Normal Table area End-->

    <!-- Start Footer area-->
    <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
    <?php include '../part/javascript.php' ?>

</body>
</html>
