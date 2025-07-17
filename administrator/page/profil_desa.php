<?php
//include '../sesi.php';
include '../koneksi.php';

?>
<body>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>PROFILE DESA/KELURAHAN</h4>
            </div>
            <div class="card-body">
                <div class="custom-tab">
                    <div class="card-body card-block">
 


                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#sejarah" role="tab" aria-controls="custom-nav-home" aria-selected="true">SEJARAH</a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#visi" role="tab" aria-controls="custom-nav-profile" aria-selected="false">VISI & MISI</a>
                                    <a class="nav-item nav-link" id="custom-nav-st-tab" data-toggle="tab" href="#st" role="tab" aria-controls="custom-nav-st" aria-selected="false">STRUKTUR ORGANISASI</a>
                                    <a class="nav-item nav-link" id="custom-nav-peta-tab" data-toggle="tab" href="#peta" role="tab" aria-controls="custom-nav-peta" aria-selected="false">PETA DESA</a>
                                </div>
                            </nav>
                            <br>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM tb_profile LIMIT 1");
                            while ($d = mysqli_fetch_array($query)){
                                ?>
                        <form action="update/u_profile_desa.php"  method="post" onsubmit="return validasi_input(this)"  enctype="multipart/form-data" class="form-horizontal">
                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <h6 class="label">SEJARAH DESA/KELURAHAN :</h6>
                                    <hr>       
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12"><textarea rows="12" name="sejarah" class="form-control"><?php echo $d['sejarah']; ?></textarea>
                                        <input type="hidden" id="id" name="id" value="<?php echo $d['id_profil']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gsejarah" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-4"><img src="../dashboard/images/pages/<?php echo $d['gambar_sejarah']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gsj" class=" form-control-label">Upload Gambar Sejarah</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gsj" name="gsj" class="form-control"></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <h6 class="label">VISI DESA/KELURAHAN :</h6>
                                    <hr>        
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12"><textarea rows="2" name="visi" class="form-control"><?php echo $d['visi']; ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6 class="label">MISI DESA/KELURAHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12"><textarea rows="15" name="misi" class="form-control"><?php echo $d['misi']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gvisi" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-4"><img src="../dashboard/images/pages/<?php echo $d['gambar_visi']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gvisi" class=" form-control-label">Upload Gambar Visi Misi</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gvisi" name="gvisi" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="st" role="tabpanel" aria-labelledby="custom-nav-misi-tab">
                                    <h6 class="label">STRUKTUR ORGANISASI DESA/KELURAHAN :</h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="st" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-4"><img src="../dashboard/images/pages/<?php echo $d['gambar_struktur']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gst" class=" form-control-label">Upload Gambar Struktur</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gst" name="gst" class="form-control"></div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane fade" id="peta" role="tabpanel" aria-labelledby="custom-nav-peta-tab">
                                    <h6 class="label">PETA WILAYAH DESA : </h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="gpeta" class=" form-control-label">Link Peta (Google Map)</label></div>
                                        <div class="col-12 col-md-9"><textarea rows="4" id="peta" name="peta" class="form-control"><?php echo $d['peta']; ?></textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="peta" class=" form-control-label"></label></div>
                                        <div class="col-12 col-md-4"><img src="../dashboard/images/pages/<?php echo $d['gambar_peta']; ?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="peta" class=" form-control-label">Upload Gambar Peta</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gpeta" name="gpeta" class="form-control"></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col col-md-6"><button type="reset" class="btn btn-secondary btn-sm pull pull-left">Reset</button></div>
                                    <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>

                                </div>
                            </form>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

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
