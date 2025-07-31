<?php
include '../../koneksi.php';

$id        = $_POST['id'];
$telepon   = $_POST['telepon'];
$email     = $_POST['email'];
$instagram = $_POST['instagram'];
$facebook  = $_POST['facebook'];
$whatsapp  = $_POST['whatsapp'];
$youtube   = $_POST['youtube'];

$query = "UPDATE tb_hubungi SET 
    telepon='$telepon',
    email='$email',
    instagram='$instagram',
    facebook='$facebook',
    whatsapp='$whatsapp',
    youtube='$youtube'
    WHERE id='$id'";

$update = mysqli_query($con, $query);

if ($update) {
   echo "<script>alert('Data berhasil diperbarui!');window.location.href='../index.php?page=hubungikami';</script>";
} else {
    echo "<script>alert('Gagal menyimpan data!');window.history.back();</script>";
}
