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

  $query = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query)) {
?>
<html>
<body onLoad="window.print()" >
<h1 align="center">
<table width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="table-print">
  <tr>
    <td colspan="3">LAMPIRAN IV
<br>KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM
<br>NOMOR 473 TAHUN 2020
<br>TENTANG
<br>PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black">FORMULIR PERMOHONAN KEHENDAK NIKAH</font></a>
    </strong></td>
  </tr>
    <tr>
    <td></td><td></td><td align="right">Model N2 &nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>Perihal : <b>Permohonan Kehendak Nikah</b></td><td></td><td align="right"><?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia(date('Y-m-d')); ?>
&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr><?php 
$query = mysqli_query ($con, "SELECT * from tb_kua");
while ($re = mysqli_fetch_array($query)){
?>
    <td colspan="3">Kepada Yth, <br> Kepala KUA Kecamatan / PPN LN <br> Di <br>&nbsp;&nbsp;&nbsp;&nbsp;<u><?php echo $rd['kec'];?></u></td>
  </tr>
</table>
<br>
<table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">

  <tr>
    <td colspan="3">Dengan hormat, kami mengajukan permohonan kehendak nikah untuk atas nama :</td>
  </tr>
</table>
<table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>Calon Suami</td><td>:</td><td><?php echo $dt[1];?></td>
  </tr>
    <tr>
    <td>Calon Istri</td><td>:</td><td><?php echo $dt[17];?></td>
  </tr>
  <tr>
    <td>Hari/Tanggal/Jam</td><td>:</td><td><?php echo $dt[62];?>, <?php echo IndonesiaTgl($dt[63]);?>, Jam <?php echo $dt[64];?> WIT</td>
  </tr>
    <tr>
    <td>Tempat Akad Nikah</td><td>:</td><td><?php echo $dt[65];?></td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut:
    <br>1. Surat pengantar nikah dari Kelurahan/Kelurahan
    <br>2. Persetujuan calon mempelai
    <br>3. Fotokopi KTP
    <br>4. Fotokopi akte kelahiran
    <br>5. Fotokopi kartu keluarga
    <br>6. Paspoto 2x3 = 3 lembar berlatar belakang biru
    <br>7. ________________________________
    <br>8. ________________________________
    </td>
  </tr>
  </table>


<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri, dan dicatat sesuai dengan ketentuan peraturan perundang - undangan.</td>
  </tr>

<tr><td></td><td></td><td></td></tr>
</table>
<table width="100%" align="right" border="0" cellspacing="1" cellpadding="0" class="table-print">
  <tr>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td width="35%">Diterima tanggal _________________</td><td align="center" class="pull pull-right"></td>
  </tr>   
  <tr>
    <td>Yang Menerima, <br>Kepala KUA / PPN LN</td> <td></td><td align="center" class="pull pull-right">Pemohon,</td>
  </tr>
  <tr>
     <td></td><td>&nbsp;</td>
  </tr>
  <tr>
    <td></td><td rowspan="3" align="center" width="20%"></td> <td></td>
  </tr>
  <tr>
     <td></td><td>&nbsp;</td>
  </tr>
  <tr>
    <td><u><?php echo $re['nm_kepala']; }?></u></td><td align="center" class="pull pull-right"><u><?php echo $dt[1];?></u></td>
  </tr>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>

</html>
