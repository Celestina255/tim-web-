<body>
    <div class="au-card recent-report">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Data Galeri</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="?page=upload_galeri" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Tambah Foto</a>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Deskrisi</th>
                                                <th>Tgl. Upload</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                       <?php 
              $query = mysqli_query($con, "SELECT * FROM tb_galeri ORDER BY id ASC");
              while ($r = mysqli_fetch_array($query)) {
                  $foto_kecil = "../img/galeri/kecil_" . $r['foto'];
                  $foto_asli = "../img/galeri/" . $r['foto'];

                  // Periksa apakah file kecil_ ada
                  if (!file_exists($foto_kecil)) {
                      $src = $foto_asli;
                  } else {
                      $src = $foto_kecil;
                  }
              ?>
                <tr>
                  <td><?= $r['id']; ?></td>
                  <td align="center">
                    <a href="<?= $foto_asli; ?>" target="_blank">
                      <img src="<?= $src; ?>" style="width: 80px; height: auto; box-shadow: 2px 1px 4px;" alt="foto">
                    </a>
                  </td>
                  <td><?= $r['nama']; ?></td>
                  <td><?= $r['des']; ?></td>
                  <td><?= $r['tgl']; ?></td>
                  <td>
                    <a href="?page=edit_galeri&id=<?= $r['id']; ?>"><i class="fa fa-edit"></i></a>
                    &nbsp;
                    <a href="../aksi/h_galeri.php?id=<?= $r['id']; ?>"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- END DATA TABLE -->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendors/jquery/jquery.min.js"></script>
</body>
