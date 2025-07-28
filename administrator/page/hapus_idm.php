<?php
include_once "../../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($con, "DELETE FROM tb_idm WHERE id = '$id'");

    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location='../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='index.php?page=trans_idm';</script>";
}
?>
