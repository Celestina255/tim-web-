<?php
include_once "../assets/inc.php";
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h3 class="title-5">SURAT KETERANGAN AHLI WARIS
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

                        <form action="act/s_suketaw.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <br>
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
                                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS023' ORDER BY id ASC ");
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
                                    <h6 class="label">DATA ALM/ALMH. :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK </label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  placeholder="NIK Alm/Almh." required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" placeholder="Nama Alm/Almh." required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tglm" class=" form-control-label">Tanggal Meninggal</label></div>
                                        <div class="col-12 col-md-3"><input type="date" id="tglm" name="tglm"  required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmpm" class=" form-control-label">Tempat Meninggal</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="tmpm" name="tmpm" placeholder="Tempat meninggal" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almtakhir" class=" form-control-label">Alamat Terakhir </label></div>
                                        <div class="col-12 col-md-8"><input type="text" id="almtakhir" name="almtakhir" placeholder="Alamat Terakhir Alm/Almh." required class="form-control"></div>
                                    </div>
                                    <hr>
                                    <h6 class="label">DATA SUAMI ATAU ISTRI ALM/ALMH. :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="namasi" class=" form-control-label">Nama Suami/Istri</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="namasi" name="namasi" placeholder="Nama Suami atau Istri Alm/Almh." required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="jmlanak" class=" form-control-label">Jumlah Anak</label></div>
                                        <div class="col-12 col-md-2"><input type="number" id="jmlanak" name="jmlanak" placeholder="0" required class="form-control"></div>
                                    </div>
                                    <hr>
                                      <h6 class="label">AHLI WARIS :</h6>
                                <div class="panel-body">
     
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
                                    <tr>
                                        <input type="hidden" name="kodesurataw[]" value="<?php echo $kodesurat ?>" class="form-control">
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
                                                            </select>
                                            </td>
                                            <td><button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                    </button></td>
                                    </tr>

                                    </table>
                                  </div>
                                  <br>
                                <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                                        <div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                                        
                                    </div>
                                </form>                        
                                <div class="copy invisible">
                                <div class="control-group">
                                <table class="">
                                        <tr>
                                        <input type="hidden" name="kodesurataw[]" value="<?php echo $kodesurat ?>" class="form-control" >
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
                          </div>
                      </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Surat Keterangan Ahli Waris</strong>
                            </div>

                            <div class="card-body scroll">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Surat</th>
                                            <th>Tanggal</th>
                                            <th>Nama </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                        <?php 
                            $userid=$_SESSION['userid'];
                                $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat, tb_buatsendiri WHERE tb_detailsurat.kode=tb_buatsendiri.kode_surat AND tb_detailsurat.kodejenis='JS023' AND tb_buatsendiri.status='acc' AND tb_buatsendiri.userid='$userid' ORDER BY tb_detailsurat.id DESC ");
                            $no=1;
                            while ($r = mysqli_fetch_array($query)){
                                $dt=explode(';', $r['detail']);

                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $r['no'];?></td>
                                            <td><?php echo $r['tanggal'];?></td>
                                            <td><?php echo $r['nama'];?></td>
                                            <td><a href="?page=c_ahliwaris&amp;kode=<?php echo $r['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a><a href="?page=edit_suketaw&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_suketaw.php?kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
                                            </td>
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
<br><br>

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
