<?php
include_once "../../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($con, "DELETE FROM tb_apbdes WHERE id = '$id'");

    if ($query) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href = '../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.history.back();</script>";
}
