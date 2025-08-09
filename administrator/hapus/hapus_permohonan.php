<?php
include_once "../../koneksi.php"; // Sesuaikan path ke koneksi

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Menghapus dari tabel tb_permohonan
    $hapus_permohonan = mysqli_query($con, "DELETE FROM tb_permohonan WHERE id='$id'");

    // Menghapus dari tabel tb_buatsendiri
    $hapus_buatsendiri = mysqli_query($con, "DELETE FROM tb_buatsendiri WHERE id='$id'");

    if ($hapus_permohonan || $hapus_buatsendiri) {
        header("Location: ../index.php?page=permohonan"); // redirect
        exit;
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
