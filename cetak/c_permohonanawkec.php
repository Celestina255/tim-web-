<?php
error_reporting(0);
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel data surat
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk
WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
while ($r = mysqli_fetch_array($query)){
  $dt=explode(';',$r['detail']);
  $tgl = $r['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
  $kodesurataw=$dt['3'];
$queryy = mysqli_query ($con, "SELECT * from tb_detailsurat
WHERE tb_detailsurat.kode='$kodesurataw'");
while ($rr = mysqli_fetch_array($queryy)){

$query = mysqli_query ($con, "SELECT * from tb_kelurahan");
while ($rd = mysqli_fetch_array($query)){
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
  
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td>Nomor</td><td>:</td><td><?php echo $r['no'];?></td><td><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?></td>
  </tr>
  <tr>
    <td>Lampiran</td><td>:</td><td>-</td><td>Kepada,</td>
  </tr>
  <tr>
    <td>Perihal</td><td>:</td><td><b>Permohonan Pencatatan Pernyataan Ahli Waris</b></td><td>Yth. Bapak Camat <?php echo $rd['kec'];?></td>
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
    <td colspan="4" align="justify"><p  style="font:Arial; font-size: 12pt;" >Menindaklanjuti permohonan pencatatan pernyataan Ahli Waris Alm/Almh. <?php echo $rr['nama'];?> di Kantor <?php echo $rd['jnp']=='Desa'? "Desa" : "Kelurahan";?> <?php echo $rd['kelurahan'];?> tanggal <?php echo IndonesiaTgl($rr['tanggal']);?> atas nama pemohon <?php echo $r['nama'] !='' ?  $r['nama'] : '_____________________';?>.<br><br>
Berkaitan dengan hal tersebut, berikut kami mohonkan kepada Bapak untuk berkenan 
mencatatkan Pernyataan Ahli Waris dimaksud di Kantor Camat <?php echo $rd['kec'];?>.<br><br>
Perlu Kami sampaikan bahwa Surat Pernyataan Ahli Waris tersebut sudah Kami 
catatkan di Kantor <?php echo $rd['jnp']=='Desa'? "Desa" : "Kelurahan";?> <?php echo $rd['kelurahan'];?> dengan nomor <?php echo $rr['no']; ?> tanggal 
<?php echo IndonesiaTgl($rr['tanggal']);?>.</p>

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
<table width="90%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
    <tr>
    <td width="50%"></td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?></td>
  </tr>
  <tr>
    <td rowspan="3"></td><td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?></td>
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
  <?php }}} ?>
</body>

</html>