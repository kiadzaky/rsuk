<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<?php 
        include '../config.php';
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <link rel="stylesheet" href="../jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="../js/jquery.min.js"></script> <!-- Load file jquery -->

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laporan Registrasi Pasien | RSU Kaliwates Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
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
        <link rel="stylesheet" href="../jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="../js/jquery.min.js"></script> <!-- Load file jquery -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
<?php include '../part/header.php' ?>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
   <?php include '../part/navbar_v.php' ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
  <?php include '../part/navbar_h.php' ?>
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
										<h2>Laporan Registrasi Pasien</h2>
										<p>Selamat datang di RSU Kaliwates <span class="bread-ntd">Admin</span></p>
									</div>


								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                  <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn">

                    <i></i>
                                    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            
            echo '<a style="color:white;" type="button" href="../laporan/cetakregispasien.php?filter=1&tanggal='.$_GET['tanggal'].'" class="notika-icon notika-sent"></a>';
             // Tampilkan Laporan Registrasi Pasien sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            
            echo '<a style="color:white;" type="button" href="../laporan/cetakregispasien.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'" class="notika-icon notika-sent"></a>';
           
        }else{ // Jika filter nya 3 (per tahun)
            
            echo '<a style="color:white;" type="button" href="../laporan/cetakregispasien.php?filter=3&tahun='.$_GET['tahun'].'" class="notika-icon notika-sent"></a>';
            
            }
    }else{ // Jika user tidak mengklik tombol tampilkan

        echo '<a style="color:white;" type="button" href="../laporan/cetakregispasien.php" class="notika-icon notika-sent"></a>';
        
    }
    ?>
                  </button>

                </div>
              </div>
						</div>

                        <br>
                        <br>
      <form method="get" action="../laporan/laporanregistrasipasien.php">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                $query = "SELECT YEAR(tanggal) AS tahun FROM pasien GROUP BY YEAR(tanggal)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($link, $query); // Eksekusi/Jalankan query dari variabel $query
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit">Tampilkan</button>
        <a href="../index/?laporan=registrasi"><h3>Reset Halaman</h3></a>
    </form>
    
    </div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                      
                        <div class="table-responsive">
                        <body class="app sidebar-mini rtl">



<!-- Modal -->
<?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));
            echo '<b>Laporan Registrasi Pasien Tanggal '.$tgl.'</b><br />';
           
            $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli 
                                             WHERE DATE(tanggal)='".$_GET['tanggal']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
            echo '<b>Laporan Registrasi Pasien Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br />';
            
            $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli WHERE MONTH(tanggal)='".$_GET['bulan']."' AND YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Laporan Registrasi Pasien Tahun '.$_GET['tahun'].'</b><br />';
            
            $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli WHERE YEAR(tanggal)='".$_GET['tahun']."'"; // Tampilkan Laporan Registrasi Pasien sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Laporan Registrasi Pasien</b><br />';
        
        $query = "SELECT pasien.no_registrasi, pasien.keluhan, 
                                            pasien.riwayat_sakit, pasien.tanggal, akun.nama,
                                            poli.poli FROM pasien
                                             join akun on 
                                            pasien.nik = akun.nik join poli on pasien.id_poli = poli.id_poli ORDER BY tanggal"; // Tampilkan semua Laporan Registrasi Pasien diurutkan berdasarkan tanggal
    }
    ?>
  
  
    <table id="data-table-basic" class="table table-striped">
                                <br>
                                <thead>
                                    <tr>
                                        
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <th>Tanggal</th>
                                        
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
                                    </tr>
                                    
                                </thead>
                                <tfoot>
                                    <tr>
                                        
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        
                                        <th>Tanggal</th>
                                        
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
                                    </tr>
                                    
                                </tfoot>

    <?php
    $sql = mysqli_query($link, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            $tanggal = date('d-m-Y', strtotime($data['tanggal'])); // Ubah format tanggal jadi dd-mm-yyyy
            echo "<tr>";
            echo "<td>".$data['no_registrasi']."</td>";
            echo "<td>".$data['nama']."</td>";
            echo "<td>".$data['poli']."</td>";
            
            echo "<td>".$data['tanggal']."</td>";
            
            echo "<td>".$data['keluhan']."</td>";
            echo "<td>".$data['riwayat_sakit']."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>
    </table>
    
<!--end modal-->


                        <!--    <table id="data-table-basic" class="table table-striped">
                                <br>
                                <thead>
                                    <tr>
                                        
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Jadwal</th>
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php
                                    include 'filter.php';
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Poli</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal</th>
                                        <th>Jadwal</th>
                                        <th>Keluhan</th>
                                        <th>Riwayat Sakit</th>
                                    </tr>
                                    
                                </tfoot>
                            </table>
                        -->
                        
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?php include '../part/footer.php' ?>
    <!-- End Footer area-->
    <!-- jquery
   
		============================================ -->
        <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
    <script src="../jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui 
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
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
    <script src="../jquery-ui/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->
</body>

</html>