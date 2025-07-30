<?php
include '../koneksi.php';
$query = mysqli_query($con, "SELECT * FROM tb_sambutan LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<h3>Edit Sambutan</h3>
<form action="page/aksi_edit_sambutan.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <label>Nama Kepala Kampung</label>
    <input type="text" name="nama_kepala" class="form-control" value="<?php echo $data['nama_kepala']; ?>" required>

    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>" required>

    <label>Foto Kepala Kampung</label><br>
    <img src="../img/sambutan/<?php echo $data['foto']; ?>" width="120" class="mb-2"><br>
    <input type="file" name="foto">

    <label>Isi Sambutan</label>
    <textarea name="isi_sambutan" class="form-control" rows="6" required><?php echo $data['isi_sambutan']; ?></textarea>

    <br>
    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
</form>
