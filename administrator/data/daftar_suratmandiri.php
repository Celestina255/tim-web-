<?php
include_once "../assets/inc.php";
?>
<body>
   
<div class="au-card recent-report" style="box-shadow: 2px 1px 4px;">
    <!-- Left Panel -->
    <section class="welcome p-t-1s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-5">DATA SURAT YANG DIBUAT MANDIRI</h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-body animated zoomIn" style="overflow-x: scroll;">
            <table id="bootstrap-data-table-export1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Surat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM tb_buatsendiri ORDER BY id DESC");
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nmsurat']; ?></td>
                        <td><?php echo IndonesiaTgl($data['tgl']); ?></td>
                        <td>
                            <?php 
                            if ($data['status'] == 'onprocess') {
                                echo 'diproses';
                            } else {
                                echo $data['status'];
                            }
                            ?>
                        </td>
                        <td>
                            
                            </a>
                            <?php if ($data['status'] == 'onprocess') { ?>
                                <a href="?page=acc&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm w-100 mb-2" style="font-size: 13px;">
                                    <i class="fa fa-check"></i> Terima
                                </a>
                            <?php } elseif ($data['status'] == 'diterima') { ?>
                                <div class="btn btn-secondary btn-sm w-100 mb-2" style="font-size: 13px;">
                                    <i class="fa fa-check-circle"></i> Diterima
                                </div>
                            <?php } elseif ($data['status'] == 'ditolak') { ?>
                                <div class="btn btn-danger btn-sm w-100 mb-2" style="font-size: 13px;">
                                    <i class="fa fa-times-circle"></i> Ditolak
                                </div>
                            <?php } ?>
                                <!-- Tombol Hapus -->
                                    <div>
                                        <a href="hapus/hapus_permohonan.php?id=<?php echo $data['id']; ?>"
                                            onclick="return confirm('Yakin ingin menghapus permohonan ini?')"
                                            class="btn btn-sm w-100"
                                            style="font-size: 13px; background-color: #000; color: #fff;">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </div>
                        
                    </tr>
                    <?php } ?>
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
