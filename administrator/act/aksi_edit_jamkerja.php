<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = $_POST['id'];
    $hari      = $_POST['hari'];
    $jam       = $_POST['jam'];
    $urutan    = $_POST['urutan'];
    $nomor_wa  = $_POST['nomor_wa'];

    $query = mysqli_query($con, "UPDATE tb_jamkerja SET 
        hari = '$hari',
        jam = '$jam',
        urutan = '$urutan',
        nomor_wa = '$nomor_wa'
        WHERE id = '$id'
    ");

    if ($query) {
        header("Location: ../index.php?page=jamkerja&pesan=update_berhasil");
        exit;
    } else {
        echo "Gagal mengupdate data!";
    }
} else {
    echo "Akses tidak sah.";
}
