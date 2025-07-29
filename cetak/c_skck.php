<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];

$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
    JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff 
    LEFT JOIN tb_penduduk ON tb_detailsurat.nik=tb_penduduk.nik 
    WHERE tb_detailsurat.kode='$kodesurat'");

while ($r = mysqli_fetch_array($query)) {
    $dt = explode(';', $r['detail']);
    $tgl = $r['tanggal'];
    $bl = format_hari_tanggal($tgl);
    $bln = explode(',', $bl);
    $bulan = trim($bln[1]);

    $query_kel = mysqli_query($con, "SELECT * FROM tb_kelurahan");
    while ($rd = mysqli_fetch_array($query_kel)) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Permohonan SKCK</title>
    <style>
        body { font-family: 'Times New Roman', serif; }
        .table-print { font-size: 14px; }
        .ttd-nama { margin-top: 30px; text-align: center; }
        .cap-ttd { position: relative; width: 7em; height: 7em; margin: 0 auto; }
        .cap-ttd img { position: absolute; width: 7em; height: 7em; }
        .cap-ttd .cap { top: 0; right: 25px; opacity: 0.9; }
        .cap-ttd .ttd { top: 0; left: 10px; }
    </style>
</head>

<body onload="window.print()">
    <!-- KOP SURAT -->
    <table width="800" align="center" border="0" cellpadding="4">
        <tr>
            <td rowspan="3" width="70"><img src="../img/<?php echo $rd['logo']; ?>" width="60" height="60"></td>
            <td align="center"><strong><font size="2">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></font></strong></td>
        </tr>
        <tr>
            <td align="center"><strong><font size="3">KECAMATAN <?php echo strtoupper($rd['kec']); ?></font></strong></td>
        </tr>
        <tr>
            <td align="center"><strong><font size="4"><?php echo strtoupper($rd['jnp']); ?> <?php echo strtoupper($rd['kelurahan']); ?></font></strong></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <hr><i>Sekretariat: <?php echo $rd['kantor']; ?></i><hr size="3">
            </td>
        </tr>
    </table>

    <!-- INFORMASI SURAT -->
    <table width="800" align="center" cellpadding="2">
        <tr>
            <td width="20%">Nomor</td><td width="2%">:</td><td><?php echo $r['no']; ?></td>
            <td align="right"><?php echo $rd['kelurahan']; ?>, <?php echo $bulan; ?></td>
        </tr>
        <tr>
            <td>Lampiran</td><td>:</td><td>1 (satu) berkas</td>
            <td>Kepada Yth,</td>
        </tr>
        <tr>
            <td>Perihal</td><td>:</td><td><b>Permohonan Penerbitan SKCK</b></td>
            <td><b><?php echo $dt[8]; ?></b></td>
        </tr>
        <tr><td colspan="4"></td></tr>
        <tr><td colspan="4" align="right"><b><u><?php echo $dt[9]; ?></u></b></td></tr>
    </table>

    <br>

    <!-- ISI SURAT -->
    <table width="800" align="center" cellpadding="2">
        <tr><td colspan="3">Assalamu’alaikum Wr. Wb.</td></tr>
        <tr><td colspan="3">Dengan hormat,</td></tr>
        <tr>
            <td colspan="3" align="justify">
                Bersama ini <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Lurah'; ?> <?php echo $rd['kelurahan']; ?> Distrik <?php echo $rd['kec']; ?> Kabupaten <?php echo $rd['kab']; ?>, 
                memohon kepada Bapak/Ibu <?php echo $dt[8]; ?> agar berkenan menerbitkan SKCK untuk warga kami sebagai berikut:
            </td>
        </tr>
        <tr><td width="30%">Nama</td><td width="2%">:</td><td><?php echo $dt[1]; ?></td></tr>
        <tr><td>NIK</td><td>:</td><td><?php echo $dt[0]; ?></td></tr>
        <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $dt[2]; ?></td></tr>
        <tr><td>Tempat/Tgl Lahir</td><td>:</td><td><?php echo $dt[3]; ?>, <?php echo IndonesiaTgl($dt[4]); ?></td></tr>
        <tr><td>Pekerjaan</td><td>:</td><td><?php echo $dt[5]; ?></td></tr>
        <tr><td>Alamat</td><td>:</td><td><?php echo $dt[6]; ?></td></tr>
        <tr>
            <td colspan="3" align="justify">
                SKCK tersebut akan digunakan untuk <?php echo $dt[7]; ?>.
            </td>
        </tr>
        <tr>
            <td colspan="3" align="justify">
                Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
            </td>
        </tr>
        <tr><td colspan="3">Wassalamu’alaikum Wr. Wb.</td></tr>
    </table>

    <!-- TANDA TANGAN -->
    <br><br>
    <table width="90%" align="right" border="0">
        <tr>
            <td align="center"><?php echo $rd['kelurahan']; ?>, <?php echo $bulan; ?></td>
        </tr>
        <tr>
            <td align="center">
                <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : 'a.n.'; ?>
                <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Desa' : 'Kepala Kelurahan'; ?> <?php echo $rd['kelurahan']; ?><br>
                <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : $r['jab_staff']; ?>
            </td>
        </tr>
        <tr><td height="100"></td></tr>
        <tr>
            <td align="center">
                <?php
                $queryrs = mysqli_query($con, "SELECT * from setting_surat LIMIT 1");
                while ($rs = mysqli_fetch_array($queryrs)) {
                    if ($rs['ttd'] == 'Otomatis'): ?>
                    <div class="cap-ttd">
                        <img src="../file/<?php echo $rd['stample']; ?>" class="cap">
                        <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" class="ttd">
                    </div>
                <?php endif; } ?>
                <div class="ttd-nama">
                    <b><u><?php echo strtoupper($r['nama_staff']); ?></u></b><br>
                    NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
<?php } } ?>
