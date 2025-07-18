<?php
include_once "../assets/inc.php";
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h3 class="title-5">SURAT KETERANGAN KEMATIAN
            </h3>
        </div>
        <div class="col-md-3">
            <a href="?page=surat_mandiri" type="button" class="btn btn-primary">Kembali</a>
        </div>

    </div>
    <hr class="line-seprate">

    <div class="card-body card-block" style="box-shadow: 4px 5px 4px;">

        <?php
        $query = mysqli_query($con, "SELECT max(kode) as kodeTerbesar FROM tb_datasurat");
        $data = mysqli_fetch_array($query);
        $kodesurat = $data['kodeTerbesar'];

                                // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodesurat, 2, 3);

                                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

                                // membentuk kode surat baru
                                // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        $huruf = "SR";
        $kodesurat = $huruf . sprintf("%03s", $urutan);
        $nourut = sprintf("%03s", $urutan);
        ?>
        <form action="act/s_suketmati.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $kodesurat ?>" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nmsurat" class=" form-control-label">Jenis / Nama Surat</label></div>
                    <div class="col-12 col-md-8">
                        <select name="nmsurat" id="nmsurat" onchange="isiredaksi()" class="form-control">
                            <option value="">Pilih Jenis atau Nama Surat</option>
                            <?php 
                            $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS012' ORDER BY id ASC ");
                            while ($r = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $r['nmsurat'];?>"><?php echo $r['kode'];?>--><?php echo $r['nmsurat'];?></option>

                            </select>
                        </div>
                    </div>
                    <?php
                    $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan WHERE id='1'");
                    while ($rdes = mysqli_fetch_array($query)){
                        ?>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                            <?php $idstf=$_SESSION['userid']; ?>
                            <input type="hidden" id="idstf" name="idstf" value="<?php echo $idstf; ?>">
                            <input type="hidden" id="kode_klasi" name="kode_klasi">
                            <input type="hidden" id="blnr" name="blnr" value="<?php echo getRomawi(date('m'));?>" >
                            <input type="hidden" id="lurah" name="lurah" value="<?php echo $rdes['lurah']; ?>" >
                            <input type="hidden" id="kodejenis" name="kodejenis" value="<?php echo $r['kode']; ?>" >
                            <div class="col-12 col-md-3"><input type="text" id="nosurat" name="nosurat" maxlength="3" class="form-control" value="<?php echo $nourut ?>" readonly></div>
                        </div>
                    <?php }}?>
                    <hr>
                    <h6 class="label">IDENTITAS YANG MATI/MENINGGAL:</h6>
                    <hr>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nika" class=" form-control-label">NIK</label></div>
                        <div class="col-12 col-md-4"><input type="text" id="nika" name="nika" onkeyup="isinika()" class="form-control" maxlength="16"  placeholder="NIK Alm/Almh." ></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="namaa" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="namaa" name="namaa" placeholder="Nama Alm/Almh." class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="bina" class=" form-control-label">Bin / Bnti</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="bina" name="bina" placeholder="Nama Ayah" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="jka" class=" form-control-label">Jenis Kelamin</label></div>
                        <div class="col-12 col-md-4">
                            <select name="jka" id="jka" class="form-control" required>
                                <option value="" selected="selected">Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tmp_lahira" class=" form-control-label">Tempat Lahir</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="tmp_lahira" name="tmp_lahira" placeholder="Tempat Lahir" required class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tgl_lahira" class=" form-control-label">Tanggal Lahir</label></div>
                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahira" name="tgl_lahira" placeholder="Tanggal Lahir" required class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="kwnga" class=" form-control-label">Kewarga Negaraan</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="kwnga" name="kwnga" placeholder="Kewarganegaraan" required class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="agamaa" class=" form-control-label">Agama</label></div>
                        <div class="col-12 col-md-4">
                            <select name="agamaa" id="agamaa" class="form-control" required>
                                <option value="" selected="selected">Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="pkjna" class=" form-control-label">Pekerjaan</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="pkjna" name="pkjna" placeholder="Pekerjaan"  class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="almta" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="almta" name="almta" placeholder="xxx/xxx" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
                    </div>

                    <hr>
                    <h6 class="label">KETERANGAN TEMPAT/WAKTU & TEMPAT KEMATIAN :</h6>
                    <hr>       

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="sebab" class=" form-control-label">Sebab Kematian</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="sebab" name="sebab" placeholder="Sebab Kematian" required class="form-control"><small class="form-text text-muted">Contoh : Sakit Demam</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hari" class=" form-control-label">Hari</label></div>
                        <div class="col-12 col-md-4">
                            <select name="hari" id="hari" class="form-control" required>
                                <option value="-" selected="selected">--Pilih Hari--</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum\'at">Jum'at</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                    </div>  
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tanggal" class=" form-control-label">Tanggal</label></div>
                        <div class="col-12 col-md-4"><input type="date" id="tanggal" name="tanggal" placeholder="Tanggal Kematian" required class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="waktu" class=" form-control-label">Waktu</label></div>
                        <div class="col-12 col-md-4"><input type="time" id="waktu" name="waktu" placeholder="Waktu/Pukul/Jam" class="form-control" required><small class="form-text text-muted">Contoh : 18:00 WIB</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tempat" class=" form-control-label">Tempat</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="tempat" name="tempat"  placeholder="Tempat Kematian" class="form-control" required><small class="form-text text-muted">Contoh : Rumah Sakit</small></div>
                    </div>
                    <hr>
                    <h6 class="label">IDENTITAS PELAPOR:</h6>
                    <hr>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nik1" class=" form-control-label">NIK</label></div>
                        <div class="col-12 col-md-4"><input type="text" id="nik1" name="nik1" onkeyup="isinik1()" class="form-control" maxlength="16"  placeholder="NIK Pelapor" ></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="nama1" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="nama1" name="nama1" placeholder="Nama Pelapor" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="jk1" class=" form-control-label">Jenis Kelamin</label></div>
                        <div class="col-12 col-md-4">
                            <select name="jk1" id="jk1" class="form-control" required>
                                <option value="-" selected="selected">Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tmp_lahir1" class=" form-control-label">Tempat Lahir</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="tmp_lahir1" name="tmp_lahir1" placeholder="Tempat Lahir" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="tgl_lahir1" class=" form-control-label">Tanggal Lahir</label></div>
                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahir1" name="tgl_lahir1" placeholder="Tanggal Lahir" class="form-control" required></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="agama1" class=" form-control-label">Agama</label></div>
                        <div class="col-12 col-md-4">
                            <select name="agama1" id="agama1" class="form-control" required>
                                <option value="-" selected="selected">Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="pkjn1" class=" form-control-label">Pekerjaan</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="pkjn1" name="pkjn1" placeholder="Pekerjaan" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="almt1" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="almt1" name="almt1" placeholder="xxx/xxx" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="shdk" class=" form-control-label">Hubungan dgn Alm./Almh.</label></div>
                        <div class="col-12 col-md-6"><input type="text" id="shdk" name="shdk"  placeholder="Hubungan dengan Alm./Almh." required class="form-control"><small class="form-text text-muted">Contoh :Suami, Istri atau Anak</small></div>
                    </div>
                    <hr>
                    <div class="row form-group">

                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                        <div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                    </div>
                </form>  
            </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Surat Keterangan Kematian</strong>
                            </div>

                            <div class="card-body scroll">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tanggal</th>
                                            <th>Nama Alm./Almh. </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $userid=$_SESSION['userid'];
                                $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat, tb_buatsendiri WHERE tb_detailsurat.kode=tb_buatsendiri.kode_surat AND tb_detailsurat.kodejenis='JS012' AND tb_buatsendiri.status='acc' AND tb_buatsendiri.userid='$userid' ORDER BY tb_detailsurat.id DESC ");
                                        while ($r = mysqli_fetch_array($query)){
                                            $dt=explode(';', $r['detail']);
                                            ?>
                                            <tr>
                                                <td><?php echo $r['id'];?></td>
                                                <td><?php echo $r['no'];?></td>
                                                <td><?php echo $r['tanggal'];?></td>
                                                <td><?php echo $dt[1];?></td>
                                                <td><a href="../cetak/c_suketmati.php?kode=<?php echo $r['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a><a href="?page=edit_suketkematian&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-edit"></i></a><a href="hapus/h_suketmati.php?kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>
<br><br>
<!-- jQuery 3 -->
<script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

<script type="text/javascript">
    function isinika(){
        var nik = $("#nika").val();
        $.ajax({
            url: '../include/ambil_datawarga.php',
            data:"nik="+nik ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#namaa').val(obj.nama);
            $('#jka').val(obj.jk);
            $('#tmp_lahira').val(obj.tmp_lahir);
            $('#tgl_lahira').val(obj.tgl_lahir);
            $('#kwnga').val(obj.kwng);
            $('#agamaa').val(obj.agama);
            $('#statusa').val(obj.status);
            $('#penda').val(obj.pend);
            $('#pkjna').val(obj.kerjaan);
            $('#almta').val(obj.alamat);
        });
    }
</script>
<script type="text/javascript">
    function isinik1(){
        var nik = $("#nik1").val();
        $.ajax({
            url: '../include/ambil_datawarga.php',
            data:"nik="+nik ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama1').val(obj.nama);
            $('#jk1').val(obj.jk);
            $('#tmp_lahir1').val(obj.tmp_lahir);
            $('#tgl_lahir1').val(obj.tgl_lahir);
            $('#kwng1').val(obj.kwng);
            $('#agama1').val(obj.agama);
            $('#status1').val(obj.status);
            $('#pend1').val(obj.pend);
            $('#pkjn1').val(obj.kerjaan);
            $('#almt1').val(obj.alamat);
        });
    }
</script>

<script type="text/javascript">
    function isiredaksi(){
        var nmsurat = $("#nmsurat").val();
        $.ajax({
            url: '../include/ambil_jenissurat.php',
            data:"nmsurat="+nmsurat ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kode_klasi').val(obj.kode_klasi);
        });
    }
</script>


<script type="text/javascript">
    function validasi_input(form){
      var mincar = 16;
      var minruf = 3;
      if (form.nmsurat.value=="") {
          alert('Jenis Surat harus dipilih!');
          form.nmsurat.focus();
          return false;
      }else if(form.nosurat.value=="") {
          alert('Nomor Surat harus di isi !');
          form.nosurat.focus();
          return false;

      }else if (form.nika.value.length < mincar){
        alert("Panjang NIK Almh./Almh. Minimal 16 Karater!");
        form.nika.focus();
        return (false);

    }else if (form.nik1.value.length < mincar){
        alert("Panjang NIK  Pelapor Minimal 16 Karater!");
        form.nik1.focus();
        return (false);

    }else if (form.shdk.value==""){
        alert('Hubungan dengan Alm./Almh. Wajib diisi');
        form.shdk.focus();
        return (false);
    }else if (form.sebab.value==""){
        alert('Sebab Kematian Wajib diisi');
        form.sebab.focus();
        return (false);

    }else if (form.hari.value==""){
        alert('Hari Kematian Wajib diisi');
        form.hari.focus();
        return (false);

    }else if (form.tanggal.value==""){
        alert('Tanggal Kematian Wajib diisi');
        form.tanggal.focus();
        return (false);

    }else if (form.waktu.value==""){
        alert('Waktu Kematian Wajib diisi');
        form.waktu.focus();
        return (false);

    }else if (form.tempat.value==""){
        alert('Tempat Kematian Wajib diisi');
        form.tempat.focus();
        return (false);


    }else if (form.nosurat.value.length < minruf){
        alert("Panjang Nomor Surat Minimal 3 Angka!");
        form.nosurat.focus();
        return (false);
    }
    return (true);
}
</script>
