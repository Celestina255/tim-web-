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
    $tgl_sekarang = date('Y-m-d');

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

    $query2 = mysqli_query($con, "SELECT * from tb_kelurahan");
    while ($rd = mysqli_fetch_array($query2)) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
<table width="800" align="center" cellpadding="4">
    <tr>
        <td rowspan="4" width="80" align="center" valign="top">
            <img src="../img/<?php echo $rd['logo']; ?>" style="max-width: 85px; height: auto;">
        </td>
        <td colspan="2" align="center" style="font-size: 25px;"><strong>PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size: 18px;"><strong>DISTRIK <?php echo strtoupper($rd['kec']); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size: 23px;"><strong>KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="font-size: 15px;">Alamat : <?php echo $rd['kantor']; ?></td>
    </tr>
    <tr>
        <td colspan="3" align="center"><hr style="border: 1.5px double black;"><br></td>
    </tr>
</table>

<!-- INFORMASI SURAT -->
<table width="800" align="center" cellpadding="2">
    <tr>
        <td width="50%">
            <table>
                <tr>
                    <td width="30%">Nomor</td>
                    <td width="2%">:</td>
                    <td><?php echo $r['no']; ?></td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) berkas</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td><b>Permohonan Penerbitan SKCK</b></td>
                </tr>
            </table>
        </td>
        <td width="50%" valign="top">
    <?php echo $rd['kelurahan']; ?>, <?php echo format_hari_tanggal($tgl_sekarang); ?><br><br>
    Kepada Yth,<br>
    <b><?php echo $dt[8]; ?></b><br>
    <div style="width: 100%; text-align: center; padding-center: 30px;">
        <b><?php echo $dt[9]; ?></b>
    </div>
</td>

    </tr>
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
    <tr><td colspan="3" align="justify">SKCK tersebut akan digunakan untuk <?php echo $dt[7]; ?>.</td></tr>
    <tr><td colspan="3" align="justify">Demikian permohonan ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td></tr>
    <tr><td colspan="3">Wassalamu’alaikum Wr. Wb.</td></tr>
</table>

<br><br>

<!-- TANDA TANGAN -->
<table width="800" align="center">
    <tr>
        <td align="center"><?php echo $rd['kelurahan']; ?>, <?php echo format_hari_tanggal($tgl_sekarang); ?></td>
    </tr>
    <tr>
        <td align="center">
            <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : 'a.n.'; ?>
            <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Desa' : 'Kepala Kelurahan'; ?> <?php echo $rd['kelurahan']; ?><br>
            <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : $r['jab_staff']; ?>
        </td>
    </tr>
    <!-- hilangkan jeda bawah -->
    <tr><td style="height: 10px;"></td></tr>
    <tr>
        <td align="center">
            <?php
            $queryrs = mysqli_query($con, "SELECT * from setting_surat LIMIT 1");
            while ($rs = mysqli_fetch_array($queryrs)) {
                if ($rs['ttd'] == 'Otomatis') {
                    echo '<div class="cap-ttd">
                            <img src="../file/' . $rd['stample'] . '" class="cap">
                            <img src="../file/ttd/' . $r['ttd_staff'] . '" class="ttd">
                          </div>';
                }
            }
            ?>
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
