<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* 
from tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
while ($r = mysqli_fetch_array($query)){
  $dt=explode(';',$r['detail']);
  $tgl = $r['tanggal'];
  $bl=format_hari_tanggal($tgl);
  $bln=explode(',',$bl);
  $bulan=$bln['1'];
  $tgln = $dt[26];
  $blnk=format_hari_tanggal($tgln);
  $blnnkh=explode(',',$blnk);
  $bulannk=$blnnkh['1'];

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
    <td rowspan="4" width="80" style="text-align: center; vertical-align: top;">
      <img src="../img/<?php echo $rd['logo']; ?>" style="max-width: 85px; height: auto;">
    </td>
    <td colspan="2" align="center"><strong style="font-size: 25px;">PEMERINTAH KABUPATEN <?php echo strtoupper($rd['kab']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong style="font-size: 18px;">DISTRIK <?php echo strtoupper($rd['kec']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong style="font-size: 23px;">KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size: 15px; font-style: bold;">
      Alamat : <?php echo $rd['kantor']; ?>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr style="border: 1.5px double black;"></td>
  </tr>

  <tr>
    <td colspan="3" align="center">
      <strong><u><?php echo strtoupper($r['nmsurat']); ?></u></strong><br>
      <font size="2">Nomor: <?php echo $r['no']; ?></font>
    </td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="4">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?> Distrik <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, dengan ini menerangkan sesungguhnya bahwa :</td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td></td><td>Nama</td><td>:</td><td><?php echo $dt[1];?></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td><?php echo $dt[0];?></td>
  </tr>
    <tr>
    <td></td><td>Tmp.&Tgl. Lahir</td><td>:</td><td><?php echo $dt[3];?>, &nbsp;<?php echo $dt[4];?></td>
  </tr>
    <tr>
    <td></td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td></td><td>Agama</td><td>:</td><td><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td></td><td>Pekerjaan</td><td>:</td><td><?php echo $dt[7];?></td>
  </tr>
     <tr>
    <td></td><td valign="top">Alamat</td><td valign="top">:</td><td valign="top"><?php echo $dt[8];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $dt[12];?><br>Distrik <?php echo $dt[11];?> Kabupaten <?php echo $dt[10];?> Provinsi <?php echo $dt[9];?></td>
  </tr>
<tr>
    <td colspan="4">&nbsp;</td>
  </tr>


    <tr>
    <td colspan="4">Warga tersebut diatas adalah bernar Warga <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?>  dan yang bersangkutan <b>Pernah Menikah</b> secara <b><?php echo $dt[27];?></b> pada <?php echo $bulannk;?> dengan :</td>
  </tr>
    <tr>
    <td></td><td>Nama </td><td>:</td><td><?php echo $dt[14];?></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td><?php echo $dt[13];?></td>
  </tr>
    <tr>
    <td></td><td>Tmp.&Tgl. Lahir</td><td>:</td><td><?php echo $dt[16];?>, &nbsp; <?php echo $dt[17];?></td>
  </tr>
    <tr>
    <td></td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[18];?></td>
  </tr>
    <tr>
    <td></td><td>Agama</td><td>:</td><td><?php echo $dt[19];?></td>
  </tr>
    <tr>
    <td></td><td>Pekerjaan</td><td>:</td><td><?php echo $dt[20];?></td>
  </tr>
   <tr>
    <td></td><td valign="top">Alamat</td><td valign="top">:</td><td valign="top"><?php echo $dt[21];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $dt[25];?><br>Distrik <?php echo $dt[24];?> Kabupaten <?php echo $dt[23];?> Provinsi <?php echo $dt[22];?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4">Demikian keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</td>
  </tr>

<tr><td colspan="4">
<table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-top: 30px;">
  <tr>
    <td width="50%"></td> <!-- Kolom kosong kiri -->
    
    <td width="50%" align="center">
      <div style="font-size: 12pt; line-height: 1.5; text-align: center;">
        Dikeluarkan di : <?php echo $rd['kelurahan']; ?><br>
        Pada Tanggal &nbsp;&nbsp;: <?php echo tgl_indonesia($tgl_sekarang); ?>
      </div>

      <br>

      <div style="font-weight: bold; font-size: 12pt;">
        KEPALA KAMPUNG
      </div>

      <br><br><br>

      <div style="text-align: center;">
        <u><b><?php echo strtoupper($r['ttd']); ?></b></u><br>
        NIP. <?php echo $rd['niplurah']; ?>
      </div>
    </td>
  </tr>
</table>

  <?php }} ?>
</body>

</html>
