<?php
require 'functions.php';
// include 'insertcode.php';

// if (isset($_POST[insertdata])){
//   $no_resep  = $_POST['no_resep'];
//   $jml_obat  = $_POST['jml_obat'];
//   $status    = implode(', ', $_POST['status']);
//
//   mysqli_query($conn, "INSERT INTO implode VALUES ('no_resep','jml_obat','status')");
//   header('location:admin_rsuk.php?sukse');
// }
// $sql =  mysqli_query ($conn, "SELECT * FROM implode ORDER BY no_resep DESC");
// ambildata dari tabel status Obat
// $rgs = query("SELECT pasien.no_registrasi,pasien.tanggal,pasien.keluhan,pasien.riwayat_sakit,dokter.nama_dokter,jadwal.jadwal,poli.poli,akun.nama FROM pasien
// JOIN dokter ON pasien.id_dokter = dokter.id_dokter JOIN akun ON pasien.nik = akun.nik JOIN poli ON dokter.id_poli = poli.id_poli JOIN jadwal ON dokter.id_jadwal = jadwal.id_jadwal");
$rgs= query("SELECT * FROM pasien JOIN akun ON pasien.nik=akun.nik JOIN poli ON poli.id_poli=pasien.id_poli JOIN dokter
ON dokter.id_poli=poli.id_poli JOIN jadwal ON jadwal.id_jadwal=dokter.id_jadwal");

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | Notika - Notika Admin Template</title>
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="../css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="../css/wave/waves.min.css">
    <link rel="stylesheet" href="../css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="../css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
                            -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="registrasi_pasien.php">Registrasi Pasien</a>
                                    <ul class="collapse dropdown-header-top">
                                        <!-- <li><a href="index.html">Dashboard One</a></li>
                                        <li><a href="index-2.html">Dashboard Two</a></li>
                                        <li><a href="index-3.html">Dashboard Three</a></li>
                                        <li><a href="index-4.html">Dashboard Four</a></li>
                                        <li><a href="analytics.html">Analytics</a></li>
                                        <li><a href="widgets.html">Widgets</a></li> -->
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Ambulance</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Ambulance Darurat</a></li>
                                        <li><a href="view-email.html">Penjemputan Jenazah</a></li>
                                        <!-- <li><a href="compose-email.html">Compose Email</a></li> -->
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="admin_rsuk.php">Tracking Obat</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <!-- <li><a href="animations.html">Animations</a></li>
                                        <li><a href="google-map.html">Google Map</a></li>
                                        <li><a href="data-map.html">Data Maps</a></li>
                                        <li><a href="code-editor.html">Code Editor</a></li>
                                        <li><a href="image-cropper.html">Images Cropper</a></li>
                                        <li><a href="wizard.html">Wizard</a></li> -->
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Tambah Dokter</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <!-- <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li> -->
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Laporan</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="normal-table.html">Laporan Registrasi Pasien</a></li>
                                        <li><a href="data-table.html">Laporan Tracking Obat</a></li>
                                        <li><a href="data-table.html">Laporan Ambulance</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-components.html">Form Components</a></li>
                                        <li><a href="form-examples.html">Form Examples</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="contact.html">Contact</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="color.html">Color</a>
                                        </li>
                                        <li><a href="login-register.html">Login Register</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a data-toggle="tab" href="registrasi_pasien.php"><i class="notika-icon notika-house"></i> Registrasi Pasien</a>
                        </li>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Ambulance</a>
                        </li>
                        <li><a data-toggle="tab" href="tracking_obat.php"><i class="notika-icon notika-edit"></i> Tracking Obat</a>
                        </li>
                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Tambah Dokter</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Laporan</a>
                        </li>
                        <!-- <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Forms</a>
                        </li>
                        <li><a data-toggle="tab" href="#Appviews"><i class="notika-icon notika-app"></i> App views</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Pages</a>
                        </li> -->
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <!-- <li><a href="index.html">Dashboard One</a>
                                </li>
                                <li><a href="index-2.html">Dashboard Two</a>
                                </li>
                                <li><a href="index-3.html">Dashboard Three</a>
                                </li>
                                <li><a href="index-4.html">Dashboard Four</a>
                                </li>
                                <li><a href="analytics.html">Analytics</a>
                                </li>
                                <li><a href="widgets.html">Widgets</a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="inbox.html">Ambulance Darurat</a>
                                </li>
                                <li><a href="view-email.html">Penjemputan Jenazah</a>
                                </li>
                                <!-- <li><a href="compose-email.html">Compose Email</a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <!-- <li><a href="animations.html">Animations</a>
                                </li>
                                <li><a href="google-map.html">Google Map</a>
                                </li>
                                <li><a href="data-map.html">Data Maps</a>
                                </li>
                                <li><a href="code-editor.html">Code Editor</a>
                                </li>
                                <li><a href="image-cropper.html">Images Cropper</a>
                                </li>
                                <li><a href="wizard.html">Wizard</a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <!-- <li><a href="flot-charts.html">Flot Charts</a>
                                </li>
                                <li><a href="bar-charts.html">Bar Charts</a>
                                </li>
                                <li><a href="line-charts.html">Line Charts</a>
                                </li>
                                <li><a href="area-charts.html">Area Charts</a>
                                </li> -->
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="normal-table.html">Laporan Registrasi Pasien</a>
                                </li>
                                <li><a href="data-table.html">Laporan Tracking Obat</a>
                                </li>
                                <li><a href="data-table.html">Laporan Ambulance</a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="form-elements.html">Form Elements</a>
                                </li>
                                <li><a href="form-components.html">Form Components</a>
                                </li>
                                <li><a href="form-examples.html">Form Examples</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="notification.html">Notifications</a>
                                </li>
                                <li><a href="alert.html">Alerts</a>
                                </li>
                                <li><a href="modals.html">Modals</a>
                                </li>
                                <li><a href="buttons.html">Buttons</a>
                                </li>
                                <li><a href="tabs.html">Tabs</a>
                                </li>
                                <li><a href="accordion.html">Accordion</a>
                                </li>
                                <li><a href="dialog.html">Dialogs</a>
                                </li>
                                <li><a href="popovers.html">Popovers</a>
                                </li>
                                <li><a href="tooltips.html">Tooltips</a>
                                </li>
                                <li><a href="dropdown.html">Dropdowns</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="contact.html">Contact</a>
                                </li>
                                <li><a href="invoice.html">Invoice</a>
                                </li>
                                <li><a href="typography.html">Typography</a>
                                </li>
                                <li><a href="color.html">Color</a>
                                </li>
                                <li><a href="login-register.html">Login Register</a>
                                </li>
                                <li><a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
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
										<h2>Data Table</h2>
										<p>Selamat Datang <span class="bread-ntd">Admin</span></p>
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
  <!--awal modal-->
  <!-- Button trigger modal -->


  <!-- Modal Add -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Registrasi Pasien </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

  <form action="" method="POST">
        <div class="modal-body">

          <div class="form-example-int">
              <div class="form-group">

                  <label>No Registrasi</label>
                  <div class="nk-int-st">
                    <?php include 'kode_otomatis.php' ?>
                      <input type="hidden" name="no_resep"value="<?php echo $no_resep; ?>" class="form-control input-sm" placeholder="Input No Resep" required>
                  </div>
              </div>
          </div>
          <div class="form-example-int mg-t-15">
              <div class="form-group">
                  <label>Nama</label>
                  <div class="nk-int-st">
                      <input type="text" name="jml_obat" class="form-control input-sm" placeholder="Masukkan Nama Pasien" required>

                      <!-- <div class="form-group">
                          <label>Status</label>
                          <div class="nk-int-st">
                      <div class="custom-control custom-radio">
                        <input type="checkbox" id="customRadio1" name="status[]" value="belum terproses" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">belum terproses</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="checkbox" id="customRadio2" name="status[]" value="diproses" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">diproses</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="checkbox" id="customRadio3" name="status[]" value="selesai" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio3">selesai</label>
                      </div>
                    </div>
                  </div> -->
                  </div>
              </div>
          </div>
          <div class="form-example-int">
              <div class="form-group">

                  <label>Poli</label>
                  <div class="nk-int-st">
                      <input type="text" name="no_resep" class="form-control input-sm" placeholder="Pilih Poli" required>
                  </div>
              </div>
          </div>

          <div class="form-example-int">
              <div class="form-group">

                  <label>Dokter</label>
                  <div class="nk-int-st">
                      <input type="text" name="no_resep" class="form-control input-sm" placeholder="Pilih Dokter" required>
                  </div>
              </div>
          </div>

          <div class="form-example-int">
              <div class="form-group">

                  <label>Tanggal</label>
                  <div class="nk-int-st">
                      <input type="text" name="no_resep" class="form-control input-sm" placeholder="Pilih Tanggal" required>
                  </div>
              </div>
          </div>

          <div class="form-example-int">
              <div class="form-group">

                  <label>Jadwal</label>
                  <div class="nk-int-st">
                      <input type="text" name="no_resep" class="form-control input-sm" placeholder="Jadwal" required>
                  </div>
              </div>
          </div>

          <div class="form-example-int">
              <div class="form-group">

                  <label>Keluhan</label>
                  <div class="nk-int-st">
                      <input type="text" name="no_resep" class="form-control input-sm" placeholder="Keluhan" >
                  </div>
              </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name ="insertdata" class="btn btn-primary">Save Data</button>
        </div>
        </form>
      </div>
    </div>
  </div>




  <div class="container">
  <div class="breadcomb-list">
  <div class="card">
  <div class="card-body">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Data
  </button>
  </div>
  </div>
  </div>
  </div>



  <!--akhir modal Add -->

	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <!-- <div class="basic-tb-hd">
                            <h2>Basic Example</h2>
                            <p>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</p>
                        </div> -->
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <!-- <th>Dokter</th> -->
                                        <th>Tanggal</th>
                                        <!-- <th>Jadwal</th> -->
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                  <?php $i = 1; ?>
                                  <?php foreach ($rgs as $row) : ?>
                                    <tr>
                                        <td><?= $row["no_registrasi"];?></td>
                                        <td><?= $row["nama"];?></td>
                                        <td><?= $row["poli"];?></td>
                                        <!-- <td><?= $row["nama_dokter"];?></td> -->
                                        <td><?= $row["tanggal"];?></td>
                                        <!-- <td><?= $row["jadwal"];?></td> -->
                                        <td><?= $row["keluhan"];?></td>
                                        <td><?= $row["riwayat_sakit"];?></td>
                                        <td>
                                             <button type="button"class="btn btn-danger btn-xs deletebtn"><i class="fa fa-trash-o"></i>delete</button>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                  <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <!-- <th>Dokter</th> -->
                                        <th>Tanggal</th>
                                        <!-- <th>Jadwal</th> -->
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>

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

    <!-- awal delete modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data registrasi_pasien</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

  <form role="form" action="deleteregistrasi.php" method="POST">
          <div class="modal-body">

              <input type="hidden" name="delete_id" id="delete_id">

              <h4>Apakah anda yakin ingin menghapus data ini? </h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> No </button>
            <button type="submit" name ="deletedata" class="btn btn-primary"> Yes </button>
          </div>
          </form>

        </div>
      </div>
    </div>



    <!-- akhir delete modal -->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery

		============================================ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="../js/counterup/jquery.counterup.min.js"></script>
    <script src="../js/counterup/waypoints.min.js"></script>
    <script src="../js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="../js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="../js/flot/jquery.flot.js"></script>
    <script src="../js/flot/jquery.flot.resize.js"></script>
    <script src="../js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="../js/knob/jquery.knob.js"></script>
    <script src="../js/knob/jquery.appear.js"></script>
    <script src="../js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="../js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="../js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="../js/wave/waves.min.js"></script>
    <script src="../js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="../js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="../js/data-table/jquery.dataTables.min.js"></script>
    <script src="../js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="../js/tawk-chat.js"></script>

    <script>
    $(document).ready(function(){
      $('.deletebtn').on('click', function(){

          $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);

      });
    });

    </script>
</body>

</html>
