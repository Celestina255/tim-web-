<?php
include_once "../assets/inc.php";
?>

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5">LAPORAN DATA ADMINISTRASI SURAT
                            </h3>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                        <div class="card">
                            <div class="card-body animated zoomIn scroll">
                               <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Surat</th>
                                                    <th>No. Surat</th>
                                                    <th>Nama Surat</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat, tb_datasurat WHERE tb_datasurat.kodejenis=tb_jenissurat.kode  AND tb_datasurat.status='acc' ORDER BY tb_datasurat.id DESC ");
                                                $no=1;
                                                while ($data = mysqli_fetch_assoc($query)){
                                                 ?>
                                                 <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $data['kode'];?></td>
                                                    <td><?php echo $data['no'];?></td>
                                                    <td><?php echo $data['nmsurat'];?></td>
                                                    <td><?php echo $data['tanggal'];?></td>
                                                    <td><?php echo $data['status'];?>
                                                    </td>

                                                    </tr>

                                                <?php }?>    

                                            </tbody>
                                        </table>
                            </div>      
                        </div>
 
              </div>

              <!-- /.row -->


<!-- jQuery 3 -->
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

