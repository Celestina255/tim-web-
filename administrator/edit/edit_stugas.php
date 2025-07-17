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
                            <h1 class="title-5">EDIT SURAT TUGAS
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <br>
             <?php
            $data=mysqli_query($con, "SELECT tb_detailsurat.*, tb_datastugas.*  FROM tb_detailsurat, tb_datastugas  WHERE tb_detailsurat.kode=tb_datastugas.kodetgs AND tb_detailsurat.kode='$_GET[kode]' ");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
                $dt=explode('|', $row['detail']);
            ?>  
                    <form action="update/u_stugas.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                    <h6 class="label">PEJABAT BERWENANG YG MEMBERI TUGAS :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Pejabat / Kepala Kelurahan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" value="<?php echo $dt[0]; ?>"  readonly="readonly" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nip" class=" form-control-label">NIP</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nip" name="nip" value="<?php echo $dt[1]; ?>" readonly="readonly" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="pang" class=" form-control-label">Pangkat</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="pang" name="pang" value="<?php echo $dt[2]; ?>" class="form-control"><small class="form-text text-muted">Opsional *)</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jabatan" class=" form-control-label">Jabatan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="jabatan" name="jabatan" value="<?php echo $dt[3]; ?>" readonly="readonly" class="form-control"></div>
                                    </div>
                                    <hr>
                                    
                                    <hr>
                                    <h6 class="label">KETERANGAN TUGAS:</h6>
                                    <hr>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tugas" class=" form-control-label">Uraian Tugas</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tugas" name="tugas" value="<?php echo $dt[4]; ?>"  class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="menimbang" class=" form-control-label">Menimbang</label></div>
                                        <div class="col-12 col-md-9"><textarea id="menimbang" name="menimbang"  rows="5" class="form-control"><?php echo $dt[5]; ?></textarea> <small class="form-text text-muted">Maksimal : 5 (Lima) Poin, pisahkan dengan tanda (;) jika lebih dari 1</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="dasar" class=" form-control-label">Dasar Hukum</label></div>
                                        <div class="col-12 col-md-9"><textarea id="dasar" name="dasar" rows="5" class="form-control"><?php echo $dt[6]; ?></textarea><small class="form-text text-muted">Maksimal : 5 (Lima) Poin, pisahkan dengan tanda (;) jika lebih dari 1</small></div>
                                    </div>
                                    
                                     <hr>
                                    <h6 class="label">SURAT KEPUTUSAN (SK) TUGAS:</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosk" class=" form-control-label">Nomor SK</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nosk" name="nosk" value='<?php echo $dt[7]; ?>'  class="form-control"><small class="form-text text-muted">Misalnya : 140/12/VII/2023</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tentang" class=" form-control-label">Tentang</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tentang" name="tentang" value='<?php echo $dt[8]; ?>'  class="form-control"><small class="form-text text-muted">Misalnya : Tim Pelaksana Kegiatan Sosialisasi Bahaya Narkoba</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="salinan" class=" form-control-label">Salinan</label></div>
                                        <div class="col-12 col-md-9"><textarea id="salinan" name="salinan" rows="3" class="form-control"><?php echo $dt[9]; ?></textarea> <small class="form-text text-muted">Maksimal : 3 (Tiga) Poin, Misalnya : 1. Bpk. Bupati Lampung Selatan, pisahkan dengan tanda (;) jika lebih dari 1</small></div>
                                    </div>
                                    <?php /*
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="diktum" class=" form-control-label">Diktum</label></div>
                                        <div class="col-12 col-md-9"><textarea id="diktum" name="diktum" placeholder="Uraikan isi diktum, pisahkan dengan tanda (;) jika lebih dari 1" rows="5" class="form-control"></textarea> <small class="form-text text-muted">Maksimal : 5 (Lima) Poin, Misalnya : Menunjuk nama - nama yang tercantum pada lampiran keputusan ini sebagai Tim Pelaksana Kegiatan Sosialisasi Bahaya Narkoba</small></div>
                                    </div>
                                    */ ?>

                                <div class="panel-body">
                                    <hr>
                                    <h6 class="label">YANG DIBERI TUGAS :</h6>
                                    <hr>       
                                  <div class="control-group after-add-more">
                                    <table class="">

                                    <tr>
                                        <td width="43%">Nama/NIP</td>
                                        <td width="30%">Satker</td>
                                        <td width="20%">Jab/Gol</td>
                                        <td width="7%">Tgl.</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $data=mysqli_query($con, "SELECT *  FROM  tb_datastugas  WHERE kodetgs='$_GET[kode]' ");
                                    $no=1;
                                    while($row2 =mysqli_fetch_array($data)){ 
                                    ?> 
                                    <tr>
                                        <input type="hidden" name="kodesurattugas[]" value="<?php echo $row2['kodetgs']; ?>" class="form-control">
                                            <td><input type="text" name="nm[]" value="<?php echo $row2['nm']; ?>" class="form-control"></td>
                                            <td><input type="text" name="satker[]" value="<?php echo $row2['satker']; ?>" class="form-control"></td>
                                            <td><input type="text" name="jab[]" value="<?php echo $row2['jab']; ?>" class="form-control"></td>
                                            <td><input type="date" name="tgl[]" value="<?php echo $row2['tgl']; ?>" class="form-control"></td>
                                            <td><button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                    </button></td>
                                    </tr>
<?php } ?>
                                    </table>
                                  </div>
                                <div class="copy">
                                <div class="control-group">
                                <table class="">
                                    <?php
                                    $data=mysqli_query($con, "SELECT * FROM tb_detailsurat WHERE kode='$_GET[kode]' ");
                                    $no=1;
                                    while($row3 =mysqli_fetch_array($data)){ 
                                    ?> 
                                        <tr>
                                        <input type="hidden" name="kodesurattugas[]" value="<?php echo $row3['kode'] ;?>" class="form-control" >
                                        <td width="43%"><input type="text" name="nm[]" class="form-control"></td>
                                        <td width="30%"><input type="text" name="satker[]" class="form-control"></td>
                                        <td width="20%"><input type="text" name="jab[]" class="form-control"></td>
                                        <td width="7%"><input type="date" name="tgl[]" class="form-control"></td>
                                        <td><button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button></td>
                                        </tr><?php } ?>
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
                                <?php } ?>
                        </div>
                    </div>
                </div>


        </div><!-- .content -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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

 <script src="assets/js/jquery.min.js"></script>


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
