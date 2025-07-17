<?php
include '../koneksi.php';
?>
<!doctype html>

<html class="no-js" lang="en">
<!--<![endif]-->

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">MASTER DATA DESA/KELURAHAN</strong>
                            </div>

                            <div class="card-body">
                <div class="custom-tab">
                    <div class="card-body card-block">
                             <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#desa" role="tab" aria-controls="custom-nav-home" aria-selected="true">DATA DESA</a>
                                    <a class="nav-item nav-link" id="custom-nav-ap-tab" data-toggle="tab" href="#ap" role="tab" aria-controls="custom-nav-ap" aria-selected="true">PERANGKAT DESA</a>
                                    <a class="nav-item nav-link" id="custom-nav-kec-tab" data-toggle="tab" href="#kec" role="tab" aria-controls="custom-nav-kec" aria-selected="false">KECAMATAN</a>
                                    <a class="nav-item nav-link" id="custom-nav-kua-tab" data-toggle="tab" href="#kua" role="tab" aria-controls="custom-nav-kua" aria-selected="false">KUA</a>

                                </div>
                            </nav>
                            <br>
                            <?php
                                $query = mysqli_query($con, "SELECT * FROM tb_kelurahan, tb_kecamatan, tb_kua WHERE tb_kelurahan.id=tb_kecamatan.id AND tb_kelurahan.id=tb_kua.id LIMIT 1");
                                while ($data = mysqli_fetch_array($query)){
                                ?>

                                <form action="update/u_masterdesa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="desa" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <h6 class="label">DATA DESA/KELURAHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Jenis Pemerintahan</label></div>
                                        <div class="col-12 col-md-4">
                                            <select id="jnpem" name="jnpem" class="form-control" required>
                                                <option value="<?php echo $data['jnp'];?>" selected><?php echo $data['jnp'];?></option>
                                                <option value="Desa">Desa</option>
                                                <option value="Kelurahan">Kelurahaan</option>
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Kode Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-3"><input type="text" id="kodekelurahan" name="kodekelurahan" value="<?php echo $data['kodekelurahan'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kelurahan" name="kelurahan" value="<?php echo $data['kelurahan'];?>" class="form-control" required></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kodekab" class=" form-control-label">Kode Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-3"><input type="text" id="kodekab" name="kodekab" value="<?php echo $data['kodekab'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kab" class=" form-control-label">Kabupaten/Kota</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kab" name="kab" value="<?php echo $data['kab'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kodeprov" class=" form-control-label">Kode Provinsi</label></div>
                                        <div class="col-12 col-md-3"><input type="text" id="kodeprov" name="kodeprov" value="<?php echo $data['kodeprov'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="prov" class=" form-control-label">Provinsi</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="prov" name="prov" value="<?php echo $data['prov'];?>" class="form-control" required></div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kelurahan" class=" form-control-label">Alamat Kantor</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="kantor" name="kantor" value="<?php echo $data['kantor'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="telp" class=" form-control-label">Telp</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="telp" name="telp" value="<?php echo $data['telp'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email" class=" form-control-label">E-mail Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="email" name="email" value="<?php echo $data['email'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo Desa/Kelurahan</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="logo" name="logo" class="form-control">
                                            <input type="hidden" id="x" name="x" value="<?php echo $data['logo'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-12" style="text-align-last: center;">
                                        <img src="../img/<?php echo $data['logo'];?>" class="user-avatar rounded-circle" style="border: 1px solid white; width: 110px; height: 110px; text-align-last: center;">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ap" role="tabpanel" aria-labelledby="custom-nav-ap-tab">
                                    <h6 class="label">DATA APARAT DESA/KELURAHAN :</h6>
                                    <hr>  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="lurah" class=" form-control-label">Nama Kades/Lurah</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="lurah" name="lurah" value="<?php echo $data['lurah'];?>" class="form-control"><input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="niplurah" class=" form-control-label">NIP Kades/Lurah</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="niplurah" name="niplurah" value="<?php echo $data['niplurah'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="seklur" class=" form-control-label">Nama Sekdes/Seklur</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="seklur" name="seklur" value="<?php echo $data['seklur'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nipseklur" class=" form-control-label">NIP Sekdes/Seklur</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nipseklur" name="nipseklur" value="<?php echo $data['nipseklur'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="keu" class=" form-control-label">Kaur Keuangan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="keu" name="keu" value="<?php echo $data['bendahara'];?>" class="form-control"></div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="kec" role="tabpanel" aria-labelledby="custom-nav-kec-tab">
                                    <h6 class="label">DATA KECAMATAN :</h6>
                                    <hr>  
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="kdekec" class=" form-control-label">Kode Kecamatan</label></div>
                                        <div class="col-12 col-md-3"><input type="text" id="kodekec" name="kodekec" value="<?php echo $data['kodekec'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="kecamatan" class=" form-control-label">Kecamatan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="kec" name="kec" value="<?php echo $data['kec'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="camat" class=" form-control-label">Camat</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="camat" name="camat" value="<?php echo $data['nama_camat'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nipcamat" class=" form-control-label">NIP. Camat</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nipcamat" name="nipcamat" value="<?php echo $data['nip_camat'];?>" class="form-control"></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kua" role="tabpanel" aria-labelledby="custom-nav-kua-tab">
                                    <h6 class="label">DATA KANTOR URUSAM AGAMA (KUA) :</h6>
                                    <hr>  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nm_kepala" class=" form-control-label">Nama Kepala KUA</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nm_kepala" name="nm_kepala" value="<?php echo $data['nm_kepala'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="nip_kepala" class=" form-control-label">NIP</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="nip_kepala" name="nip_kepala" value="<?php echo $data['nip_kepala'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="pang_kepala" class=" form-control-label">Pangkat & Jabatan</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="pang_kepala" name="pang_kepala" value="<?php echo $data['pangjab_kepala'];?>" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="almt_kua" class=" form-control-label">Alamat Kantor</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="almt_kua" name="almt_kua" value="<?php echo $data['almt_kua'];?>" class="form-control" required></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="telp_kua" class=" form-control-label">Telp</label></div>
                                        <div class="col-12 col-md-4"><input type="text" id="telp_kua" name="telp_kua" value="<?php echo $data['telp_kua'];?>" class="form-control"></div>
                                    </div>
                                </div>
                            </div>

                                    <div class="row form-group">
                                        <div class="col col-md-12" align="center"><button type="submit" name="update" class="btn btn-primary btn-lg btn-block col col-md-12"><i class="fa fa-save"></i>&nbsp; Update</button>
                                        </div>
                                    </div>
                            </div>
                             </form><?php }?>
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



</body>

</html>
