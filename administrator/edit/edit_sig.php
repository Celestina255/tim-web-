<?php
//include '../sesi.php';
include '../koneksi.php';
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
     <section class="welcome p-t-1s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-5">EDIT SURAT IZIN GANGUAN (SIG)
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <?php
    $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
    $data=mysqli_query($con, "SELECT tb_detailsurat.*, tb_penduduk.* FROM tb_detailsurat, tb_penduduk  where tb_detailsurat.kode='$KodeEdit' AND tb_detailsurat.nik=tb_penduduk.nik ");
    $no=1;
    while($row =mysqli_fetch_array($data)){ 
        $dt=explode(';', $row['detail']);
        ?>
        <form action="update/u_sig.php"  method="post" onsubmit="return validasi_input(this)"  enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Jenis / Nama Surat</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nmsurat" name="nmsurat" value="<?php echo $row ['nmsurat']; ?>" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                    <div class="col-12 col-md-4"><input type="text" id="nosurat" name="nosurat" class="form-control" value="<?php echo $row ['no']; ?>" ></div>
                </div>
                <h6 class="label">DATA PEMILIK </h6>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nikpemohon" class=" form-control-label">NIK Pemilik</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nik" name="nikpemohon" onkeyup="isinik()" value="<?php echo $dt[0]; ?>" required class="form-control" maxlength="16"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="namapemohon" class=" form-control-label">Nama Pemilik</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nama" name="namapemohon" value="<?php echo $dt[1]; ?>" required class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="alamatpemohon" class=" form-control-label">Alamat Pemilik</label></div>
                    <div class="col-12 col-md-8"><input type="text" id="almt" name="alamatpemohon" value="<?php echo $dt[2]; ?>" required class="form-control"></div>
                </div>

                <hr>
                <h6 class="label">DATA USAHA </h6>
                <hr>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="namausaha" class=" form-control-label">Nama Usaha</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="namausaha" name="namausaha" value="<?php echo $dt[3]; ?>" required class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="almtusaha" class=" form-control-label">Alamat Usaha</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="almtusaha" name="almtusaha"  value="<?php echo $dt[4]; ?>" required class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh Rt. 001/Rw. 002 Kelurahan Wagom Kec. Way Sulan Kab. Fakfak Prov. Papua Barat</small></div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3"><label for="jmlttg" class=" form-control-label">Jumlah Tetangga yg memberikan izin</label></div>
                    <div class="col-12 col-md-2"><input type="number" id="jmlttg" name="jmlttg" value="<?php echo $dt[5]; ?>" required class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                    <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>

                </div>
            </div>
        </form>
    </div>
    <?php 
}
                                                //mysql_close($host);
?>


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

    <!-- jQuery 3 -->
    <script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

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

