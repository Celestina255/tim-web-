<?php
include_once "../assets/inc.php";
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h3 class="title-5">SURAT PERMOHONAN PENCATATAN PERNYATAAN AHLI WARIS
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
<br>
                        <form action="act/s_permohonanaw.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS040' ORDER BY id ASC ");
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
                                    <h6 class="label">DATA SURAT KETERANGAN AHLI WARIS :</h6>
                                    <hr>
                                    <?php
            $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  where kode='$_GET[kode]' ");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
            ?>  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kodesurataw" class=" form-control-label">Kode Surat </label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="kodesurataw" name="kodesurataw" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosurataw" class=" form-control-label">No. Surat</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nosurataw" name="nosurataw" class="form-control" value="<?php echo $row ['no']; ?>" readonly="readonly" ></div>
                                    </div>
                                    <?php } ?>
                                    
                                    <hr>
                                    <h6 class="label">DATA PEMOHON :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nik" class=" form-control-label">NIK Pemohon</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nik" name="nik" onkeyup="isinik()" placeholder="NIK pemohon surat" required class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="pemohon" class=" form-control-label">Nama Pemohon</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="pemohon" name="pemohon" placeholder="Nama lengkap pemohon surat" required class="form-control"></div>
                                    </div>
                                   
                                <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                                        <div class="col col-md-6"><button type="submit" name="cetak" class="btn btn-primary btn-sm pull pull-right">Cetak</button></div>
                                        
                                    </div>
                                </form>                        
                            </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Surat Permohonan Pencatatan Pernyataan Ahli Waris</strong>
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
                                $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat, tb_buatsendiri WHERE tb_detailsurat.kode=tb_buatsendiri.kode_surat AND tb_detailsurat.kodejenis='JS040' AND tb_buatsendiri.status='acc' AND tb_buatsendiri.userid='$userid' ORDER BY tb_detailsurat.id DESC ");
                            $no=1;
                            while ($r = mysqli_fetch_array($query)){
                                $dt=explode(';', $r['detail']);

                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $r['no'];?></td>
                                            <td><?php echo $r['tanggal'];?></td>
                                            <td><?php echo $r['nama'];?></td>
                                            <td><a href="../cetak/c_permohonanawkec.php?kode=<?php echo $r['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a><a href="?page=edit_permohonanaw&amp;kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_permohonanaw.php?kode=<?php echo $r['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
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
    </div>
    <br><br>
    <!-- jQuery 3 -->
<script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

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
                    $('#pemohon').val(obj.nama);
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
