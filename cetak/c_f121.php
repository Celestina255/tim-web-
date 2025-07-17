<style type="text/css">
.kotak {
background-color: #; 
border: 1px solid #17202A; 
height: auto; 
margin: -2px 0px; 
padding: 2px; 
text-align: left; 
width: auto;">
}
.kotak-jp {
background-color: #; 
border: 1px solid #17202A; 
height: auto; 
margin: -1px 0px; 
padding: 2px; 
text-align: left; 
width: 9em;">
}
.kotak-f {
background-color: #; 
border: 2px solid #17202A; 
height: auto; 
margin: -3px 0px; 
padding: 5px;
margin-right: 5px; 
text-align: center;
font-size: 16; 
width: 5em;">
}
.kotak-kode {
background-color: #; 
border: 1px solid #17202A; 
height: auto; 
margin: 0px 0px; 
padding: 0px;
text-align: center;
width: 1.2em;">
}
</style>
<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat lain
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk WHERE tb_detailsurat.nik=tb_penduduk.nik AND tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)){
  $tgl = $r['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
  $jp=explode(';',$r['detail']);
  $rtrw=substr($r['alamat'],-7);
  $rtrwex=explode('/',$rtrw);
  $rt=$rtrwex[0];
  $rw=$rtrwex[1];
?>
<?php 
$query = mysqli_query ($con, "SELECT * from tb_kelurahan");
while ($rd = mysqli_fetch_array($query)){
?>
<html>
<head>
<title></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()" >
<h1 align="center">
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="5" align="right"><div class="kotak-f">F-1.21</div>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><strong>FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP) WARGA NEGARA INDONESIA</strong></td>
  </tr>
  <tr>
    <td colspan="5"><table align="center" width="98%" border="" cellspacing="0" cellpadding="4" rules="rows"><tr><td><small>Perhatian :
<br>1. Harap diisi dengan huruf cetak dan menggunakan tinta hitam
<br>2. Untuk kolom pilihan, harap memberi tanda silang (X) pada kotak pilihan.
<br>3. Setelah formulir ini diisi dan ditandatangani, harap diserahkan kembali ke kantor Kelurahan/Kelurahan</small>
</td></tr></table>
</td>
  </tr>
  <tr><td>

  <table align="left" width="95%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td width="35%">PEMERINTAH PROVINSI</td><td width="3">:</td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodeprov'],0,1);?></div></td><td width="4"><div class="kotak-kode"><?php echo substr($rd['kodeprov'],1,1);?></div></td><td></td><td></td><td><div class="kotak"> <?php echo strtoupper($rd['prov']);?></div></td>
  </tr>
  <tr>
    <td>PEMERINTAH KABUPATEN</td><td>:</td><td><div class="kotak-kode"><?php echo substr($rd['kodekab'],0,1);?></div></td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodekab'],1,1);?></div></td><td></td><td></td><td><div class="kotak"><?php echo strtoupper($rd['kab']);?></div></td>
  </tr>
  <tr>
    <td>KECAMATAN</td><td>:</td><td><div class="kotak-kode"><?php echo substr($rd['kodekec'],0,1);?></div></td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodekec'],1,1);?></div></td><td></td><td></td><td><div class="kotak"><?php echo strtoupper($rd['kec']);?></div></td>
  </tr>
  <tr>
    <td>DESA/KELURAHAN</td><td>:</td><td><div class="kotak-kode"><?php echo substr($rd['kodekelurahan'],0,1);?></div></td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodekelurahan'],1,1);?></div></td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodekelurahan'],2,1);?></div></td><td width="8"><div class="kotak-kode"><?php echo substr($rd['kodekelurahan'],3,1);?></div></td><td><div class="kotak"><?php echo strtoupper($rd['kelurahan']);?></div></td>
  </tr>
  
  <table align="left" width="90%" border="0" cellspacing="0" cellpadding="4">
   <tr>
    <td width="35%"><u>PERMOHONAN KTP</u></td><td><div class="kotak-jp"><input type="checkbox" id="jp" name="jp" value="A" <?php if (in_array("A", $jp)) echo "checked";?>><label for="jp">A. Baru</label></div></td><td><div class="kotak-jp"><input type="checkbox" id="jp" name="jp" value="B" <?php if (in_array("B", $jp)) echo "checked";?>><label for="jp">B. Perpanjangan</label></div></td><td><div class="kotak-jp"><input type="checkbox" id="jp" name="jp" value="C" <?php if (in_array("C", $jp)) echo "checked";?>><label for="jp">C. Pergantian</label></div></td>
  </tr>
</table>

</td></tr>
</table>

<tr><td colspan="4">
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="23%"><div class="kotak-jp">1. Nama Lengkap</div></td><td colspan="3"><div class="kotak"><?php echo $r['nama'];?></div></td>
  </tr>
  <tr>
    <td><div class="kotak-jp">2. No. KK</div></td><td colspan="3"><div class="kotak"><?php echo $r['nkk'];?></div></td>
  </tr>
  <tr>
    <td><div class="kotak-jp">3. NIK</div></td><td colspan="3"><div class="kotak"><?php echo $r['nik'];?></div></td>
  </tr>
    <tr>
    <td><div class="kotak-jp">4. Alamat</div></td><td colspan="3"><div class="kotak"><?php echo $r['alamat'];?>&nbsp; Kelurahan <?php echo $r['kelurahan'];?></div></td>
  </tr>
  <tr>
    <td></td><td colspan="3"><div class="kotak">Kec. <?php echo $r['kec'];?> &nbsp;Kab. <?php echo $r['kab'];?></div></td>
  </tr>
  <tr>
    <td></td><td colspan="3">
      <table align="left" class="table-list" width="100%" border="0" cellspacing="0" cellpadding="2" style="margin-left: -2px;"><tr><td width="8%"><div class="kotak">RT </div></td><td></td><td><div class="kotak"><?php echo $rt;?></div></td><td></td><td width="8%"><div class="kotak">RW </div></td><td></td><td><div class="kotak"><?php echo $rw;?></div></td><td></td><td width="18%"><div class="kotak">Kode Pos :</div></td><td></td><td><div class="kotak">35452</div></td></td>
  </tr>
</table>
</td></tr>
<tr>
   <td colspan="3"><table align="left" class="table-list" width="100%" border="1" cellspacing="0" cellpadding="2" style="margin-left: -2px;"><tr><td width="30%" align="center">Pas Photo (2x3)</td><td width="25%" align="center">Cap Jempol</td><td width="45%" align="center">Specimen Tanda Tangan</td>
  </tr>
  <tr><td width="30%" align="center" rowspan="2"><img src="../img/oval.png" width="90px" height="110px"></td><td width="25%" rowspan="2"></td><td width="45%"></td>
  </tr>
  <tr><td width="45%" height="10px"><small>Ket : Cap Jempol/Tanda tangan</small></td>
  </tr>
</table>
</td><td align="center" width="40%"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?><br><br><br><br><br><br><u><?php echo $r['nama'];?></u></td>

</tr>
  

<tr><td colspan="5">
<table width="100%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="center"> Mengetahui,</td>
  </tr>
  <tr>
    <td rowspan="3" align="center" width="10%"></td><td align="left">Camat <?php echo $rd['kec'];?></td><td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
  <tr>
    <td align="left" class="pull pull-right"><br><br><br>______________________<br>NIP.</td><td align="center" class="pull pull-right"><br><br><br><u><b><?php echo $r['ttd'];?></b></u><br>NIP. <?php echo $rd['niplurah'];?></td>
  </tr> 
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>
