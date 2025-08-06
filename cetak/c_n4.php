<link rel="stylesheet" href="../assets/css/style.css">
<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* from tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");
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
  function tgl_lahir_indo($tgl) {
    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    $exp = explode('/', $tgl); // format di database: 07/09/1968
    return (int)$exp[0] . ' ' . $bulan[$exp[1]] . ' ' . $exp[2];
}

  $query = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query)) {
?>
<html>
<head>
<title></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="window.print()" >
<h1 align="center">
<table width="97%" align="center" border="0" cellspacing="1" cellpadding="1" class="table-print">
  <tr>
    <td colspan="3"><small>LAMPIRAN IV
<br>KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM
<br>NOMOR 473 TAHUN 2020
<br>TENTANG
<br>PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN</small></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=3 color="black">FORMULIR PERSETUJUAN CALON PENGANTIN
      
    </font>
    </strong></td>
  </tr>
    <tr>
    <td></td><td></td><td align="right">Model N4 &nbsp;&nbsp;&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=3 color="black">SURAT PERSETUJUAN PENGANTIN
      </font>
    </strong><br><small><?php echo $r['no'];?></small></td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">Yang bertanda tangan dibawah ini  :</td>
  </tr>
</table>
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr><td colspan="4">A. Calon Suami :</td>
  </tr>
  <tr>
    <td>1.</td><td>Nama</td><td>:</td><td><?php echo $dt[1];?></td>
  </tr>
  <tr>
    <td>2.</td><td>Bin</td><td>:</td><td><?php echo $dt[2];?></td>
  </tr>
  <tr>
    <td>3.</td><td> NIK</td><td>:</td><td><?php echo $dt[0];?></td>
  </tr>
  <tr>
    <td>4.</td><td> Tempat / Tanggal Lahir </td><td>:</td><td><?php echo $dt[4];?>, <?php echo tgl_lahir_indo($dt[5]);?></td>
  </tr>
  <tr>
    <td>5.</td><td> Kewarganegaraan</td><td>:</td><td><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td>6.</td><td> Agama</td><td>:</td><td><?php echo $dt[7];?></td>
  </tr>
  <tr>
    <td>7.</td><td> Pekerjaan</td><td>:</td><td><?php echo $dt[8];?></td>
  </tr>
    <tr>
    <td valign="top">8.</td><td valign="top"> Alamat</td><td valign="top">:</td><td><?php echo $dt[13];?> <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $dt[9];?> <br>Distrik <?php echo $dt[10];?> Kabupaten <?php echo $dt[11];?> Provinsi <?php echo $dt[12];?></td>
  </tr>
      <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
<tr><td colspan="4">B. Calon Istri :</td>
  </tr>
    <tr>
    <td>1.</td><td>Nama</td><td>:</td><td><?php echo $dt[17];?></td>
  </tr>
  <tr>
    <td>2.</td><td>Binti</td><td>:</td><td><?php echo $dt[18];?></td>
  </tr>
  <tr>
    <td>3.</td><td> NIK</td><td>:</td><td><?php echo $dt[16];?></td>
  </tr>
  <tr>
    <td>4.</td><td> Tempat / Tanggal Lahir </td><td>:</td><td><?php echo $dt[20];?>,  <?php echo tgl_lahir_indo($dt[21]);?></td>
  </tr>
  <tr>
    <td>5.</td><td> Kewarganegaraan</td><td>:</td><td><?php echo $dt[22];?></td>
  </tr>
    <tr>
    <td>6.</td><td> Agama</td><td>:</td><td><?php echo $dt[23];?></td>
  </tr>
  <tr>
    <td>7.</td><td> Pekerjaan</td><td>:</td><td><?php echo $dt[24];?></td>
  </tr>
    <tr>
    <td valign="top">8.</td><td valign="top"> Alamat</td><td valign="top">:</td><td><?php echo $dt[29];?>  <?php echo $rd['jnp']=='Desa'? "Kampung" : "Kelurahan";?> <?php echo $dt[25];?> <br>Distrik <?php echo $dt[26];?> Kabupaten <?php echo $dt[27];?> Provinsi <?php echo $dt[28];?></td>
  </tr>
  </table>
  
<table align="center" class="table-list" width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan pernikahan.
    <br>Demikian Surat persetujuan ini di buat untuk digunakan seperlunya.</td>
  </tr>

<tr><td></td><td></td><td></td></tr>
</table>
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="0" class="table-print">
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td></td><td></td></data><td align="center" class="pull pull-right"> <?php echo $rd['kelurahan'];?>, <?php echo tgl_indonesia(date('Y-m-d')); ?></td>
  </tr>    
  <tr>
    <td align="center">Calon Suami,</td><td></td><td align="center" class="pull pull-right">Calon Istri,</td>
  </tr>
  <tr>
    <td></td><td rowspan="5" align="center"  width="20%"></td> <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><?php echo $dt[1];?></u></td><td align="center" class="pull pull-right"><u><?php echo $dt[17];?></u></td>
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
