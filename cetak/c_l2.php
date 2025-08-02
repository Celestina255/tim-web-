<?php
include_once "../koneksi.php";
include '../assets/inc.php';

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel 
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  $tgl2 = $dt[2];
  $bl2 = format_hari_tanggal($tgl2);
  $bln2 = explode(',', $bl2);
  $hari2 = $bln2[0];

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
<body onLoad="window.print()" >
<h1 align="center">

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
    <tr>
    <td colspan="5" align="center"><font size=4><b><u>RINCIAN BIAYA PERJALANAN DINAS</u></b></font></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="25%">Lampiran SPPD Nomor</td><td>: <?php echo $r['no']; ?></td>
  </tr>
    <tr>
    <td>Tanggal</td><td>: <?php echo tgl_indonesia($tgl_sekarang); ?></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="800" border="1" cellspacing="0" cellpadding="4">
<tr>
  <td align="center">1.</td>
  <td width="50%">Uang harian, Uang saku, Uang makan & Transfort lokal</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[13])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">2.</td>
  <td width="50%">Biaya Transfort</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[14])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">3.</td>
  <td width="50%">Biaya Penginapan</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[15])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">4.</td>
  <td width="50%">Uang Representatif</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[16])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">5.</td>
  <td width="50%">Sewa Kendaraan dalam Kota</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[17])); ?></td>
  <td>-</td>
</tr>

  <?php 
$query = mysqli_query ($con, "SELECT * from tb_detailsurat WHERE kode='$kodesurat'");
while ($rp = mysqli_fetch_array($query)){
  $dtl=explode(';',$rp['detail']);
  $u = floatval(preg_replace('/[^\d.]/', '', $dtl[13]));
  $t = floatval(preg_replace('/[^\d.]/', '', $dtl[14]));
  $i = floatval(preg_replace('/[^\d.]/', '', $dtl[15]));
  $r = floatval(preg_replace('/[^\d.]/', '', $dtl[16]));
  $s = floatval(preg_replace('/[^\d.]/', '', $dtl[17]));
  $jumlah = $u + $t + $i + $r + $s;
  
?>

      <tr>
    <td align="center"></td><td width="50%"><b>JUMLAH</b></td><td align="right"><b>Rp. <?php echo format_angka($jumlah);?></b></td><td>-</td>
  </tr>
<?php } ?>
      <tr>
    <td align="center"></td><td width="50%" colspan="2">Terbilang : <b><?php echo kekata($jumlah);?> Rupiah</b></td><td>-</td>
  </tr>

  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>

<tr><td></td><td></td><td>
<table width="98%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
          <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>, &nbsp;<?php echo tgl_indonesia($tgl_sekarang); ?></td>
  </tr>
    <tr>
    <td align="center">Telah dibayar sejumlah <br>Rp. <?php echo format_angka($jumlah);?></td><td align="center" class="pull pull-right">Telah menerima jumlah uang sebesar <br> Rp. <?php echo format_angka($jumlah);?></td>
  </tr>
  <tr>
    <td align="center">Bendahara Pengeluaran</td><td align="center" class="pull pull-right">Yang Menerima,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><b><?php echo $rd['bendahara'];?></b></u></td><td align="center" class="pull pull-right"><u><b><?php echo $dt[4];?></b></u></td>
  </tr>
    <tr>
    <td align="center" colspan="2"><hr></td>
  </tr>
  <tr>
    <td align="center" colspan="2">PERHITUNGAN SPPD RAMPUNG</td>
  </tr>
  <tr>
    <td>Ditetapkan sejumlah</td><td>: Rp. <?php echo format_angka($jumlah);?></td>
  </tr>
    <tr>
    <td>Yang telah dibayar semula</td><td>: Rp. <?php echo format_angka($jumlah);?></td>
  </tr>
    <tr>
    <td>Sisa Kurang / Lebih</td><td>: Rp. _______________</td>
  </tr>
  <tr>
    <td></td><td align="center" class="pull pull-right">Kepala SKP/KPA,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td><td align="center" class="pull pull-right"><u><b><?php echo $dt[0];?></b></u></td>
  </tr>
    <tr>
    <td></td><td align="center" class="pull pull-right">NIP. <?php echo $dt[1];?></td>
  </tr>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>
