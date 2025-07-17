<?php
include_once "../assets/inc.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<body>
    <div class="au-card recent-report">
    <!-- Left Panel -->
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5">DATA PERMOHONAN SURAT 
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>


        <!-- Header-->


<!-- END MODAL SUKET UMUM --> 


<div class="card ">
    <div class="card-body animated zoomIn" style="overflow-x: scroll;">
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Nama Surat</th>
                    <th>No. Hp</th>
                    <th>Tanggal</th>
                    <th>Lamp</th>
                    <th>Foto</th>
                    <th>Ubah Status</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $query = mysqli_query ($con, "SELECT * FROM tb_permohonan ORDER BY id DESC");
                $no=1;
                while ($data = mysqli_fetch_assoc($query)){
                   ?>
                   <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['nmsurat'];?></td>
                    <td><?php echo $data['hp'];?></td>
                    <td><?php echo IndonesiaTgl($data['tgl']);?></td>
                    <td><a href="../file/berkas/<?php echo $data['berkas'];?>" target="_BLANK"><img src="../file/berkas/<?php echo $data['berkas'];?>" style=" width: 150px; height:  auto; border-color: white; box-shadow: 2px 1px 4px ;"></a></td>
                    <td><a href="../file/fotowarga/<?php echo $data['foto'];?>" target="_BLANK"><img src="../file/fotowarga/<?php echo $data['foto'];?>" style=" width: 80px; height: auto; border-color: white; box-shadow: 2px 1px 4px ;"></a></td>
                    <td align="center"><a href="?page=acc_permohonan&amp;id=<?php echo $data['id'];?>"><p style='background:#00BFFF;border-radius:5%;padding:0px 10px;box-shadow:2px 1px 2px;color:white;'><?php echo $data['status'];?></a></p>&nbsp;&nbsp;&nbsp;
                    <a href="?page=<?php echo $data['page'];?>"><p style='background:#32CD32;border-radius:5%;padding:0px 10px;box-shadow:2px 1px 2px;color:white;'>Buatkan</p></a></td>

                </tr>

            <?php }?>    

        </tbody>
    </table>
</div>      
</div>

</div>

              <!-- /.row -->


<!-- jQuery 3 -->
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
