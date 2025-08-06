<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];
$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
  JOIN tb_staff ON tb_detailsurat.ttd = tb_staff.id_staff 
  LEFT JOIN tb_penduduk ON tb_detailsurat.nik = tb_penduduk.nik 
  WHERE tb_detailsurat.kode = '$kodesurat'");

while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', isset($r['detail']) ? $r['detail'] : '');
  for ($i = 0; $i <= 25; $i++) {
    if (!isset($dt[$i])) $dt[$i] = '';
  }

  $tgl_sekarang = date('Y-m-d');
  $hari = date('l');
  $hari_indonesia = [
    'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu',
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

  function tgl_lahir_indo($tgl) {
    $bulan = [
      '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
      '04' => 'April', '05' => 'Mei', '06' => 'Juni',
      '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
      '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    $exp = explode('/', $tgl);
    return (int)$exp[0] . ' ' . $bulan[$exp[1]] . ' ' . $exp[2];
  }

  $query_kel = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query_kel)) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Surat</title>
  <style>
    body { font-family: 'Times New Roman', serif; font-size: 16px; }
    .table-print, .table-list { width: 800px; margin: auto; }
    .table-print td, .table-list td { vertical-align: top; }
    ul, ol { padding-left: 20px; }
  </style>
</head>

<body onload="window.print()">

<table class="table-print" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td rowspan="4" width="80" align="center">
      <img src="../img/<?php echo $rd['logo']; ?>" style="max-width: 85px; height: auto;">
    </td>
    <td colspan="2" align="center"><strong style="font-size: 25px;">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></strong></td>
  </tr>
  <tr><td colspan="2" align="center"><strong style="font-size: 18px;">DISTRIK <?php echo strtoupper($rd['kec']); ?></strong></td></tr>
  <tr><td colspan="2" align="center"><strong style="font-size: 23px;">KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td></tr>
  <tr><td colspan="2" align="center" style="font-size: 15px;">Alamat : <?php echo $rd['kantor']; ?></td></tr>
  <tr><td colspan="3" align="center"><hr style="border: 1.5px double black;"><br></td></tr>
  <tr><td colspan="3" align="center"><strong><u><?php echo strtoupper($r['nmsurat']); ?></u></strong><br><font size="2">Nomor: <?php echo $r['no']; ?></font></td></tr>
</table>

<table class="table-list" border="0" cellspacing="1" cellpadding="2">
<tr><td colspan="3">Yang bertanda tangan di bawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah"; ?> <?php echo $rd['kelurahan']; ?> Distrik <?php echo $rd['kec']; ?> Kabupaten <?php echo $rd['kab']; ?>, dengan ini menerangkan bahwa :</td></tr>
</table>

<p style="font-size:14px; font-weight:bold;">PIHAK I:</p>
<table class="table-list">
  <tr><td width="30%">Nama</td><td>: <?php echo $dt[1]; ?></td></tr>
  <tr><td>NIK</td><td>: <?php echo $dt[0]; ?></td></tr>
  <tr><td>Jenis Kelamin</td><td>: <?php echo $dt[2]; ?></td></tr>
  <tr><td>Tempat / Tanggal Lahir</td><td>: <?php echo $dt[3]; ?>, <?php echo tgl_lahir_indo($dt[4]); ?></td></tr>
  <tr><td>Alamat</td><td>: <?php echo $dt[5]; ?></td></tr>
</table>
<br>
<p style="font-size:14px; font-weight:bold;">PIHAK II:</p>
<table class="table-list">
  <tr><td width="30%">Nama</td><td>: <?php echo $dt[7]; ?></td></tr>
  <tr><td>NIK</td><td>: <?php echo $dt[6]; ?></td></tr>
  <tr><td>Jenis Kelamin</td><td>: <?php echo $dt[8]; ?></td></tr>
  <tr><td>Tempat / Tanggal Lahir</td><td>: <?php echo $dt[9]; ?>, <?php echo tgl_lahir_indo($dt[10]); ?></td></tr>
  <tr><td>Alamat</td><td>: <?php echo $dt[11]; ?></td></tr>
</table>
<br>
<p style="text-align:justify;">
  <b>Selanjutnya disebut selaku: PIHAK II</b><br><br>
  Adapun Pelepasan Hak Milik atas Tanah dimaksud terjadi dikarenakan pada hari <b><?= strtoupper($hari); ?></b>
  tanggal <b><?= tgl_indonesia($tgl_sekarang); ?></b>, Pihak I telah menjual sebidang tanah dengan luas/ukuran
  <b><?php echo format_angka($dt[12]);?> Ha./M2</b> yang terletak di <b><?php echo $dt[13];?></b> kepada Pihak II
  dengan harga <b>Rp. <?php echo format_angka($dt[14]);?></b>,
  <i>(<?php echo kekata($dt[14]);?> Rupiah)</i>, dengan batas-batas tanah sebagai berikut:
</p>
<ul>
  <li><b>Barat berbatasan dengan  :</b> <?php echo $dt[15]; ?></li>
  <li><b>Utara berbatasan dengan  :</b> <?php echo $dt[16]; ?></li>
  <li><b>Timur berbatasan dengan  :</b> <?php echo $dt[17]; ?></li>
  <li><b>Selatan berbatasan dengan:</b> <?php echo $dt[18]; ?></li>
</ul>
<p style="text-align:justify;">Demikian surat pernyataan ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>
<table width="100%" style="font-size:16px; margin-top: 30px;">
  <tr>
    <!-- PIHAK II di kiri -->
    <td align="center" width="50%">
      &nbsp;<br>
      <b>PIHAK II</b><br>
      Membeli
      <br><br><br><br>
      <u><b><?php echo strtoupper($dt[7]); ?></b></u>
    </td>

    <!-- PIHAK I di kanan -->
    <td align="center" width="50%">
      <?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia($tgl_sekarang); ?><br>
      <b>PIHAK I</b><br>
      Yang Menjual
      <br><br><br><br>
      <u><b><?php echo strtoupper($dt[1]); ?></b></u>
    </td>
  </tr>
</table>
<br>
<p><b>Saksi-saksi:</b></p>
<ol>
  <li><?php echo $dt[19]; ?> (_______________)</li><br><br>
  <li><?php echo $dt[20]; ?> (_______________)</li><br><br>
  <li><?php echo $dt[21]; ?> (_______________)</li><br><br>
  <li><?php echo $dt[22]; ?> (_______________)</li><br><br>
</ol>
 <!-- MENGETAHUI -->
<div style="text-align: center; font-size: 12pt;">
  <p>Mengetahui<br>
    <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : 'a.n.'; ?>
    <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Kepala Kelurahan'; ?> <?= $rd['kelurahan']; ?>
  </p>

  <?php
  $queryrs = mysqli_query($con, "SELECT * from setting_surat LIMIT 1");
  while ($rs = mysqli_fetch_array($queryrs)) {
    if ($rs['ttd'] == 'Otomatis'):
  ?>
    <!-- Cap dan TTD ditumpuk -->
    <div style="position: relative; width: 140px; height: 140px; margin: 0 auto;">
      <img src="../file/<?php echo $rd['stample']; ?>" style="position: absolute; top: 0; left: -10px; width: 100px; opacity: 0.9;">
      <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="position: absolute; top: 0; left: 35px; width: 100px;">
    </div>
  <?php endif; } ?>
  <p style="margin-top: -40px;">
  <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
  NIP. <?= !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
</p>

</div>

<?php } } ?>
</body>
</html>
