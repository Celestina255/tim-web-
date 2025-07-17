<?php
include '../koneksi.php';
include "../assets/inc.php";
?>
        <div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5" align="center">CETAK SPT, SPPD & LAMPIRAN
                            </h1>
                        </div>
                            <hr class="line-seprate">
                    </div>
                </div>
            </section>
<div class="card-body card-block">
            <?php
            $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  where kode='$_GET[kode]' ");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
            ?>  
                        <form action=""  method="post" onsubmit="return validasi_input(this)"  enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nosurat" name="nosurat" class="form-control" value="<?php echo $row ['no']; ?>" readonly="readonly" ></div>
                                </div>
                                                                    <hr>


                                <div class="card">
                                    <div class="card-body" style="text-align-last: center;">
                                        <a href="../cetak/c_spt.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-primary" target='_BLANK'><i class="fa fa-print"></i>SPT</a>
                                        <a href="../cetak/c_sppd.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i>SPPD</a>
                                        <a href="../cetak/c_l1.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-success" target='_BLANK'><i class="fa fa-print"></i>Lamp. 1</a>

                                        <a href="../cetak/c_l2.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-warning" target='_BLANK'><i class="fa fa-print"></i>Lamp. 2 </a>
                                        <a href="../cetak/c_l3.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-danger" target='_BLANK'><i class="fa fa-print"></i>Lamp. 3</a>
                                        
                                    </div>
                                </div><!-- /# card -->
                            </div>
                                </form>

                    </div>
                     <?php 
                        }
                                                //mysql_close($host);
                        ?>

 <script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->
