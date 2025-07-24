<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];

$query = mysqli_query($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.*, tb_penduduk.* 
    FROM tb_jenissurat, tb_datasurat, tb_detailsurat, tb_penduduk 
    WHERE tb_detailsurat.kode='$kodesurat' AND tb_detailsurat.nik=tb_penduduk.nik");

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
<body onLoad="window.print()">
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
    <td colspan="2" align="center"><strong style="font-size: 20px;">KAMPUNG <?php echo strtoupper($rd['kelurahan']); ?></strong></td>
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
    <td colspan="3">
      Yang bertanda tangan di bawah ini 
      <?php echo $rd['jnp']=='Desa' ? "Kepala Kampung" : "Lurah"; ?> <?php echo $rd['kelurahan']; ?> 
      Distrik <?php echo $rd['kec']; ?> Kabupaten <?php echo $rd['kab']; ?>, dengan ini menerangkan sesungguhnya bahwa :
    </td>
  </tr>
  <tr><td colspan="3">&nbsp;</td></tr>

  <tr><td>Nama Ternak</td><td>:</td><td><b><?php echo $dt[0]; ?></b></td></tr>
  <tr><td>Jenis Ternak</td><td>:</td><td><?php echo $dt[1]; ?></td></tr>
  <tr><td>Ciri - ciri Ternak</td><td>:</td><td><?php echo $dt[2]; ?></td></tr>
  <tr><td>Nama Pemilik Ternak</td><td>:</td><td><?php echo $dt[3]; ?></td></tr>
  <tr><td>Asal Ternak/dari</td><td>:</td><td><?php echo $dt[4]; ?></td></tr>
  <tr><td>Tujuan Ternak/dikirim ke</td><td>:</td><td><?php echo $dt[5]; ?></td></tr>

  <tr><td colspan="3">&nbsp;</td></tr>

  <tr><td colspan="3">Hewan ternak tersebut di atas adalah benar milik:</td></tr>
  <tr><td>Nama</td><td>:</td><td><b><?php echo $r['nama']; ?></b></td></tr>
  <tr><td>NIK</td><td>:</td><td><?php echo $r['nik']; ?></td></tr>
  <tr><td>Jenis Kelamin</td><td>:</td><td><?php echo $r['jk']; ?></td></tr>
  <tr><td>Agama</td><td>:</td><td><?php echo $r['agama']; ?></td></tr>
  <tr>
    <td>Alamat</td><td>:</td>
    <td><?php echo $r['alamat']; ?> <?php echo $rd['jnp']=='Desa' ? "Kampung" : "Kelurahan"; ?> <?php echo $r['kelurahan']; ?></td>
  </tr>
  <tr>
    <td></td><td></td>
    <td>Distrik <?php echo $r['kec']; ?>, Kabupaten <?php echo $r['kab']; ?></td>
  </tr>

  <tr><td colspan="3">yang akan dikirim dengan Kendaraan/Mobil, No. Polisi / Plat : ___________</td></tr>
  <tr><td colspan="3">&nbsp;</td></tr>
  <tr><td colspan="3">Demikian keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</td></tr>

  <tr>
    <td colspan="4">
      <table width="90%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr>
          <td></td>
          <td align="center" class="pull pull-right"><?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia($tgl_sekarang); ?></td>
        </tr>
        <tr>
          <td rowspan="3" width="50%"></td>
          <td align="center" valign="top" class="pull pull-right"><?php echo $rd['jnp']=='Desa' ? "Kepala Kampung" : "Lurah"; ?> <?php echo $rd['kelurahan']; ?></td>
        </tr>
        <tr><td align="center" class="pull pull-right"></td></tr>
        <tr>
          <td align="center" class="pull pull-right"><br><br><br>
            <u><b><?php echo $r['ttd']; ?></b></u><br>
            NIP. <?php echo $rd['niplurah']; ?>
          </td>
        </tr> 
      </table>
    </td>
  </tr>
</table>
<?php } } ?>
</body>
</html>
