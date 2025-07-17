<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel data surat
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_ahliwaris.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_ahliwaris, tb_detailsurat, tb_penduduk
WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
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
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td rowspan="3" width="70"><img src="../img/<?php echo $rd['logo'];?>" width="60" height="60"></td>
    <td colspan="" align="center"><strong><font size=2 color="black">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']);?></font></a>
    </strong></td><td></td>
  </tr>
    <tr>
    <td colspan="" align="center"><strong><font size=3 color="black">KECAMATAN <?php echo strtoupper($rd['kec']);?></font></a>
    </strong></td><td width="70"></td>
  </tr>
    <tr>
    <td colspan="" align="center"><strong><font size=5 color="black"><?php echo strtoupper($rd['jnp']);?> <?php echo strtoupper($rd['kelurahan']);?></font></strong></td>
    <td width="70"></td>
  </tr>
    <tr>
   <td colspan="3" align="center"><hr><font size=2 color="black"><i>Sekretariat : <?php echo $rd['kantor'];?></i><hr size="3"></td>
  </tr>
    <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black"><u><?php echo strtoupper($r['nmsurat']); ?> </u></font></a>
    </strong><br><font size=2 color="black">Nomor : <?php echo $r['no']; ?></font></td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?> Kecamatan <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, menerangkan bahwa : </td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
  <table align="center" class="table" width="90%" border="1" cellspacing="4" cellpadding="6">
    <tr>
      <td align="center"><b>No</b></td>
      <td><b>Nama</b></td>
      <td align="center"><b>L/P</b></td>
      <td align="left"><b>Tmp.&tgl. Lahir</b></td>
      <td align="left"><b>Alamat</b></td>
      <td align="center"><b>SHDK</b></td>
    </tr>
    <?php
    $query = mysqli_query ($con, "SELECT  * from tb_ahliwaris WHERE tb_ahliwaris.kodeaw='$kodesurat'");
    $no=1;
while ($raw = mysqli_fetch_array($query)){
  
?>
    <tr>
      <td align="center"><?php echo $no++;?></td>
      <td><?php echo $raw['nm'];?></td>
      <td align="center"><?php echo $raw['lp'];?></td>
      <td align="left"><?php echo $raw['ttl'];?></td>
      <td align="left"><?php echo $raw['alamat'];?></td>
      <td align="center"><?php echo $raw['shdk'];}?></td>
</tr>

</table>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Adalah benar Ahli Waris dari :</td>
  </tr>
  <tr>
    <td>Nama</td><td>:</td><td><b><?php echo $r['nama'];?></b></td>
  </tr>
  <tr>
    <td>NIK</td><td>:</td><td><?php echo $r['nik'];?></td>
  </tr>
    <tr>
    <td>Jenis Kelamin</td><td>:</td><td><?php echo $r['jk'];?></td>
  </tr>
      <tr>
    <td>Tmp. & Tgl. Lahir</td><td>:</td><td><?php echo $r['tmp_lahir'];?>, <?php echo $r['tgl_lahir'];?></td>
  </tr>
    <tr>
    <td>Agama</td><td>:</td><td><?php echo $r['agama'];?></td>
  </tr>
  <tr>
    <td>Alamat</td><td>:</td><td><?php echo $dt[3];?></td>
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Demikian keterangan ini dibuat dengan sebenar - benarnya, untuk dapat dipergunakan sebagaimana mestinya.</td>
  </tr>

<tr><td colspan="4">
<table width="90%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td></td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?></td>
  </tr>
  <tr>
    <td rowspan="3" width="50%"></td><td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"><br><br><br><u><b><?php echo $r['ttd'];?></b></u><br>NIP. <?php echo $rd['niplurah'];?></td>
  </tr> 
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>