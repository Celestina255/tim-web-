<form action="../aksi/tambah_jamkerja.php" method="POST">
    <div class="form-group">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Jam/Waktu</label>
        <input type="text" name="jam" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Urutan</label>
        <input type="number" name="urutan" class="form-control" value="1">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="?page=jamkerja" class="btn btn-secondary">Kembali</a>
</form>
