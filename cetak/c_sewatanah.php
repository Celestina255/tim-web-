<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = mysqli_real_escape_string($con, $_GET['kode']);

$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
    JOIN tb_staff ON tb_detailsurat.ttd = tb_staff.id_staff 
    LEFT JOIN tb_penduduk ON tb_detailsurat.nik = tb_penduduk.nik 
    WHERE tb_detailsurat.kode = '$kodesurat'");
while ($r = mysqli_fetch_array($query)) {

    // Tangkap dan pecah detail
    $dt = explode(';', isset($r['detail']) ? $r['detail'] : '');
    for ($i = 0; $i <= 25; $i++) {
        if (!isset($dt[$i])) $dt[$i] = '';
    }

    // Tanggal & Hari Indonesia
    $tgl_sekarang = date('Y-m-d');
    $hari = date('l');
    $hari_indonesia = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];
    $hari = $hari_indonesia[$hari];

    function tgl_indonesia($tgl) {
        $bulan = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        $exp = explode('-', $tgl);
        return $exp[2] . ' ' . $bulan[$exp[1]] . ' ' . $exp[0];
    }

    $query_kel = mysqli_query($con, "SELECT * from tb_kelurahan");
    while ($rd = mysqli_fetch_array($query_kel)) {
?>

<html>
<head>
    <title>Surat Sewa Tanah</title>
</head>
<body onload="window.print()">

    <table width="800" align="center" border="0">
        <tr>
            <td align="center">
                <strong><u><font size="4"><?php echo strtoupper($r['nmsurat']); ?></font></u></strong>
            </td>
        </tr>
    </table>

    <br><br>

    <table width="90%" align="center" cellpadding="2">
        <tr><td colspan="5">Yang bertanda tangan di bawah ini:</td></tr>
        <tr><td colspan="5">&nbsp;</td></tr>

       <!-- PIHAK I -->
<tr><td colspan="5"><b>I.</b></td></tr>
<tr><td></td><td style="width: 35%;">Nama</td><td style="width: 2%;">:</td><td colspan="2"><?= $dt[1]; ?></td></tr>
<tr><td></td><td>NIK</td><td>:</td><td colspan="2"><?= $dt[0]; ?></td></tr>
<tr><td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?= $dt[2]; ?></td></tr>
<tr><td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?= $dt[3]; ?>, <?= $dt[4]; ?></td></tr>
<tr><td></td><td>Alamat</td><td>:</td><td colspan="2"><?= $dt[5]; ?></td></tr>
<tr><td></td><td>Selanjutnya disebut</td><td>:</td><td colspan="2"><b>Pihak I</b></td></tr>

<tr><td colspan="5">&nbsp;</td></tr>

<!-- PIHAK II -->
<tr><td colspan="5"><b>II.</b></td></tr>
<tr><td></td><td>Nama</td><td>:</td><td colspan="2"><?= $dt[7]; ?></td></tr>
<tr><td></td><td>NIK</td><td>:</td><td colspan="2"><?= $dt[6]; ?></td></tr>
<tr><td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?= $dt[8]; ?></td></tr>
<tr><td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?= $dt[9]; ?>, <?= $dt[10]; ?></td></tr>
<tr><td></td><td>Alamat</td><td>:</td><td colspan="2"><?= $dt[11]; ?></td></tr>
<tr><td></td><td>Selanjutnya disebut</td><td>:</td><td colspan="2"><b>Pihak II</b></td></tr>


        <tr><td colspan="5">&nbsp;</td></tr>

        <!-- PERNYATAAN -->
        <tr>
            <td colspan="5" align="justify">
                Pada hari ini <?= strtoupper($hari); ?>, tanggal <?= tgl_indonesia($tgl_sekarang); ?>, Pihak I dan Pihak II secara bersama - sama sepakat sebagai berikut:
            </td>
        </tr>

        <tr>
            <td valign="top">1.</td>
            <td colspan="4" align="justify">
                Tanah dengan luas/ukuran <?= format_angka($dt[12]); ?> Ha./M2 yang terletak di <?= $dt[13]; ?>, dengan batas-batas:
            </td>
        </tr>
        <tr><td></td><td>- Barat berbatasan dengan</td><td>:</td><td colspan="2"><?= $dt[16]; ?></td></tr>
        <tr><td></td><td>- Utara berbatasan dengan</td><td>:</td><td colspan="2"><?= $dt[17]; ?></td></tr>
        <tr><td></td><td>- Timur berbatasan dengan</td><td>:</td><td colspan="2"><?= $dt[18]; ?></td></tr>
        <tr><td></td><td>- Selatan berbatasan dengan</td><td>:</td><td colspan="2"><?= $dt[19]; ?></td></tr>

        <tr><td></td><td colspan="4">adalah benar milik Pihak I;</td></tr>

        <tr>
            <td valign="top">2.</td>
            <td colspan="4" align="justify">
                Pihak I menyewakan kepada Pihak II selama <?= $dt[14]; ?> bulan dengan harga Rp. <?= format_angka($dt[15]); ?> (<?= kekata($dt[15]); ?> Rupiah);
            </td>
        </tr>
        <tr><td valign="top">3.</td><td colspan="4" align="justify">Pihak I tidak akan menarik kembali tanah sebelum masa sewa selesai, kecuali atas persetujuan Pihak II.</td></tr>
        <tr><td valign="top">4.</td><td colspan="4" align="justify">Hal-hal yang belum diatur akan diselesaikan secara kekeluargaan.</td></tr>

        <tr><td colspan="5">&nbsp;</td></tr>

        <!-- TTD PIHAK -->
        <tr>
            <td></td>
            <td align="center">Pihak II<br>Menerima Sewa</td>
            <td></td>
            <td></td>
            <td align="center"><?= $rd['kelurahan']; ?>, <?= tgl_indonesia($tgl_sekarang); ?><br>Pihak I<br>Yang Menyewakan</td>
        </tr>
        <tr><td colspan="5"><br><br></td></tr>
        <tr><td colspan="4"></td><td align="center"><small style="color: gray;">Materai</small></td></tr>
        <tr><td colspan="5"><br></td></tr>
        <tr>
            <td></td>
            <td align="center"><b><u><?= $dt[7]; ?></u></b></td>
            <td></td>
            <td></td>
            <td align="center"><b><u><?= $dt[1]; ?></u></b></td>
        </tr>

        <!-- SAKSI -->
        <tr><td colspan="4">Saksi - saksi :</td></tr>
        <tr><td>1.</td><td><?= $dt[20]; ?></td><td colspan="2">(_______________)</td></tr>
        <tr><td>2.</td><td><?= $dt[21]; ?></td><td colspan="2">(_______________)</td></tr>

        <!-- MENGETAHUI -->
        <tr><td colspan="5"><br></td></tr>
        <tr>
            <td colspan="5" align="center">
                Mengetahui<br>
                <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : 'a.n.'; ?>
                <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Kepala Kelurahan'; ?> <?= $rd['kelurahan']; ?><br>
            </td>
        </tr>

        <!-- CAP & TTD -->
        <tr>
            <td colspan="5" align="center">
                <?php
                $queryrs = mysqli_query($con, "SELECT * from setting_surat LIMIT 1");
                while ($rs = mysqli_fetch_array($queryrs)) {
                    if ($rs['ttd'] == 'Otomatis'): ?>
                        <div style="position: relative; width: 7em; height: 7em; margin: 0 auto;">
                            <img src="../file/<?php echo $rd['stample']; ?>" style="position: absolute; top: 0; right: 25px; width: 7em; height: 7em; opacity: 0.9;">
                            <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="position: absolute; top: 0; left: 10px; width: 7em; height: 7em;">
                        </div>
                <?php endif; } ?>
                <br><b><u><?php echo strtoupper($r['nama_staff']); ?></u></b><br>
                NIP. <?= !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
            </td>
        </tr>
    </table>

</body>
</html>

<?php } } ?>
