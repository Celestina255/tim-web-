<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.* from tb_jenissurat, tb_datasurat, tb_detailsurat WHERE tb_detailsurat.kode='$kodesurat'");
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

<body onLoad="window.print()" >
<h1 align="center">
<table width="800" align="center" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td rowspan="4" width="80" style="text-align: center; vertical-align: top;">
      <img src="../img/<?php echo $rd['logo']; ?>" style="max-width: 90px; height: auto;">
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
</table>


<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
    <tr>
    <td>Nomor </td><td>:</td><td><?php echo $r['no'];?></td><td align="left"><?php echo $rd['kelurahan'];?>, <?php echo tgl_indonesia(date('Y-m-d')); ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
      <tr>
    <td>Lampiran </td><td>:</td><td> 1 (satu) berkas</td><td>Kepada Yth,&nbsp;&nbsp;&nbsp;</td>
  </tr>
    <tr>
    <td valign="top">Perihal</td><td valign="top">:</td><td valign="top"><b>Permohonan Penerbitan SKCK</b></td>
    <td><b><?php echo $dt[8];?></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td>Di -</td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo $dt[9];?></u></b></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
  <table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
    <tr>
    <td colspan="3">Assalamu 'alaikum Wr. Wb.<br></td>
  </tr>
    <tr>
    <td colspan="3">Dengan hormat,</td>
  </tr>
  <tr>
    <td colspan="3" align="justify">Bersama ini <?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?> Distrik <?php echo $rd['kec'];?> Kabupaten <?php echo $rd['kab'];?>, mohon agar kiranya Bapak/Ibu <?php echo $dt[8];?> bersedia menerbikan SKCK untuk warga kami sebagai berikut : </td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Nama</td><td>:</td><td><?php echo $dt[1];?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;NIK</td><td>:</td><td><?php echo $dt[0];?></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Jenis Kelamin</td><td>:</td><td><?php echo $dt[2];?></td>
  </tr>
    <tr>
    <td>&nbsp;&nbsp;Tmp.&Tgl. Lahir</td><td>:</td><td><?php echo $dt[3];?>, <?php echo IndonesiaTgl($dt[4]);?>.</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;Pekerjaan</td><td>:</td><td><?php echo $dt[5];?></td>
  </tr>
    <tr>
    <td>&nbsp;&nbsp;Alamat</td><td>:</td><td><?php echo $dt[6];?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3" align="justify">Adapun SKCK tersebut akan digunakan untuk <?php echo $dt[7];?>.<br></td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3" align="justify">Demikian permohonan ini kami sampaikan atas perhatian serta perkenan Bapak/Ibu <?php echo $dt[8];?> disampaikan terimakasih.<br></td>
  </tr>
    <tr>
    <td colspan="3">Wassalamu 'alaikum Wr. Wb.</td>
  </tr>

<tr><td></td><td></td><td>
<table width="400" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
          <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td align="center" class="pull pull-right"><?php echo $rd['jnp']=='Desa'? "Kepala Kampung" : "Lurah";?> <?php echo $rd['kelurahan'];?></td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
      <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right"><b><u><?php echo $r['ttd'];?></u></b></td>
  </tr>
  <tr>
    <td align="center" class="pull pull-right">NIP. <?php echo $rd['niplurah'];?></td>
  </tr>  
</table>
</td>
</tr>
</table>
  <?php }} ?>
</body>
</html>
