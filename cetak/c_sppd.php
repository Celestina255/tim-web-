<?php
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
  $dt=explode(';',$rs['detail']);
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

</table>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="60%">SKPD : <?php echo strtoupper($rd['kelurahan']);?></td><td></td><td>Lembar ke</td><td>:</td>
  </tr>
    <tr>
    <td></td><td></td><td>Kode No. </td><td>:</td>
  </tr>
    <tr>
    <td></td><td></td><td>Nomor </td><td>: <?php echo $rs['no']; ?></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="center"><font size=4><b><u>SURAT PERINTAH PERJALANAN DINAS</u></b></font></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="800" border="1" cellspacing="0" cellpadding="4">


  <tr>
    <td align="center">1.</td><td width="40%">Nama Kepala SKPD/KPA</td><td>:</td><td colspan="2"><?php echo $dt[0];?></td>
  </tr>
  <tr>
    <td align="center">2. </td><td>Nama / NIP Pegawai yang melaksanakan Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[4];?> / <br>NIP.: <?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td align="center" rowspan="3">3. </td><td>a. Pangkat dan Golongan</td><td>:</td><td colspan="2"><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td>b. Jabatan</td><td>:</td><td colspan="2"><?php echo $dt[7];?></td>
  </tr>
      <tr>
    <td>c. Tingkat Biaya Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[12];?></td>
  </tr>
 
  <tr>
    <td align="center">4.</td><td>Maksud Perjalanan Dinas</td><td>:</td><td colspan="2"><?php echo $dt[8];?></td>
  </tr>
  <tr>
    <td align="center">5. </td><td>Alat Angkutan yang digunakan</td><td>:</td><td colspan="2">_____________</td>
  </tr>
    <tr>
    <td align="center" rowspan="2">6 </td><td>a. Tempat Berangkat</td><td>:</td><td colspan="2"><?php echo $rd['kelurahan'];?></td>
  </tr>
    <tr>
    <td>b. Tempat Tujuan</td><td>:</td><td colspan="2"><?php echo $dt[9];?></td>
  </tr>
  <tr>
    <td align="center" rowspan="3">7. </td><td>a. Lamanya Perjalanan Dinas</td><td>:</td><td colspan="2">_____ Hari *)</td>
  </tr>
    <tr>
    <td>b. Tanggal Berangkat</td><td>:</td><td colspan="2"><?php echo $dt[10];?></td>
  </tr>
    <tr>
    <td>c. Tanggal Harus Kembali / Tiba ditempat Baru *)</td><td>:</td><td colspan="2"><?php echo $dt[11];?></td>
  </tr>
    <?php 
$query = mysqli_query ($con, "SELECT COUNT(*) as jdata from tb_datapdinas WHERE kodepd='$kodesurat'");
$no=1;

while ($rrr = mysqli_fetch_array($query)){
  
?>
    <tr>
    <td align="center" rowspan="<?php echo(int)$rrr['jdata']+1; ?>">8. </td><td>Pengikut :  Nama</td><td></td><td>Tanggal Lahir</td><td>Keterangan</td>
  </tr>
  <?php }?>
  <?php 
$query = mysqli_query ($con, "SELECT * from tb_datapdinas WHERE kodepd='$kodesurat'");
$no=1;
while ($rr = mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $no++; ?>. <?php echo $rr['nm'];?></td><td></td><td><?php echo $rr['tgl_lahir'];?></td><td><?php echo $rr['ket'];?></td>
  </tr>
<?php }?>

  <tr>
    <td align="center" rowspan="3">9. </td><td>Pembebanan Anggaran</td><td></td><td colspan="2"></td>
  </tr>
   <tr>
    <td>a. Instansi</td><td></td><td colspan="2"><?php echo $rd['kelurahan'];?></td>
  </tr>
   <tr>
    <td>b. Akun</td><td></td><td colspan="2">__________________</td>
  </tr>
    <tr>
    <td align="center">10. </td><td>Keterangan lain</td><td>:</td><td colspan="2">-</td>
  </tr>
  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
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
    <td align="center" class="pull pull-right"><u><b><?php echo $dt[0];?></b></u></td>
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

</html>