<?php
include_once "../../koneksi.php";

// Fungsi untuk konversi angka format Indonesia ke float
function convertToFloat($angka) {
    $angka = str_replace('.', '', $angka); // Hapus titik ribuan
    $angka = str_replace(',', '.', $angka); // Ganti koma menjadi titik desimal
    return (float)$angka;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tahun        = $_POST['tahun'];
    $pendapatan   = convertToFloat($_POST['pendapatan']);
    $belanja      = convertToFloat($_POST['belanja']);
    $penerimaan   = convertToFloat($_POST['penerimaan']);
    $pengeluaran  = convertToFloat($_POST['pengeluaran']);
    $surplus      = convertToFloat($_POST['surplus']);

    $query = "INSERT INTO tb_apbdes (tahun, pendapatan, belanja, penerimaan, pengeluaran, surplus)
              VALUES ('$tahun', '$pendapatan', '$belanja', '$penerimaan', '$pengeluaran', '$surplus')";

    $insert = mysqli_query($con, $query);

    if ($insert) {
        echo "<script>alert('Data APBDes berhasil ditambahkan.'); window.location='../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!'); history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid!'); history.back();</script>";
}
?>
