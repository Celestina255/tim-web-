<?php
include_once "../../koneksi.php"; // Sesuaikan path ke koneksi

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $hapus = mysqli_query($con, "DELETE FROM tb_permohonan WHERE id='$id'");

    if ($hapus) {
        header("Location: ../index.php?page=permohonan"); // redirect
        exit;
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
