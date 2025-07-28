<?php
include '../../koneksi.php';

if (isset($_POST['update'])) {
    $id             = $_POST['id'];
    $tahun          = $_POST['tahun'];
    $skor_idm       = $_POST['skor_idm'];
    $status_idm     = $_POST['status_idm'];
    $skor_iks       = $_POST['skor_iks'];
    $skor_ikl       = $_POST['skor_ikl'];
    $skor_ike       = $_POST['skor_ike'];
    $target_status  = $_POST['target_status'];

    $update = mysqli_query($con, "UPDATE tb_idm SET
        tahun = '$tahun',
        skor_idm = '$skor_idm',
        status_idm = '$status_idm',
        skor_iks = '$skor_iks',
        skor_ikl = '$skor_ikl',
        skor_ike = '$skor_ike',
        target_status = '$target_status'
        WHERE id = '$id'
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); history.back();</script>";
    }
} else {
    echo "<script>alert('Akses tidak sah'); window.location='index.php?page=transparansi';</script>";
}
?>
