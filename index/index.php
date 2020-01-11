    <?php
session_start();
if($_SESSION['nik']!=null){


    if(isset($_GET['antrian'])){
        if($_GET['antrian']=='index'){
            include '../antrian/index.php';
        }
        elseif($_GET['antrian']=='no_antrian'){
            include '../antrian/no_antrian.php';
        }
        elseif($_GET['antrian']=='antrian_pasien'){
            include '../antrian/antrian_pasien.php';
        }
    }

    if(isset($_GET['pasien'])){
        if($_GET['pasien']=='index'){
            include '../pasien/index_user.php';
        }
    }

    if (isset($_GET['ambulance'])) {
        if($_GET['ambulance']=='darurat'){
            include '../ambulance/ambulance-darurat.php';
        }
        elseif($_GET['ambulance']=='jenazah'){
            include '../ambulance/penjemputan-jenazah.php';
        }
    }

    if (isset($_GET['obat'])) {
        if($_GET['obat']=='index'){
            include '../tracking_obat/tracking_obat.php';
        }
    }

    if (isset($_GET['dokter'])) {
        if($_GET['dokter']=='index'){
            include '../dokter/index_dokter.php';
        }
    }

    if (isset($_GET['laporan'])) {
        if($_GET['laporan']=='registrasi'){
            include '../laporan/laporanregistrasipasien.php';
        }
        elseif($_GET['laporan']=='obat'){
            include '../laporan/laporanobat.php';
        }
        elseif($_GET['laporan']=='ambulance'){
            include '../laporan/laporan_ambulan.php';
        }
    }
}else{
    header('location: ../login-register.php');
}
?>
