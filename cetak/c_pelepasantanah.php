<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];
$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
  JOIN tb_staff ON tb_detailsurat.ttd = tb_staff.id_staff 
  LEFT JOIN tb_penduduk ON tb_detailsurat.nik = tb_penduduk.nik 
  WHERE tb_detailsurat.kode = '$kodesurat'");

while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  $hari = date('l');

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

  $query_kel = mysqli_query($con, "SELECT * FROM tb_kelurahan");
  while ($rd = mysqli_fetch_array($query_kel)) {
?>

<!DOCTYPE html>
<html>
<head>
  <title>Surat Pernyataan Gadai Tanah</title>
</head>
<body onload="window.print()">

<table width="100%" style="text-align:center;">
  <tr>
    <td rowspan="4" width="80"><img src="../img/<?php echo $rd['logo']; ?>" width="70"></td>
    <td><strong style="font-size:18px;">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></strong></td>
  </tr>
  <tr><td><strong style="font-size:16px;">DISTRIK <?php echo strtoupper($rd['kec']); ?></strong></td></tr>
  <tr><td><strong style="font-size:20px;">KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td></tr>
  <tr><td><small><i><?php echo $rd['kantor']; ?></i></small></td></tr>
</table>

<hr style="border: 2px double black; margin-top: 10px; margin-bottom: 20px;">

<center>
  <h4><u><?php echo strtoupper($r['nmsurat']); ?></u></h4>
  <p>Nomor: <?php echo $r['no']; ?></p>
</center>

<p style="text-align:justify;">
  Yang bertanda tangan di bawah ini <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Lurah'; ?> <?php echo $rd['kelurahan']; ?>, Distrik <?php echo $rd['kec']; ?>, Kabupaten <?php echo $rd['kab']; ?>, menerangkan bahwa:
</p>

<!-- Data Pihak I -->
<b>PIHAK I:</b>
<table width="100%">
  <tr><td width="30%">Nama</td><td>: <?php echo $dt[1]; ?></td></tr>
  <tr><td>NIK</td><td>: <?php echo $dt[0]; ?></td></tr>
  <tr><td>Jenis Kelamin</td><td>: <?php echo $dt[2]; ?></td></tr>
  <tr><td>Tempat/Tgl Lahir</td><td>: <?php echo $dt[3]; ?>, <?php echo $dt[4]; ?></td></tr>
  <tr><td>Alamat</td><td>: <?php echo $dt[5]; ?></td></tr>
</table>

<br>

<!-- Data Pihak II -->
<b>PIHAK II:</b>
<table width="100%">
  <tr><td width="30%">Nama</td><td>: <?php echo $dt[7]; ?></td></tr>
  <tr><td>NIK</td><td>: <?php echo $dt[6]; ?></td></tr>
  <tr><td>Jenis Kelamin</td><td>: <?php echo $dt[8]; ?></td></tr>
  <tr><td>Tempat/Tgl Lahir</td><td>: <?php echo $dt[9]; ?>, <?php echo $dt[10]; ?></td></tr>
  <tr><td>Alamat</td><td>: <?php echo $dt[11]; ?></td></tr>
</table>

<br>

<p style="text-align:justify;">
Telah terjadi gadai tanah dari PIHAK I kepada PIHAK II yang terletak di <?php echo $dt[13]; ?> seluas <?php echo $dt[12]; ?> m², dengan harga Rp. <?php echo format_angka($dt[14]); ?> (<?php echo kekata($dt[14]); ?> Rupiah).
</p>

<p>Batas-batas tanah sebagai berikut:</p>
<ul>
  <li>Barat: <?php echo $dt[15]; ?></li>
  <li>Utara: <?php echo $dt[16]; ?></li>
  <li>Timur: <?php echo $dt[17]; ?></li>
  <li>Selatan: <?php echo $dt[18]; ?></li>
</ul>

<p style="text-align:justify;">Demikian surat pernyataan ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>

<br><br>

<table width="100%">
  <tr>
    <td align="center">Pihak II<br><br><br><br><u><?php echo $dt[7]; ?></u></td>
    <td align="center"><?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia($tgl_sekarang); ?><br>Pihak I<br><br><br><br><u><?php echo $dt[1]; ?></u></td>
  </tr>
</table>

<br><br>

<b>Saksi-saksi:</b>
<ol>
  <li><?php echo $dt[19]; ?> (_______________)</li>
  <li><?php echo $dt[20]; ?> (_______________)</li>
  <li><?php echo $dt[21]; ?> (_______________)</li>
  <li><?php echo $dt[22]; ?> (_______________)</li>
</ol>

<br><br>

<!-- TTD Kepala -->
<div style="width: 40%; float: right; text-align: left;">
  <p>Dikeluarkan di: <?php echo $rd['kelurahan']; ?><br>
  Pada Tanggal: <?php echo tgl_indonesia($tgl_sekarang); ?></p>

  <p><b>KEPALA KAMPUNG</b></p>

  <?php 
    $queryrs = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
    while ($rs = mysqli_fetch_array($queryrs)) {
      if ($rs['ttd'] == 'Otomatis'):
  ?>
  <div style="margin-top: 5px;">
    <img src="../file/<?php echo $rd['stample']; ?>" style="width: 90px;">
    <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="width: 90px; margin-left: -40px;">
  </div>
  <?php endif; } ?>

  <p><u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
  NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?></p>
</div>

<?php } } ?>

</body>
</html>
