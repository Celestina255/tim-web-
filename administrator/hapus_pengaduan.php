<?php
include '../koneksi.php'; // sesuaikan jika perlu naik folder

// Validasi ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Cek apakah data dengan ID tersebut ada
    $cek = mysqli_query($con, "SELECT * FROM tb_contact WHERE id='$id'");
    if (mysqli_num_rows($cek) > 0) {
        // Hapus data
        $delete = mysqli_query($con, "DELETE FROM tb_contact WHERE id='$id'");
        if ($delete) {
            echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php?page=pengaduan';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data'); window.location.href='index.php?page=pengaduan';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='index.php?page=pengaduan';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php?page=pengaduan';</script>";
}
?>
