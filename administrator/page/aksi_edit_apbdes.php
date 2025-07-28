<?php
include_once "../../koneksi.php";

// Fungsi konversi angka format Indonesia ke float
function convertToFloat($angka) {
    $angka = str_replace('.', '', $angka); // Hapus titik ribuan
    $angka = str_replace(',', '.', $angka); // Ubah koma menjadi titik desimal
    return (float)$angka;
}

// Pastikan form dikirim via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tahun = $_POST['tahun'];
    $pendapatan = convertToFloat($_POST['pendapatan']);
    $belanja = convertToFloat($_POST['belanja']);
    $penerimaan = convertToFloat($_POST['penerimaan']);
    $pengeluaran = convertToFloat($_POST['pengeluaran']);
    $surplus = convertToFloat($_POST['surplus']);

    // Update ke database
    $query = "UPDATE tb_apbdes SET 
                tahun = '$tahun',
                pendapatan = '$pendapatan',
                belanja = '$belanja',
                penerimaan = '$penerimaan',
                pengeluaran = '$pengeluaran',
                surplus = '$surplus'
              WHERE id = '$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href = '../index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid!'); window.history.back();</script>";
}
?>
