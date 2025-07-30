<?php
error_reporting(0);
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel data surat
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff WHERE tb_detailsurat.kode='$kodesurat'");
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

  $query = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query)) {
?>
<html>
<head>
<title></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()" style='font-family: Bookman Old Style ; font-size: 12pt;'>
<h1 align="center">
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
  
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td>Nomor</td><td>:</td><td><?php echo $r['no'];?></td><td><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo format_hari_tanggal(date('Y-m-d')); ?></td>
  </tr>
  <tr>
    <td>Lampiran</td><td>:</td><td>-</td><td>Kepada,</td>
  </tr>
  <tr>
    <td>Perihal</td><td>:</td><td><b>Permohonan Pencatatan Pernyataan Ahli Waris</b></td><td>Yth. Bapak Kepala Distrik <?php echo $rd['kec'];?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td><td>di-</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo $rd['kec'];?></u></b></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;<br><br><br></td>
  </tr>
  <tr>
    <td colspan="4" align="justify"><p  style="font:Arial; font-size: 12pt;" >Menindaklanjuti permohonan pencatatan pernyataan Ahli Waris Alm/Almh. <?php echo $rr['nama'];?> di Kantor <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?> tanggal <?php echo format_hari_tanggal(date('Y-m-d')); ?> atas nama pemohon <?php echo $r['nama'] !='' ?  $r['nama'] : '_____________________';?>.<br><br>
Berkaitan dengan hal tersebut, berikut kami mohonkan kepada Bapak untuk berkenan 
mencatatkan Pernyataan Ahli Waris dimaksud di Kantor Distrik <?php echo $rd['kec'];?>.<br><br>
Perlu Kami sampaikan bahwa Surat Pernyataan Ahli Waris tersebut sudah Kami 
catatkan di Kantor <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?> dengan nomor <?php echo $r['no'];?> tanggal 
<?php echo format_hari_tanggal(date('Y-m-d')); ?>.</p>

</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  
    <tr>
    <td colspan="4">Demikian Kami mohonkan, atas kesediaan Bapak disampaikan terima kasih.</td>
  </tr>

  <tr><td colspan="4">
<!-- Container geser ke kanan tapi isi tetap rata kiri -->
<div style="width: 40%; float: right; text-align: left;">
    <div style="font-size: 12pt; line-height: 1.5;"><br><br><br><br>
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

    <div style="margin-top: 5px;">
      <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
      NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
    </div>
  </div>
</td></tr>
</table>
  <?php }} ?>
</body>
</html>
