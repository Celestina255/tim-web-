<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor_wa = mysqli_real_escape_string($con, $_POST['nomor_wa']);

    // Cek apakah sudah ada entri dengan nomor_wa
    $cek = mysqli_query($con, "SELECT id FROM tb_jamkerja WHERE nomor_wa IS NOT NULL LIMIT 1");

    if (mysqli_num_rows($cek) > 0) {
        // Update entri yang sudah punya nomor_wa
        mysqli_query($con, "UPDATE tb_jamkerja SET nomor_wa='$nomor_wa' WHERE nomor_wa IS NOT NULL");
    } else {
        // Update ke entri pertama (misalnya id=1)
        mysqli_query($con, "UPDATE tb_jamkerja SET nomor_wa='$nomor_wa' WHERE id=1 LIMIT 1");
    }

    header("Location: ../index.php?page=jamkerja&pesan=wa_berhasil");
    exit;
} else {
    echo "Akses tidak sah.";
}
