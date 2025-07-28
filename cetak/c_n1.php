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
<table width="97%" align="center" border="0" cellspacing="1" cellpadding="1" class="table-print">
  <tr>
    <td colspan="3"><small>LAMPIRAN IV
<br>KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM
<br>NOMOR 473 TAHUN 2020
<br>TENTANG
<br>PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN</small></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=3 color="black">FORMULIR SURAT PENGANTAR NIKAH
      </font>
    </strong><br><small><?php echo $r['no'];?></small></td>
  </tr>
    <tr>
    <td></td><td></td><td align="right">Model N1 &nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td width="25%"><font size=3>DESA / KELURAHAN </td><td>:</td><td><?php echo strtoupper($rd['kelurahan']);?></font></td>
  </tr>
  <tr>
    <td width="25%"><font size=3>DISTRIK </td><td>:</td><td><?php echo strtoupper($rd['kec']);?></font></td>
  </tr>
  <tr>
    <td width="25%"><font size=3>KABUPATEN </td><td>:</td><td><?php echo strtoupper($rd['kab']);?></font></a>
    </td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?> Distrik <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, dengan ini menerangkan sesungguhnya bahwa :</td>
  </tr>
  <?php
  $querycalon = mysqli_query ($con, "SELECT tb_detailsurat.*, tb_datacalon.* from  tb_detailsurat, tb_datacalon 
WHERE tb_datacalon.status_na='Tidak Numpang' AND tb_detailsurat.kode=tb_datacalon.kode AND tb_datacalon.kode='$_GET[kode]'");
while ($rc = mysqli_fetch_array($querycalon)){
?>
</table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>1.</td><td> Nama</td><td>:</td><td><?php echo $rc['nama'];?></td>
  </tr>
  <tr>
    <td>2.</td><td> NIK</td><td>:</td><td><?php echo $rc['nik'];?></td>
  </tr>
    <tr>
    <td>3.</td><td> Jenis Kelamin</td><td>:</td><td><?php echo $rc['jk'];?></td>
  </tr>
  <tr>
    <td>4.</td><td> Tmp. & Tgl. Lahir </td><td>:</td><td><?php echo $rc['tmp_lahir'];?>, <?php echo $rc['tgl_lahir'];?></td>
  </tr>
  <tr>
    <td>5.</td><td> Kewarganegaraan</td><td>:</td><td><?php echo $rc['kwng'];?></td>
  </tr>
    <tr>
    <td>6.</td><td> Agama</td><td>:</td><td><?php echo $rc['agama'];?></td>
  </tr>
  <tr>
    <td>7.</td><td> Pekerjaan</td><td>:</td><td><?php echo $rc['pkjn'];?></td>
  </tr>
    <tr>
    <td valign="top">8.</td><td valign="top"> Alamat</td><td valign="top">:</td><td><?php echo $rc['alamat'];?> Kampung <?php echo $rc['kelurahan'];?> <br>Distrik <?php echo $rc['kec'];?> Kabupaten <?php echo $rc['kab'];?> Provinsi <?php echo $rc['prov'];?></td>
  </tr>
  <tr>
    <td>9.</td><td> Status Pernikahan</td><td>:</td><td><?php echo $rc['status'];?></td>
  </tr>
<?php }?>
  </table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4">adalah benar Anak dari Pernikahan seorang pria :</td>
  </tr>
  <tr>
    <td>1. </td><td>Nama</td><td>:</td><td><?php echo $dt[33];?> BIN <?php echo $dt[34];?></td>
  </tr>
  <tr>
    <td>2. </td><td>NIK</td><td>:</td><td><?php echo $dt[32];?></td>
  </tr>
    <tr>
    <td>3. </td><td>Jenis Kelamin</td><td>:</td><td><?php echo $dt[35];?></td>
  </tr>
  <tr>
    <td>4. </td><td>Tmp. & Tgl. Lahir </td><td>:</td><td><?php echo $dt[36];?>, <?php echo $dt[37];?></td>
  </tr>
  <tr>
    <td>5. </td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[38];?></td>
  </tr>
    <tr>
    <td>6. </td><td>Agama</td><td>:</td><td><?php echo $dt[39];?></td>
  </tr>
  <tr>
    <td>7. </td><td>Pekerjaan</td><td>:</td><td><?php echo $dt[40];?></td>
  </tr>
    <tr>
    <td valign="top">8. </td><td valign="top">Alamat</td><td valign="top">:</td><td><?php echo $dt[45];?> Kampung <?php echo $dt[41];?> <br>Distrik <?php echo $dt[42];?> Kabupaten <?php echo $dt[43];?> Provinsi <?php echo $dt[44];?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4">dengan seorang wanita :</td>
  </tr>
  <tr>
    <td>1. </td><td>Nama</td><td>:</td><td><?php echo $dt[48];?> BINTI <?php echo $dt[49];?></td>
  </tr>
  <tr>
    <td>2. </td><td>NIK</td><td>:</td><td><?php echo $dt[47];?></td>
  </tr>
    <tr>
    <td>3. </td><td>Jenis Kelamin</td><td>:</td><td><?php echo $dt[50];?></td>
  </tr>
  <tr>
    <td>4. </td><td>Tmp. & Tgl. Lahir </td><td>:</td><td><?php echo $dt[51];?>, <?php echo $dt[52];?></td>
  </tr>
  <tr>
    <td>5. </td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[53];?></td>
  </tr>
    <tr>
    <td>6. </td><td>Agama</td><td>:</td><td><?php echo $dt[54];?></td>
  </tr>
  <tr>
    <td>7. </td><td>Pekerjaan</td><td>:</td><td><?php echo $dt[55];?></td>
  </tr>
    <tr>
    <td valign="top">8. </td><td valign="top">Alamat</td><td valign="top">:</td><td><?php echo $dt[60];?> Kampung <?php echo $dt[56];?> <br>Distrik <?php echo $dt[57];?> Kabupaten <?php echo $dt[58];?> Prov. <?php echo $dt[59];?></td>
  </tr>
  </table>

<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Demikian, Surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</td>
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
