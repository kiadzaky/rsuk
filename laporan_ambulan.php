<?php
ob_start();
require_once('config.php');
require_once('database.php');

$connection = new Database($host, $user, $pass, $database);
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laporan Ambulan | RSU Kaliwates Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <?php include 'part/header.php' ?>
    <!-- End Header Top Area -->
    <!-- Navbar vertikal start -->
    <?php include 'part/navbar_v.php' ?>
    <!-- Navbar vertikal end -->
    <!-- Navbar horizontal start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="index.php"><i class="notika-icon notika-menus"></i> Registrasi Pasien</a>
                        </li>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-alarm"></i> Ambulance</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Tracking Obat</a>
                        </li>
                        <li><a href="tambah_dokter.php"><i class="notika-icon notika-form"></i> Tambah Dokter</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Laporan</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Ambulance Darurat</a>
                                </li>
                                <li><a href="index.php">Penjemputan Jenazah</a>
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
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="flot-charts.html">Flot Charts</a>
                                </li>
                                <li><a href="bar-charts.html">Bar Charts</a>
                                </li>
                                <li><a href="line-charts.html">Line Charts</a>
                                </li>
                                <li><a href="area-charts.html">Area Charts</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Laporan Registrasi Pasien</a>
                                </li>
                                <li><a href="index.php">Laporan Tracking Obat</a>
                                </li>
                                <li><a href="laporan_ambulan.php">Laporan Ambulance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar horizontal End-->
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
										<h2>Laporan Transaksi</h2>
										<p>Selamat datang di RSU Kaliwates<span class="bread-ntd">Admin</span></p>
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
    <!-- Data Table area Start-->
    <?php
        class Ambulan {
            private $mysqli;

        function __construct($conn) {
            $this->mysqli = $conn;
        }
        public function tampil($id = null) {
            $db = $this->mysqli->conn;
            $sql = "SELECT * FROM `req_ambulance` JOIN akun ON req_ambulance.nik = akun.nik JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance";
                if($id != null) {
                    $sql .= "WHERE id_req_ambulance = $id";
                }
            $query = $db->query($sql) or die ($db->error);
            return $query;                                                    
        }
        }
            $la = new Ambulan($connection);
    ?>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Data Dokter</h2>
                            <p>Berisi semua data singkat dari dokter yang ada di RSU Kaliwates.</p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Jenis Penjemputan</th>
                                        <th>Nama</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                        <th>Alamat</th>
                                        <th>Link Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = $la->tampil();
                                    while($data = $tampil->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->ambulance; ?></td>
                                        <td><?php echo $data->nama; ?></td>
                                        <td><?php echo $data->keluhan; ?></td>
                                        <td><?php echo $data->tanggal; ?></td>
                                        <td><?php echo $data->alamat; ?></td>
                                        <td><?php echo $data->link; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Jenis Penjemputan</th>
                                        <th>Nama</th>
                                        <th>Keluhan</th>
                                        <th>Tanggal</th>
                                        <th>Alamat</th>
                                        <th>Link Alamat</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?php include 'part/footer.php' ?>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>