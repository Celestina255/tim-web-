<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
while ($r = mysqli_fetch_array($query)){
  $dt=explode(';',$r['detail']);
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
    <td colspan="3" align="center"><strong><font size=3 color="black">FORMULIR <?php echo strtoupper($r['nmsurat']); ?>
      
    </font>
    </strong></td>
  </tr>
    <tr>
    <td></td><td></td><td align="right">Model N1 &nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td width="25%"><font size=3>DESA / KELURAHAN </td><td>:</td><td><?php echo strtoupper($rd['kelurahan']);?></font></td>
  </tr>
  <tr>
    <td width="25%"><font size=3>KECAMATAN </td><td>:</td><td><?php echo strtoupper($rd['kec']);?></font></td>
  </tr>
  <tr>
    <td width="25%"><font size=3>KABUPATEN </td><td>:</td><td><?php echo strtoupper($rd['kab']);?></font></a>
    </td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=3 color="black">FORMULIR PENGANTAR NIKAH
      </font>
    </strong><br><small><?php echo $r['no'];?></small></td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?> Kecamatan <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, menerangkan dengan sesungguhnya bahwa :</td>
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
    <td valign="top">8.</td><td valign="top"> Alamat</td><td valign="top">:</td><td><?php echo $rc['alamat'];?> Kelurahan <?php echo $rc['kelurahan'];?> <br>Kec. <?php echo $rc['kec'];?> Kab. <?php echo $rc['kab'];?> Prov. <?php echo $rc['prov'];?></td>
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
    <td valign="top">8. </td><td valign="top">Alamat</td><td valign="top">:</td><td><?php echo $dt[45];?> Kelurahan <?php echo $dt[41];?> <br>Kec. <?php echo $dt[42];?> Kab. <?php echo $dt[43];?> Prov. <?php echo $dt[44];?></td>
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
    <td valign="top">8. </td><td valign="top">Alamat</td><td valign="top">:</td><td><?php echo $dt[60];?> Kelurahan <?php echo $dt[56];?> <br>Kec. <?php echo $dt[57];?> Kab. <?php echo $dt[58];?> Prov. <?php echo $dt[59];?></td>
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
<table width="100%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?></td>
  </tr>
  <tr>
    <td rowspan="3"  width="50%"></td><td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?>,</td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"><br><br><u><b><?php echo $r['ttd'];?></b></u><br>NIP. <?php echo $rd['niplurah'];?></td>
  </tr> 
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>
</html>