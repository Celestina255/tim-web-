<?php
include_once "../assets/inc.php";
?>
    <body>
        <div class="au-card recent-report">
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5" align="center">CETAK SURAT TUGAS
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
                                        <a href="../cetak/c_stugas.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-primary" target='_BLANK'><i class="fa fa-print"></i> Surat Tugas</a>
                                        <a href="../cetak/c_lamptugas.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i> SK Tugas</a>
                                         <a href="../cetak/c_lampsk.php?kode=<?php echo $row['kode'];?>" type="button" class="btn btn-secondary" target='_BLANK'><i class="fa fa-print"></i> Lamp. SK Tugas</a>
                                        <a href="index.php?page=tugas" type="button" class="btn btn-success"><i class="fa fa-close"></i> Kembali</a>
                                        
                                    </div>
                                </div><!-- /# card -->
                            </div>
                                </form>

                    </div>
                     <?php 
                        }
                                                //mysql_close($host);
                        ?>

</body>

</html>