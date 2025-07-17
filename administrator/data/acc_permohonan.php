<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
        <section class="welcome p-t-1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-5" align="center">KONFIRMASI PERMOHONAN SURAT
                        </h1>
                    </div>
                    <hr class="line-seprate">
                </div>
            </div>
        </section>
        <div class="card-body card-block">
            <?php
            $data=mysqli_query($con, "SELECT * FROM tb_permohonan  where id='$_GET[id]' ");
            $no=1;
            while($row =mysqli_fetch_array($data)){ 
                ?>  
                <form action="act/acc_permohonan_act.php"  method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body card-block">
                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $row ['id']; ?>" readonly="readonly" >
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nmsurat" class=" form-control-label">Nama Surat</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nmsurat" name="nmsurat" class="form-control" value="<?php echo $row ['nmsurat']; ?>" readonly="readonly" ></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="kodesurat" class="form-control-label">NIK</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="nik" name="nik" value="<?php echo $row ['nik']; ?>" readonly="readonly" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" class="form-control" value="<?php echo $row ['nama']; ?>" readonly="readonly" >

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><textarea rows="2" id="keterangan" name="keterangan" class="form-control"></textarea>

                                </div>
                            </div>
                            <hr>


                            <div class="card">
                                <div class="card-body" style="text-align-last: center;">
                                    <button id='tolak' name='tolak' type="submit"  class="btn btn-danger"><i class="fa fa-close"></i> Tolak</button>
                                    <button name='terima' type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Terima</button>                                        
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