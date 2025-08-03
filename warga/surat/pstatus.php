<?php
include_once "../koneksi.php"; // koneksi database
include_once "../assets/inc.php"; // styling dan header
session_start();
?>

<div class="container mt-4">
    <h3 class="text-center mb-4">STATUS SURAT</h3>

    <!-- ======= STATUS SURAT PERMOHONAN (PINDAH KE ATAS) ======= -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fa fa-envelope"></i> STATUS SURAT PERMOHONAN</h5>
        </div>
        <div class="card-body">
            <table id="table-permohonan" class="table table-bordered table-striped">
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
$no = 1;
$userid = $_SESSION['userid'];

$query = mysqli_query($con, "
    SELECT b.*, j.nmsurat, p.nama 
    FROM tb_buatsendiri b
    INNER JOIN (
        SELECT MAX(id) AS id
        FROM tb_buatsendiri
        WHERE userid = '$userid'
        GROUP BY kode_jenis
    ) latest ON b.id = latest.id
    JOIN tb_jenissurat j ON j.kode = b.kode_jenis
    JOIN tb_penduduk p ON p.nik = b.nik
    ORDER BY b.id DESC
");

if (mysqli_num_rows($query) == 0) {
    echo '<tr><td colspan="5" class="text-center">Belum ada data</td></tr>';
} else {
    while ($data = mysqli_fetch_assoc($query)) {
        if ($data['status'] == 'ditolak') {
            $status_display = "Surat Ditolak";
        } else {
            $status_display = "Surat Sedang Diproses";
        }

        echo '<tr>
            <td>'.$no++.'</td>
            <td>'.$data['nama'].'</td>
            <td>'.$data['nmsurat'].'</td>
            <td>'.date("d-m-Y", strtotime($data['tgl'])).'</td>
            <td>'.$status_display.'</td>
        </tr>';
    }
}
?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ======= STATUS SURAT MANDIRI (PINDAH KE BAWAH) ======= -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fa fa-envelope"></i> STATUS SURAT MANDIRI</h5>
        </div>
        <div class="card-body">
            <table id="table-mandiri" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Surat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
<?php
$no = 1;
$query = mysqli_query($con, "
    SELECT d.*, p.nama
    FROM tb_detailsurat d
    JOIN tb_penduduk p ON d.nik = p.nik
    WHERE d.userid = '$userid'
    AND d.id IN (
        SELECT MAX(id)
        FROM tb_detailsurat
        WHERE userid = '$userid'
        GROUP BY kode_surat
    )
    ORDER BY d.id DESC
");

if (mysqli_num_rows($query) == 0) {
    echo '<tr><td colspan="6" class="text-center">Belum ada data</td></tr>';
} else {
    while ($data = mysqli_fetch_assoc($query)) {
        if ($data['status'] == 'acc') {
            $status_display = "Surat Diterima";
        } elseif ($data['status'] == 'ditolak') {
            $status_display = "Surat Ditolak";
        } else {
            $status_display = "Surat Sedang Diproses";
        }

        echo '<tr>
            <td>'.$no++.'</td>
            <td>'.$data['nama'].'</td>
            <td>'.$data['nmsurat'].'</td>
            <td>'.date("d-m-Y", strtotime($data['tgl'])).'</td>
            <td>'.$status_display.'</td>
            <td class="text-end">';
        if ($data['status'] == 'acc') {
            echo '<a href="../cetak/c_pstatus.php?kode='.$data['kode_surat'].'" target="_blank" class="btn btn-sm btn-primary">
                    <i class="fa fa-print"></i> Cetak</a>';
        } else {
            echo '<span class="text-muted">-</span>';
        }
        echo '</td></tr>';
    }
}

?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SCRIPT DATATABLE -->
<script src="../assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table-mandiri').DataTable();
        $('#table-permohonan').DataTable();
    });
</script>
