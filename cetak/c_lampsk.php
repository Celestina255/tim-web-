<?php
error_reporting(0);
include_once "../koneksi.php";
include '../assets/inc.php';

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.* from tb_jenissurat, tb_datasurat, tb_detailsurat 
WHERE tb_detailsurat.kode='$kodesurat'");
while ($rs = mysqli_fetch_array($query)){
  $tgl = $rs['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
  $dt=explode('|',$rs['detail']);
  $m=$dt['5'];
  $mn=explode(';',$m);
  $d=$dt['6'];
  $dh=explode(';', $d);
  $s=$dt['9'];
  $sl=explode(';', $s);
  //for($i=0; $i < count($mn); $i++);

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

<br>
<h5>LAMPIRAN : <br>KEPUTUSAN <?php echo $rd['jnp']=='Desa'? "KEPALA DESA" : "LURAH";?> <?php echo strtoupper($rd['kelurahan']);?><br>NOMOR : <?php echo $dt[7]; ?> <br>TANGGAL : <?php echo $bulan;?></h5>
<h3 align="center">SUSUNAN TIM <?php echo strtoupper($dt[4]);?></h3>
<table align="center" class="table-print" width="90%" border="1" cellspacing="1" cellpadding="2">
        <thead>
        <tr>
          <td>No. </td><td>Nama dan NIP</td><td>Satuan Kerja</td><td>Jabatan/Golongan </td><td>Keterangan</td>
        </tr>
      </thead>
    <?php
      $querytgs = mysqli_query ($con, "SELECT * from tb_datastugas WHERE tb_datastugas.kodetgs='$kodesurat'");
      $no=1;
while ($rt = mysqli_fetch_array($querytgs)){
  $j=explode('/', $rt['jab']);
  $jb=$j[0];
  $gol=$j[1];
  ?>
      <tbody>
        <tr>
          <td><?php echo $no++;?></td><td><?php echo $rt['nm'];?></td><td><?php echo $rt['satker'];?></td><td><?php echo $jb;?> / <?php echo $gol;?></td><td></td>
        </tr>
      </tbody>
    <?php  } ?>
      </table>

  <table width="300" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
          <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="left" class="pull pull-right"></td>
  </tr>
   <tr>
    <td align="left" class="pull pull-right">Ditetapkan di <?php echo $rd['kelurahan'];?><br>Pada tanggal :<?php echo $bulan;?></td>
  </tr>    
  <tr>
    <td align="left" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?>, </td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td align="left" class="pull pull-right"><b><u><?php echo $dt[0];?></u></b></td>
  </tr>
  <tr>
    <td align="left" class="pull pull-right">NIP. <?php echo $dt[1];?></td>
  </tr>
</table>
<?php }} ?>
