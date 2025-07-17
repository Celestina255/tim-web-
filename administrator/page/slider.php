<body>
    <div class="au-card recent-report">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Data Foto Slider</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="?page=upload_slider" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Tambah Slider</a>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto Slider</th>
                                                <th>Deskrisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        <?php 
                            $query = mysqli_query ($con, "SELECT * FROM tb_slider ORDER BY id ASC");
                            $no=1;
                            while ($r = mysqli_fetch_array($query)){
                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td align="center"><a href="../img/slider/<?php echo $r['gambar'];?>" target="_BLANK"><img src="../img/slider/kecil_<?php echo $r['gambar'];?>" style="width: 80px; height: auto; box-shadow: 2px 1px 4px;" ></a><br></td>
                                              <td><?php echo $r['des'];?></td>
                                            <td><a href="?page=edit_slider&amp;id=<?php echo $r['id'];?>"><i class="fa fa-edit"></i></a>&nbsp;<a href="../aksi/h_slider.php?id=<?php echo $r['id'];?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
