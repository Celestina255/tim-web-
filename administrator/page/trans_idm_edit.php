<?php
include '../koneksi.php';

// Ambil ID dari parameter GET
$id = $_GET['id'];

// Ambil data berdasarkan ID
$query = mysqli_query($con, "SELECT * FROM tb_idm WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Cek jika data ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan'); window.location='index.php?page=trans_idm';</script>";
    exit;
}

// Proses saat form disubmit
if (isset($_POST['update'])) {
    $tahun = $_POST['tahun'];
    $skor_idm = $_POST['skor_idm'];
    $status_idm = $_POST['status_idm'];
    $skor_iks = $_POST['skor_iks'];
    $skor_ikl = $_POST['skor_ikl'];
    $skor_ike = $_POST['skor_ike'];
    $target_status = $_POST['target_status'];

    $update = mysqli_query($con, "UPDATE tb_idm SET 
        tahun = '$tahun',
        skor_idm = '$skor_idm',
        status_idm = '$status_idm',
        skor_iks = '$skor_iks',
        skor_ikl = '$skor_ikl',
        skor_ike = '$skor_ike',
        target_status = '$target_status'
        WHERE id = '$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php?page=transparansi';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<div class="container-fluid">
    <h3 class="mt-4 mb-3">Edit Data IDM</h3>

    <form method="POST" action="">
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="<?= $data['tahun'] ?>" required>
        </div>
        <div class="form-group">
            <label>Skor IDM</label>
            <input type="text" name="skor_idm" class="form-control" value="<?= $data['skor_idm'] ?>" required>
        </div>
        <div class="form-group">
            <label>Status IDM</label>
            <select name="status_idm" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <?php
                $opsi_status = ['Mandiri', 'Maju', 'Berkembang', 'Tertinggal', 'Sangat Tertinggal'];
                foreach ($opsi_status as $opsi) {
                    $selected = $data['status_idm'] == $opsi ? 'selected' : '';
                    echo "<option value='$opsi' $selected>$opsi</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Skor IKS</label>
            <input type="text" name="skor_iks" class="form-control" value="<?= $data['skor_iks'] ?>" required>
        </div>
        <div class="form-group">
            <label>Skor IKL</label>
            <input type="text" name="skor_ikl" class="form-control" value="<?= $data['skor_ikl'] ?>" required>
        </div>
        <div class="form-group">
            <label>Skor IKE</label>
            <input type="text" name="skor_ike" class="form-control" value="<?= $data['skor_ike'] ?>" required>
        </div>
        <div class="form-group">
            <label>Target Status</label>
            <select name="target_status" class="form-control" required>
                <option value="">-- Pilih Target --</option>
                <?php
                foreach ($opsi_status as $opsi) {
                    $selected = $data['target_status'] == $opsi ? 'selected' : '';
                    echo "<option value='$opsi' $selected>$opsi</option>";
                }
                ?>
            </select>
        </div>

        <div class="text-center mt-4">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php?page=transparansi" class="btn btn-secondary">Kembali</a>
    </div>
    </form>
    </div>
</div>
