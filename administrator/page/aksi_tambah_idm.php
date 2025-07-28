<?php
include '../../koneksi.php';

if (isset($_POST['simpan'])) {
    $tahun          = $_POST['tahun'];
    $skor_idm       = $_POST['skor_idm'];
    $status_idm     = $_POST['status_idm'];
    $skor_iks       = $_POST['skor_iks'];
    $skor_ikl       = $_POST['skor_ikl'];
    $skor_ike       = $_POST['skor_ike'];
    $target_status  = $_POST['target_status'];

    $insert = mysqli_query($con, "INSERT INTO tb_idm (
        tahun, skor_idm, status_idm, skor_iks, skor_ikl, skor_ike, target_status
    ) VALUES (
        '$tahun', '$skor_idm', '$status_idm', '$skor_iks', '$skor_ikl', '$skor_ike', '$target_status'
    )");

    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); history.back();</script>";
    }
} else {
    echo "<script>alert('Akses tidak sah'); window.location='index.php?page=trans_idm';</script>";
}
?>
