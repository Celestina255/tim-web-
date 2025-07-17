<?php
include_once "../assets/inc.php";
?>
<body>
<div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="title-5">EDIT INSTRUMEN ASSESMENT
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
                $dt=explode('#', $row['detail']);
                $tglm = $dt['2'];
                $blm=format_hari_tanggal($tglm);
                $blnm=explode(',',$blm);
                $bulanm=$blnm['1'];
                ?>

                        <form action="update/u_assesment.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <br>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                    <div class="col-12 col-md-3"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row['kode'] ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="nmsurat" class=" form-control-label">Jenis / Nama Surat</label></div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="nmsurat" name="nmsurat" value="<?php echo $row['nmsurat'] ?>" readonly="readonly" class="form-control">
                                        </div>
                                    </div>

                                    <hr>
                                    <h6 class="label">IDENTITAS :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK </label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" value="<?php echo $dt['0']; ?>" class="form-control" maxlength="18" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" value="<?php echo $dt['1'] ?>" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tmp&Tgl. Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tmp_lahir" name="tmp_lahir" value="<?php echo $dt['2'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-12 col-md-3"><input type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dt['3'] ?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmpm" class=" form-control-label">Status Perkawinan</label></div>
                                        <div class="col-12 col-md-4">
                                            <select id="status" name="status" value="<?php echo $dt['4'] ?>" class="form-control" required>
                                                <option value="<?php echo $dt['4'] ?>" selected readonly><?php echo $dt['4'] ?></option>
                                                <option value="Kawin">Kawin</option>
                                                <option value="Duda/Janda">Duda/Janda</option>
                                                <option value="Belum kawin">Belum kawin</option>
                                            </select></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kerjaan" class=" form-control-label">Pekerjaan </label></div>
                                        <div class="col-12 col-md-8"><input type="text" id="kerjaan" name="kerjaan" value="<?php echo $dt['5'] ?>" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="penghasilan" class=" form-control-label">Penghasilan </label></div>
                                        <div class="col-12 col-md-3"><input type="number" id="penghasilan" name="penghasilan" value="<?php echo $dt['6'] ?>" required class="form-control"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat </label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" value="<?php echo $dt['7'] ?>" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keluarga" class=" form-control-label">Jumlah Anggota Keluarga </label></div>
                                        <div class="col-12 col-md-2"><input type="number" id="keluarga" name="keluarga" value="<?php echo $dt['8'] ?>" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="program" class=" form-control-label">Program yg dimiliki</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="program" name="program" value="<?php echo $dt['9'] ?>" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="dtks" class=" form-control-label">ID DTKS</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="dtks" name="dtks" value="<?php echo $dt['10'] ?>" required class="form-control"><small>DTKS (Data Terpadu Kesejahteraan Sosial)</small></div>
                                    </div>
                                    
                                <div class="panel-body">
                                    <hr>
                                    <h6 class="label">KELUARGA :</h6>
                                    <hr>       
                                  <div class="control-group after-add-more">
                                    <table class="">
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td width="15%">Hub. Keluarga</td>
                                        <td width="10%">Umur</td>
                                        <td width="25%">Pekerjaan</td>
                                        <td width="10%">Penghasilan</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $data=mysqli_query($con, "SELECT *  FROM  tb_dataassesment  WHERE kode_surat='$_GET[kode]' ");
                                    $no=1;
                                    while($row2 =mysqli_fetch_array($data)){ 
                                        ?> 
                                    <tr>
                                        <input type="hidden" name="kodesrt[]" value="<?php echo $row2['kode_surat'];?>" class="form-control">
                                            <td width="30%"><input type="text" name="nm[]" value="<?php echo $row2['nama'];?>" class="form-control"></td>
                                            <td width="15%"><select name="shdk[]" value="<?php echo $row2['shdk'];?>" class="form-control">
                                                            <option value="" selected readonly>shdk</option>
                                                            <option value="Suami">Suami</option>
                                                            <option value="Istri">Istri</option>
                                                            <option value="Anak">Anak</option>
                                                            <option value="Cucu">Cucu</option>
                                                            </select></td>
                                            <td width="10%"><input type="number" name="umur[]" value="<?php echo $row2['umur'];?>" class="form-control" placeholder="0"></td>
                                            <td width="30%"><input type="text" name="pekerjaan[]" value="<?php echo $row2['pekerjaan'];?>" class="form-control"></td>
                                            <td width="15%"><input type="number" name="gaji[]" value="<?php echo $row2['gaji'];?>" class="form-control" placeholder="0"></td>
                                            <td><button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                    </button></td>
                                    </tr>
                                    <?php } ?>
                                    </table>
                                  </div>
                                  <hr>
                                    <h6 class="label">PERMASALAHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="masalah" class=" form-control-label">Permasalahan</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="3" id="masalah" name="masalah" required class="form-control"><?php echo $dt['11'] ?></textarea>
                                            <small><strong>Perhatian !</strong> Pisahkan dengan tanda (;) jika permasalahan lebih dari 1 (satu)</small></div>
                                    </div>
                                    <hr>
                                    <h6 class="label">PERMOHONAN BANTUAN/KELUHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keluhan" class=" form-control-label">Permohonan Bantuan/Keluhan</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="3" id="keluhan" name="keluhan" placeholder="Jelaskan keluhan yang ada" required class="form-control"><?php echo $dt['12'] ?></textarea>
                                            <small><strong>Perhatian !</strong> Pisahkan dengan tanda (;) jika keluhan lebih dari 1 (satu)</small></div>
                                    </div> 
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="fasilitator" class=" form-control-label">Fasilitator</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="fasilitator" name="fasilitator" value="<?php echo $dt['13'] ?>" required class="form-control">
                                        </div>
                                    </div> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="puskesos" class=" form-control-label">Ketua Puskesos</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="puskesos" name="puskesos" value="<?php echo $dt['14'] ?>" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="supervisor" class=" form-control-label">Supervisor</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="supervisor" name="supervisor" value="<?php echo $dt['15'] ?>" required class="form-control">
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                                        <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>
                                        
                                    </div>
                                </form>  
                                <?php } ?>                      
                                <div class="copy invisible">
                                <div class="control-group">
                                <table class="">
                                    <?php
                                    $data=mysqli_query($con, "SELECT * FROM tb_detailsurat WHERE kode='$_GET[kode]' ");
                                    $no=1;
                                    while($row3 =mysqli_fetch_array($data)){ 
                                        ?>
                                        <tr>
                                        <input type="hidden" name="kodesrt[]" value="<?php echo $row3['kode'];?>" class="form-control" >
                                            <td width="30%"><input type="text" name="nm[]" class="form-control"></td>
                                            <td width="15%"><select name="shdk[]" class="form-control">
                                                            <option value="" selected readonly>shdk</option>
                                                            <option value="Suami">Suami</option>
                                                            <option value="Istri">Istri</option>
                                                            <option value="Anak">Anak</option>
                                                            <option value="Cucu">Cucu</option>
                                                            </select></td>
                                            <td width="10%"><input type="number" name="umur[]" class="form-control" placeholder="0"></td>
                                            <td width="30%"><input type="text" name="pekerjaan[]" class="form-control"></td>
                                            <td width="15%"><input type="number" name="gaji[]" class="form-control" placeholder="0"></td>
                                        <td><button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        <?php } ?>
                                </table>
                                </div>
                              </div>
                        </div>
                </div>

        </div><!-- .content -->

    <!-- jQuery 3 -->

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



<script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>

</html>
