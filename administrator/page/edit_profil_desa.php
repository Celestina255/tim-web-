<?php
//include '../sesi.php';
include '../koneksi.php';
include "../assets/inc.php";
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
    <?php

    $query = mysqli_query($con, "SELECT * FROM tb_profile LIMIT 1");
    while ($data = mysqli_fetch_array($query)){
        ?>
    ?>
                        <form action="update/u_profile_desa.php"  method="post" onsubmit="return validasi_input(this)"  enctype="multipart/form-data" class="form-horizontal">

<nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#sejarah" role="tab" aria-controls="custom-nav-home" aria-selected="true">SEJARAH</a>
                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#visi" role="tab" aria-controls="custom-nav-profile" aria-selected="false">VISI</a>
                    <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#misi" role="tab" aria-controls="custom-nav-contact" aria-selected="false">MISI</a>
                    <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#peta" role="tab" aria-controls="custom-nav-contact" aria-selected="false">PETA DESA</a>
                </div>
                </nav>
                <br>
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="sejarah" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <h6 class="label">SEJARAH DESA/KELURAHAN :</h6>
                                    <hr>       
                                    <div class="row form-group">
                                        <div class="col-12 col-md-9"><textarea rows="4" name="sejarah" class="form-control"></textarea>
                                        </div>
                                    </div>

                        <div class="tab-pane fade" id="visi" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <h6 class="label">VISI DESA/KELURAHAN :</h6>
                                    <hr>          
                                     <div class="row form-group">
                                        <div class="col-12 col-md-9"><textarea rows="2" name="visi" class="form-control"></textarea>
                                        </div>
                                    </div>
                        <div class="tab-pane fade" id="misi" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <h6 class="label">MISI DESA/KELURAHAN :</h6>
                                    <hr>
                                     <div class="row form-group">
                                        <div class="col-12 col-md-9"><textarea rows="6" name="misi" class="form-control"></textarea>
                                        </div>
                                    </div>
                        <div class="tab-pane fade" id="peta" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <h6 class="label">PETA WILAYAH DESA : </h6>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="peta" class=" form-control-label">Link Peta (Google Map)</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="peta" name="peta"value="<?php echo $dt[48]; ?>" class="form-control"></div>
                                    </div>
                                    

                                  <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                                        <div class="col col-md-6"><button type="submit" name="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>
                                        
                                    </div>
                                </form>

                    </div>
                     <?php 
                        }
                                                //mysql_close($host);
                        ?>
                    </div>
                </div>
            </div>
        </div>

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
