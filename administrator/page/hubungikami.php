<?php
include '../koneksi.php';
$query = mysqli_query($con, "SELECT * FROM tb_hubungi LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0" style="color: white;">Edit Informasi Hubungi Kami</h4>
        </div>
        <div class="card-body">
           <form action="page/aksi_edit_hubungikami.php" method="POST">
                <div class="form-group">
                    <label>No. Telepon / WhatsApp</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $data['telepon'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Instagram URL</label>
                    <input type="url" name="instagram" class="form-control" value="<?= $data['instagram'] ?>">
                </div>
                <div class="form-group">
                    <label>Facebook URL</label>
                    <input type="url" name="facebook" class="form-control" value="<?= $data['facebook'] ?>">
                </div>
                <div class="form-group">
                    <label>WhatsApp URL</label>
                    <input type="url" name="whatsapp" class="form-control" value="<?= $data['whatsapp'] ?>">
                </div>
                <div class="form-group">
                    <label>YouTube URL</label>
                    <input type="url" name="youtube" class="form-control" value="<?= $data['youtube'] ?>">
                </div>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
