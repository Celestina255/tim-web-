<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];
$query = mysqli_query($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff WHERE tb_detailsurat.kode='$kodesurat'");

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
  <style>
    body { font-family: 'Times New Roman', serif; font-size: 12pt; }
    .table-print { font-size: 12pt; }
    .header-title { font-size: 23px; font-weight: bold; }
    .kop td { text-align: center; }
    .signature-section { width: 40%; float: right; text-align: left; margin-top: 30px; }
    .signature-images { margin-top: 5px; display: flex; align-items: center; gap: 10px; }
    .ttd-name { margin-top: 5px; }
  </style>
</head>
<body onload="window.print()">

<!-- KOP SURAT -->
<table width="800" align="center" border="0" cellpadding="4" class="kop">
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

<!-- INFORMASI SURAT DAN TUJUAN -->
<table align="center" width="800" cellpadding="2">
  <tr>
    <td width="60%">
      <table>
        <tr><td width="25%">Nomor</td><td width="5%">:</td><td><?php echo $r['no']; ?></td></tr>
        <tr><td>Lampiran</td><td>:</td><td>-</td></tr>
        <tr><td valign="top">Perihal</td><td valign="top">:</td><td><b><?php echo $dt[0]; ?></b></td></tr>
      </table>
    </td>
    <td width="40%" valign="top">
      <div style="text-align: right; padding-right: 40px;">
        <?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia($tgl_sekarang); ?><br><br>
      </div>
      <div style="padding-left: 70px; padding-right: 40px;">
        <table style="font-size: 12pt;">
          <tr><td>Kepada</td></tr>
          <tr><td><b>Yth.</b></td></tr>
          <?php 
            $query_tujuan = mysqli_query($con, "SELECT * FROM tb_dataundangan WHERE kodeu='$kodesurat'");
            $no = 1;
            while ($rr = mysqli_fetch_array($query_tujuan)) {
          ?>
          <tr><td><?php echo $no++; ?>. <?php echo $rr['nm']; ?></td></tr>
          <?php } ?>
          <tr><td>Di</td></tr>
          <tr><td><b>Tempat</b></td></tr>
        </table>
      </div>
    </td>
  </tr>
</table>

<!-- ISI SURAT UNDANGAN -->
<table align="center" width="800" cellpadding="2">
  <tr><td colspan="3">Assalamu'alaikum Wr. Wb.</td></tr>
  <tr><td colspan="3">Dengan hormat,</td></tr>
  <tr><td colspan="3" align="justify">Dalam rangka <?php echo $dt[0]; ?> <?php echo $rd['jnp'] == 'Desa' ? "Kepala Kampung" : "Lurah"; ?> <?php echo $rd['kelurahan']; ?> Distrik <?php echo $rd['kec']; ?> Kabupaten <?php echo $rd['kab']; ?>, mengundang Bapak/Ibu untuk dapat hadir pada:</td></tr>
  <tr><td>&nbsp;&nbsp;Hari</td><td>:</td><td><?php echo strtoupper($hari2); ?></td></tr>
  <tr><td>&nbsp;&nbsp;Tanggal</td><td>:</td><td><?php echo format_hari_tanggal($tgl2); ?></td></tr>
  <tr><td>&nbsp;&nbsp;Waktu</td><td>:</td><td><?php echo $dt[3]; ?> WIT</td></tr>
  <tr><td>&nbsp;&nbsp;Tempat</td><td>:</td><td><?php echo $dt[4]; ?></td></tr>
  <tr><td colspan="3"><br>Demikian undangan ini dibuat, dimohon kehadirannya tepat waktu. Atas perhatian dan kerjasama Bapak/Ibu disampaikan terima kasih.<br><br>Wassalamu'alaikum Wr. Wb.</td></tr>
</table>

<!-- TANDA TANGAN -->
<div class="signature-section">
  <div>Dikeluarkan di: <?php echo $rd['kelurahan']; ?><br>Pada Tanggal: <?php echo tgl_indonesia($tgl_sekarang); ?></div>
  <div style="font-weight: bold; margin-top: 10px;">KEPALA KAMPUNG</div>
  <?php 
    $queryrs = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
    while ($rs = mysqli_fetch_array($queryrs)) {
      if ($rs['ttd'] == 'Otomatis') {
  ?>
  <div class="signature-images">
    <img src="../file/<?php echo $rd['stample']; ?>" style="width: 90px; height: 90px; opacity: 0.9;">
    <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="width: 90px; height: 90px; margin-left: -35px;">
  </div>
  <?php }} ?>
  <div class="ttd-name">
    <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
    NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
  </div>
</div>

<?php } } ?>
</body>
</html>
