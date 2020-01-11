<?php
$conn = mysqli_connect("localhost", "root", "", "db_rsuk");
$db = mysqli_select_db($conn, 'db_rsuk');

if (isset($_POST['updatedata'])) {
    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $id_poli = $_POST['poli'];
    $id_jadwal = $_POST['id_jadwal'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE dokter SET nama_dokter='$nama_dokter',id_poli='$id_poli',id_jadwal='$id_jadwal',keterangan='$keterangan' WHERE id_dokter='$id_dokter' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Update")</script>';
        header('Location: index_dokter.php');
    } else {
        echo '<script> alert("Data not Update")</script>';
    }
}
?>
