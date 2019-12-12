<?php
include 'functions.php';
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
  <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
  <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
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
            <li><a href="registrasi_pasien.php"><i class="notika-icon notika-menus"></i> Registrasi Pasien</a>
            </li>
            <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-alarm"></i> Ambulance</a>
            </li>
            <li><a  href="tracking_obat.php"><i class="notika-icon notika-edit"></i> Tracking Obat</a>
            </li>
            <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-form"></i> Data Master</a>
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
            <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index_dokter.php">Data Dokter</a>
                                </li>
                                <li><a href="index_user.php">Data User</a>
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
                <li><a href="laporanregistrasipasien.php">Laporan Registrasi Pasien</a>
                </li>
                <li><a href="laporanobat.php">Laporan Tracking Obat</a>
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
                    <h2>Laporan Ambulance</h2>
                    <p>Selamat datang di RSU Kaliwates<span class="bread-ntd">Admin</span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                  <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i></i>
                    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            
            echo '<a style="color:white;" type="button" href="print_ambulance.php?filter=1&tanggal='.$_GET['tanggal'].'" class="notika-icon notika-sent"></a>';
             // Tampilkan Laporan Registrasi Pasien sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            
            echo '<a style="color:white;" type="button" href="print_ambulance.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'" class="notika-icon notika-sent"></a>';
           
        }else{ // Jika filter nya 3 (per tahun)
            
            echo '<a style="color:white;" type="button" href="print_ambulance.php?filter=3&tahun='.$_GET['tahun'].'" class="notika-icon notika-sent"></a>';
            
            }
    }else{ // Jika user tidak mengklik tombol tampilkan

        echo '<a style="color:white;" type="button" href="print_ambulance.php" class="notika-icon notika-sent"></a>';
        
    }
    ?>
                  </button>
                </div>
              </div>
            </div>
            <br>
                        <br>
      <form method="get" action="">
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
                $query = "SELECT YEAR(tanggal) AS tahun FROM req_ambulance GROUP BY YEAR(tanggal)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($link, $query); // Eksekusi/Jalankan query dari variabel $query
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit">Tampilkan</button>
        <a href="laporan_ambulan.php">Reset Filter</a>
    </form>
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
              
              
              <?php 
              if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                // Cek apakah user telah memilih filter dan klik tombol tampilkan        
                $filter = $_GET['filter'];
                // Ambil data filder yang dipilih user        
                if ($filter == '1') {
                  // Jika filter nya 1 (per tanggal)            
                  $tanggal = date('d-m-y', strtotime($_GET['tanggal']));
                  echo '<b>Data Laporan Ambulance Tanggal ' . $tanggal . '</b><br /><br />';
                  
                  $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE DATE(tanggal)='" . $_GET['tanggal'] . "'";
                  // Tampilkan data Laporan Ambulance sesuai tanggal yang diinput oleh user pada filter        
                } else if ($filter == '2') { // Jika filter nya 2 (per bulan)            
                  $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                  echo '<b>Data Laporan Ambulance Bulan ' . $nama_bulan[$_GET['bulan']] . ' ' . $_GET['tahun'] . '</b><br /><br />';
                  
                  $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE MONTH(tanggal)='" . $_GET['bulan'] . "' AND YEAR(tanggal)='" . $_GET['tahun'] . "'";
                  // Tampilkan data Laporan Ambulance sesuai bulan dan tahun yang diinput oleh user pada filter        
                } else {
                  // Jika filter nya 3 (per tahun)            
                  echo '<b>Data Laporan Ambulance Tahun ' . $_GET['tahun'] . '</b><br /><br />';
                  
                  $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik WHERE YEAR(tanggal)='" . $_GET['tahun'] . "'";
                  // Tampilkan data Laporan Ambulance sesuai tahun yang diinput oleh user pada filter        
                }
              } else {
                // Jika user tidak mengklik tombol tampilkan        
                echo '<b>Semua Data Laporan Ambulance</b><br /><br />';
                
                $query = "SELECT * FROM req_ambulance JOIN ambulance ON req_ambulance.id_ambulance = ambulance.id_ambulance JOIN akun ON req_ambulance.nik = akun.nik ORDER BY tanggal";
                // Tampilkan semua data Laporan Ambulance diurutkan berdasarkan tanggal   
              }
              ?>
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
                <?php
                $sql = mysqli_query($conn, $query);
                // Eksekusi/Jalankan query dari variabel $query    
                $row = mysqli_num_rows($sql);
                // Ambil jumlah data dari hasil eksekusi $sql    
                if ($row > 0) {
                  // Jika jumlah data lebih dari 0 (Berarti jika data ada)        
                  while ($data = mysqli_fetch_array($sql)) {
                    // Ambil semua data dari hasil eksekusi $sql            
                    // $tanggal = date('d-m-Y', strtotime($data['tanggal']));
                    // Ubah format tanggal jadi dd-mm-yyyy            
                    echo "<tr>";
                    echo "<td>" . $data['ambulance'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['keluhan'] . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['link'] . "</td>";
                    echo "</tr>";
                  }
                } else {
                  // Jika data tidak ada        
                  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                }
                ?>
              </table>
              <script>
                $(document).ready(function() {
                  // Ketika halaman selesai di load        
                  $('.input-tanggal').datepicker({
                    dateFormat: 'yy-mm-dd'
                    // Set format tanggalnya jadi yyyy-mm-dd
                  });
                  $('#form-tanggal, #form-bulan, #form-tahun').hide();
                  // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya        
                  $('#filter').change(function() {
                    // Ketika user memilih filter            
                    if ($(this).val() == '1') {
                      // Jika filter nya 1 (per tanggal)                
                      $('#form-bulan, #form-tahun').hide();
                      // Sembunyikan form bulan dan tahun                
                      $('#form-tanggal').show();
                      // Tampilkan form tanggal            
                    } else if ($(this).val() == '2') {
                      // Jika filter nya 2 (per bulan)                
                      $('#form-tanggal').hide();
                      // Sembunyikan form tanggal                
                      $('#form-bulan, #form-tahun').show();
                      // Tampilkan form bulan dan tahun            
                    } else {
                      // Jika filternya 3 (per tahun)                
                      $('#form-tanggal, #form-bulan').hide();
                      // Sembunyikan form tanggal dan bulan                
                      $('#form-tahun').show(); // Tampilkan form tahun            
                    }
                    $('#form-tanggal input, #form-bulan select, #form-tahun select').val('');
                    // Clear data pada textbox tanggal, combobox bulan & tahun        
                  })
                })
              </script>
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
  <script src="jquery-ui/jquery-ui.min.js"></script>
</body>

</html>