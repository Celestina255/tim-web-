<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

$kodesurat = $_GET['kode'];

$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
  JOIN tb_staff ON tb_detailsurat.ttd=tb_staff.id_staff 
  LEFT JOIN tb_penduduk ON tb_detailsurat.nik=tb_penduduk.nik 
  WHERE tb_detailsurat.kode='$kodesurat'");

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

  $query_kel = mysqli_query($con, "SELECT * from tb_kelurahan");
  while ($rd = mysqli_fetch_array($query_kel)) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Surat</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }
    .table-print {
      font-size: 14px;
    }
    .ttd-area {
      page-break-inside: avoid;
      margin-top: 20px;
    }
    .ttd-nama {
      display: inline-block;
      text-align: center;
      line-height: 1.4;
      margin-top: 30px; /* Diperpendek agar tidak terlalu jauh */
    }
    .cap-ttd {
      position: relative;
      width: 7em;
      height: 7em;
      margin: 0 auto;
    }
    .cap-ttd img {
      position: absolute;
      width: 7em;
      height: 7em;
    }
    .cap-ttd .cap {
      top: 0;
      right: 25px;
      opacity: 0.9;
    }
    .cap-ttd .ttd {
      top: 0;
      left: 10px;
    }
  </style>
</head>
<body onload="window.print()">
  <table width="97%" align="center" border="0" cellspacing="1" cellpadding="1" class="table-print">
    <tr>
      <td colspan="3">
        <small>
          LAMPIRAN IV<br>
          KEPUTUSAN DIREKTUR JENDERAL BIMBINGAN MASYARAKAT ISLAM<br>
          NOMOR 473 TAHUN 2020<br>
          TENTANG<br>
          PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN
        </small>
      </td>
    </tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr>
      <td colspan="3" align="center">
        <strong><font size="3" color="black">FORMULIR <?php echo strtoupper($r['nmsurat']); ?></font></strong><br>
        <small><?php echo $r['no']; ?></small>
      </td>
    </tr>
    <tr>
      <td></td><td></td><td align="right">Model N6&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr><td>DESA/KELURAHAN</td><td>:</td><td><?php echo strtoupper($rd['kelurahan']); ?></td></tr>
    <tr><td>DISTRIK</td><td>:</td><td><?php echo strtoupper($rd['kec']); ?></td></tr>
    <tr><td>KABUPATEN</td><td>:</td><td><?php echo strtoupper($rd['kab']); ?></td></tr>
  </table>

  <br>
  <table width="97%" align="center">
    <tr>
      <td colspan="3">Yang bertanda tangan di bawah ini <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Lurah'; ?> <?php echo $rd['kelurahan']; ?> Kecamatan <?php echo $rd['kec']; ?> Kabupaten <?php echo $rd['kab']; ?>, menerangkan bahwa:</td>
    </tr>
  </table>

  <br>
  <table width="97%" align="center">
    <tr><td>1.</td><td>Nama</td><td>:</td><td><?php echo $dt[1]; ?></td></tr>
    <tr><td>2.</td><td>Bin / Binti</td><td>:</td><td><?php echo $dt[2]; ?></td></tr>
    <tr><td>3.</td><td>NIK</td><td>:</td><td><?php echo $dt[0]; ?></td></tr>
    <tr><td>4.</td><td>Jenis Kelamin</td><td>:</td><td><?php echo $dt[3]; ?></td></tr>
    <tr><td>5.</td><td>Tmp. & Tgl. Lahir</td><td>:</td><td><?php echo $dt[4]; ?>, <?php echo $dt[5]; ?></td></tr>
    <tr><td>6.</td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[6]; ?></td></tr>
    <tr><td>7.</td><td>Agama</td><td>:</td><td><?php echo $dt[7]; ?></td></tr>
    <tr><td>8.</td><td>Alamat</td><td>:</td><td><?php echo $dt[8]; ?></td></tr>
  </table>

  <br>
  <table width="97%" align="center">
    <tr><td>Telah meninggal dunia pada tanggal</td><td>:</td><td><?php echo tgl_indonesia($dt[21]); ?></td></tr>
    <tr><td>Di</td><td>:</td><td><?php echo $dt[23]; ?></td></tr>
    <tr><td colspan="3">Yang bersangkutan adalah <b><?php echo $dt[18]; ?></b> dari:</td></tr>
  </table>

  <br>
  <table width="97%" align="center">
    <tr><td>1.</td><td>Nama</td><td>:</td><td><?php echo $dt[10]; ?></td></tr>
    <tr><td>2.</td><td>Bin / Binti</td><td>:</td><td><?php echo $dt[11]; ?></td></tr>
    <tr><td>3.</td><td>NIK</td><td>:</td><td><?php echo $dt[9]; ?></td></tr>
    <tr><td>4.</td><td>Jenis Kelamin</td><td>:</td><td><?php echo $dt[12]; ?></td></tr>
    <tr><td>5.</td><td>Tmp. & Tgl. Lahir</td><td>:</td><td><?php echo $dt[13]; ?>, <?php echo $dt[14]; ?></td></tr>
    <tr><td>6.</td><td>Kewarganegaraan</td><td>:</td><td><?php echo $dt[15]; ?></td></tr>
    <tr><td>7.</td><td>Agama</td><td>:</td><td><?php echo $dt[16]; ?></td></tr>
    <tr><td>8.</td><td>Alamat</td><td>:</td><td><?php echo $dt[17]; ?></td></tr>
  </table>

  <br>
  <table width="97%" align="center">
    <tr>
      <td>Demikian surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</td>
    </tr>
  </table>

  <!-- TANDA TANGAN -->
  <div class="ttd-area">
    <table width="90%" align="right" border="0" class="table-print">
      <tr>
        <td colspan="3" align="center"><?php echo $rd['kelurahan']; ?>, <?php echo tgl_indonesia(date('Y-m-d')); ?></td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa' ? '' : 'a.n.'; ?>
          <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Desa' : 'Kepala Kelurahan'; ?> <?php echo $rd['kelurahan']; ?><br>
          <?php echo $r['jab_staff']=='Kepala Kelurahan' || $r['jab_staff']=='Kepala Desa' ? '' : $r['jab_staff']; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <?php 
          $queryrs = mysqli_query ($con, "SELECT * FROM setting_surat LIMIT 1");
          while ($rs = mysqli_fetch_array($queryrs)) {
            if ($rs['ttd'] == 'Otomatis'): ?>
              <div class="cap-ttd">
                <img src="../file/<?php echo $rd['stample']; ?>" class="cap">
                <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" class="ttd">
              </div>
          <?php endif; } ?>

          <div class="ttd-nama">
            <b><u><?php echo strtoupper($r['nama_staff']); ?></u></b><br>
            NIP. <?php echo !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
          </div>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
<?php } } ?>
