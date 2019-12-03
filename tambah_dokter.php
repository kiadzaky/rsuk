<?php
ob_start();
require_once('config.php');
require_once('database.php');

$connection = new Database($host, $user, $pass, $database);
if(@$_GET['act'] =='') {
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tambah Dokter | RSU Kaliwates Admin</title>
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
    <!-- Start Header Top Area -->
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
                        <li class="active"><a href="tambah_dokter.php"><i class="notika-icon notika-form"></i> Tambah Dokter</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Laporan</a>
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
                                <li><a href="index.php">Laporan Ambulance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar horizontal End-->
	<!-- Tambah dokter strart-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-form"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Data Dokter</h2>
										<p>Selamat datang di RSU Kaliwates<span class="bread-ntd">Admin</span></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-md-3">
								<div class="breadcomb-report">
									<button type="button" data-toggle="modal" data-target="#tambah"  class="btn btn-success btn-md"><i class="fa fa-plus"></i><i class="notika-icon notika-plus"></i></button>

                                    <div id="tambah" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" align="left">Tambah Data Dokter</h4>
                                                </div>
                                                <?php
                                                include 'config.php';
                                                function autonumber($tabel, $kolom, $lebar=0, $awalan=''){
                                                   
                                                    $host = "localhost";
                                                    $usr = "root";
                                                    $pwd = "kkhia1";
                                                    $dbname = "db_rsuk";
                                                    $koneksi = mysqli_connect($host, $usr, $pwd, $dbname);
                                                    if(mysqli_connect_error()){
                                                        echo 'database gagal dikoneksikan!'.mysqli_connect_error();
                                                    }
                                                    $auto = mysqli_query($koneksi, "select id_dokter from dokter order by id_dokter desc limit 1") or die(mysqli_error());
                                                    $jumlah_record = mysqli_num_rows($auto);
                                                    if($jumlah_record == 0)
                                                    $nomor = 1;
                                                   
                                                    else{
                                                        $row = mysqli_fetch_array($auto);
                                                        $nomor = intval(substr($row[0], strlen($awalan)))+1;
                                                    }
                                                    if($lebar>0)
                                                        $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
                                                    else
                                                        $angka=$awalan.$nomor;
                                                    return $angka;
                                                }
                                                ?>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                       <div class="form-group" align="left">
                                                           <label class="control-label" for="id_dokter">ID Dokter</label>
                                                           <input type="text" name="id_dokter" class="form-control" id="id_dokter" value="<?= autonumber("dokter", "id_dokter", "3", "DR") ?>" required="">       
                                                       </div> 
                                                       <div class="form-group" align="left">
                                                           <label class="control-label" for="nama_dokter">Nama Dokter</label>
                                                           <input type="text" name="nama_dokter" class="form-control" id="nama_dokter" required="">
                                                       </div> 
                                                       <div class="form-group" align="left">
                                                           <label class="control-label" for="foto">Foto</label>
                                                           <input type="file" name="foto" class="form-control" id="foto" required="">
                                                       </div> 
                                                       <div class="form-group" align="left">
                                                           <label class="control-label" for="id_poli">Poli</label>
                                                            <select name="id_poli" id="poli" class="form-control">
                                                          <?php
                                                          class Poli {
                                                                private $mysqli;

                                                                function __construct($conn) {
                                                                    $this->mysqli = $conn;
                                                                }
                                                                public function tampil($id = null) {
                                                                    $db = $this->mysqli->conn;
                                                                    $sql = "SELECT * FROM poli";
                                                                    if($id != null) {
                                                                        $sql .= "WHERE id_poli = $id";
                                                                    }
                                                                    $query = $db->query($sql) or die ($db->error);
                                                                    return $query;
                                                                }
                                                            }
                                                          $pl = new Poli($connection);
                                                          $tampil = $pl->tampil();
                                                            while($data = $tampil->fetch_object()) {
                                                            ?>
                                                            ?>
                                                            <option value="<?php echo $data->id_poli ?>"><?php echo $data->poli;?></option>
                                                            <?php }?>
                                                         </select>
                                                       </div> 
                                                       <div class="form-group" align="left">
                                                           <label class="control-label" for="id_jadwal">Jadwal</label>
                                                          <select name="id_jadwal" id="jadwal" class="form-control">
                                                          <?php
                                                          class Jadwal {
                                                                private $mysqli;

                                                                function __construct($conn) {
                                                                    $this->mysqli = $conn;
                                                                }
                                                                public function tampil($id = null) {
                                                                    $db = $this->mysqli->conn;
                                                                    $sql = "SELECT * FROM jadwal";
                                                                    if($id != null) {
                                                                        $sql .= "WHERE id_jadwal = $id";
                                                                    }
                                                                    $query = $db->query($sql) or die ($db->error);
                                                                    return $query;
                                                                }
                                                            }
                                                          $jd = new Jadwal($connection);
                                                          $tampil = $jd->tampil();
                                                            while($data = $tampil->fetch_object()) {
                                                            ?>
                                                            ?>
                                                            <option value="<?php echo $data->id_jadwal ?>"><?= $data->jadwal;?></option>
                                                            <?php }?>
                                                         </select>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" class="btn btn-danger btn-md" style="background-color: crimson;"><i class="fa fa-reset"></i>Reset</button>
                                                        <input type="submit" class="btn btn-success btn-xs" style="background-color: cornflowerblue;" name="tambah" value="Simpan">
                                                    </div>
                                                </form>
                                                <?php
                                                class Dokter {
                                                    private $mysqli;

                                                    function __construct($conn) {
                                                        $this->mysqli = $conn;
                                                    }
                                                    public function tampil($id = null) {
                                                        $db = $this->mysqli->conn;
                                                        $sql = "SELECT * FROM `dokter` JOIN poli ON dokter.id_poli = poli.id_poli JOIN jadwal ON dokter.id_jadwal = jadwal.id_jadwal";
                                                        if($id != null) {
                                                            $sql .= "WHERE id_dokter = $id";
                                                        }
                                                        $query = $db->query($sql) or die ($db->error);
                                                        return $query;
                                                    }
                                                    public function tambah($id_dokter, $nama_dokter, $foto, $id_poli, $id_jadwal) {
                                                        $db = $this->mysqli->conn;
                                                        return $db->query("INSERT INTO dokter VALUES ('$id_dokter', '$nama_dokter', '$foto','$id_poli', '$id_jadwal')") or die ($db->error);
                                                        
                                                    }
                                                    public function edit($sql) {
                                                        $db = $this->mysqli->conn;
                                                        $db->query($sql) or die ($db->error);
                                                    }                   
                                                    // function __destruct() {
                                                    //     $db = $this->mysqli->conn;
                                                    //     $db->close();
                                                    // }
                                                }
                                                $dr = new Dokter($connection);
                                                
                                                if(@$_POST['tambah']) {
                                                    $id_dokter = $connection->conn->real_escape_string($_POST['id_dokter']);
                                                    $nama_dokter = $connection->conn->real_escape_string($_POST['nama_dokter']);
                                                    $id_poli = $connection->conn->real_escape_string($_POST['id_poli']);
                                                    $id_jadwal = $connection->conn->real_escape_string($_POST['id_jadwal']);
                                                    $extensi = explode(".", $_FILES['foto']['name']);
                                                    $foto = "dr-".round(microtime(true)).".".end($extensi);
                                                    $sumber = $_FILES['foto']['tmp_name'];
                                                    $upluad = move_uploaded_file($sumber, "img/dokter/".$foto);
                                                    if($upluad){
                                                        $query = $dr->tambah($id_dokter, $nama_dokter, $foto, $id_poli, $id_jadwal);
                                                        if($query){
                                                            header("location:tambah_dokter.php");
                                                        }else{
                                                            echo mysqli_error();
                                                            }
                                                    }else {
                                                        echo "<script>alert('Upload foto gagal!')</script>";
                                                    }   
                                                }
                                                ?>
                                            </div>
                                        </div> 
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Tambah dokter End-->
    <!-- Menampilkan data dokter Start-->
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
                                        <th>ID Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Poli</th>
                                        <th>Jadwal</th>  
                                        <th>Opsi</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampil = $dr->tampil();
                                    while($data = $tampil->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id_dokter; ?></td>
                                        <td><?php echo $data->nama_dokter; ?></td>
                                        
                                            
                                        <td><?php echo $data->poli; ?></td>
                                        <td><?php echo $data->jadwal; ?></td>
                                        <td align="center">
                                            <a id="edit_dr" data-toggle="modal" data-target="#edit" data-id="<?php echo $data->id_dokter; ?>" data-nama="<?php echo $data->nama_dokter; ?>" data-foto="<?php echo $data->foto; ?>" data-poli="<?php echo $data->id_poli; ?>" data-jadwal="<?php echo $data->id_jadwal; ?>">
                                           <button class="btn btn-primary btn-xs editbtn"><i class="fa fa-edit "></i>Edit</button></a>
                                           <a href="?page=tambah_dokter&act=del&id=<?php echo $data->id_dokter; ?>" onclick="return confirm('Yakin akan menghapus data ini?')">
                                           <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Poli</th>
                                        <th>Jadwal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menampilkan data dokter End-->
    <!-- Hapus data dokter Start-->
    <?php
    } else if (@$_GET['act'] =='del') {
        class Dokter {
             private $mysqli;

            function __construct($conn) {
                $this->mysqli = $conn;
            }
            public function hapus($id) {
                $db = $this->mysqli->conn;
                $db->query("DELETE FROM dokter WHERE id_dokter='$id'") or die($db->error);
            }
        }
        $dr = new Dokter($connection);
        $dr->hapus($_GET['id']);
        header("location:tambah_dokter.php");
    }
    ?>
    <!-- Hapus data dokter End-->
      <!-- awal edit modal reff -->
      <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Dokter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

  <form role="form" action="proses_edit_dokter.php" method="POST">
          <div class="modal-body">
            <div class="form-example-int">
              <input type="text" name="update_id" id="update_id">
                <div class="form-group">
                    <label>Id Dokter</label>
                    <div class="nk-int-st">
                        <input type="text" name="id_dokter" id="id_dokter" class="form-control input-sm" placeholder="Input id dokter" >
                    </div>
                </div>
            </div>
            <div class="form-example-int mg-t-15">
                <div class="form-group">
                    <label>Nama Dokter</label>
                    <div class="nk-int-st">
                        <input type="text" name="nama_dokter" id="nama_dokter" class="form-control input-sm" placeholder="Masukkan nama dokter">
                    </div>
                </div>
            </div>
            <div class="form-example-int mg-t-15">
                <div class="form-group">
                    <label>Poli</label>
                    <div class="nk-int-st">
                        <input type="text" name="id_poli" id="id_poli" class="form-control input-sm" placeholder="Masukkan poli">
                    </div>
                </div>
            </div>
            <div class="form-example-int mg-t-15">
                <div class="form-group">
                    <label>Jadwal</label>
                    <div class="nk-int-st">
                        <input type="text" name="id_jadwal" id="id_jadwal" class="form-control input-sm" placeholder="Masukkan jadwal">
                    </div>
                </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name ="updatedata" class="btn btn-primary">Save Data</button>
          </div>
</div>
</div>
</div>
</div>
    <!-- modal Edit data dokter Start -->
   


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
    <script>
      $(document).ready(function (){
        $('.editbtn').on('click', function(){
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function (){
              return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#id_dokter').val(data[1]);
            $('#nama_dokter').val(data[2]);
            $('#id_poli').val(data[3]);
            $('#id_jadwal').val(data[4]);
        });

      });
    
    
    </script>
    <!-- <script type="text/javascript">
    $(document).on("click", "#edit_dr", function() {
        var id_dokter = $(this).data('id');
        var nama_dokter = $(this).data('nama');
        var foto = $(this).data('foto');
        var id_poli = $(this).data('poli');
        var id_jadwal = $(this).data('jadwal');
        $("#modal-edit #id_dokter").val(id_dokter);
        $("#modal-edit #nama_dokter").val(nama_dokter);
        $("#modal-edit #pict").attr("src", "img/dokter/" + foto);
        $("#modal-edit #id_poli").val(id_poli);
        $("#modal-edit #id_jadwal").val(id_jadwal);
    })
    $(document).ready(function(e) {
        $("#form").on("submit", (function(e) {
            e.preventDefault();
                $.ajax({
                    url : 'proses_edit_dokter.php',
                    type : 'POST',
                    data : new FormData(this),
                    contentType : false,
                    cache : false,
                    processData : false,
                    success : function(msg) {
                    $('.table').html(msg);
                    }
                });
        }));
    })
    </script>  -->
</body>
</html>