<?php
include '../../koneksi.php';

$id          = $_POST['id'];
$nama        = $_POST['nama_kepala'];
$jabatan     = $_POST['jabatan'];
$isi         = $_POST['isi_sambutan'];

// jika upload foto baru
if ($_FILES['foto']['name'] != '') {
    $foto_name = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../../img/sambutan/$foto_name");

    $query = mysqli_query($con, "UPDATE tb_sambutan SET 
        nama_kepala = '$nama',
        jabatan = '$jabatan',
        isi_sambutan = '$isi',
        foto = '$foto_name'
        WHERE id = '$id'");
} else {
    $query = mysqli_query($con, "UPDATE tb_sambutan SET 
        nama_kepala = '$nama',
        jabatan = '$jabatan',
        isi_sambutan = '$isi'
        WHERE id = '$id'");
}

echo "<script>alert('Data berhasil diperbarui'); window.location = '../index.php?page=sambutan';</script>";
