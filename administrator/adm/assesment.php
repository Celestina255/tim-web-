<?php
include_once "../assets/inc.php";
?>
<body>
<div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <h1 class="title-5">INSTRUMEN ASSESMENT
                            </h1>
                        </div>
                            <hr class="line-seprate">
                    </div>
                </div>
            </section>
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

                        <form action="act/s_assesment.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS046' ORDER BY id ASC ");
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
                                        <div class="col col-md-3"></div>
                                        <?php $idstf=$_SESSION['userid']; ?>
                                        <input type="hidden" id="idstf" name="idstf" value="<?php echo $idstf; ?>">
                                        <input type="hidden" id="kode_klasi" name="kode_klasi">
                                        <input type="hidden" id="blnr" name="blnr" value="<?php echo getRomawi(date('m'));?>" >
                                        <input type="hidden" id="lurah" name="lurah" value="<?php echo $rdes['lurah']; ?>" >
                                        <input type="hidden" id="kodejenis" name="kodejenis" value="<?php echo $r['kode']; ?>" >
                                        <div class="col-12 col-md-3"><input type="hidden" id="nosurat" name="nosurat" maxlength="3" class="form-control" value="<?php echo $nourut ?>"></div>
                                    </div>
                                <?php }}?>
                                    <hr>
                                    <h6 class="label">IDENTITAS :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK </label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="nik" name="nik" onkeyup="isinik()" class="form-control" maxlength="16"  placeholder="NIK" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" placeholder="Nama lengkap" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmp_lahir" class=" form-control-label">Tmp&Tgl. Lahir</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="tmp_lahir" name="tmp_lahir"  required class="form-control" placeholder="Tempat lahir">
                                        </div>
                                        <div class="col-12 col-md-3"><input type="text" id="tgl_lahir" name="tgl_lahir" required class="form-control" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tmpm" class=" form-control-label">Status Perkawinan</label></div>
                                        <div class="col-12 col-md-4">
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="" selected readonly>--Pilih status--</option>
                                                <option value="Kawin">Kawin</option>
                                                <option value="Duda/Janda">Duda/Janda</option>
                                                <option value="Belum kawin">Belum kawin</option>
                                            </select></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kerjaan" class=" form-control-label">Pekerjaan </label></div>
                                        <div class="col-12 col-md-8"><input type="text" id="kerjaan" name="kerjaan" placeholder="Pekerjaan" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="penghasilan" class=" form-control-label">Penghasilan </label></div>
                                        <div class="col-12 col-md-3"><input type="number" id="penghasilan" name="penghasilan" placeholder="0" required class="form-control"></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt" class=" form-control-label">Alamat </label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" placeholder="Alamat Lengkap" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keluarga" class=" form-control-label">Jumlah Anggota Keluarga </label></div>
                                        <div class="col-12 col-md-2"><input type="number" id="keluarga" name="keluarga" placeholder="0" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="program" class=" form-control-label">Program yg dimiliki</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="program" name="program" placeholder="Program" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="dtks" class=" form-control-label">ID DTKS</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="dtks" name="dtks" placeholder="No Id DTKS" required class="form-control"><small>DTKS (Data Terpadu Kesejahteraan Sosial)</small></div>
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
                                    <tr>
                                        <input type="hidden" name="kodesrt[]" value="<?php echo $kodesurat ?>" class="form-control">
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
                                            <td><button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i>
                                    </button></td>
                                    </tr>

                                    </table>
                                  </div>
                                  <hr>
                                    <h6 class="label">PERMASALAHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="masalah" class=" form-control-label">Permasalahan</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="3" id="masalah" name="masalah" placeholder="Jelaskan Permasalahan yang ada" required class="form-control"></textarea>
                                            <small><strong>Perhatian !</strong> Pisahkan dengan tanda (;) jika permasalahan lebih dari 1 (satu)</small></div>
                                    </div>
                                    <hr>
                                    <h6 class="label">PERMOHONAN BANTUAN/KELUHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keluhan" class=" form-control-label">Permohonan Bantuan/Keluhan</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="3" id="keluhan" name="keluhan" placeholder="Jelaskan keluhan yang ada" required class="form-control"></textarea>
                                            <small><strong>Perhatian !</strong> Pisahkan dengan tanda (;) jika keluhan lebih dari 1 (satu)</small></div>
                                    </div> 
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="fasilitator" class=" form-control-label">Fasilitator</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="fasilitator" name="fasilitator" placeholder="Nama Fasilitator" required class="form-control">
                                        </div>
                                    </div> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="puskesos" class=" form-control-label">Ketua Puskesos</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="puskesos" name="puskesos" placeholder="Nama ketua puskesos" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="supervisor" class=" form-control-label">Supervisor</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="supervisor" name="supervisor" placeholder="Nama supervisor" required class="form-control">
                                        </div>
                                    </div> 
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
                                        <input type="hidden" name="kodesrt[]" value="<?php echo $kodesurat ?>" class="form-control" >
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
                                <strong class="card-title">Data Instrumen Assesment</strong>
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
                            $query = mysqli_query ($con, "SELECT tb_detailsurat.* FROM tb_detailsurat WHERE tb_detailsurat.kodejenis='JS046' ORDER BY tb_detailsurat.id DESC ");
                            $no=1;
                            while ($r = mysqli_fetch_array($query)){
                                $dt=explode('#', $r['detail']);

                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $r['no'];?></td>
                                            <td><?php echo $r['tanggal'];?></td>
                                            <td><?php echo $r['nama'];?></td>
                                            <td><a href="../cetak/c_assesment.php?kode=<?php echo $r['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a><a href="?page=edit_assesment&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_assesment.php?kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
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
