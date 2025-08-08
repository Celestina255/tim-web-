<?php 
include_once "../koneksi.php"; 
include_once "../assets/inc.php"; 
session_start();
$userid = $_SESSION['userid'];

// ===== PAGINATION PERMOHONAN =====
$batas_permohonan = 5;
$halaman_permohonan = isset($_GET['hal_permohonan']) ? (int)$_GET['hal_permohonan'] : 1;
$mulai_permohonan = ($halaman_permohonan - 1) * $batas_permohonan;
$jumlah_data_permohonan = mysqli_num_rows(mysqli_query($con, "SELECT id FROM tb_permohonan WHERE userid='$userid'"));
$total_halaman_permohonan = ceil($jumlah_data_permohonan / $batas_permohonan);

// ===== PAGINATION MANDIRI =====
$batas_mandiri = 5;
$halaman_mandiri = isset($_GET['hal_mandiri']) ? (int)$_GET['hal_mandiri'] : 1;
$mulai_mandiri = ($halaman_mandiri - 1) * $batas_mandiri;
$jumlah_data_mandiri = mysqli_num_rows(mysqli_query($con, "SELECT id FROM tb_buatsendiri WHERE userid='$userid'"));
$total_halaman_mandiri = ceil($jumlah_data_mandiri / $batas_mandiri);
?>

<style>
    .status-btn {
        padding: 5px 12px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        color: white;
        border: none;
        display: inline-block;
        text-align: center;
        min-width: 100px;
        box-shadow: 1px 2px 4px rgba(0,0,0,0.2);
    }
    .status-diproses { background-color: #007bff; }
    .status-ditolak { background-color: #dc3545; }
    .status-diterima { background-color: #28a745; }
</style>

<div class="container mt-4">
    <h3 class="text-center mb-4">STATUS SURAT</h3>

    <!-- STATUS SURAT PERMOHONAN -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fa fa-envelope"></i> STATUS SURAT PERMOHONAN</h5>
        </div>
        <div class="card-body animated zoomIn" style="overflow-x: auto;">
            <input type="text" id="cariPermohonan" class="form-control mb-3" placeholder="Cari surat permohonan...">
            <table id="bootstrap-data-table-export0" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Surat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $userid = $_SESSION['userid'];
                $query1 = mysqli_query ($con, "SELECT * FROM tb_permohonan WHERE userid='$userid' ORDER BY id DESC");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query1)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nmsurat']; ?></td>
                        <td><?= IndonesiaTgl($data['tgl']); ?></td>
                        <td align="center">
                            <a href="?page=tunggu_permohonan&id=<?= $data['id']; ?>">
                                <?php if ($data['status'] == 'onprocess'): ?>
                                    <span class="status-btn status-diproses">Diproses</span>
                                <?php elseif ($data['status'] == 'ditolak'): ?>
                                    <span class="status-btn status-ditolak">Permohonan Ditolak<br>(Silahkan klik disini)</span>
                                <?php elseif ($data['status'] == 'diterima'): ?>
                                    <span class="status-btn status-diterima">Permohonan Diterima<br>(Silahkan klik disini)</span>
                                <?php endif; ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- Pagination Permohonan -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($halaman_permohonan <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=pstatus&hal_permohonan=<?= max($halaman_permohonan - 1, 1); ?>#permohonan">Sebelumnya</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_halaman_permohonan; $i++): ?>
                        <li class="page-item <?= ($i == $halaman_permohonan) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=pstatus&hal_permohonan=<?= $i; ?>#permohonan"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($halaman_permohonan >= $total_halaman_permohonan) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=pstatus&hal_permohonan=<?= min($halaman_permohonan + 1, $total_halaman_permohonan); ?>#permohonan">Berikutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- STATUS SURAT MANDIRI -->
    <div class="card mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fa fa-envelope"></i> STATUS SURAT MANDIRI</h5>
        </div>
        <div class="card-body animated zoomIn" style="overflow-x: auto;">
            <input type="text" id="cariMandiri" class="form-control mb-3" placeholder="Cari surat mandiri...">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Surat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query2 = mysqli_query ($con, "SELECT * FROM tb_buatsendiri WHERE userid='$userid' ORDER BY id DESC");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query2)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nmsurat']; ?></td>
                        <td><?= IndonesiaTgl($data['tgl']); ?></td>
                        <td align="center">
                            <a href="?page=tunggu_suratmandiri&id=<?= $data['id']; ?>">
                                <?php if ($data['status'] == 'onprocess'): ?>
                                    <span class="status-btn status-diproses">Diproses</span>
                                <?php elseif ($data['status'] == 'ditolak'): ?>
                                    <span class="status-btn status-ditolak">Ditolak</span>
                                <?php elseif ($data['status'] == 'diterima'): ?>
                                    <span class="status-btn status-diterima">Diterima</span>
                                <?php endif; ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- Pagination Mandiri -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item <?= ($halaman_mandiri <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=pstatus&hal_mandiri=<?= max($halaman_mandiri - 1, 1); ?>#mandiri">Sebelumnya</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_halaman_mandiri; $i++): ?>
                        <li class="page-item <?= ($i == $halaman_mandiri) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=pstatus&hal_mandiri=<?= $i; ?>#mandiri"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($halaman_mandiri >= $total_halaman_mandiri) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=pstatus&hal_mandiri=<?= min($halaman_mandiri + 1, $total_halaman_mandiri); ?>#mandiri">Berikutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Script pencarian manual -->
<script>
    document.getElementById("cariPermohonan").addEventListener("keyup", function () {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll("#tabelPermohonan tbody tr");
        rows.forEach(function (row) {
            row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
        });
    });

    document.getElementById("cariMandiri").addEventListener("keyup", function () {
        var input = this.value.toLowerCase();
        var rows = document.querySelectorAll("#tabelMandiri tbody tr");
        rows.forEach(function (row) {
            row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
        });
    });
</script>

<!-- SCRIPT DATATABLE -->
<script src="../assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
        $('#bootstrap-data-table-export0').DataTable();
    });
</script>
