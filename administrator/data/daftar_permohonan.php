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


                                    <!-- PERUBAHAN ADA DIBAGIAN BAWAH INI-->
         <div class="card ">
            <div class="card-body animated zoomIn" style="overflow-x: scroll;">
                <table id="bootstrap-data-table-export0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama / NIK Pemohon</th>
                            <th>Nama Surat</th>
                            <th>No. Hp</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $query = mysqli_query($con, "SELECT * FROM tb_permohonan ORDER BY id DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?><br><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['nmsurat']; ?></td>
                                <td><?php echo $data['hp']; ?></td>
                                <td><?php echo IndonesiaTgl($data['tgl']); ?></td>
                                <td><a href="../file/fotowarga/<?php echo $data['foto']; ?>" target="_BLANK"><img
                                            src="../file/fotowarga/<?php echo $data['foto']; ?>"
                                            style=" width: 100px; height:  auto; border-color: white; box-shadow: 2px 1px 4px ;"></a>
                                </td>
                                <td align="center">
                                    <?php if ($data['status'] == 'onprocess') { ?>
                                        <a href="?page=acc_permohonan&id=<?php echo $data['id']; ?>"
                                            class="btn btn-info btn-sm w-100 mb-2" style="font-size: 13px;">
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

                                    <!-- Tombol Buat Surat -->
                                    <div class="mb-2">
                                        <a href="?page=<?php echo $data['page']; ?>" class="btn btn-success btn-sm w-100"
                                            style="font-size: 13px;">
                                            <i class="fa fa-edit"></i> Buat Surat
                                        </a>
                                    </div>

                                    <!-- Tombol Hapus -->
                                    <div>
                                        <a href="hapus/hapus_permohonan.php?id=<?php echo $data['id']; ?>"
                                            onclick="return confirm('Yakin ingin menghapus permohonan ini?')"
                                            class="btn btn-sm w-100"
                                            style="font-size: 13px; background-color: #000; color: #fff;">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </div>

                                </td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <!-- SAMPAI BAGIAN DIATAS INI-->


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
