<div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5" align="center">CETAK SURAT KETERANGAN & PERNYATAAN AHLI WARIS
                            </h1>
                        </div>
                            <hr class="line-seprate">
                    </div>
                </div>
            </section>
<br>
            <?php
            $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
            $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  WHERE tb_detailsurat.kode='$KodeEdit'");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
            ?>  
                        <form action="" class="form-horizontal">

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
                                        <a href="../cetak/c_suketaw.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-primary" target='_BLANK'><i class="fa fa-print"></i> Keterangan</a>
                                        <a href="../cetak/c_pernyataanaw.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i> Pernyataan</a>
                                    
                                        <a href="../warga/index.php?page=permohonanaw&amp;kode=<?php echo $row['kode'];?>" type="button" class="btn btn-success" target="_BLANK"><i class="fa fa-edit"></i> Buat Permohonan </a>
                                        
                                        <a href="../warga/index.php?page=suketaw" type="button" class="btn btn-danger"><i class="fa fa-close"></i> Kembali</a>
                                        
                                    </div>
                                </div><!-- /# card -->
                            </div>
                                </form>

                            </div><?php } ?>
                </div>
                 <script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->