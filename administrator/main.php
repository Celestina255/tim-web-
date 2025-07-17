<?php
include_once "../assets/inc.php";
?>
<body>
    <div class="row">
        <div class="col-md-12">
            <aside class="profile-nav alt">
                <section class="card">
                    <div class="card-header user-header alt bg-dark" style="box-shadow: 2px 1px 4px;">
                        <?php 
                        $adm=$_SESSION['uname'];
                        $queryadm = mysqli_query ($con, "SELECT * FROM tb_admin WHERE uname='$adm'");
                        while ($radm = mysqli_fetch_array($queryadm)){
                            ?>
                            <div class="media">
                                <a href="#">
                                    <?php echo ($radm['foto']!=null ? "<img class='align-self-center rounded-circle mr-3' style='width:85px; height:85px; box-shadow:1px 2px 4px;' src='../file/foto/$radm[foto]'" : "<img class='align-self-center rounded-circle mr-3' style='width:85px; height:85px; box-shadow:1px 2px 4px;' src='../file/foto/no_pic.png'>").  "alt='' />" ?>
                                </a>
                                <div class="media-body">
                                    <h2 class="text-light display-6">Selamat datang</h2>
                                    <p><?php echo $radm['uname'];?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </section>
            </aside>
        </div>
    </div>



    <!-- STATISTIC-->
    <div class="row m-t-10">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1" style="box-shadow: 2px 1px 4px;">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon" style="width: 65px;">
                            <i class="fa fa-users"></i>
                        </div>
                        <?php 
                        $queryw=mysqli_query($con, "SELECT COUNT(*) AS jw FROM tb_penduduk");
                        while($rw=mysqli_fetch_array($queryw)){
                        ?>

                        <div class="text">
                            <h2><?php echo format_angka($rw['jw']); }?></h2>
                            <span>Warga</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2" style="box-shadow: 2px 1px 4px;">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <?php 
                        $queryjs=mysqli_query($con, "SELECT COUNT(*) AS jjs FROM tb_jenissurat");
                        while($rjs=mysqli_fetch_array($queryjs)){
                            ?>
                            <div class="text">
                                <h2><?php echo format_angka($rjs['jjs']); }?></h2>
                                <span>Jenis Surat</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3" style="box-shadow: 2px 1px 4px;">
                    <a href="?page=data_surat">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <?php 
                                $queryas=mysqli_query($con, "SELECT COUNT(*) AS jas FROM tb_datasurat");
                                while($ras=mysqli_fetch_array($queryas)){
                                    ?>
                                    <div class="text">
                                        <h2><?php echo format_angka($ras['jas']); }?></h2>
                                        <span>Arsip Surat</span>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4" style="box-shadow: 2px 1px 4px;">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <?php 
                                    $queryptg=mysqli_query($con, "SELECT COUNT(*) AS jptg FROM tb_admin WHERE level='admin'");
                                    while($rptg=mysqli_fetch_array($queryptg)){
                                        ?>
                                        <div class="text">
                                            <h2><?php echo format_angka($rptg['jptg']); }?></h2>
                                            <span>Petugas</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END STATISTIC-->
                    <!-- STATISTIC-->
                    <section class="statistic">
                        <div class="section__content section__content--p10">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                        <div class="statistic__item" style="box-shadow: 2px 1px 4px;">
                                            <?php 
                                            $queryptgo=mysqli_query($con, "SELECT COUNT(*) AS jptgo FROM tb_admin WHERE status='on'");
                                            while($rptgo=mysqli_fetch_array($queryptgo)){
                                                ?>
                                                <h2 class="number"><?php echo format_angka($rptgo['jptgo']); }?></h2>
                                                <span class="desc">Petugas Online</span>
                                                <div class="icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <div class="statistic__item" style="box-shadow: 2px 1px 4px;">
                                                <?php 
                                                $querywo=mysqli_query($con, "SELECT COUNT(*) AS jwo FROM tb_penduduk WHERE ket='on'");
                                                while($rwo=mysqli_fetch_array($querywo)){
                                                    ?>
                                                    <h2 class="number"><?php echo format_angka($rwo['jwo']); }?></h2>
                                                    <span class="desc">Warga Online</span>
                                                    <div class="icon">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3">
                                                <div class="statistic__item" style="box-shadow: 2px 1px 4px;">
                                                    <?php 
                                                    $querysp=mysqli_query($con, "SELECT COUNT(*) AS sp FROM tb_permohonan WHERE status='acc'");
                                                    while($rsp=mysqli_fetch_array($querysp)){
                                                        ?>
                                                        <h2 class="number"><?php echo format_angka($rsp['sp']); }?></h2>
                                                        <span class="desc">Permohonan</span>
                                                        <div class="icon">
                                                            <i class="fa fa-files-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3">
                                                <div class="statistic__item" style="box-shadow: 2px 1px 4px;">
                                                    <?php 
                                                    $querysm=mysqli_query($con, "SELECT COUNT(*) AS sm FROM tb_buatsendiri WHERE status='acc'");
                                                    while($rsm=mysqli_fetch_array($querysm)){
                                                        ?>
                                                        <h2 class="number"><?php echo format_angka($rsm['sm']); }?></h2>
                                                        <span class="desc">Surat Mandiri</span>
                                                        <div class="icon">
                                                            <i class="fa fa-print"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </section>
                                <!-- END STATISTIC-->
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
                                                        <th>Lamp</th>
                                                        <th>Foto</th>
                                                        <th>Opsi</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

                                                    $query = mysqli_query ($con, "SELECT * FROM tb_permohonan ORDER BY id DESC");
                                                    $no=1;
                                                    while ($data = mysqli_fetch_assoc($query)){
                                                     ?>
                                                     <tr>
                                                        <td align="center"><?php echo $no++;?></td>
                                                        <td><?php echo $data['nama'];?><br><?php echo $data['nik'];?></td>
                                                        <td><?php echo $data['nmsurat'];?></td>
                                                        <td><?php echo $data['hp'];?></td>
                                                        <td><?php echo IndonesiaTgl($data['tgl']);?></td>
                                                        <td><a href="../file/berkas/<?php echo $data['berkas'];?>" target="_BLANK"><?php echo $data['berkas'];?></a></td>
                                                        <td><a href="../file/fotowarga/<?php echo $data['foto'];?>" target="_BLANK"><img src="../file/fotowarga/<?php echo $data['foto'];?>" style=" width: 100px; height:  auto; border-color: white; box-shadow: 2px 1px 4px ;"></a></td>
                                                        <td align="center"><?php echo $data['status']=='onprocess'? "<a href='?page=acc_permohonan&amp;id=".$data['id']."'</a><p style='background:#00BFFF;border-radius:5%;padding:0px 10px;box-shadow:2px 1px 2px;color:white;'>Confirm</p>" : "<p style='background:grey;border-radius:5%;padding:0px 10px;box-shadow:2px 1px 2px;color:white;'>acc</p>";?>&nbsp;
                                                        <a href="?page=<?php echo $data['page'];?>"><p style='background:#32CD32;border-radius:5%;padding:0px 10px;box-shadow:2px 1px 2px;color:white;'>Buatkan</p></a></td>

                                                    </tr>

                                                <?php }?>    

                                            </tbody>
                                        </table>
                                    </div>      
                                </div>

                            </div>
<div class="au-card recent-report">
    <!-- Left Panel -->
            <section class="welcome p-t-1s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-5">DATA SURAT YANG DIBUAT MANDIRI
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

                            $query = mysqli_query ($con, "SELECT * FROM tb_buatsendiri ORDER BY id DESC");
                            $no=1;
                            while ($data = mysqli_fetch_assoc($query)){
                         ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['nmsurat'];?></td>
                                            <td><?php echo $data['tgl'];?></td>
                                            <td><?php echo $data['status'];?></td>
                                            <td><a href="?page=acc&amp;id=<?php echo $data['id'];?>">acc</a></td>

                                        </tr>
    
                                     <?php }?>    

                                    </tbody>
                                </table>
                            </div>      
                        </div>
                    </div>
                            <div class="au-card recent-report"  style="box-shadow: 2px 1px 4px;">
                                <!-- Left Panel -->
                                <section class="welcome p-t-1s">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="title-5">DATA SURAT 
                                                </h1>
                                                <hr class="line-seprate">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="card ">
                                    <div class="card-body animated zoomIn" style="overflow-x: scroll;">
                                        <table id="bootstrap-data-table-export2" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Surat</th>
                                                    <th>No. Surat</th>
                                                    <th>Nama Surat</th>
                                                    <th>Tanggal</th>
                                                    <th>Opsi</th>
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
                                                    <td>
                                                        <a href="index.php?page=edit_<?php echo $data['page'];?>&kode=<?php echo $data['kode'];?>" class="btn"><i class="fa fa-edit"></i></a>
                                                        <a href="hapus/h_detailsurat.php?kode=<?php echo $data['kode'];?>" class="btn"><i class="fa fa-trash"></i></a></td>

                                                    </tr>

                                                <?php }?>    

                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>

                            <!-- jQuery 3 -->
                            <script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->


                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#bootstrap-data-table-export0').DataTable();
                                } );
                            </script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                  $('#bootstrap-data-table-export1').DataTable();
                              } );
                            </script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                  $('#bootstrap-data-table-export2').DataTable();
                              } );
                            </script>
                            <script>
                            jQuery(document).ready(function() {
                                jQuery(".standardSelect").chosen({
                                    disable_search_threshold: 50,
                                    no_results_text: "Oops, nothing found!",
                                    width: "100%"
                                });
                            });
                        </script>
                    </body>

                    </html>
