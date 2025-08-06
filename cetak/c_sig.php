<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

// Ambil data surat
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
    <title>Surat Izin Gangguan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .table-print, .table-list { width: 800px; margin: auto; }
        .table-list td { padding: 4px; }
    </style>
</head>
<body onload="window.print()">

<!-- KOP SURAT -->
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td rowspan="4" width="80" style="text-align: center; vertical-align: top;">
      <img src="../img/<?php echo $rd['logo']; ?>" style="max-width: 85px; height: auto;">
    </td>
    <td colspan="2" align="center"><strong style="font-size: 25px;">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong style="font-size: 18px;">DISTRIK <?php echo strtoupper($rd['kec']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong style="font-size: 23px;">KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size: 15px; font-style: bold;">
      Alamat : <?php echo $rd['kantor']; ?>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr style="border: 1.5px double black;"><br></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      <strong><u><?php echo strtoupper($r['nmsurat']); ?></u></strong><br>
      <font size="2">Nomor: <?php echo $r['no']; ?></font>
    </td>
  </tr>
</table>
<!-- ISI SURAT -->
<table class="table-list" border="0" cellpadding="2">
    <tr><td colspan="3" align="justify">
        Yang bertanda tangan di bawah ini adalah warga <?php echo $dt[4]; ?>, menyatakan bahwa kami tidak keberatan atas pendirian/renovasi/perluasan bangunan untuk <b><?php echo $dt[3]; ?></b> milik <b><?php echo $dt[1]; ?></b>, sepanjang tidak mengganggu lingkungan sekitar.<br><br>
        Adapun warga yang menyetujui izin gangguan ini adalah sebagai berikut:
    </td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr>
        <td colspan="3">
            <table width="100%" border="1" cellspacing="0" cellpadding="4">
                <tr>
                    <th width="5%">No</th>
                    <th width="35%">Nama</th>
                    <th width="40%">Alamat</th>
                    <th width="20%">Tanda Tangan</th>
                </tr>
                <?php
                $jumlah = $dt[5];
                for ($i = 1; $i <= $jumlah; $i++) {
                    echo "<tr>
                            <td align='center'>$i</td>
                            <td></td>
                            <td></td>
                            <td align='center'>..................</td>
                          </tr>";
                }
                ?>
            </table>
        </td>
    </tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr><td colspan="3" align="justify">
        Demikian surat izin gangguan ini dibuat dengan sebenarnya untuk keperluan pengajuan Surat Izin Mendirikan Bangunan (SIMB).
    </td></tr>
</table>

<!-- TTD -->
<br>
<table class="table-list" border="0" cellpadding="4">
    <tr>
        <td align="center">Ketua RT</td>
        <td align="center">Ketua RW</td>
    </tr>
    <tr>
        <td height="70px" align="center"><br><br>__________________</td>
        <td height="70px" align="center"><br><br>__________________</td>
    </tr>
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
        <td colspan="2" align="right"><?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia($tgl_sekarang); ?></td>
    </tr>
</table>

</body>
<?php } } ?>
</html>

