<?php 
include_once "../koneksi.php"; 
include_once "../assets/inc.php"; 
session_start();
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
        </div>
    </div>

    <!-- STATUS SURAT MANDIRI -->
    <div class="card mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fa fa-envelope"></i> STATUS SURAT MANDIRI</h5>
        </div>
        <div class="card-body animated zoomIn" style="overflow-x: auto;">
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
        </div>
    </div>
</div>

<!-- SCRIPT DATATABLE -->
<script src="../assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
        $('#bootstrap-data-table-export0').DataTable();
    });
</script>
