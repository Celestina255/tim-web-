<?php
include '../koneksi.php';
?>
<div class="card">
    <div class="card-header">
        <strong class="card-title">Jam Kerja</strong>
    </div>
    <div class="card-body">
        <a href="?page=tambah_jamkerja" class="btn btn-primary btn-sm mb-3">+ Tambah Hari</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam/Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $q = mysqli_query($con, "SELECT * FROM tb_jamkerja ORDER BY urutan ASC");
                while($r = mysqli_fetch_array($q)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['hari']; ?></td>
                    <td><?= $r['jam']; ?></td>
                    <td>
                        <a href="?page=edit_jamkerja&id=<?= $r['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="aksi/hapus_jamkerja.php?id=<?= $r['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <hr class="mt-5 mb-3">

        <!-- Nomor WA Section -->
        <?php 
        $qwa = mysqli_query($con, "SELECT nomor_wa FROM tb_jamkerja WHERE nomor_wa IS NOT NULL LIMIT 1");
        $wa = mysqli_fetch_assoc($qwa);
        $nomorWA = isset($wa['nomor_wa']) ? $wa['nomor_wa'] : '';
        ?>

        <h5 class="mt-4">Nomor WhatsApp</h5>
        <form action="act/aksi_edit_nomorwa.php" method="POST" class="form-inline mb-3">
            <input type="text" name="nomor_wa" class="form-control mr-2" style="max-width:300px;" value="<?= $nomorWA; ?>" placeholder="Contoh: 6281234567890" required>
            <button type="submit" class="btn btn-success">Simpan Nomor WA</button>
        </form>
    </div>
</div>
