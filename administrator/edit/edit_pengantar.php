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
                        <div class="col-md-12">
                            <h1 class="title-5">EDIT SURAT PENGANTAR
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <?php
            $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
            $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  where tb_detailsurat.kode='$KodeEdit'");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
            $dt=explode(';', $row['detail']);
            ?>    
                    <form action="update/u_pengantar.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">

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
                                        <div class="col-12 col-md-4"><input type="text" id="nosurat" name="nosurat" class="form-control" value="<?php echo $row ['no']; ?>" ><small class="form-text text-muted">Contoh : 001</small></div>
                                </div>
                                <hr>
                                    <h6 class="label">DETAIL PENGANTAR :</h6>
                                    <hr> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="objek" class=" form-control-label">Perihal</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="objek" name="objek"value="<?php echo $dt[0]; ?>"  class="form-control"><small class="form-text text-muted">Contoh : Laporan Penduduk Bulan Mei 2023</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="banyak" class=" form-control-label">Lampiran</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="banyak" name="banyak" value="<?php echo $dt[1]; ?>"   class="form-control"><small class="form-text text-muted">Contoh : 1 Bundel</small></div>
                                    </div>
                                    <hr>
                                    <h6 class="label">DASAR / LANDASAN :</h6>
                                    <hr> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="dasar" class=" form-control-label">Dasar Surat</label></div>
                                        <div class="col-12 col-md-9"><textarea id="dasar" rows="3" name="dasar"   class="form-control"><?php echo $dt[2]; ?></textarea> <small class="form-text text-muted">Contoh : Surat Camat Way Sulan Nomor : 123, Tanggal 12 Mei 2023, Perihal Laporan Penduduk Bulan Mei 2023</small></div>
                                    </div>
                                    <hr>
                                    <h6 class="label">NAMA / LEMBAGA YANG DITUJU :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="lbg" class=" form-control-label">Nama / Lembaga yang dituju</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="lbg" name="lbg" value="<?php echo $dt[3]; ?>"   class="form-control"><small class="form-text text-muted">Contoh : Camat Way Sulan</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat yang dituju</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt" name="almt"  value="<?php echo $dt[4]; ?>"  class="form-control"></div>
                                    </div>
<hr>
                                    <div class="row form-group">
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
        $(document).ready(function(){
            $('#buatSurat').click(function(){
                $('#modalSurat , #bg').fadeIn("slow");
            });
            $('#tombol-tutup').click(function(){
                $('#modalSurat , #bg').fadeOut("slow");
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#editSurat').click(function(){
                $('#modalEditSurat , #bg').fadeIn("slow");
            });
            $('#tombol-tutup').click(function(){
                $('#modalEditSurat , #bg').fadeOut("slow");
            });
        });
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
