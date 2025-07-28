<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $tahun = $_POST['tahun'];
    $skor_idm = $_POST['skor_idm'];
    $status_idm = $_POST['status_idm'];
    $skor_iks = $_POST['skor_iks'];
    $skor_ikl = $_POST['skor_ikl'];
    $skor_ike = $_POST['skor_ike'];
    $target_status = $_POST['target_status'];

    $query = mysqli_query($con, "INSERT INTO tb_idm (tahun, skor_idm, status_idm, skor_iks, skor_ikl, skor_ike, target_status)
              VALUES ('$tahun', '$skor_idm', '$status_idm', '$skor_iks', '$skor_ikl', '$skor_ike', '$target_status')");

    if ($query) {
        echo "<script>alert('Data berhasil disimpan'); window.location='index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}
?>

<div class="container-fluid">
    <h3 class="mt-4 mb-3">Tambah Data IDM</h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Skor IDM</label>
            <input type="text" name="skor_idm" class="form-control" step="any" required>
        </div>
        <div class="form-group">
            <label>Status IDM</label>
            <select name="status_idm" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Mandiri">Mandiri</option>
                <option value="Maju">Maju</option>
                <option value="Berkembang">Berkembang</option>
                <option value="Tertinggal">Tertinggal</option>
                <option value="Sangat Tertinggal">Sangat Tertinggal</option>
            </select>
        </div>
        <div class="form-group">
            <label>Skor IKS</label>
            <input type="text" name="skor_iks" class="form-control" step="any" required>
        </div>
        <div class="form-group">
            <label>Skor IKL</label>
            <input type="text" name="skor_ikl" class="form-control" step="any" required>
        </div>
        <div class="form-group">
            <label>Skor IKE</label>
            <input type="text" name="skor_ike" class="form-control" step="any" required>
        </div>
        <div class="form-group">
            <label>Target Status</label>
            <select name="target_status" class="form-control" required>
                <option value="">-- Pilih Target --</option>
                <option value="Mandiri">Mandiri</option>
                <option value="Maju">Maju</option>
                <option value="Berkembang">Berkembang</option>
                <option value="Tertinggal">Tertinggal</option>
                <option value="Sangat Tertinggal">Sangat Tertinggal</option>
            </select>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php?page=trans_idm" class="btn btn-secondary">Kembali</a>
    </form>
</div>
