<?php
include_once "../koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM tb_apbdes WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='../index.php?page=trans_apbdes';</script>";
    exit;
}
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">EDIT DATA APBDES</h3>

    <form action="page/aksi_edit_apbdes.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Tahun</label>
                <input type="number" name="tahun" class="form-control" value="<?= $data['tahun']; ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Pendapatan</label>
                <input type="number" name="pendapatan" class="form-control" value="<?= $data['pendapatan']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label>Belanja</label>
                <input type="number" name="belanja" class="form-control" value="<?= $data['belanja']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label>Penerimaan Pembiayaan</label>
                <input type="number" name="penerimaan" class="form-control" value="<?= $data['penerimaan']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label>Pengeluaran Pembiayaan</label>
                <input type="number" name="pengeluaran" class="form-control" value="<?= $data['pengeluaran']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label>Surplus/Defisit</label>
                <input type="number" name="surplus" class="form-control" value="<?= $data['surplus']; ?>">
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="index.php?page=transparansi" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>