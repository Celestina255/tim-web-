<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
             <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5">SURAT PEMBERITAHUAN
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

                        <form action="act/s_pemberitahuan.php" onsubmit="return validasi_input(this)" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS027' ORDER BY id ASC ");
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
                                <?php }}?>
<hr>
                                    <h6 class="label">DETAIL PEMBERITAHUAN :</h6>
                                    <hr> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="perihal" class=" form-control-label">Perihal</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="perihal" name="perihal" placeholder="Perihal yang akan disampaikan / diberitahukan" class="form-control" required><small class="form-text text-muted">Contoh : Jadwal Pembagian BLT bulan Januari 2023</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="lampiran" class=" form-control-label">Lampiran</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="lampiran" name="lampiran" placeholder="Jumlah lampiran" required class="form-control"><small class="form-text text-muted">Contoh : 1 Lembar</small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="tujuan" class=" form-control-label">Ditujukan kepada</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="tujuan" name="tujuan" placeholder="Nama Lembaga/Orang yang dituju" required class="form-control"><small class="form-text text-muted">Contoh : Ketua RT </small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt" class=" form-control-label">Di (Alamat yg dituju)</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt" name="almt" placeholder="Alamat yg dituju" required class="form-control"><small class="form-text text-muted">Contoh : Tempat / </small></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="detail" class=" form-control-label">Detail Pemberitahuan</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="6" id="detail" name="detail" placeholder="Contoh : Meneruskan hasil komunikasi dengan Ka. UPT PUSKESMAS Kecamatan Way Sulan kami beritahukan kepada Bapak RT dan Kadus bahwa Jadwal Vaksinasi Dosis 3 / Booster dimajukan yang semula tanggal 12 April 2023 menjadi tanggal 10 April 2023, untuk itu mohon sampaikan kepada warganya dilingkungan masing- masing." class="form-control" required></textarea></div>
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
                                            <th>Kegiatan / Acara</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                        <?php 
                            $query = mysqli_query ($con, "SELECT * FROM tb_detailsurat WHERE kodejenis='JS027' ORDER BY id ASC ");
                            $no=1;
                            while ($data = mysqli_fetch_assoc($query)){
                                $dt=explode(';', $data['detail']);
                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['no'];?></td>
                                            <td><?php echo $dt[0];?></td>
                                            <td><?php echo $dt[2];?></td>
                                            <td><?php echo $data['tanggal'];?></td>
                                            <td>
                                                <a href="../cetak/c_pemberitahuan.php?kode=<?php echo $data['kode'];?>" target="_BLANK" class="btn"><i class="fa fa-print"></i></a>
                                                <a href="?page=edit_pemberitahuan&amp;kode=<?php echo "$data[kode]"; ?>" class="btn"><i class="fa fa-edit"></i></a>
                                                <a href="hapus/h_pemberitahuan.php?kode=<?php echo $data['kode'];?>" class="btn"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
    
                                     <?php }?>    

                                    </tbody>
                                </table>
                            </div>      
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
           
        </div><!-- .content -->

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
