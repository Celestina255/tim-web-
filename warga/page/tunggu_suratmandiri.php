<?php
include_once "../assets/inc.php";
?>
<div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-5" align="center">INFO !
                        </h2>
                    </div>

                </div>
<div class="container mt-2">
        <form action=""  method="" class="form-horizontal">
            <div class="row form-group">
                 <?php
                $id =$_GET['id'];
                $kode =$_GET['kode'];
                $data=mysqli_query($con, "SELECT COUNT(tb_buatsendiri.kode_surat) AS kds, tb_jenissurat.*, tb_buatsendiri.* FROM tb_jenissurat, tb_buatsendiri WHERE tb_jenissurat.kode=tb_buatsendiri.kode_jenis AND tb_buatsendiri.id='$id' OR kode_surat='$kode' LIMIT 1 ");
                $no=1;
                while($row =mysqli_fetch_array($data)){ 
                    ?> 
                    <?php if ($row['status'] == 'onprocess'): ?> 
                        <div class="col-md-12"><h4 align="center"><img src="../assets/loading.gif" style="text-decoration: none; width: 100px;"><br>T u n g g u  . . .<br><strong><?php echo $row['nmsurat'];?></strong><br> sedang ditinjau oleh Admin/staff Desa</h4> </div>
                        
                    <?php elseif ($row['status'] == 'acc'): ?>
                        <hr>
                        <div class="col-md-12" style="justify-content: center; text-align: center; border: none;"><h4 align="center">Silahkan Cetak surat kamu !</h4> 
                                 <div class="card" >
                                    <a href="../cetak/c_<?php echo $row['page'];?>.php?kode=<?php echo $row['kode_surat'];?>" target="_BLANK" class="btn"><img src="../assets/animasiprint.gif" style="text-decoration: none"></i><br><?php echo $row['nmsurat'];?>
                                </a>                                    
                            </div>
                        </div>
                    <?php elseif($row['kode_surat']=='0000') : ?>
                        <div class="col-md-12"><h4 align="center">Mohon Ma'af, Surat anda belum dapat Kami proses.!</h4> </div>
                        <div class="col-md-12"><h4 align="center">"<?php echo $row['keterangan'];?>"</h4> 
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12 mt-4" align="center"><a href='../warga/index.php?page=warga' class="btn btn-info">Kembali</a><br><br></div>
            </form>
            <?php 
        }
                                                //mysql_close($host);
        ?>
    </div>

</div>

