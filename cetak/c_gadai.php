<link rel="stylesheet" href="../assets/css/style.css">
<?php
include_once "../koneksi.php";
include_once "../assets/inc.php";

# Baca variabel URL
$kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat lain
$query = mysqli_query($con, "SELECT * FROM tb_detailsurat 
    JOIN tb_staff ON tb_detailsurat.ttd = tb_staff.id_staff 
    LEFT JOIN tb_penduduk ON tb_detailsurat.nik = tb_penduduk.nik 
    WHERE tb_detailsurat.kode = '$kodesurat'");
while ($r = mysqli_fetch_array($query)) {

    // Tangkap dan pecah detail
    $dt = explode(';', isset($r['detail']) ? $r['detail'] : '');
    for ($i = 0; $i <= 25; $i++) {
        if (!isset($dt[$i])) $dt[$i] = '';
    }

    // Tanggal & Hari Indonesia
    $tgl_sekarang = date('Y-m-d');
    $hari = date('l');
    $hari_indonesia = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];
    $hari = $hari_indonesia[$hari];

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
<head>
<title></title>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
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
    <td>I.</td><td width="30%">Nama</td><td width="2%">:</td><td colspan="2"><b><?php echo $r['nama'];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td colspan="2"><?php echo $r['nik'];?></td>
  </tr>
    <tr>
    <td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?php echo $dt[2];?></td>
  </tr>
      <tr>
    <td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?php echo ucwords(strtolower($dt[3]));?>, <?php echo $dt[4];?></td>
  </tr>

  <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[5];?></td>
  </tr>
  <tr>
    <td></td><td>Selanjutnya disebut selaku</td><td>:</td><td colspan="2">Pihak I</td>
  </tr>
    <tr>
    <td></td><td>&nbsp;</td><td></td><td colspan="2"></td>
  </tr>
  <tr>
    <td>II.</td><td width="30%">Nama</td><td>:</td><td colspan="2"><b><?php echo $dt[7];?></b></td>
  </tr>
  <tr>
    <td></td><td>NIK</td><td>:</td><td colspan="2"><?php echo $dt[6];?></td>
  </tr>
    <tr>
    <td></td><td>Jenis Kelamin</td><td>:</td><td colspan="2"><?php echo $dt[8];?></td>
  </tr>
      <tr>
    <td></td><td>Tmp. & Tgl. Lahir</td><td>:</td><td colspan="2"><?php echo ucwords(strtolower($dt[9]));?>, <?php echo $dt[10];?></td>
  </tr>

  <tr>
    <td></td><td>Alamat</td><td>:</td><td colspan="2"><?php echo $dt[11];?> </td>
  </tr>
  <tr>
    <td></td><td>Selanjutnya disebut selaku</td><td>:</td><td colspan="2">Pihak II</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
        <!-- PERNYATAAN -->
        <tr>
            <td colspan="5" align="justify">
                Pada hari ini <?= strtoupper($hari); ?>, tanggal <?= tgl_indonesia($tgl_sekarang); ?>, Pihak I dan Pihak II secara bersama - sama sepakat sebagai berikut:
            </td>
        </tr>

        <tr>
            <td valign="top">1.</td>
            <td colspan="4" align="justify">
                Tanah dengan luas/ukuran <?= format_angka($dt[12]); ?> Ha./M2 yang terletak di <?= $dt[13]; ?>, dengan batas-batas:
            </td>
        </tr>
    <td></td><td> - Barat berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[15];?></td>
  </tr>
      <tr>
    <td></td><td> - Utara berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[16];?></td>
  </tr>
      <tr>
    <td></td><td> - Timur berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[17];?></td>
  </tr>
      <tr>
    <td></td><td> - Selatan berbatasan dengan</td><td>:</td><td colspan="2"><?php echo $dt[18];?></td>
  </tr>
    <tr>
    <td valign="top"></td><td colspan="4">adalah benar Tanah milik Pihak I;</td>
  </tr>
  <tr>
    <td valign="top">2.</td><td colspan="4" align="justify">Pihak I telah menggadaikan sebidang tanah tersebut pada poin 1 (satu) kepada Pihak II dengan harga <b>Rp. <?php echo format_angka($dt[14]);?></b>, <i>(<?php echo kekata($dt[14]);?> Rupiah)</i> ;</td>
  </tr>
  <tr>
    <td valign="top">3.</td><td colspan="4" align="justify">Setelah terjadinya transaksi Gadai sebagaimana poin 2 (dua) maka pengelolaan Tanah sebagaimana tersebut pada poin 1 (satu) diberikan sepenuhnya kepada Pihak II;</td>
  </tr>
  <tr>
    <td valign="top">4.</td><td colspan="4" align="justify">Tanah sebagaimana tersebut pada poin 1 (satu) dapat di kembalikan pengelolaannya kepada Pihak I setelah Pihak I mengembalikan/membayarkan kembali Uang Gadai sejumlah <b>Rp. <?php echo format_angka($dt[14]);?></b> sebagaimana tersebut pada poin 2 (dua) kepada Pihak II;</td>
  </tr>
  <tr>
    <td valign="top">5.</td><td colspan="4" align="justify">Hal - hal yang belum tertuang dalam kesepakatan ini akan di selesaikan secara kekeluargaan.</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="5" align="justify" align="justify">Demikian kesepatan Gadai ini dibuat, ditanda tangani oleh kedua belah Pihak dan Saksi - saksi dalam keadaan sadar dan tanpa paksaan dari siapapun.</td>
  </tr>

  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
   <!-- TTD PIHAK -->
   <tr>
            <td></td>
            <td align="center">Pihak II<br>Menerima Sewa</td>
            <td></td>
            <td></td>
            <td align="center"><?= $rd['kelurahan']; ?>, <?= tgl_indonesia($tgl_sekarang); ?><br>Pihak I<br>Yang Menyewakan</td>
        </tr>
        <tr><td colspan="5"><br><br></td></tr>
        <tr><td colspan="4"></td><td align="center"><small style="color: gray;">Materai</small></td></tr>
        <tr><td colspan="5"><br></td></tr>
        <tr>
            <td></td>
            <td align="center"><b><u><?= $dt[7]; ?></u></b></td>
            <td></td>
            <td></td>
            <td align="center"><b><u><?= $dt[1]; ?></u></b></td>
        </tr>

        <!-- SAKSI -->
        <tr><td colspan="4"><br><br><br><br><br><br><br>Saksi - saksi :</td></tr>
        <tr><td>1.</td><td><?= $dt[20]; ?></td><td colspan="2">(_______________)</td></tr>
        <tr><td>2.</td><td><?= $dt[21]; ?></td><td colspan="2"><br><br><br>(_______________)<br><br><br><br></td></tr>

        <!-- MENGETAHUI -->
        <tr><td colspan="5"><br></td></tr>
        <tr>
            <td colspan="5" align="center">
                Mengetahui<br>
                <?php echo ($r['jab_staff'] == 'Kepala Kelurahan' || $r['jab_staff'] == 'Kepala Desa') ? '' : 'a.n.'; ?>
                <?php echo $rd['jnp'] == 'Desa' ? 'Kepala Kampung' : 'Kepala Kelurahan'; ?> <?= $rd['kelurahan']; ?><br>
            </td>
        </tr>

        <!-- CAP & TTD -->
        <tr>
            <td colspan="5" align="center">
                <?php
                $queryrs = mysqli_query($con, "SELECT * from setting_surat LIMIT 1");
                while ($rs = mysqli_fetch_array($queryrs)) {
                    if ($rs['ttd'] == 'Otomatis'): ?>
                        <div style="position: relative; width: 7em; height: 7em; margin: 0 auto;">
                            <img src="../file/<?php echo $rd['stample']; ?>" style="position: absolute; top: 0; right: 25px; width: 7em; height: 7em; opacity: 0.9;">
                            <img src="../file/ttd/<?php echo $r['ttd_staff']; ?>" style="position: absolute; top: 0; left: 10px; width: 7em; height: 7em;">
                        </div>
                <?php endif; } ?>
                <br><b><u><?php echo strtoupper($r['nama_staff']); ?></u></b><br>
                NIP. <?= !empty($rd['niplurah']) ? $rd['niplurah'] : '-'; ?>
            </td>
        </tr>
    </table>

</body>
</html>

<?php } } ?>
