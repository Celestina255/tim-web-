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
?><html>
<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
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
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="60%">SKPD : <?php echo strtoupper($rd['kelurahan']);?></td><td></td><td>Lembar ke</td><td>:</td>
  </tr>
    <tr>
    <td></td><td></td><td>Kode No. </td><td>:</td>
  </tr>
    <tr>
    <td></td><td></td><td>Nomor </td><td>: <?php echo $r['no']; ?></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="center"><font size=4><b><u>SURAT PERINTAH PERJALANAN DINAS</u></b></font></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="800" border="1" cellspacing="0" cellpadding="4">


  <tr>
    <td align="center">1.</td><td width="40%">Nama Kepala SKPD/KPA</td><td>:</td><td colspan="2"><?php echo $dt[0];?></td>
  </tr>
  <tr>
    <td align="center">2. </td><td>Nama / NIP Pegawai yang melaksanakan Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[4];?> / <br>NIP.: <?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td align="center" rowspan="3">3. </td><td>a. Pangkat dan Golongan</td><td>:</td><td colspan="2"><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td>b. Jabatan</td><td>:</td><td colspan="2"><?php echo $dt[7];?></td>
  </tr>
      <tr>
    <td>c. Tingkat Biaya Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[12];?></td>
  </tr>
 
  <tr>
    <td align="center">4.</td><td>Maksud Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[8];?></td>
  </tr>
  <tr>
    <td align="center">5. </td><td>Alat Angkutan yang digunakan</td><td>:</td><td colspan="2">_____________</td>
  </tr>
    <tr>
    <td align="center" rowspan="2">6 </td><td>a. Tempat Berangkat</td><td>:</td><td colspan="2"><?php echo $rd['kelurahan'];?></td>
  </tr>
    <tr>
    <td>b. Tempat Tujuan</td><td>:</td><td colspan="2"><?php echo $dt[9];?></td>
  </tr>
  <tr>
  <td align="center" rowspan="3">7. </td><td>a. Lamanya Perjalanan Dinas</td><td>:</td><td colspan="2">_____ Hari *)</td>
</tr>
<tr>
  <td>b. Tanggal Berangkat</td><td>:</td><td colspan="2"><?php echo tgl_indonesia($dt[10]);?></td>
</tr>
<tr>
  <td>c. Tanggal Harus Kembali / Tiba ditempat Baru *)</td><td>:</td><td colspan="2"><?php echo tgl_indonesia($dt[11]);?></td>
</tr>

    <?php 
$query = mysqli_query ($con, "SELECT COUNT(*) as jdata from tb_datapdinas WHERE kodepd='$kodesurat'");
$no=1;

while ($rrr = mysqli_fetch_array($query)){
  
?>
    <tr>
    <td align="center" rowspan="<?php echo(int)$rrr['jdata']+1; ?>">8. </td><td>Pengikut :  Nama</td><td></td><td>Tanggal Lahir</td><td>Keterangan</td>
  </tr>
  <?php }?>
  <?php 
$query = mysqli_query ($con, "SELECT * from tb_datapdinas WHERE kodepd='$kodesurat'");
$no=1;
while ($rr = mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $no++; ?>. <?php echo $rr['nm'];?></td><td></td><td><?php echo $rr['tgl_lahir'];?></td><td><?php echo $rr['ket'];?></td>
  </tr>
<?php }?>

  <tr>
    <td align="center" rowspan="3">9. </td><td>Pembebanan Anggaran</td><td></td><td colspan="2"></td>
  </tr>
   <tr>
    <td>a. Instansi</td><td></td><td colspan="2"><?php echo $rd['kelurahan'];?></td>
  </tr>
   <tr>
    <td>b. Akun</td><td></td><td colspan="2">__________________</td>
  </tr>
    <tr>
    <td align="center">10. </td><td>Keterangan lain</td><td>:</td><td colspan="2">-</td>
  </tr>
  </table>
  
  <tr><td colspan="4">

<!-- Container geser ke kanan tapi isi tetap rata kiri -->
<div style="width: 40%; float: right; text-align: left;"><br><br><br><br><br> 
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
