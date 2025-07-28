<?php
include "../koneksi.php";
?>

<div class="container mt-4">
    <h3 class="text-center">DATA MONOGRAFI KAMPUNG</h3>
    <a href="index.php?page=trans_monografi_tambah" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Tambah Data
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jumlah Penduduk</th>
                    <th>Jumlah KK</th>
                    <th>Laki-laki</th>
                    <th>Perempuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($con, "SELECT * FROM tb_monografi ORDER BY tahun DESC");
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                    <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= $row['jumlah_penduduk']; ?></td>
                        <td><?= $row['jumlah_kk']; ?></td>
                        <td><?= $row['jumlah_laki']; ?></td>
                        <td><?= $row['jumlah_perempuan']; ?></td>
                        <td>
                            <a href="index.php?page=trans_monografi_edit&id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="page/hapus_monografi.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                <?php if (mysqli_num_rows($data) == 0): ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
