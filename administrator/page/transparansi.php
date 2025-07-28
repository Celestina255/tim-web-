<?php
include "../koneksi.php";
?>

<style>
    .judul-section {
        margin-top: 30px;
        font-size: 20px;
        font-weight: bold;
    }
    .btn-tambah {
        margin-top: 15px;
        margin-bottom: 15px;
    }
    table.table {
        border: 1px solid #dee2e6;
    }
    table.table th, table.table td {
        text-align: center;
        vertical-align: middle;
    }
</style>

<div class="container mt-4">
    <h3 class="text-center">TRANSPARANSI</h3>

    <!-- Tab Menu -->
    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="monografi-tab" data-toggle="tab" href="#monografi" role="tab" aria-controls="monografi" aria-selected="true">Monografi Kampung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="apbdes-tab" data-toggle="tab" href="#apbdes" role="tab" aria-controls="apbdes" aria-selected="false">APBDes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="idm-tab" data-toggle="tab" href="#idm" role="tab" aria-controls="idm" aria-selected="false">IDM</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="myTabContent">
        <!-- MONOGRAFI -->
        <div class="tab-pane fade show active" id="monografi" role="tabpanel" aria-labelledby="monografi-tab">
            <h4 class="judul-section">DATA MONOGRAFI KAMPUNG</h4>
            <a href="index.php?page=trans_monografi_tambah" class="btn btn-success btn-tambah">
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
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td><?= $row['jumlah_penduduk']; ?></td>
                                <td><?= $row['jumlah_kk']; ?></td>
                                <td><?= $row['jumlah_laki']; ?></td>
                                <td><?= $row['jumlah_perempuan']; ?></td>
                                <td>
                                    <a href="index.php?page=trans_monografi_edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="page/hapus_monografi.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($data) == 0): ?>
                            <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- APBDES -->
        <div class="tab-pane fade" id="apbdes" role="tabpanel" aria-labelledby="apbdes-tab">
            <h4 class="judul-section">DATA APBDES KAMPUNG</h4>
            <a href="index.php?page=trans_apbdes_tambah" class="btn btn-success btn-tambah">
                <i class="fa fa-plus"></i> Tambah Data
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Pendapatan</th>
                            <th>Belanja</th>
                            <th>Penerimaan</th>
                            <th>Pengeluaran</th>
                            <th>Surplus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $apbdes = mysqli_query($con, "SELECT * FROM tb_apbdes ORDER BY tahun DESC");
                        while ($d = mysqli_fetch_array($apbdes)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['tahun'] ?></td>
                                <td>Rp<?= number_format($d['pendapatan'], 2, ',', '.') ?></td>
                                <td>Rp<?= number_format($d['belanja'], 2, ',', '.') ?></td>
                                <td>Rp<?= number_format($d['penerimaan'], 2, ',', '.') ?></td>
                                <td>Rp<?= number_format($d['pengeluaran'], 2, ',', '.') ?></td>
                                <td>Rp<?= number_format($d['surplus'], 2, ',', '.') ?></td>
                                <td>
                                    <a href="index.php?page=trans_apbdes_edit&id=<?= $d['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="page/hapus_apbdes.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- IDM -->
        <div class="tab-pane fade" id="idm" role="tabpanel" aria-labelledby="idm-tab">
            <h4 class="judul-section">DATA IDM KAMPUNG</h4>
            <a href="index.php?page=trans_idm_tambah" class="btn btn-success btn-tambah">
                <i class="fa fa-plus"></i> Tambah Data
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
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
                        $idm = mysqli_query($con, "SELECT * FROM tb_idm ORDER BY tahun DESC");
                        while ($i = mysqli_fetch_array($idm)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $i['tahun'] ?></td>
                                <td><?= $i['skor_idm'] ?></td>
                                <td><?= $i['status_idm'] ?></td>
                                <td><?= $i['skor_iks'] ?></td>
                                <td><?= $i['skor_ikl'] ?></td>
                                <td><?= $i['skor_ike'] ?></td>
                                <td><?= $i['target_status'] ?></td>
                                <td>
                                    <a href="index.php?page=trans_idm_edit&id=<?= $i['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="page/hapus_idm.php?id=<?= $i['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
