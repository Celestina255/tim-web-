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
  $hari=$bln['0'];
?>
<?php 
$query = mysqli_query ($con, "SELECT * from tb_kelurahan");
while ($rd = mysqli_fetch_array($query)){
?>

<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black"><u><?php echo strtoupper($r['nmsurat']); ?> </u></font></td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="90%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td colspan="5">Yang bertanda tangan dibawah ini : </td>
  </tr>
      <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>I.</td><td width="30%">Nama</td><td width="2%">:</td><td colspan="2"><b><?php echo $dt[1];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td colspan="2"><?php echo $dt[0];?></td>
  </tr>
    <tr>
    <td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?php echo $dt[2];?></td>
  </tr>
      <tr>
    <td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?php echo $dt[3];?>, <?php echo $dt[4];?></td>
  </tr>

  <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[5];?></td>
  </tr>
  <tr>
    <td></td><td>Selanjutnya disebut selaku</td><td>:</td><td colspan="2">Pihak I</td>
  </tr>
    <tr>
    <td></td><td>&nbsp;</td><td></td><td colspan="2"></td>
  </tr>
  <tr>
    <td>II.</td><td width="30%">Nama</td><td>:</td><td colspan="2"><b><?php echo $dt[7];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td colspan="2"><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?php echo $dt[8];?></td>
  </tr>
      <tr>
    <td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?php echo $dt[9];?>, <?php echo $dt[10];?></td>
  </tr>

  <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[11];?> </td>
  </tr>
  <tr>
    <td></td><td>Selanjutnya disebut selaku</td><td>:</td><td colspan="2">Pihak II</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="justify">Pada hari ini <?php echo strtoupper($hari);?> tanggal <?php echo IndonesiaTgl($tgl);?>, Pihak I dan Pihak II secara bersama - sama sepakat sabagai berikut :</td>
  </tr>
  <tr>
    <td valign="top">1.</td><td colspan="4" align="justify">Tanah dengan luas/ukuran <?php echo format_angka($dt[12]);?> Ha./M2 yang terletak di <?php echo $dt[13];?>, dengan batas - batas tanah : </td>
  </tr>
  <tr>
    <td></td><td> - Barat berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[15];?></td>
  </tr>
      <tr>
    <td></td><td> - Utara berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[16];?></td>
  </tr>
      <tr>
    <td></td><td> - Timur berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[17];?></td>
  </tr>
      <tr>
    <td></td><td> - Selatan berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[18];?></td>
  </tr>
    <tr>
    <td valign="top"></td><td colspan="4">adalah benar Tanah milik Pihak I;</td>
  </tr>
  <tr>
    <td valign="top">2.</td><td colspan="4" align="justify">Pihak I telah menjual sebidang tanah tersebut pada poin 1 (satu) kepada Pihak II dengan harga <b>Rp. <?php echo format_angka($dt[14]);?></b>, <i>(<?php echo kekata($dt[14]);?> Rupiah)</i> ;</td>
  </tr>
  <tr>
    <td valign="top">3.</td><td colspan="4" align="justify">Hal - hal yang belum tertuang dalam kesepakatan ini akan di selesaikan secara kekeluargaan.</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="justify" align="justify">Demikian kesepatan Jual - beli ini dibuat, ditanda tangani oleh kedua belah Pihak dan Saksi - saksi dalam keadaan sadar dan tanpa paksaan dari siapapun.</td>
  </tr>

 <tr>
    <td></td><td align="center"><br>Pihak II<br>Membeli </td><td><td></td><td align="center"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?><br>Pihak I<br>Yang Menjual</td>
  </tr>
     <tr>
    <td colspan="5">&nbsp;<br></td><td></td>
  </tr>
   <tr>
    <td colspan="4">&nbsp;<br></td><td><small style="color: grey;">Materai</small></td>
  </tr>
     <tr>
    <td colspan="5">&nbsp;<br></td><td></td>
  </tr>
<tr>
    <td></td><td align="center"><b><u><?php echo $dt[7];?></u></b></td><td></td><td></td><td align="center"><b><u><?php echo $dt[1];?></u></b></td>
  </tr>
   <tr>
    <td colspan="4">Saksi - saksi :</td><td></td>
  </tr>
   <tr>
    <td>1.</td><td><?php echo $dt[19];?></td><td colspan="2">(_______________)</td>
  </tr>
   <tr>
    <td colspan="4">&nbsp;<br></td><td></td>
  </tr>
   <tr>
    <td>2.</td><td><?php echo $dt[20];?></td><td colspan="2">(_______________)</td>
  </tr>
<tr><td colspan="4">
<table width="90%" align="right" border="0" cellspacing="1" cellpadding="2" class="table-print">
  <tr>
    <td></td><td align="center" class="pull pull-right" colspan="2">Mengetahui</td>
  </tr>
  <tr>
    <td rowspan="3" width="20%"></td><td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right" width="45%" colspan="2"><br><br><br><u><b><?php echo $r['ttd'];?></b></u><br>NIP. <?php echo $rd['niplurah'];?></td>
  </tr> 
</table>
</td>
</tr>
</table>
  <?php }} ?>
