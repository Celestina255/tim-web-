<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel data surat
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_dataassesment.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_dataassesment, tb_detailsurat, tb_penduduk
WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
while ($r = mysqli_fetch_array($query)){
  $dt=explode('#',$r['detail']);
  $tgl = $r['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
?>
<?php 
$query = mysqli_query ($con, "SELECT * from tb_kelurahan");
while ($rd = mysqli_fetch_array($query)){
?>
<html>

<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td rowspan="3" width="70"><img src="../img/slrt.png" width="90" height="90"></td>
    <td colspan="" align="center"><strong><font size=4 color="black">INSTRUMEN ASSESMENT
    </strong></td><td></td>
  </tr>
    <tr>
    <td colspan="" align="center"><strong><font size=5 color="black">PENYANDANG MASALAH KESEJAHTERAAN SOSIAL</font>
    </strong></td><td width="70"></td>
  </tr>
    <tr>
    <td colspan="" align="center"><strong><font size=4 color="black">LAYANAN TERPADU RUMAH HARAPAN MASYARAKAT</font></strong></td>
    <td width="70"></td>
  </tr>
    <tr>
   <td colspan="3" align="center"><strong><font size=3 color="black"><i>KABUPATEN <?php echo strtoupper($rd['kab']);?></i><hr size="3"></font></strong></td>
  </tr>
</table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td><b>I. </b></td><td colspan="3"><b>LOKASI </b></td>
  </tr>
  <tr>
    <td></td><td>1. Alamat</td><td>:</td><td><?php echo $dt['7'];?></td>
  </tr>
  <tr>
    <td></td><td>2. Desa</td><td>:</td><td><?php echo $r['kelurahan'];?></td>
  </tr>

    <tr>
    <td></td><td>3. Kecamatan</td><td>:</td><td><?php echo $r['kec'];?></td>
  </tr>
      <tr>
    <td></td><td>4. Kabupaten</td><td>:</td><td><?php echo $r['kab'];?></td>
  </tr>

  <tr>
    <td><b>II. </b></td><td colspan="3"><b>IDENTITAS</b></td>
  </tr>
  <tr>
    <td></td><td>1. Nama</td><td>:</td><td><b><?php echo $dt['1'];?></b></td>
  </tr>
  <tr>
    <td></td><td>2. NIK</td><td>:</td><td><?php echo $dt['0'];?></td>
  </tr>
    <tr>
    <td></td><td>3. ID DTKS</td><td>:</td><td><?php echo $dt['10'];?></td>
  </tr>
      <tr>
    <td></td><td>4. Tmp. & Tgl. Lahir</td><td>:</td><td><?php echo $dt['2'];?>, <?php echo $dt['3'];?></td>
  </tr>
    <tr>
    <td></td><td>5. Status Perkawinan</td><td>:</td><td><?php echo $dt['4'];?></td>
  </tr>
  <tr>
    <td></td><td>6. Pekerjaan & Penghasilan/Bulan</td><td>:</td><td><?php echo $dt['5'];?> / Rp. <?php echo format_angka($dt['6']);?>,-/Bulan</td>
  </tr>
  <tr>
    <td></td><td>7. Jumlah Anggota Keluarga</td><td>:</td><td><?php echo $dt['8'];?></td>
  </tr>
  <tr>
    <td></td><td>8. Program yang dimiliki</td><td>:</td><td><?php echo $dt['9'];?></td>
  </tr>
<tr>
    <td><b>III.</b></td><td colspan="3"><b>KELUARGA</b></td>
  </tr>
  <tr>
    <td colspan="4">
      <table align="center" class="table" width="90%" border="1" cellspacing="4" cellpadding="6">
    <tr>
      <td align="center"><b>No</b></td>
      <td><b>Nama</b></td>
      <td align="center"><b>Hub. Keluarga</b></td>
      <td align="center"><b>Umur</b></td>
      <td align="left"><b>Pekerjaan</b></td>
      <td align="center"><b>Penghasilan</b></td>
    </tr>
    <?php
    $query = mysqli_query ($con, "SELECT  * from tb_dataassesment WHERE tb_dataassesment.kode_surat='$kodesurat'");
    $no=1;
while ($raw = mysqli_fetch_array($query)){
  
?>
    <tr>
      <td align="center"><?php echo $no++;?></td>
      <td><?php echo $raw['nama'];?></td>
      <td align="center"><?php echo $raw['shdk'];?></td>
      <td align="center"><?php echo $raw['umur'];?></td>
      <td align="left"><?php echo $raw['pekerjaan'];?></td>
      <td align="right">Rp. <?php echo format_angka($raw['gaji']);}?></td>
</tr>

</table></td>
  </tr>
    <tr>
    <td><b>IV. </b></td><td colspan="3"><b>PERMASALAHAN</b></td>
  </tr>
  <?php
  $query1 = mysqli_query ($con, "SELECT kode, detail FROM tb_detailsurat WHERE tb_detailsurat.kode='$kodesurat' ");
while ($r1 = mysqli_fetch_array($query1)){
  $dt1=explode('#',$r1['detail']);
  $m=explode(';',$dt1[11]);
  for ($x=0; $x < count($m) ; $x++) { 
  ?>
  <tr>
    <td></td><td colspan="3"><?php echo $m[$x]; ?></td>
  </tr>
<?php } } ?>

  <tr>
    <td><b>V. </b></td><td colspan="3"><b>PERMOHONAN BANTUAN / KELUHAN </b></td>
  </tr>
  <?php
  $query2 = mysqli_query ($con, "SELECT kode, detail FROM tb_detailsurat WHERE tb_detailsurat.kode='$kodesurat' ");
while ($r2 = mysqli_fetch_array($query2)){
  $dt2=explode('#',$r2['detail']);
  $k = explode(';', $dt2[12]);

  for ($y=0; $y < count($k) ; $y++) { 
  ?>
    <tr>
    <td></td><td colspan="3"><?php echo $k[$y]; ?></td>
  </tr>
<?php } } ?>

<tr><td colspan="4">
<table width="90%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td align="center" class="pull pull-right"><?php echo $rd['kab'];?>,&nbsp;<?php echo $bulan;?></td>
  </tr>
  <tr>
    <td rowspan="2" width="50%" align="center">Fasilitator</td><td align="center" valign="top" class="pull pull-right">Ketua Puskesos</td>
  </tr>
  
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center"><br><br><br><u><b><?php echo $dt['14'];?></b></u></td><td align="center" class="pull pull-right"><br><br><br><u><b><?php echo $dt['13'];?></b></u></td>
  </tr> 
  <tr>
    <td rowspan="2" width="50%" align="center"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?></td><td align="center" valign="top" class="pull pull-right">Supervisor</td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center"><br><br><br><u><b><?php echo $r['ttd'];?></b></u></td><td align="center" class="pull pull-right"><br><br><br><u><b><?php echo $dt['15'];?></b></u></td>
  </tr> 
  <?php 
$query2 = mysqli_query ($con, "SELECT * from tb_kecamatan LIMIT 1");
while ($rc = mysqli_fetch_array($query2)){
?>
  <tr>
    <td rowspan="2" colspan="2" width="50%" align="center">Camat <?php echo $rc['kecamatan'];?></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><br><br><br><u><b><?php echo $rc['nama_camat'];?></b></u><br>NIP. <?php echo $rc['nip_camat'];?></td>
  </tr>
<?php } ?>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>