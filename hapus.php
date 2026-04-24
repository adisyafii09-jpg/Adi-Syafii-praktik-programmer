<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tbl_pasien WHERE id_pasien=$id");

header("Location: index.php");
?>