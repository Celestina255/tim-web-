<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
        <section class="welcome p-t-1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h1 class="title-5">SURAT PERMOHONAN PENCATATAN AHLI WARIS
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
        $urutan = (int) substr($kodesurat, 2, 3);
        $urutan++;

        $huruf = "SR";
        $kodesurat = $huruf . sprintf("%03s", $urutan);
        $nourut = sprintf("%03s", $urutan);
        $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kode='JS040' ORDER BY id ASC ");
            while ($r = mysqli_fetch_array($query)){
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
                    <input type="text" id="nmsurat" name="nmsurat" value="<?php echo $r['nmsurat']; ?>" class="form-control" readonly>
                </div>
            </div>
            <?php
            $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan WHERE id='1' LIMIT 1");
            while ($rdes = mysqli_fetch_array($query)){
                ?>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                    <?php $idstf=$_SESSION['userid']; ?>
                    <input type="hidden" id="idstf" name="idstf" value="<?php echo $idstf; ?>">
                    <input type="hidden" id="kodejenis" name="kodejenis" value="<?php echo $r['kode']; ?>" >
                    <div class="col-12 col-md-3"><input type="text" id="nosurat" name="nosurat" class="form-control" value="<?php echo $r['kode_klasi']; ?>/<?php echo $nourut ?>/<?php echo $rdes['kodekelurahan']; ?>/<?php echo getRomawi(date('m'));?>/<?php echo date('Y');?>" required></div>
                </div>
            <?php }} ?>
                <hr>
                <h6 class="label">DATA SURAT KETERANGAN AHLI WARIS :</h6>
                <hr>
                <?php
               $kode = isset($_GET['kode']) ? $_GET['kode'] : null;
               if ($kode) {               
                    $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  where kode='$kode' ");
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
                    <?php } } ?>

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
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="lurah" class=" form-control-label">Penanda Tangan Surat</label></div>
                        <div class="col-12 col-md-6"> 
                            <select id="lurah" name="lurah" class="form-control" required="">
                                <option value="">Penanda Tangan Surat</option>
                                <?php
                                $query = mysqli_query ($con, "SELECT * FROM tb_staff WHERE jab_staff='Kepala Desa' OR jab_staff='Sekretaris Desa' ORDER BY id_staff ASC");
                                while ($rtd = mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $rtd['id_staff']; ?>"><?php echo $rtd['nama_staff']; ?> (<?php echo $rtd['jab_staff']; ?>)</option> 
                                <?php } ?>
                            </select>
                        </div>
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
                                    <strong class="card-title">Data Surat</strong>
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
                                            $query = mysqli_query ($con, "SELECT tb_detailsurat.* FROM tb_detailsurat WHERE tb_detailsurat.kodejenis='JS040' ORDER BY tb_detailsurat.id DESC ");
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
