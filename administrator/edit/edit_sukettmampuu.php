<?php
//include '../sesi.php';
include '../koneksi.php';
"../assets/inc.php";
?>
    <body>
        <div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="title-5">EDIT SURAT KETERANGAN TIDAK MAMPU (KELUARGA)
                            </h1>
                        </div>
                            <hr class="line-seprate">
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
                    <form action="update/u_sukettmampuu.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">

                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Jenis / Nama Surat</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nmsurat" name="nmsurat" value="<?php echo $row ['nmsurat']; ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nosurat" name="nosurat" class="form-control" value="<?php echo $row ['no']; ?>" ></div>
                                </div>
                                <h6>DATA SUAMI :</h6>
                                <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  value="<?php echo $dt[0];?>" ></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="<?php echo $dt[1];?>"class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tmp_lahir" name="tmp_lahir" value="<?php echo $dt[2];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dt[3];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="agama" class=" form-control-label">Agama</label></div>
                                        <div class="col-12 col-md-4">
                                            <select name="agama" id="agama"  class="form-control">
                                                <option value="<?php echo $dt[4];?>" ><?php echo $dt[4];?></option>
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
                                        <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="alamat" name="alamat"  value="<?php echo $dt[5];?>"class="form-control"><small class="form-text text-muted">Contoh : Rt. 001/Rw. 002</small></div>
                                    </div>

                                    <!-- ISTRI -->
                                    <h6>DATA ISTRI :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="niki" class=" form-control-label">NIK</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="niki" name="niki" onkeyup="isiniki()" class="form-control" maxlength="16"  value="<?php echo $dt[6];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="namai" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="namai" name="namai" value="<?php echo $dt[7];?>"class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahiri" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tmp_lahiri" name="tmp_lahiri" value="<?php echo $dt[8];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tgl_lahiri" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tgl_lahiri" name="tgl_lahiri" value="<?php echo $dt[9];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="agamai" class=" form-control-label">Agama</label></div>
                                        <div class="col-12 col-md-4">
                                            <select name="agamai" id="agamai" class="form-control">
                                                <option value="<?php echo $dt[10];?>" ><?php echo $dt[10];?></option>
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
                                        <div class="col col-md-3"><label for="alamati" class=" form-control-label">Alamat</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="alamati" name="alamati"  value="<?php echo $dt[11];?>" class="form-control"><small class="form-text text-muted">Contoh : Rt. 001/Rw. 002</small></div>
                                    </div>
 
                                    
<hr>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div><div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>
                                    </div>
                            </div>

     
                        </form>
                     <?php 
                        }
                                                //mysql_close($host);
                        ?>



<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->




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
                    $('#rt').val(obj.rt);
                    $('#dusun').val(obj.dusun);
                });
            }
        </script>
                <script type="text/javascript">
            function isiniki(){
                var nik = $("#niki").val();
                $.ajax({
                    url: '../include/ambil_datawarga.php',
                    data:"niki="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#namai').val(obj.nama);
                    $('#jki').val(obj.jk);
                    $('#tmp_lahiri').val(obj.tmp_lahir);
                    $('#tgl_lahiri').val(obj.tgl_lahir);
                    $('#agamai').val(obj.agama);
                    $('#statusi').val(obj.status);
                    $('#pendi').val(obj.pend);
                    $('#kerjaani').val(obj.kerjaan);
                    $('#rti').val(obj.rt);
                    $('#dusuni').val(obj.dusun);
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
                    $('#rdawal').val(obj.rdawal);
                    $('#rdtengah').val(obj.rdtengah);
                    $('#rdakhir').val(obj.rdakhir);
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


</body>

</html>
