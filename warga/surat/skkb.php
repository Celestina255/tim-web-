<?php
include_once "../assets/inc.php";
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h3 class="title-5">SURAT KETERANGAN KELAKUAN BAIK
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

        <form action="act/s_skkb.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                        $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS037' ORDER BY id ASC ");
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
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  placeholder=" NIK Pemohon" ></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" placeholder="Nama Pemohon" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                    <div class="col-12 col-md-4">
                        <select name="jk" id="jk" readonly="readonly" class="form-control">
                            <option value="-" selected="selected">Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tempat Lahir</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir Pemohon" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir Pemohon" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="agama" class=" form-control-label">Agama</label></div>
                    <div class="col-12 col-md-4">
                        <select name="agama" id="agama" readonly="readonly" class="form-control">
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
                    <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" placeholder="xxx/xxx" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="untuk" class=" form-control-label">Peruntukan Surat</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="untuk" name="untuk" placeholder="Peruntukan surat" class="form-control" required><small class="form-text text-muted">Contoh : Mengurus/Membuat SKCK</small></div>
                </div>
                <div class="modal-footer">
                    <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                    <div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                </div>
            </div>
        </form>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Surat Keterangan Kelakuan Baik</strong>
                        </div>

                        <div class="card-body scroll">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Surat</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Keperluan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $userid=$_SESSION['userid'];
                                $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat, tb_buatsendiri WHERE tb_detailsurat.kode=tb_buatsendiri.kode_surat AND tb_detailsurat.kodejenis='JS037' AND tb_buatsendiri.status='acc' AND tb_buatsendiri.userid='$userid' ORDER BY tb_detailsurat.id DESC ");
                                    $no=1;
                                    while ($data = mysqli_fetch_assoc($query)){
                                        $dt=explode(';',$data['detail']);
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['no'];?></td>
                                            <td><?php echo $data['tanggal'];?></td>
                                            <td><?php echo $dt[1];?></td>
                                            <td><?php echo $dt[6];?></td>
                                            <td><?php echo $dt[7];?></td>
                                            <td>
                                                <a href="../cetak/c_skkb.php?kode=<?php echo $data['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a>
                                                <a href="?page=edit_skkb&amp;kode=<?php echo "$data[kode]"; ?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_skkb.php?kode=<?php echo $data['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        
                                    <?php }?>    

                                </tbody>
                            </table>
                        </div>      
                    </div>
                </div>
            </div>

        </div><!-- .animated -->
        </div>
    </div><!-- .content -->
    <br>
    <br>
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
    function isinik(){
        var nik = $("#nik").val();
        $.ajax({
            url: '../include/ambil_datawarga.php',
            data:"nik="+nik ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#jk').val(obj.jk);
            $('#tmp_lahir').val(obj.tmp_lahir);
            $('#tgl_lahir').val(obj.tgl_lahir);
            $('#agama').val(obj.agama);
            $('#status').val(obj.status);
            $('#pend').val(obj.pend);
            $('#kerjaan').val(obj.kerjaan);
            $('#almt').val(obj.alamat);
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
      }else if (form.nik.value.length < mincar){
        alert("Panjang NIK Minimal 16 Karater!");
        form.nik.focus();
        return (false);
    }else if (form.nosurat.value.length < minruf){
        alert("Panjang Nomor Surat Minimal 3 Angka!");
        form.nosurat.focus();
        return (false);
    }
    return (true);
}
</script>
