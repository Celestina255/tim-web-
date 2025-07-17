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
<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td colspan="3" width="70" align="center"><img src="../img/<?php echo $rd['logo'];?>" width="60" height="60"></td>
  </tr>
  <tr>
    <td colspan="" align="center"><strong><font size=4 color="black"><?php echo $rd['jnp']=='Desa'? "KEPALA DESA" : "LURAH";?> <?php echo strtoupper($rd['kelurahan']);?></font>
    </strong></td>
  </tr>
    <tr>
    <td colspan="" align="center"><strong><font size=4 color="black">KABUPATEN <?php echo strtoupper($rd['kab']);?></font>
    </strong></td>
  </tr>

  <tr>
   <td colspan="3" align="center"></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black"><u>KEPUTUSAN <?php echo $rd['jnp']=='Desa'? "KEPALA DESA" : "LURAH";?></u></font>
    </strong><br><font size=3 color="black">NOMOR : <?php echo $dt[7]; ?></font><br><br><font size=4 color="black">TENTANG</font><br><font size=4 color="black"> PEMBENTUKAN <?php echo strtoupper($dt[8]);?></font></td>
  </tr>
  <tr>
   <td colspan="3" align="center"></td>
  </tr>
  <tr>
    <td colspan="" align="center"><strong><font size=4 color="black"><?php echo $rd['jnp']=='Desa'? "KEPALA DESA" : "LURAH";?> <?php echo strtoupper($rd['kelurahan']);?></font>
    </strong></td>
  </tr>


</table>
<br>

<table align="center" class="table-print" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>

   <td valign="top">Menimbang</td><td valign="top">:</td><td colspan="2" valign="top"><?php echo $mn[0];?><br><?php echo $mn[1];?><br><?php echo $mn[2];?><br><?php echo $mn[3];?><br><?php echo $mn[4];?></td>
  </tr>
  <tr>
   <td valign="top">Mengingat</td><td valign="top">:</td><td colspan="2" valign="top"><?php echo $dh[0];?><br><?php echo $dh[1];?><br><?php echo $dh[2];?><br><?php echo $dh[3];?><br><?php echo $dh[4];?></td>
  </tr>
  <tr>
   <td colspan="6" align="center">&nbsp;</td>
  </tr>
  <tr>
   <td colspan="6" align="center"><b>MEMUTUSKAN</b></td>
  </tr>
  <tr>
   <td colspan="6" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Menetapkan</td><td valign="top">:</td><td colspan="4" valign="top">Keputusan <?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo ucwords($rd['kelurahan']);?> Tentang  Pembentukan <?php echo ucwords(strtolower($dt[8]));?>.
    </td>
  </tr>
  <tr>
    <td valign="top">KESATU</td><td valign="top">:</td><td colspan="4" valign="top">Menunjuk nama - nama yang tercantum pada lampiran keputusan ini sebagai <?php echo ucwords(strtolower($dt[8]));?>.
    </td>
  </tr>
  <tr>
    <td valign="top">KEDUA</td><td valign="top">:</td><td colspan="4" valign="top">Tim sebagaimana disebutkan pada diktum kesatu wajib melaksanakan tugas sesuai tugas dan fungsi masing - masing serta wajib melaporkan hasil kegiatannya kepada <?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?> <?php echo ucwords($rd['kelurahan']);?>. 
    </td>
  </tr>
  <tr>
    <td valign="top">KETIGA</td><td valign="top">:</td><td colspan="4" valign="top">Keputusan ini berlaku sejak tanggal ditetapkan, dengan ketentuan apabila terdapat kekeliruan dikemudian hari akan adakan perbaikan seperlunya. 
    </td>
  </tr>
  <tr><td colspan="6">
      
</td></tr>

  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  
<tr><td></td><td></td><td>
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
    <td align="left" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?>,</td>
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
</td>
</tr>
<tr>
  <td colspan="3">Salinan Keputusan ini disampaikan kepada :</td>
</tr>
<tr>
  <td colspan="3"><?php echo $sl[0];?><br><?php echo $sl[1];?> <br><?php echo $sl[2];?></td>
</tr>
</table>

  <?php }} ?>
  
</body>

</html>