<?php
include_once "../koneksi.php";
include '../assets/inc.php';

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel 
$query = mysqli_query ($con, "SELECT * FROM tb_detailsurat JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  $tgl2 = $dt[2];
  $bl2 = format_hari_tanggal($tgl2);
  $bln2 = explode(',', $bl2);
  $hari2 = $bln2[0];

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

  $query_kel = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query_kel)) {
?>
<html>

<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
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
    <td colspan="3" align="center"><hr style="border: 1.5px double black;"><br></td>
  </tr>
    <tr>
    <td colspan="3" align="center"><strong><font size=4 color="black"><u>DAFTAR PENGELUARAN RIL</u></font></a>
    </strong></td>
  </tr>
</table>
<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
    <tr>
    <td colspan="5">Yang bertanda tangan dibawah ini :</td>
  </tr>
  <tr>
    <td width="25%">Nama</td><td>: <?php echo $dt[0]; ?></td>
  </tr>
    <tr>
    <td>NIP</td><td>: <?php echo $dt[1]; ?></td>
  </tr>
      <tr>
    <td>Jabatan</td><td>: Kepala Kampung</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" align="justify">Berdasarkan Surat Perjalanan Dinas Nomor : <?php echo $r['no']; ?>, Tanggal : <?php echo tgl_indonesia($tgl_sekarang); ?>, dengan ini Kami menyatakan dengan sesungguhnya bahwa :</td>
  </tr>
   <tr>
    <td colspan="5" align="justify">1. Biaya Transfort pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh bukti - bukti pengeluarannya, meliputi :</td>
  </tr>
</table>
<table align="center" class="table-list" width="95%" border="1" cellspacing="0" cellpadding="4">
    <tr>
    <td align="center">NO</td><td width="50%">URAIAN</td><td align="center">JUMLAH</td>
  </tr>
  <tr>
  <td align="center">1.</td>
  <td width="50%">Uang harian, Uang saku, Uang makan & Transfort lokal</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[13])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">2.</td>
  <td width="50%">Biaya Transfort</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[14])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">3.</td>
  <td width="50%">Biaya Penginapan</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[15])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">4.</td>
  <td width="50%">Uang Representatif</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[16])); ?></td>
  <td>-</td>
</tr>
<tr>
  <td align="center">5.</td>
  <td width="50%">Sewa Kendaraan dalam Kota</td>
  <td align="right">Rp. <?php echo format_angka(floatval($dt[17])); ?></td>
  <td>-</td>
</tr>
<?php 

$query = mysqli_query ($con, "SELECT * from tb_detailsurat WHERE kode='$kodesurat'");
while ($rp = mysqli_fetch_array($query)){
  $dtl=explode(';',$rp['detail']);
  $u = floatval(preg_replace('/[^\d.]/', '', $dtl[13]));
  $t = floatval(preg_replace('/[^\d.]/', '', $dtl[14]));
  $i = floatval(preg_replace('/[^\d.]/', '', $dtl[15]));
  $r = floatval(preg_replace('/[^\d.]/', '', $dtl[16]));
  $s = floatval(preg_replace('/[^\d.]/', '', $dtl[17]));
  $jumlah = $u + $t + $i + $r + $s;
 ?>


      <tr>
    <td align="center"></td><td width="50%"><b>JUMLAH</b></td><td align="right"><b>Rp. <?php echo format_angka($jumlah);?></b></td>
  </tr>
<?php } ?>
      <tr>
    <td align="center"></td><td width="50%" colspan="2">Terbilang : <b><?php echo kekata($jumlah);?> Rupiah</b></td>
  </tr>

  </table>

<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
   <tr>
    <td colspan="5" align="justify">2. Jumlah uang tersebut pada angka 1 di atas benar - benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke kas Negara.</td>
  </tr>
     <tr>
    <td colspan="5" align="justify">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>

<tr><td></td><td></td><td>
<table width="98%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
          <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td></td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>, &nbsp; <?php echo tgl_indonesia($tgl_sekarang); ?></td>
  </tr>
  <tr>
    <td align="center">Kepala SKPD/KPA</td><td align="center" class="pull pull-right">Pelaksana SPD,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><b><?php echo $dt[0];?></b></u></td><td align="center" class="pull pull-right"><u><b><?php echo $dt[4];?></b></u></td>
  </tr>
    <tr>
    <td align="center">NIP. <?php echo $dt[1];?></td><td align="center" class="pull pull-right">NIP. <?php echo $dt[5];?></td>
  </tr>
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>
</html>
