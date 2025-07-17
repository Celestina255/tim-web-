<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
       <section class="welcome p-t-1s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-5">SURAT TUGAS
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <div class="card-body card-block">
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

       <form action="act/s_stugas.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS039' ORDER BY id ASC ");
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
                    <div class="col-12 col-md-3"><input type="text" id="nosurat" name="nosurat" maxlength="3" class="form-control" value="<?php echo $nourut ?>"></div>
                </div>

                <hr>
                <h6 class="label">PEJABAT BERWENANG YG MEMBERI TUGAS :</h6>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Pejabat / Kepala Kelurahan</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" value="<?php echo $rdes['lurah']; ?>"  readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nip" class=" form-control-label">NIP</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nip" name="nip" value="<?php echo $rdes['niplurah']; ?>" readonly="readonly" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="pang" class=" form-control-label">Pangkat</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="pang" name="pang" placeholder="Pangkat" class="form-control"><small class="form-text text-muted">Opsional *)</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="jabatan" class=" form-control-label">Jabatan</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="jabatan" name="jabatan" Value="Kepala Kelurahan <?php echo $rdes['kelurahan']; ?>" readonly="readonly" class="form-control"></div>
                </div>
                <?php }} ?>                                                                  <hr>
                
                <hr>
                <h6 class="label">KETERANGAN TUGAS:</h6>
                <hr>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="tugas" class=" form-control-label">Uraian Tugas</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="tugas" name="tugas" placeholder="Uraikan Tugas yang diberikan"  class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="menimbang" class=" form-control-label">Menimbang</label></div>
                    <div class="col-12 col-md-9"><textarea id="menimbang" name="menimbang" placeholder="Uraikan isi menimbang, pisahkan dengan tanda (;) jika lebih dari 1" rows="5" class="form-control"></textarea> <small class="form-text text-muted">Maksimal : 5 (Lima) Poin</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="dasar" class=" form-control-label">Dasar Hukum</label></div>
                    <div class="col-12 col-md-9"><textarea id="dasar" name="dasar" placeholder="Uraikan Dasar Hukum, pisahkan dengan tanda (;) jika lebih dari 1 " rows="5" class="form-control"></textarea><small class="form-text text-muted">Maksimal : 5 (Lima) Poin</small></div>
                </div>
                
                <hr>
                <h6 class="label">SURAT KEPUTUSAN (SK) TUGAS:</h6>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nosk" class=" form-control-label">Nomor SK</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="nosk" name="nosk" placeholder="Nomor Surat Keputusan"  class="form-control"><small class="form-text text-muted">Misalnya : 140/12/VII/2023</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="tentang" class=" form-control-label">Tentang</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="tentang" name="tentang" placeholder="Uraikan isi tentang"  class="form-control"><small class="form-text text-muted">Misalnya : Tim Pelaksana Kegiatan Sosialisasi Bahaya Narkoba</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="salinan" class=" form-control-label">Salinan</label></div>
                    <div class="col-12 col-md-9"><textarea id="salinan" name="salinan" placeholder="Uraikan isi salinan, pisahkan dengan tanda (;) jika lebih dari 1" rows="3" class="form-control"></textarea> <small class="form-text text-muted">Maksimal : 3 (Tiga) Poin, Misalnya : 1. Bpk. Bupati Lampung Selatan</small></div>
                </div>


                <div class="panel-body">
                    <hr>
                    <h6 class="label">YANG DIBERI TUGAS :</h6>
                    <hr>       
                    <div class="control-group after-add-more">
                        <table class="">
                            <tr>
                                <td width="40%">Nama/NIP</td>
                                <td width="30%">Satker</td>
                                <td width="20%">Jab/Gol</td>
                                <td width="10%">Tgl.</td>
                                <td></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="kodesurattugas[]" value="<?php echo $kodesurat ?>" class="form-control">
                                <td><input type="text" name="nm[]" class="form-control"></td>
                                <td><input type="text" name="satker[]" class="form-control"></td>
                                <td><input type="text" name="jab[]" class="form-control"></td>
                                <td><input type="date" name="tgl[]" class="form-control"></td>
                                <td><button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                </button></td>
                            </tr>

                        </table>
                    </div>
                    <div class="copy invisible">
                        <div class="control-group">
                            <table class="">
                                <tr>
                                    <input type="hidden" name="kodesurattugas[]" value="<?php echo $kodesurat ?>" class="form-control" >
                                    <td width="40%"><input type="text" name="nm[]" class="form-control"></td>
                                    <td width="30%"><input type="text" name="satker[]" class="form-control"></td>
                                    <td width="20%"><input type="text" name="jab[]" class="form-control"></td>
                                    <td width="10%"><input type="date" name="tgl[]" class="form-control"></td>
                                    <td><button class="btn btn-danger remove" type="button"><i class="fa fa-trash"></i></button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row form-group">
                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                        <div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                        
                    </div>
                </form>                        

            </div>
        </div>
    </div>



    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Surat</strong>
                        </div>

                        <div class="card-body scroll">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Surat</th>
                                        <th>Tanggal</th>
                                        <th>Tugas </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat WHERE kodejenis='JS039' ORDER BY id DESC ");
                                    $no=1;
                                    while ($r = mysqli_fetch_array($query)){
                                        $dt=explode('|', $r['detail'])
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $r['no'];?></td>
                                            <td><?php echo $r['tanggal'];?></td>
                                            <td><?php echo $dt[4];?></td>
                                            <td><a href="?page=c_surattugas&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-print"></i></a>
                                                <a href="?page=edit_stugas&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_stugas.php?kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-trash"></i></a></td>
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
