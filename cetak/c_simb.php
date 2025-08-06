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
            <table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
              <tr>
                <td></td><td></td><td></b></td><td align="left"><?php echo $rd['kelurahan'];?>, <?php echo tgl_indonesia($tgl_sekarang); ?>&nbsp;&nbsp;&nbsp;</td>
              </tr>
              <tr>
                <td valign="top">Perihal </td><td valign="top">:</td><td valign="top" width="45%"><b>Permohonan Izin Mendirkan Bangunan (IMB)</b></td><td align="left"></td>
              </tr>
              <tr>
                <td valign="top">Lampiran </td><td valign="top">:</td><td valign="top"> 1 (satu) berkas</td><td>Kepada : &nbsp;&nbsp;&nbsp;</td>
              </tr>
              <tr>
                <td valign="top"></td><td valign="top"></td><td valign="top"><b></td>
                  <td>Yth. <b><?php echo $dt[9];?></td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td>Di -</td>
                  </tr>
                  <tr>
                    <td></td><td></td><td></td><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u><?php echo $dt[10];?></u></b></td>
                  </tr>
                  <tr>
                    <td colspan="4">&nbsp;</td>
                  </tr>
                </table>
              
                <table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
                  <tr>
                    <td colspan="3">Dengan hormat, Yang bertanda tangan dibawah ini :  </td>
                  </tr>
              
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;1. Nama Pemohon</td><td>:</td><td><?php echo $dt[1];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;2. NIK </td><td>:</td><td><?php echo $dt[0];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;3. Pekerjaan </td><td>:</td><td><?php echo $dt[2];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;4. Alamat </td><td>:</td><td><?php echo $dt[3];?></td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td colspan="3">Dengan ini mengajuan Izin Mendirikan Bangunan sebagai berikut :</td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;1. Jenis Bangunan</td><td>:</td><td><?php echo $dt[4];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;2. Fungsi/Peruntukan Bangunan</td><td>:</td><td><?php echo $dt[5];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;3. Jumlah Lantai</td><td>:</td><td><?php echo $dt[6];?> Lantai</td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;4. Ukuran Bangunan</td><td>:</td><td><?php echo $dt[7];?></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;5. Lokasi</td><td>:</td><td><?php echo $dt[8];?></td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" align="justify">Demikian Permohonan ini kami sampaikan, atas perhatian serta terkabulnya permohonan ini disampaikan terima kasih.</td>
                  </tr>

                  <tr>
  <td colspan="4">
    <table width="100%" border="0" cellspacing="1" cellpadding="4" class="table-print">
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>

      <!-- BARIS ATAS -->
      <tr>
        <td align="center" width="50%">
          Mengetahui,<br>
          Kepala Kampung <?php echo $rd['kelurahan']; ?>
        </td>
        <td align="center">
          <?php echo $rd['kelurahan']; ?>,&nbsp<?php echo tgl_indonesia($tgl_sekarang); ?><br>
          Pemohon,
        </td>
      </tr>

      <!-- SPASI -->
      <tr><td colspan="2" style="height: 20px;"></td></tr>

      <!-- TTD DAN CAP -->
      <tr>
        <td align="center">
          <?php
          $queryrs = mysqli_query($con, "SELECT * FROM setting_surat LIMIT 1");
          while ($rs = mysqli_fetch_array($queryrs)) {
              if ($rs['ttd'] == 'Otomatis') {
                  echo '<div style="position: relative; width: 160px; height: 90px; margin: 0 auto;">';
                  echo '<img src="../file/' . $rd['stample'] . '" style="position: absolute; left: 0; top: 0; width: 7em; height: 7em;">';
                  echo '<img src="../file/ttd/' . $r['ttd_staff'] . '" style="position: absolute; right: 0; top: 0; width: 7em; height: 7em;">';
                  echo '</div>';
              } else {
                  echo '<br><br><br>';
              }
          }
          ?>
        </td>
        <td></td>
      </tr>
      <!-- NAMA DAN NIP -->
      
      <tr>
        <td align="center">
          <u><b><?php echo strtoupper($r['nama_staff']); ?></b></u><br>
          <b>NIP. <?php echo !empty($r['nip']) ? $r['nip'] : '-'; ?></b>
        </td>
        <td align="center">
          <u><b><?php echo strtoupper($r['nama']); ?></b></u>
        </td>
      </tr>
    </table>
  </td>
</tr>

                </table>
              <?php }} ?>
              </html>
