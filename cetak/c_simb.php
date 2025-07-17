    <?php
    include_once "../koneksi.php";
    include_once "../assets/inc.php";

# Baca variabel URL
    $kodesurat = $_GET['kode'];

# Perintah untuk mendapatkan data dari tabel Surat 
    $query = mysqli_query ($con, "SELECT tb_jenissurat.*, tb_datasurat.*, tb_detailsurat.* from tb_jenissurat, tb_datasurat, tb_detailsurat WHERE tb_detailsurat.kode='$kodesurat'");
    while ($r = mysqli_fetch_array($query)){
      $dt=explode(';',$r['detail']);
      $tgl = $r['tanggal'];
      $bl=format_hari_tanggal($tgl);
      $bln=explode(',',$bl);
      $bulan=$bln['1'];
      ?>
      <?php 
      $query = mysqli_query ($con, "SELECT * from tb_kelurahan");
      while ($rd = mysqli_fetch_array($query)){
        ?>
        <body onLoad="window.print()" >
          <h1 align="center">
            <table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
              <tr>
                <td></td><td></td><td></b></td><td align="left"><?php echo $rd['kelurahan'];?>, <?php echo $bulan;?>&nbsp;&nbsp;&nbsp;</td>
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
                <br>
                <table align="center" class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
                  <tr>
                    <td colspan="3">Dengan hormat, </td>
                  </tr>
                  <tr>
                    <td colspan="3">Yang bertanda tangan dibawah ini : </td>
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

                  <tr><td colspan="4">
                    <table width="90%" align="right" border="0" cellspacing="1" cellpadding="4" class="table-print">
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center">Mengetahui,</td><td align="center" class="pull pull-right"><?php echo $rd['kelurahan'];?>,&nbsp;<?php echo $bulan;?></td>
                      </tr>
                      <tr>
                        <td width="50%" align="center"><?php echo $rd['jnp']=='Desa'? "Kepala Desa" : "Lurah";?></td><td align="center" valign="top" class="pull pull-right">Pemohon,</td>
                      </tr>
                      <tr>
                        <td></td><td align="center" class="pull pull-right"></td>
                      </tr>

                      <tr>
                        <td align="center"><br><br><br><u><b><?php echo $r['ttd'];?></b></u><br>NIP. <?php echo $rd['niplurah'];?></td><td align="center" class="pull pull-right"><br><br><br><b><u><?php echo $dt[1];?></u></b></td>
                      </tr> 

                    </table>
                  </td>
                </tr>
              </table>
            <?php }} ?>
