<?php

include_once "../assets/inc.php";
?>

                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5">STATUS PEMBUATAN SURAT MANDIRI
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
                                            <th>Nama</th>
                                            <th>Surat</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                        <?php
                        $userid = $_SESSION['userid'];
                            $query = mysqli_query ($con, "SELECT * FROM tb_buatsendiri WHERE userid='$userid' ORDER BY id DESC");
                            $no=1;
                            while ($data = mysqli_fetch_assoc($query)){
                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['nmsurat'];?></td>
                                            <td><?php echo IndonesiaTgl($data['tgl']);?></td>
                                            <td align="center"><a href="?page=tunggu_suratmandiri&id=<?php echo $data['id'];?>"><?php if ($data['status']=='onprocess') : ?> <p style='background:blue;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>On Process</p><?php elseif($data['status']=='ditolak') : ?> <p style='background:red;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>Permohonan ditolak</p>  <?php elseif ($data['status']=='acc') : ?> <p style='background:grey;border-radius:5%;padding:0px 5px;box-shadow:2px 1px 2px;color:white;'>Sudah acc</p><?php endif; ?></a>
                            </td>

                                        </tr>
    
                                     <?php }?>    

                                    </tbody>
                                </table>
                            </div>      
                        </div>
 
              </div>

              <!-- /.row -->

<br>
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

