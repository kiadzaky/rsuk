<?php
$conn = mysqli_connect("localhost", "root", "", "db_rsuk");
$db = mysqli_select_db($conn, 'db_rsuk');

if (isset($_POST['deletedata'])) {
    $id = $_POST['id_delete'];


    $query = "DELETE FROM dokter WHERE id_dokter='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Delete")</script>';
        header('Location: index_dokter.php');
    } else {
        echo '<script> alert("Data not Delete")</script>';
    }
}
