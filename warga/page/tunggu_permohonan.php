<div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-5" align="center">INFO !
                        </h2>
                    </div>

                </div>
<div class="container mt-2">
                <form action=""  method="post"  class="form-horizontal">
                    <div class="row form-group">
                        <?php
                        $id=$_GET['id'];
                        $userid=$_GET['userid'];
                        $data=mysqli_query($con, "SELECT * FROM tb_permohonan WHERE userid='$userid' AND id='$id'");
                        while($row =mysqli_fetch_array($data)){ 
                            ?>  
                            <?php if ($row['status'] == 'onprocess'): ?> 
                                <div class="col-md-12"><h4 align="center"><img src="../assets/loading.gif" style="text-decoration: none; width: 100px;"><br>T u n g g u  . . .<br><strong>"<?php echo $row['nmsurat'];?>" yang kamu ajukan</strong><br> sedang ditinjau oleh Admin/staff Desa</h4> </div>
                                <div class="col-md-12 mt-4" align="center"><a href='../warga/index.php?page=warga' class="btn btn-info">Kembali</a></div>

                            <?php elseif ($row['status'] == 'acc'): ?>
                                <hr>
                                <div class="col-md-12" style="justify-content: center; text-align: center; border: none;"><img src="../assets/terima-kasih.gif" style="text-decoration: none"></i><h4 align="center"><br>Silahkan ambil surat kamu dikantor Kelurahan !</h4> 
                                    <!-- /# card -->
                                </div>
                                <div class="col-md-12  mt-4" align="center"><a href='../warga/index.php?page=warga' class="btn btn-info">&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;</a></div>

                            <?php elseif($row['status'] == 'ditolak') : ?>
                                <div class="col-md-12"><h4 align="center">Mohon Ma'af, Surat anda belum dapat Kami proses.!</h4> 
                                </div>
                                <div class="col-md-12"><h4 align="center">"<?php echo $row['keterangan'];?>"</h4> 
                                </div>
                                <div class="col-md-12 mt-4" align="center"><a href='../warga/index.php?page=warga' class="btn btn-info">Kembali</a></div>
                            <?php endif; ?>
                        </div>
                    </form>

                </div>
                <?php 
            }
                                                //mysql_close($host);
            ?>
        </div>
    </div>

