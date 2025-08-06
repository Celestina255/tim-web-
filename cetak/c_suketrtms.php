<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff LEFT JOIN tb_penduduk ON tb_detailsurat.nik=tb_penduduk.nik WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  
  function tgl_indonesia($tgl) {
      $bulan = [
          '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
          '04' => 'April', '05' => 'Mei', '06' => 'Juni',
          '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
          '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
      ];
      $exp = explode('-', $tgl);
      return $exp[2] . ' ' . $bulan[$exp[1]] . ' ' . $exp[0];
  }

  $query = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query)) {
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
    <td colspan="4">Yang bertanda tangan dibawah ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?> Distrik <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, Dengan ini menerangkan sesungguhnya bahwa :</td>
  </tr>
    <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
        <tr>
    <td>I.</td><td colspan="3">SUAMI :</td>
  </tr>
  <tr>
    <td></td><td width="25%">Nama</td><td>:</td><td><b><?php echo $dt[1];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td><?php echo $dt[0];?></td>
  </tr>
    <tr>
    <td></td><td>Tmp.&Tgl. Lahir</td><td>:</td><td><?php echo $dt[2];?>, &nbsp;<?php echo $dt[3];?></td>
  </tr>
    <tr>
    <td></td><td>Agama</td><td>:</td><td><?php echo $dt[4];?></td>
  </tr>
    <tr>
    <td></td><td>Alamat</td><td>:</td><td><?php echo $dt[5];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
<tr>
    <td colspan="4">&nbsp;</td>
  </tr>

      <tr>
    <td>II.</td><td colspan="3">ISTRI :</td>
  </tr>
    <tr>
    <td></td><td>Nama </td><td>:</td><td><b><?php echo $dt[7];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td></td><td>Tmp.&Tgl. Lahir</td><td>:</td><td><?php echo $dt[8];?>, &nbsp; <?php echo $dt[9];?></td>
  </tr>
    <tr>
    <td></td><td>Agama</td><td>:</td><td><?php echo $dt[10];?></td>
  </tr>
    <tr>
    <td></td><td>Alamat</td><td>:</td><td><?php echo $dt[11];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>


    <tr>
    <td colspan="4">Warga tersebut diatas adalah bernar Warga <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $rd['kelurahan'];?> yang termasuk kategori Rumah Tangga Miskin.</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4">Demikian keterangan ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</td>
  </tr>

<tr><td colspan="4">
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
    <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    </td><td width="40%"></td><td align="center" class="pull pull-right" width="40%"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo tgl_indonesia($tgl_sekarang); ?></td>
  </tr>
  <tr>
   <td align="center">TKSK Distrik <?php echo $rd['kec'];?></td><td align="center" valign="top" class="pull pull-right"><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "a.n.";?> <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Kepala Kelurahan";?> <?php echo $rd['kelurahan'];?> <br><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "$r[jab_staff]";?></td>
  </tr>
<?php 
$queryrs = mysqli_query ($con, "SELECT * from setting_surat LIMIT 1");
while ($rs = mysqli_fetch_array($queryrs)){
?>
  <tr>
    <td align="center"><br><br><br><br>_______________________</td><td align="center" class="pull pull-right"><u><b><?php if ($rs['ttd'] == 'Otomatis'): ?> 
      <div style="position: relative; width: 150px; height: 120px; margin: 0 auto;">
  <!-- Cap stempel di bawah, agak ke kiri -->
  <img src="../file/<?php echo $rd['stample']; ?>" 
       style="position: absolute; bottom: 0; left: 0; width: 90px; height: 90px; opacity: 0.9; z-index: 1;">

  <!-- TTD di atas cap stempel, agak ke kanan -->
  <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" 
       style="position: absolute; bottom: 20px; left: 25px; width: 90px; height: 90px; z-index: 2;">
</div>

      <?php else :?><span>&nbsp;<br><br><br></span><?php endif; ?><br><u><b><?php echo strtoupper($r['nama_staff']);?></b></u></td>
  </tr> 
<?php } ?>
  <tr>
    <td align="center" colspan="2">Kepala Distrik <?php echo $rd['kec'];?></td>
  </tr> 
  <tr>
    <td align="center" colspan="2"><br><br><br><br><b>__________________</b><br>NIP. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
  </tr>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>
