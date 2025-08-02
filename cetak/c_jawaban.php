    <link rel="stylesheet" href="../assets/css/style.css">
<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
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
<head>
<title></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()" >
<h1 align="center">
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

<table width="100%" style="margin-bottom: 10px;">
  <tr>
    <td style="width: 65%;"></td>
    <td style="text-align: right;">
      Banjar Ausoy, <?php echo tgl_indonesia($tgl_sekarang); ?>
    </td>
  </tr>
</table>

<!-- Informasi Nomor, Lampiran, Perihal -->
<table width="100%">
  <tr>
    <td style="width: 20%;">Nomor</td>
    <td style="width: 2%;">:</td>
    <td style="width: 78%;"><?php echo $r['no']; ?></td>
  </tr>
  <tr>
    <td>Lampiran</td>
    <td>:</td>
    <td><?php echo $dt[1]; ?></td>
  </tr>
  <tr>
    <td valign="top">Perihal</td>
    <td valign="top">:</td>
    <td valign="top"><b><?php echo $dt[0]; ?></b></td>
  </tr>
</table>
<tr>
    <td colspan="4">&nbsp;</td>
  </tr>
<table> 
  <tr>
    <td></td><td></td><td colspan="3">Assalamu 'alaikum Wr. Wb.<br></td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td></td><td colspan="3">Dengan hormat,</td>
  </tr>
  <tr>
    <td></td><td></td><td colspan="3" align="justify">Menjawab <?php echo $dt[2]?>, berikut ini Kami sampaikan bahwa <?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td></td><td colspan="3" align="justify">Demikian kami sampaikan mohon maklum adanya.<br></td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td></td><td colspan="3">Wassalamu 'alaikum Wr. Wb.</td>
  </tr>
</table>
<tr><td colspan="4">

<!-- Container geser ke kanan tapi isi tetap rata kiri -->
<div style="width: 40%; float: right; text-align: left;"><br>
<div style="font-size: 12pt; line-height: 1.5; font-weight: normal;">
  Dikeluarkan di : <?php echo $rd['kelurahan']; ?><br>
  Pada Tanggal &nbsp;&nbsp;: <?php echo tgl_indonesia($tgl_sekarang); ?>
</div>

  <div style="font-weight: bold; font-size: 12pt; margin-top: 5px;">
    KEPALA KAMPUNG
  </div>

  <?php 
  $queryrs = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
  while ($rs = mysqli_fetch_array($queryrs)) {
    if ($rs['ttd'] == 'Otomatis'):
  ?>
    <!-- Cap dan ttd -->
    <div style="margin-top: 5px; display: flex; align-items: center; gap: 10px;">
      <img src="../file/<?php echo $rd['stample']; ?>" style="width: 90px; height: 90px; opacity: 0.9;">
      <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="width: 90px; height: 90px; margin-left: -35px;">
    </div>
  <?php endif; } ?>

  <div style="font-weight: bold; font-size: 12pt; margin-top: 5px;">
    <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
    NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
  </div>
</div>
</td></tr>
</table>
<?php }} ?>
</body>

</html>
