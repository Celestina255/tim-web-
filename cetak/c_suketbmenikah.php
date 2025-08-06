<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff LEFT JOIN tb_penduduk ON tb_detailsurat.nik=tb_penduduk.nik WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  $tgl_lahir = $r['tgl_lahir'];
  
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
    $exp = explode('/', $tgl); // format di database: 07/09/1968
    return (int)$exp[0] . ' ' . $bulan[$exp[1]] . ' ' . $exp[2];
}

  $query = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query)) {
?>
<html>
<body onLoad="window.print()" >
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
  <tr>
    <td colspan="3" align="center">
      <strong><u><?php echo strtoupper($r['nmsurat']); ?></u></strong><br>
      <font size="2">Nomor: <?php echo $r['no']; ?></font>
    </td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="4">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?> Distrik <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, Dengan ini menerangkan bahwa :</td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td></td><td>Nama</td><td>:</td><td><?php echo $r['nama'];?></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td><?php echo $r['nik'];?></td>
  </tr>
    <tr>
    <td></td><td>Tempat / Tanggal Lahir</td><td>:</td><td><?php echo $r['tmp_lahir'];?>, &nbsp; <?php echo tgl_lahir_indo($tgl_lahir);?></td>
  </tr>
    <tr>
    <td></td><td>Kewarganegaraan</td><td>:</td><td><?php echo $r['kwng'];?></td>
  </tr>
    <tr>
    <td></td><td>Agama</td><td>:</td><td><?php echo $r['agama'];?></td>
  </tr>
    <tr>
    <td></td><td>Pekerjaan</td><td>:</td><td><?php echo $r['kerjaan'];?></td>
  </tr>
  <tr>
    <td></td><td>Alamat</td><td>:</td><td><?php echo $r['alamat'];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $r['kelurahan'];?></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td> Distrik <?php echo $r['kec'];?> Kabupaten <?php echo $r['kab'];?></td>
  </tr>
<tr>
    <td colspan="4">&nbsp;</td>
  </tr>


   <tr>
    <td colspan="4">Warga tersebut diatas adalah benar Warga <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?>  dan yang bersangkutan <b>Belum Pernah Menikah</b> dengan siapapun dan Masih berstatus Perjaka / Gadis *)</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4">Demikian keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</td>
  </tr>

  <tr><td colspan="4">
  <!-- Container geser ke kanan tapi isi tetap rata kiri -->
  <div style="width: 40%; float: right; text-align: left;">
    <div style="font-size: 12pt; line-height: 1.5;">
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
