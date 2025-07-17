        <div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5" align="center">CETAK SURAT PENGANTAR NIKAH (N1-N6)
                            </h1>
                        </div>
                        <hr class="line-seprate">
                    </div>
                </div>
            </section>
            <div class="card-body card-block">
                <?php
                $KodeEdit= isset($_GET['page']) ?  $_GET['kode'] : $_POST['kodesurat'];
                $data=mysqli_query($con, "SELECT * FROM tb_detailsurat  where kode='$KodeEdit' ");
                $no=1;
                while($row =mysqli_fetch_array($data)){ 
                    ?>  
                    <form action=""  method="post" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="kodesurat" class="form-control-label">Kode Surat</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="kodesurat" name="kodesurat" value="<?php echo $row ['kode']; ?>" readonly="readonly" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nosurat" class=" form-control-label">No. Surat</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nosurat" name="nosurat" readonly="readonly" class="form-control" value="<?php echo $row ['no']; ?>" ></div>
                            </div>
                            <hr>

                            <div class="card">
                                <div class="card-body" style="text-align-last: center;">
                                    <a href="../cetak/c_n1.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-primary" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N1</a>
                                    <a href="../cetak/c_n2.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N2</a>
                                    <a href="../cetak/c_n3.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-success" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N3</a>

                                    <a href="../cetak/c_n4.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-warning" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N4 </a>
                                    <a href="../cetak/c_n5.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-danger" target='_BLANK'><i class="fa fa-print"></i>&nbsp;N5</a>
                                    <a href="?page=n6&amp;kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info" ><i class="fa fa-print"></i>&nbsp;N6</a>
                                        <!--
                                        <a href="../suratpernikahan/n7.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info" ><i class="fa fa-print"></i>&nbsp;N7</a>
                                        <a href="../suratpernikahan/n8.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-info"><i class="fa fa-print"></i>&nbsp;N8</a>
                                    -->
                                </div>
                            </div><!-- /# card -->
                        </div>
                    </form>

                </div>
                <?php 
            }
                                                //mysql_close($host);
            ?>



            
            <script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->
            