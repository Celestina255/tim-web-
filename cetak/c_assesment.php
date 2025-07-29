<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];

$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
    JOIN tb_staff ON tb_detailsurat.ttd = tb_staff.id_staff 
    JOIN tb_dataassesment ON tb_detailsurat.kode = tb_dataassesment.kode_surat 
    LEFT JOIN tb_penduduk ON tb_detailsurat.nik = tb_penduduk.nik 
    WHERE tb_detailsurat.kode = '$kodesurat'");

if (!$query) {
    die("Query gagal: " . mysqli_error($con));
}

while ($r = mysqli_fetch_array($query)) {
    $dt = explode('#', $r['detail']);
    $tgl = $r['tanggal'];
    $tanggal_indo = format_hari_tanggal($tgl);

    $qdesa = mysqli_query($con, "SELECT * FROM tb_kelurahan LIMIT 1");
    $rd = mysqli_fetch_array($qdesa);

    $qcamat = mysqli_query($con, "SELECT * FROM tb_kecamatan LIMIT 1");
    $rc = mysqli_fetch_array($qcamat);

    $qsetting = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
    $rs = mysqli_fetch_array($qsetting);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Assesment</title>
    <style>
        body { font-family: Arial; font-size: 14px; }
        table { width: 800px; margin: auto; border-collapse: collapse; }
        .center { text-align: center; }
        .right { text-align: right; }
        .ttd-img { width: 80px; margin-bottom: 5px; }
        .cap-img { width: 80px; margin-top: -50px; }
    </style>
</head>
<body onload="window.print()">

<!-- KOP SURAT -->
<table>
    <tr>
        <td rowspan="3" width="70"><img src="../img/slrt.png" width="90" height="90"></td>
        <td class="center"><b><font size="4">INSTRUMEN ASSESMENT</font></b></td>
    </tr>
    <tr><td class="center"><b><font size="5">PENYANDANG MASALAH KESEJAHTERAAN SOSIAL</font></b></td></tr>
    <tr><td class="center"><b><font size="4">LAYANAN TERPADU RUMAH HARAPAN MASYARAKAT</font></b></td></tr>
    <tr><td colspan="2" class="center"><b><i>KABUPATEN <?php echo strtoupper($rd['kab']); ?></i></b><hr></td></tr>
</table>

<!-- I. Lokasi -->
<table>
    <tr><td><b>I.</b> Lokasi</td></tr>
    <tr><td>1. Alamat: <?php echo $dt[7]; ?></td></tr>
    <tr><td>2. Desa: <?php echo $rd['kelurahan']; ?></td></tr>
    <tr><td>3. Kecamatan: <?php echo $rd['kec']; ?></td></tr>
    <tr><td>4. Kabupaten: <?php echo $rd['kab']; ?></td></tr>
</table>

<!-- II. Identitas -->
<table>
    <tr><td><b>II.</b> Identitas</td></tr>
    <tr><td>1. Nama: <b><?php echo $dt[1]; ?></b></td></tr>
    <tr><td>2. NIK: <?php echo $dt[0]; ?></td></tr>
    <tr><td>3. ID DTKS: <?php echo $dt[10]; ?></td></tr>
    <tr><td>4. TTL: <?php echo $dt[2]; ?>, <?php echo $dt[3]; ?></td></tr>
    <tr><td>5. Status Perkawinan: <?php echo $dt[4]; ?></td></tr>
    <tr><td>6. Pekerjaan & Penghasilan: <?php echo $dt[5]; ?> / Rp. <?php echo format_angka($dt[6]); ?></td></tr>
    <tr><td>7. Jumlah Keluarga: <?php echo $dt[8]; ?></td></tr>
    <tr><td>8. Program: <?php echo $dt[9]; ?></td></tr>
</table>

<!-- III. Data Keluarga -->
<table border="1" cellpadding="4">
    <tr>
        <th>No</th><th>Nama</th><th>Hub. Keluarga</th><th>Umur</th><th>Pekerjaan</th><th>Penghasilan</th>
    </tr>
    <?php
    $qkel = mysqli_query($con, "SELECT * FROM tb_dataassesment WHERE kode_surat='$kodesurat'");
    $no = 1;
    while ($row = mysqli_fetch_array($qkel)) {
        echo "<tr>
            <td class='center'>$no</td>
            <td>{$row['nama']}</td>
            <td class='center'>{$row['shdk']}</td>
            <td class='center'>{$row['umur']}</td>
            <td>{$row['pekerjaan']}</td>
            <td class='right'>Rp. " . format_angka($row['gaji']) . "</td>
        </tr>";
        $no++;
    }
    ?>
</table>

<!-- IV. Permasalahan -->
<table>
    <tr><td><b>IV.</b> Permasalahan</td></tr>
    <?php
    $masalah = explode(';', $dt[11]);
    foreach ($masalah as $m) echo "<tr><td>- $m</td></tr>";
    ?>
</table>

<!-- V. Keluhan -->
<table>
    <tr><td><b>V.</b> Permohonan Bantuan / Keluhan</td></tr>
    <?php
    $keluhan = explode(';', $dt[12]);
    foreach ($keluhan as $k) echo "<tr><td>- $k</td></tr>";
    ?>
</table>

<!-- TANDA TANGAN -->
<br><br>
<table style="width: 100%; text-align: center;">
    <tr>
        <td>Fasilitator</td>
        <td>Ketua Puskesos</td>
        <td>Supervisor</td>
    </tr>
    <tr style="height: 100px;">
        <td valign="bottom"><u><?php echo $dt[14]; ?></u></td>
        <td valign="bottom"><u><?php echo $dt[13]; ?></u></td>
        <td valign="bottom"><u><?php echo $dt[15]; ?></u></td>
    </tr>
</table>

<!-- KEPALA KAMPUNG & CAMAT -->
<br><br>
<table style="width: 100%; text-align: center;">
    <tr>
        <td>Kepala Kampung <?php echo $rd['kelurahan']; ?></td>
        <td>Camat <?php echo $rc['kecamatan']; ?></td>
    </tr>
    <tr style="height: 100px;">
        <td>
            <?php if ($rs['ttd'] == 'Otomatis'): ?>
                <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" class="ttd-img"><br>
            <?php endif; ?>
            <img src="../file/<?php echo $rd['stample']; ?>" class="cap-img"><br>
            <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
            NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
        </td>
        <td valign="bottom">
            <br><br><u><b><?php echo $rc['nama_camat']; ?></b></u><br>
            NIP. <?php echo $rc['nip_camat']; ?>
        </td>
    </tr>
</table>

</body>
</html>
<?php } ?>
