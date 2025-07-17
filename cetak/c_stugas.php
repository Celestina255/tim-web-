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
    <td colspan="3" align="center"><strong><font size=6 color="black"><u>SURAT TUGAS</u></font></a>
    </strong><br><font size=2 color="black">Nomor : <?php echo $rs['no']; ?></font></td>
  </tr>
</table>
<br>

<table align="center" class="table-print" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>

   <td valign="top">Menimbang</td><td valign="top">:</td><td colspan="2" valign="top"><?php echo $mn[0];?><br><?php echo $mn[1];?><br><?php echo $mn[2];?><br><?php echo $mn[3];?><br><?php echo $mn[4];?></td>
  </tr>
  <tr>
   <td valign="top">Dasar Hukum</td><td valign="top">:</td><td colspan="2" valign="top"><?php echo $dh[0];?><br><?php echo $dh[1];?><br><?php echo $dh[2];?><br><?php echo $dh[3];?><br><?php echo $dh[4];?></td>
  </tr>
  <tr>
   <td colspan="6" align="center">&nbsp;</td>
  </tr>
  <tr>
   <td colspan="6" align="center"><b>MENUGASKAN</b></td>
  </tr>
  <tr>
   <td colspan="6" align="left">Kepada :</td>
  </tr>
  <tr><td colspan="6">
      <table align="center" class="table-print" width="90%" border="1" cellspacing="1" cellpadding="2">
        <thead>
        <tr>
          <td>No. </td><td>Nama dan NIP</td><td>Satuan Kerja</td><td>Jabatan </td><td>Golongan</td><td>Tanggal</td>
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
          <td><?php echo $no++;?></td><td><?php echo $rt['nm'];?></td><td><?php echo $rt['satker'];?></td><td><?php echo $jb;?></td><td><?php echo $gol;?></td><td><?php echo IndonesiaTgl($rt['tgl']);?></td>
        </tr>
      </tbody>
    <?php  } ?>
      </table>
</td></tr>

  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Untuk : <b><?php echo $dt[4];?></b></td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Demikian surat tugas ini dibuat agar dilaksanakan dengan penuh tanggung jawab.</td>
  </tr>

<tr><td></td><td></td><td>
<table width="400" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
          <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>, &nbsp;<?php echo $bulan;?></td>
  </tr>    <tr>
    <td align="center" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo $rd['kelurahan'];?>,</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td align="center" class="pull pull-right"><b><u><?php echo $dt[0];?></u></b></td>
  </tr>
        <tr>
    <td align="center" class="pull pull-right">NIP. <?php echo $dt[1];?></td>
  </tr>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
</html>