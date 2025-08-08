<?php
include '../../koneksi.php';

$id   = $_POST['id'];
$ket  = $_POST['keterangan'];

$terima = isset($_POST['terima']);
$tolak  = isset($_POST['tolak']);

if ($terima) {
    // Update status jadi diterima
    mysqli_query($con, "UPDATE tb_permohonan SET keterangan='$ket', status='diterima' WHERE id='$id'");
    echo "<script>alert('Permohonan Surat Diterima'); window.location = '../index.php?page=process_permohonan_all';</script>";
} elseif ($tolak) {
    // Cek apakah alasan penolakan kosong
    if (empty($ket)) {
        echo "<script>alert('Silahkan Isi Alasan Penolakan Surat'); window.location = '../index.php?page=acc_permohonan&id=$id';</script>";
        exit();
    }

    // Update status jadi ditolak
    mysqli_query($con, "UPDATE tb_permohonan SET keterangan='$ket', status='ditolak' WHERE id='$id'");
    echo "<script>alert('Permohonan Surat Ditolak'); window.location = '../index.php?page=process_permohonan_all';</script>";
}
?>


