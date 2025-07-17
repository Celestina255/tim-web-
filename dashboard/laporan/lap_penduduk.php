<?php
include_once "../assets/inc.php";
?>

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5">LAPORAN DATA PENDUDUK
                            </h3>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
                <div class="container mt-2">
                        <div class="card">
                            <div class="card-body animated zoomIn scroll">
                               <table class="table table-bordered" id="bootstrap-data-table-export" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Penduduk</th>
                                                <th>Tmp./Tgl. Lahir</th>
                                                <th>Status</th>
                                                <th>Alamat</th>
                                                <th>HP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php 
                            $query = mysqli_query ($con, "SELECT * FROM tb_penduduk ORDER BY id ASC");
                            while ($r = mysqli_fetch_array($query)){
                         ?>
                                        <tr>
                                            <td><?php echo $r['id'];?></td>
                                            <td><?php echo $r['nama'];?>(<?php echo substr($r['jk'],0,1);?>)<br><small><?php echo substr($r['nik'],0,6);?>***</small></td>
                                            <td><?php echo $r['tmp_lahir'];?>,&nbsp;
                                            <?php echo $r['tgl_lahir'];?></td>
                                            <td><?php echo $r['status'];?></td>
                                            <td><?php echo $r['alamat'];?></td>
                                            <td><a href="https://api.whatsapp.com/send?phone=62<?php echo $r['hp'];?>"><?php echo substr($r['hp'],0,6);?>***</a>
                                            </td>
                                            
                                        </tr>
                                      <?php } ?>
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

