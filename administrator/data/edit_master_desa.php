<?php 
include '../koneksi.php';
?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">EDIT DATA DESA/KELURAHAN</strong>
                            </div>

                            <div class="card-body">
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM tb_kelurahan");
                                while ($data = mysqli_fetch_array($query)){
                                ?>

                                <form action="update/u_masterdesa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body card-block col-md-12">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Kode Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-9"><input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>" class="form-control"><input type="text" id="kodekelurahan" name="kodekelurahan" value="<?php echo $data['kodekelurahan'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kelurahan" name="kelurahan" value="<?php echo $data['kelurahan'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kdekec" class=" form-control-label">Kode Kecamatan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kodekec" name="kodekec" value="<?php echo $data['kodekec'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Kecamatan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kec" name="kec" value="<?php echo $data['kec'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kodekab" class=" form-control-label">Kode Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kodekab" name="kodekab" value="<?php echo $data['kodekab'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kab" class=" form-control-label">Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kab" name="kab" value="<?php echo $data['kab'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kodeprov" class=" form-control-label">Kode Provinsi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kodeprov" name="kodeprov" value="<?php echo $data['kodeprov'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="prov" class=" form-control-label">Provinsi</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="prov" name="prov" value="<?php echo $data['prov'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Alamat Kantor</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kantor" name="kantor" value="<?php echo $data['kantor'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="telp" class=" form-control-label">Telp</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="telp" name="telp" value="<?php echo $data['telp'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="lurah" class=" form-control-label">Nama Kades/Lurah</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="lurah" name="lurah" value="<?php echo $data['lurah'];?>"  class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="niplurah" class=" form-control-label">NIP Kades/Lurah</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="niplurah" name="niplurah" value="<?php echo $data['niplurah'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="seklur" class=" form-control-label">Nama Sekdes/Seklur</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="seklur" name="seklur" value="<?php echo $data['seklur'];?>"  class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nipseklur" class=" form-control-label">NIP Sekdes/Seklur</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nipseklur" name="nipseklur" value="<?php echo $data['nipseklur'];?>"class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keu" class=" form-control-label">Kaur Keuangan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="keu" name="keu" value="<?php echo $data['bendahara'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email" class=" form-control-label">E-mail Kelurahan</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email" name="email" value="<?php echo $data['email'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control">
                                            <input type="hidden" id="x" name="x" value="<?php echo $data['logo'];?>" class="form-control"></div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-12" style="text-align-last: center;">
                                        <img src="../img/<?php echo $data['logo'];?>" class="user-avatar rounded-circle" style="border: 1px solid white; width: 110px; height: 110px; text-align-last: center;">
                                        </div>
                                    </div>

                            </div>
                       
                            </div>
                            <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-6"><a href="?page=profile" type="button" class="btn btn-primary btn-lg btn-block">Kembali</a></div>
                                        <div class="col col-md-6"><button type="submit" name="update" id="update" class="btn btn-primary btn-lg btn-block">Update</button></div>
                                    </div>
                            </div>
                        </div> </form><?php }?>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
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



</body>

</html>
