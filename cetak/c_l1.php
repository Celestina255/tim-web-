<?php
include_once "../koneksi.php";
include '../assets/inc.php';

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel 
$query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.* from tb_jenissurat, tb_datasurat, tb_detailsurat 
WHERE tb_detailsurat.kode='$kodesurat'");
while ($r = mysqli_fetch_array($query)) {
  $dt = explode(';', $r['detail']);
  $tgl_sekarang = date('Y-m-d');
  $tglpdn = $dt[11];
  function tgl_indo_hari($tanggal) {
    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    $bulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    $tgl = date('Y-m-d', strtotime($tanggal));
    $hari_ini = $hari[date('l', strtotime($tgl))];
    $pecah = explode('-', $tgl);

    return $hari_ini . ', ' . $pecah[2] . ' ' . $bulan[$pecah[1]] . ' ' . $pecah[0];
}

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

<table align="center" class="table-list" width="95%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>

    <td width="50%">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>I.</td><td width="30%">Berangkat dari </td><td>:</td><td><?php echo $rd['kelurahan'];?></td></tr>
          <tr><td></td><td>Ke</td><td>:</td><td><?php echo $dt[9];?></td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td><?php echo tgl_indo_hari($tglpdn); ?></td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br> <br><u><b><?php echo $dt[0];?></b></u></td></tr>
          <tr><td></td><td colspan="3">NIP. <?php echo $dt[1];?></td></tr>
        </table>
    </td>
  </tr>
    <tr>

    <td width="50%" valign="top">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>II.</td><td width="30%">Tiba di </td><td>:</td><td><?php echo $dt[9];?></td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br><br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
    <td width="50%">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>&nbsp;&nbsp;</td><td width="30%">Berangkat dari </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Ke</td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
  </tr>
  <tr>
    <td width="50%" valign="top">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>III.</td><td width="30%">Tiba di </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br><br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
    <td width="50%">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>&nbsp;&nbsp;</td><td width="30%">Berangkat dari </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Ke</td><td>:</td><td><?php echo $rd['kelurahan'];?></td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
  </tr>
  <tr>
    <td width="50%" valign="top">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>IV.</td><td width="30%">Tiba di </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br><br> <br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
    <td width="50%">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>&nbsp;&nbsp;</td><td width="30%">Berangkat dari </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Ke</td><td>:</td><td><?php echo $rd['kelurahan'];?></td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
  </tr>
    <tr>
    <td width="50%" valign="top">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr><td>V.</td><td width="30%">Tiba di </td><td>:</td><td>__________________</td></tr>
          <tr><td></td><td>Pada Tanggal </td><td>:</td><td>____/_____/_______</td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br><br><br><br> <br>_________________________</td></tr>
          <tr><td></td><td colspan="3">NIP. _____________________</td></tr>
        </table>
    </td>
    <td width="50%">
        <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
          <tr><td>&nbsp;&nbsp;</td><td colspan="2" rowspan="3" align="justify">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata - mata untuk kepentingan jabatan dalam waktu yang sesingkat - singkatnya.</td></tr>
          <tr><td></td></tr>
          <tr><td></td></tr>
          <tr><td></td><td>Kepala SKPD</td></tr>
          <tr><td></td><td colspan="3"> <br> <br> <br> <br><u><b><?php echo $dt[0];?></b></u></td></tr>
          <tr><td></td><td colspan="3">NIP. <?php echo $dt[1];?></td></tr>
        </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr><td>V.</td><td width="100%" colspan="2">Catatan lain - lain </td></tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2">
      <table align="center" class="table-list" width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr><td>VI.</td><td width="100%" colspan="2">PERHATIAN </td></tr>
        <tr><td></td><td width="100%" colspan="2" align="justify">KPA yang menerbitkan SPPD, Pegawai yang melakukan perjalanan Dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan - peraturan Keuangan Negara apabila Negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</td></tr>
      </table></td>
  </tr>
</table>


<table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>

<tr><td></td><td></td><td>

</td>
</tr>
</table>
  <?php } } ?>
</body>

</html>
