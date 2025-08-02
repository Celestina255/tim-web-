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
  $tglpdn = $dt[11];
  function tgl_indo_hari($tanggal) {
    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $tgl = date('Y-m-d', strtotime($tanggal));
    $hari_ini = $hari[date('l', strtotime($tgl))];
    $pecah = explode('-', $tgl);

    return $hari_ini . ', ' . $pecah[2] . ' ' . $bulan[$pecah[1]] . ' ' . $pecah[0];
}

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
<table align="center" class="table-print" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="4">Yang bertanda tangan dibawah ini :</td>
  </tr>

  <tr>
    <td></td><td>Nama</td><td>:</td><td><?php echo $dt[0];?></td>
  </tr>
  <tr>
    <td></td><td>NIP</td><td>:</td><td><?php echo $dt[1];?></td>
  </tr>
    <tr>
    <td></td><td>Pangkat</td><td>:</td><td><?php echo $dt[2];?></td>
  </tr>
    <tr>
    <td></td><td>Jabatan</td><td>:</td><td><?php echo $dt[3];?></td>
  </tr>
  <tr>
    <td colspan="4" align="center"></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><b>MENUGASKAN :</b></td>
  </tr>
  <tr>
    <td colspan="4" align="center"></td>
  </tr>
  <tr>
    <td></td><td>Nama</td><td>:</td><td><?php echo $dt[4];?></td>
  </tr>
  <tr>
    <td></td><td>NIP</td><td>:</td><td><?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td></td><td>Pangkat</td><td>:</td><td><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td></td><td>Jabatan</td><td>:</td><td><?php echo $dt[7];?></td>
  </tr>

  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Untuk <b><?php echo $dt[8];?></b> di <b><?php echo $dt[9];?></b> pada tanggal : <b><?php echo tgl_indo_hari($tglpdn); ?>
</b> sampai dengan selesai.</td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Demikian untuk menjadi maklum dan dilaksanakan dengan sebaik - baiknya.</td>
  </tr>

  <tr><td colspan="4">
  <!-- Container geser ke kanan tapi isi tetap rata kiri -->
  <div style="width: 40%; float: right; text-align: left;"><br>
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
