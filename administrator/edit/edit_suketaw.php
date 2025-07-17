<?php
//include '../sesi.php';
include '../koneksi.php';
include "../assets/inc.php";
?>
<!doctype html>
    <html class="no-js" lang="en">
    <body>
        <div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="title-5">EDIT SURAT KETERANGAN AHLI WARIS
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
                $tglm = $dt['2'];
                $blm=format_hari_tanggal($tglm);
                $blnm=explode(',',$blm);
                $bulanm=$blnm['1'];
                ?>
                <form action="update/u_suketaw.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">

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
                            <div class="col-12 col-md-4"><input type="text" id="nosurat" name="nosurat"  class="form-control" value="<?php echo $row ['no']; ?>" ></div>
                        </div>
                        <hr>
                        <h6 class="label">DATA ALM/ALMH. :</h6>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK</label></div>
                            <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  value="<?php echo $row['nik'];?>" ></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" value="<?php echo $row['nama'];?>" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tglm" class=" form-control-label">Tanggal Meninggal</label></div>
                            <div class="col-12 col-md-3"><input type="date" id="tglm" name="tglm" value="<?php echo $dt[2];?>" required class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="tmpm" class=" form-control-label">Tempat Meninggal</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="tmpm" name="tmpm" value="<?php echo $dt[3];?>" required class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="almtakhir" class=" form-control-label">Alamat Terakhir </label></div>
                            <div class="col-12 col-md-8"><input type="text" id="almtakhir" name="almtakhir" value="<?php echo $dt[4];?>" required class="form-control"></div>
                        </div>
                        <hr>
                        <h6 class="label">DATA SUAMI ATAU ISTRI ALM/ALMH. :</h6>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="namasi" class=" form-control-label">Nama Suami/Istri</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="namasi" name="namasi" value="<?php echo $dt[5];?>" required class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="jmlanak" class=" form-control-label">Jumlah Anak</label></div>
                            <div class="col-12 col-md-2"><input type="number" id="jmlanak" name="jmlanak" value="<?php echo $dt[6];?>" required class="form-control"></div>
                        </div>

                        <hr>

                        <div class="panel-body">
                            <hr>
                            <h6 class="label">AHLI WARIS :</h6>
                            <hr>       
                            <div class="control-group after-add-more">
                                <table class="">
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="7%">L/P</td>
                                        <td width="25%">Tmp&tgl. Lahir</td>
                                        <td width="25%">Alamat</td>
                                        <td width="13%">Agama</td>
                                        <td width="10%">SHDK</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $data=mysqli_query($con, "SELECT *  FROM  tb_ahliwaris  WHERE kodeaw='$_GET[kode]' ");
                                    $no=1;
                                    while($row2 =mysqli_fetch_array($data)){ 
                                        ?> 
                                        <tr>
                                            <input type="hidden" name="kodesurataw[]" value="<?php echo $row2['kodeaw'];?>" class="form-control">
                                            <td width="20%"><input type="text" name="nm[]" value="<?php echo $row2['nm'];?>" class="form-control"></td>
                                            <td width="7%"><select name="lp[]" class="form-control">
                                                <option value="<?php echo $row2['lp'];?>" selected><?php echo $row2['lp'];?></option>
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select></td>
                                            <td width="25%"><input type="text" name="ttl[]" value="<?php echo $row2['ttl'];?>" class="form-control"></td>
                                            <td width="25%"><input type="text" name="alamat[]" value="<?php echo $row2['alamat'];?>" class="form-control"></td>
                                            <td width="13%"><select name="agama[]" class="form-control">
                                                <option value="<?php echo $row2['agama'];?>" selected><?php echo $row2['agama'];?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select></td>
                                            <td width="10%"><select name="shdk[]" class="form-control">
                                                <option value="<?php echo $row2['shdk'];?>" selected><?php echo $row2['shdk'];?></option>
                                                <option value="Suami">Suami</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Cucu">Cucu</option>
                                            </select>
                                        </td>
                                        <td><button data-toggle="tooltip" data-placement="left" title="Tambah data satu per satu lalu klik Update, dst." class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                        </button></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        
                        <div class="copy invisible">
                            <div class="control-group">
                                <table class="">
                                        <tr>
                                            <input type="hidden" name="kodesurataw[]" value="<?php echo $row['kode'];?>" class="form-control">
                                            <td width="20%"><input type="text" name="nm[]" class="form-control"></td>
                                            <td width="7%"><select name="lp[]" class="form-control">
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select></td>
                                            <td width="25%"><input type="text" name="ttl[]" class="form-control"></td>
                                            <td width="25%"><input type="text" name="alamat[]" class="form-control"></td>
                                            <td width="13%"><select name="agama[]" class="form-control">
                                                <option value="" selected readonly>Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select></td>
                                            <td width="10%"><select name="shdk[]" class="form-control">
                                                <option value="" selected readonly>shdk</option>
                                                <option value="Suami">Suami</option>
                                                <option value="Istri">Istri</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Cucu">Cucu</option>
                                            </select></td>
                                            <td><button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                            <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>
                            
                        </div>
                    </form>   
                </div>
                <?php 
            }
                                                //mysql_close($host);
            ?>
        </div>



        <script type="text/javascript">
            $(document).ready(function() {
              $('#bootstrap-data-table-export').DataTable();
          } );
      </script>


      <script>
        $(document).ready(function(){
          $("#tooltip").click(function(){
            $('#tooltip').tooltip("toggle");
        });
      });
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
            $('#rdawal').val(obj.rdawal);
            $('#rdtengah').val(obj.rdtengah);
            $('#rdakhir').val(obj.rdakhir);
        });
    }
</script>

<script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

<script type="text/javascript">
    var xyz = $.noConflict();
    xyz(document).ready(function() {
      xyz(".add-more").click(function(){ 
          var html = xyz(".copy").html();
          xyz(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      xyz("body").on("click",".remove",function(){ 
          xyz(this).parents(".control-group").remove();
      });
  });
</script>
</body>

</html>
