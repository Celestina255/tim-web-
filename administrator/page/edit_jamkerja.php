<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tb_jamkerja WHERE id='$id'"));
?>

<h3 class="mb-4">Edit Jam Kerja</h3>

<form action="act/aksi_edit_jamkerja.php" method="POST">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <div class="form-group mb-3">
        <label for="hari">Hari</label>
        <input type="text" name="hari" id="hari" class="form-control" value="<?= $data['hari']; ?>" required>
    </div>

    <div class="form-group mb-3">
        <label for="jam">Jam/Waktu</label>
        <input type="text" name="jam" id="jam" class="form-control" value="<?= $data['jam']; ?>" required>
    </div>

    <div class="form-group mb-4">
        <label for="urutan">Urutan</label>
        <input type="number" name="urutan" id="urutan" class="form-control" value="<?= $data['urutan']; ?>">
    </div>

    <div class="form-group mb-4">
        <label for="nomor_wa">Nomor WhatsApp (Opsional)</label>
        <input type="text" name="nomor_wa" id="nomor_wa" class="form-control" value="<?= $data['nomor_wa']; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="?page=jamkerja" class="btn btn-secondary">Kembali</a>
</form>
