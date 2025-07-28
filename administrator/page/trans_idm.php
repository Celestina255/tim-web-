<?php
include_once "../koneksi.php";
?>

<div class="card">
    <div class="card-header">
        <strong class="card-title">Data Indeks Desa Membangun (IDM)</strong>
        <a href="index.php?page=trans_idm_tambah" class="btn btn-success btn-sm float-right">Tambah Data</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Skor IDM</th>
                    <th>Status IDM</th>
                    <th>IKS</th>
                    <th>IKL</th>
                    <th>IKE</th>
                    <th>Target Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM tb_idm ORDER BY tahun DESC");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= $row['skor_idm']; ?></td>
                        <td><?= $row['status_idm']; ?></td>
                        <td><?= $row['skor_iks']; ?></td>
                        <td><?= $row['skor_ikl']; ?></td>
                        <td><?= $row['skor_ike']; ?></td>
                        <td><?= $row['target_status']; ?></td>
                        <td>
                            <a href="index.php?page=trans_idm_edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="page/hapus_idm.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
