<?php
error_reporting(0);
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel data surat
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff LEFT JOIN tb_penduduk ON tb_detailsurat.nik=tb_penduduk.nik WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)){
  $dt=explode(';',$r['detail']);
  $tgl = $r['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
  $tglm = $dt['2'];
  $blm=format_hari_tanggal($tglm);
  $blnm=explode(',',$blm);
  $bulanm=$blnm['1'];
?>
<?php 
$query = mysqli_query ($con, "SELECT * from tb_kelurahan");
while ($rd = mysqli_fetch_array($query)){
?>
<html>
<head>
<title></title>

</head>
<body onLoad="window.print()" style='font-family: Bookman Old Style ; font-size: 12pt;' >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  
    <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black"><u>PERNYATAAN AHLI WARIS ANAK KANDUNG</u></font>
    </strong></td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3" align="justify">Kami yang bertanda tangan dibawah ini, Ahli Waris dari Alm/Almh 
<?php echo $dt[1]; ?> menyatakan dan menerangkan dengan sesungguhnya 
serta sanggup diangkat sumpah bahwa Alm/Almh <?php echo $dt[1]; ?> adalah benar telah 
meninggal dunia pada tanggal <?php echo $bulanm; ?> di <?php echo $dt[3]; ?> dan bertempat 
tinggal terakhir di jalan <?php echo $dt[4]; ?>.<br>
Semasa hidupnya, Alm/Almh <?php echo $dt[1]; ?> telah melangsungkan pernikahan 
dengan <?php echo $dt[5]; ?> (jika suami/istri masih hidup). Dari pernikahan Alm/Almh 
<?php echo $dt[1]; ?> dengan <?php echo $dt[5]; ?> telah dikaruniai <?php echo $dt[6]; ?> (<?php echo kekata($dt[6]); ?> ) orang anak kandung yang masih hidup, yang merupakan ahli waris yang sah dari Alm/Almh 
<?php echo $dt[1]; ?> dengan <?php echo $dt[5]; ?> yakni: </td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
  <table align="center" class="table" width="98%" border="0" cellspacing="2" cellpadding="2">
<?php
    $query = mysqli_query ($con, "SELECT  * from tb_ahliwaris WHERE tb_ahliwaris.kodeaw='$kodesurat'");
    $no=1;
    $ke=1;
    $ke2=1;
while ($raw = mysqli_fetch_array($query)){
  
?>
    <tr>
      <td align="left" width="3%" valign="top"><?php echo $no++;?>.</td><td align="center" width="12%" valign="bottow"><p style="box-shadow: 1px 1px 1px; width:80px; height: 100px;"><small><br><br>Pas Photo<br>2x3 cm</small></p></td>
      <td valign="top"><?php echo $raw['nm'];?>, <?php if ($raw['lp']=='L') echo 'Laki-laki';?><?php if ($raw['lp']=='P') echo 'Perempuan';?>, <?php echo $raw['ttl'];?>, <?php echo $raw['agama'];?>, <?php echo $raw['alamat'];?>,<?php echo $raw['shdk'];?>, adalah Anak Kandung ke <?php echo $ke++;?> (<?php echo kekata($ke2++);?> ) dari Alm/Almh. <?php echo $dt[1]; ?> dan <?php echo $dt[5]; ?>.
</td>
</tr><?php } ?>

</table>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3" align="justify">Disini dapat kami jelaskan bahwa selain nama-nama tersebut di atas, kami menyatakan bahwa tidak ada Ahli Waris lain dari alm/Almh. <?php echo $dt[1]; ?> dan <?php echo $dt[5]; ?>.<br>
Surat Pernyataan Ahli Waris ini kami buat dengan sesunggguhnya, apabila surat pernyataan ini 
tidak benar dan/atau ada pihak lain yang mengaku sebagai ahli waris dengan membawa bukti –
bukti yang sah dan otentik maka dengan sendirinya Surat Pernyataan Ahli Waris ini batal (tidak 
berlaku lagi).<br>
Demikian Surat Pernyataan Ahli Waris ini kami buat dengan sesungguhnya dan sebenar-benarnya, apabila ada kesalahan/kebohongan dalam pernyataan ini, kami bersedia dituntut dipengadilan.</td>
  </tr>

<tr><td colspan="4">
<table width="98%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td><u>Ahli Waris :</u></td><td></td><td></td>
  </tr>
  <?php
    $queryy = mysqli_query ($con, "SELECT  * from tb_ahliwaris WHERE tb_ahliwaris.kodeaw='$kodesurat'");
    $noo=1;
while ($raww = mysqli_fetch_array($queryy)){
  
?>
  <tr>
    <td width="30%"><?php echo $noo++;?>. <?php echo $raww['nm'];?><br>&nbsp;</td><td>(___________)<br>&nbsp;</td>
  </tr><?php } ?>
  <tr>
    <td><u>Saksi - saksi :</u></td><td></td><td align="center" class="pull pull-right"><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "a.n.";?> <?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Kepala Kelurahan";?> <?php echo $rd['kelurahan'];?> <br><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "$r[jab_staff]";?></td>
  </tr>
  <tr>
    <td>1. ______________________</td><td>(___________)</td><td rowspan="3" align="center" valign="top" class="pull pull-right"> <?php 
    $queryrs = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
    while ($rs = mysqli_fetch_array($queryrs)) {
      if ($rs['ttd'] == 'Otomatis'):
    ?>
      <!-- Cap dan ttd -->
      <div style="margin-top: 10px; text-align: center;">
  <div style="display: inline-block; position: relative; width: 100px; height: 100px;">
    <!-- Cap digeser sedikit ke kiri -->
    <img src="../file/<?php echo $rd['stample']; ?>" 
         style="position: absolute; top: 0; left: -35px; width: 100px; height: 100px; opacity: 0.9;">

    <!-- Tanda Tangan tetap -->
    <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" 
         style="position: absolute; top: 0; left: 0; width: 100px; height: 100px;">
  </div>
</div>

      <?php endif; } ?>

<div style="margin-top: 5px;">
  <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
  NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
</div>
  </tr>
  <tr>
    <td>2. ______________________</td><td>(___________)</td><td><br>&nbsp;</td>
  </tr>
  <tr>
    <td>3. ______________________</td><td>(___________)</td><td align="center" valign="top" class="pull pull-right">
    </td>
  </tr>
  
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>
