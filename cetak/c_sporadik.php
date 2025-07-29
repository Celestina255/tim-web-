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
    <td>1.</td><td width="25%">Nama</td><td>:</td><td colspan="2"><?php echo $r['nama'];?></td>
  </tr>
  <tr>
    <td>2.</td><td>NIK</td><td>:</td><td colspan="2"><?php echo $r['nik'];?></td>
  </tr>
    <tr>
    <td>3.</td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?php echo $r['jk'];?></td>
  </tr>
      <tr>
    <td>4.</td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?php echo $r['tmp_lahir'];?>, <?php echo $r['tgl_lahir'];?></td>
  </tr>
      <tr>
    <td>5.</td><td>Kewarganegaraan</td><td>:</td><td colspan="2"><?php echo $r['kwng'];?></td>
  </tr>
    <tr>
    <td>6.</td><td>Agama</td><td>:</td><td colspan="2"><?php echo $r['agama'];?></td>
  </tr>
      <tr>
    <td>7.</td><td>Pekerjaan</td><td>:</td><td colspan="2"><?php echo $r['kerjaan'];?></td>
  </tr>
    <tr>
    <td>8.</td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $r['alamat'];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $r['kelurahan'];?></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td colspan="2">Distrik <?php echo $r['kec'];?> Kabupaten <?php echo $r['kab'];?></td>
  </tr>

      <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5">Demikian ini menyatakan bahwa saya dengan itikad baik telah menguasai sebidang tanah seluas <?php echo format_angka($dt[2]);?> Ha./m2 *) yang terletak di :</td>
  </tr>
  <tr>
    <td>1.</td><td>Jalan</td><td>:</td><td colspan="2"><?php echo $dt[3];?></td>
  </tr>
  <tr>
    <td>2.</td><td>RT/RW</td><td>:</td><td colspan="2"><?php echo $dt[4];?></td>
  </tr>
  <tr>
    <td>3.</td><td><?php echo $rd['jnp']=='Desa'? "Desa" : "Kelurahan";?></td><td>:</td><td colspan="2"><?php echo $dt[5];?></td>
  </tr>
  <tr>
    <td>4.</td><td>Kota Administrasi</td><td>:</td><td colspan="2"><?php echo $dt[6];?></td>
  </tr>
  <tr>
    <td>5.</td><td>NIB</td><td>:</td><td colspan="2"><?php echo $dt[7];?></td>
  </tr>
<tr>
    <td>6.</td><td>Status Tanah</td><td>:</td><td colspan="2"><?php echo $dt[8];?></td>
  </tr>
<tr>
    <td>7.</td><td>Dipergunakan untuk</td><td>:</td><td colspan="2"><?php echo $dt[9];?></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td><td></td>
  </tr>
  <tr>
    <td colspan="5">Batas - batas tanah :</td>
  </tr>

  <tr>
    <td>1.</td><td>Barat berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[12];?></td>
  </tr>
      <tr>
    <td>2.</td><td>Utara berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[13];?></td>
  </tr>
      <tr>
    <td>3.</td><td>Timur berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[14];?></td>
  </tr>
      <tr>
    <td>4.</td><td>Selatan berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[15];?></td>
  </tr>
    <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="justify">Bahwa bidang tanah tersebut saya kuasai/miliki <?php echo $dt[10];?> sejak tahun <?php echo $dt[11];?> yang sampai saat ini saya kuasai terus menerus, tidak dijadikan / menjadi jaminan sesuatu hutang dan tidak dalam sengketa.<br>Surat pernyataan ini saya buat dengan penuh tanggung jawab dan saya bersedia mengangkat sumpah bila diperlukan. Apabila ternyata permintaan ini tidak benar saya bersedia dituntut dihadapan pihak yang berwenang.</td>
  </tr>
<tr>
    <td>1.</td><td>Nama</td><td>:</td><td colspan="2"><?php echo $dt[16];?></td>
  </tr>
      <tr>
    <td></td><td>Umur</td><td>:</td><td colspan="2"><?php echo $dt[17];?> Tahun</td>
  </tr>
      <tr>
    <td></td><td>Pekerjaan</td><td>:</td><td colspan="2"><?php echo $dt[18];?></td>
  </tr>
      <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[19];?></td>
  </tr>
  <tr>
    <td>2.</td><td>Nama</td><td>:</td><td colspan="2"><?php echo $dt[20];?></td>
  </tr>
      <tr>
    <td></td><td>Umur</td><td>:</td><td colspan="2"><?php echo $dt[21];?> Tahun</td>
  </tr>
      <tr>
    <td></td><td>Pekerjaan</td><td>:</td><td colspan="2"><?php echo $dt[22];?></td>
  </tr>
      <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[23];?></td>
  </tr>
 <tr>
    <td colspan="4">Saksi - saksi :</td><td width="30%" align="center"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo tgl_indonesia($tgl_sekarang); ?><br>Yang membuat pernyataan</td>
  </tr>
   <tr>
    <td>1.</td><td><?php echo $dt[16];?></td><td></td><td>(_______________)</td>
  </tr>
   <tr>
    <td colspan="4">&nbsp;<br></td><td><small style="color: grey;">Materai</small></td>
  </tr>
   <tr>
    <td>2.</td><td><?php echo $dt[20];?></td><td></td><td>(_______________)</td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td><td align="center"><b><u><?php echo $dt[1];?></u></b></td>
  </tr>
<tr><td colspan="4">
<table width="90%" align="right" border="0" cellspacing="1" cellpadding="2" class="table-print">
  <tr>
    <td></td><td align="center" class="pull pull-right">Mengetahui<br><br></td>
  </tr>

  <tr>
    <td rowspan="3" width="20%"></td><td align="center" valign="top" class="pull pull-right"><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "a.n.";?> <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Kepala Kelurahan";?> <?php echo $rd['kelurahan'];?><?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa'? "" : "$r[jab_staff]";?></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"></td>
  </tr>
<?php 
$queryrs = mysqli_query ($con, "SELECT * from setting_surat LIMIT 1");
while ($rs = mysqli_fetch_array($queryrs)){
?>


<tr>
  <td align="center" class="pull pull-right" width="45%">
    <?php if ($rs['ttd'] == 'Otomatis'): ?>
      <!-- Wadah cap dan ttd tumpuk -->
      <div style="position: relative; width: 7em; height: 7em; margin: 0 auto;">
        <!-- Cap -->
        <img src="../file/<?php echo $rd['stample']; ?>" 
             style="position: absolute; top: 0; right: 25; width: 7em; height: 7em; opacity: 0.9;">
        <!-- TTD -->
        <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" 
             style="position: absolute; top: 0; left: 10; width: 7em; height: 7em;">
      </div>
    <?php else: ?>
      <br>
    <?php endif; ?>
    
    <br>
    <div style="margin-top: 5px;">
      <u><b style="margin-right: 35px;"><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
     <p style="margin-right: 80px;"> NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?></p>
    </div>
</tr>


<?php } ?>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>
