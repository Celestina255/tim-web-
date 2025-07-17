<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
     <section class="welcome p-t-1s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-5">EDIT SURAT PENGANTAR SKCK
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <div class="card-body card-block">
      <?php
      $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
      $data=mysqli_query($con, "SELECT tb_detailsurat.*, tb_penduduk.* FROM tb_detailsurat, tb_penduduk  where tb_detailsurat.kode='$KodeEdit' AND tb_detailsurat.nik=tb_penduduk.nik ");
      $no=1;
      while($row =mysqli_fetch_array($data)){ 
        $dt=explode(';', $row['detail']);
        ?> 
        <form action="update/u_skck.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                <div class="col-12 col-md-4"><input type="text" id="nosurat" name="nosurat"  class="form-control" value="<?php echo $row ['no']; ?>" ></div>
            </div>
            <hr>

            <h6 class="label">DATA PEMOHON :</h6>
            <hr>
            <div class="row form-group">
                <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  value="<?php echo $dt[0];?>"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" value="<?php echo $dt[1];?>" required class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                <div class="col-12 col-md-4">
                    <select name="jk" id="jk" required class="form-control">
                        <option value="<?php echo $dt[2];?>" selected="selected"><?php echo $dt[2];?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tempat Lahir</label></div>
                <div class="col-12 col-md-6"><input type="text" id="tmp_lahir" name="tmp_lahir" value="<?php echo $dt[3];?>" required class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                <div class="col-12 col-md-4"><input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dt[4];?>" required class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="pekerjaan" class=" form-control-label">Pekerjaan</label></div>
                <div class="col-12 col-md-6"><input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo $dt[5];?>" required class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat/Rt./Rw.</label></div>
                <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" value="<?php echo $dt[6];?>" class="form-control"><small class="form-text text-muted">Contoh : Kp. Durian Runtuh, RT./RW. 001/002</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="untuk" class=" form-control-label">Peruntukan SKCK</label></div>
                <div class="col-12 col-md-9"><input type="text" id="untuk" name="untuk" value="<?php echo $dt[7];?>" class="form-control" required><small class="form-text text-muted">Contoh : Melamar Pekerjaan</small></div>
            </div>
            <hr>
            <h6 class="label">DATA LEMBAGA BERWENANG :</h6>
            <hr>
            <div class="row form-group">
                <div class="col col-md-3"><label for="kepada" class=" form-control-label">Ditujukan Kepada</label></div>
                <div class="col-12 col-md-6"><input type="text" id="kepada" name="kepada" value="<?php echo $dt[8];?>" class="form-control"><small>Misalanya : Ka. POLRES Fakfak / Ka. POLSEK Pariwari</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="di" class=" form-control-label">Alamat Tujuan /Di</label></div>
                <div class="col-12 col-md-6"><input type="text" id="di" name="di" value="<?php echo $dt[9];?>" class="form-control"><small>Misalanya : TEMPAT / Fakfak / Pariwai</small></div>
            </div>
            <div class="modal-footer">
                
                <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>
            </div>
        </div>
    </form>
</div>
<!-- END MODAL SUKET UMUM -->
<?php } ?>


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

