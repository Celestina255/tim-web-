<?php
include '../../koneksi.php';
$hari = $_POST['hari'];
$jam = $_POST['jam'];
$urutan = $_POST['urutan'];
mysqli_query($con, "INSERT INTO tb_jamkerja(hari, jam, urutan) VALUES ('$hari', '$jam', '$urutan')");
header("Location: ../index.php?page=jamkerja");
