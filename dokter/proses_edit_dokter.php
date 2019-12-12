<?php
require_once('config.php');
require_once('database.php');
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
                                                    public function edit($sql) {
                                                        $db = $this->mysqli->conn;
                                                        $db->query($sql) or die ($db->error);
                                                    }                   
                                                }

$connection = new Database($host, $user, $pass, $database);
$dr = new Dokter($connection);

$id_dokter = $connection->conn->real_escape_string($_POST['id_dokter']);
$nama_dokter = $connection->conn->real_escape_string($_POST['nama_dokter']);
$id_poli = $connection->conn->real_escape_string($_POST['id_poli']);
$id_jadwal = $connection->conn->real_escape_string($_POST['id_jadwal']);
$pict = $_FILES['foto']['name'];
$extensi = explode(".", $_FILES['foto']['name']);
$foto = "dr-".round(microtime(true)).".".end($extensi);
$sumber = $_FILES['foto']['tmp_name'];

if($pict == '') {
    $dr->edit("UPDATE dokter SET id_dokter = '$id_dokter', nama_dokter = '$nama_dokter',id_poli = '$id_poli', id_jadwal = '$id_jadwal' WHERE id_dokter = '$id_dokter'");
   echo "<script>window.location='?page=tambah_dokter';</script>";
} else {
    $foto_awal = $dr->tampil($id_dokter)->fetch_object()->foto;
    unink("img/dokter/".$foto_awal);

    $upload = move_uploaded_file($sumber, "img/dokter/" .$foto);
    if($upload) {
        $dr->edit("UPDATE dokter SET id_dokter = '$id_dokter', nama_dokter = '$nama_dokter', foto = '$foto', id_poli = '$id_poli', id_jadwal = '$id_jadwal' WHERE id_dokter = '$id_dokter'")
      echo "<script>window.location='?page=tambah_dokter';</script>";
    } else {
        echo "<script>alert('Upload gambar gagal!')</script>";
    }
}
?>     