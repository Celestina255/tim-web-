<?php
include_once "../../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapus = mysqli_query($con, "DELETE FROM tb_monografi WHERE id='$id'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus'); window.location='../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); history.back();</script>";
}
