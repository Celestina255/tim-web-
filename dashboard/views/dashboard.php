      <div class="carousel slide" id="main-slide" data-ride="carousel">
         <!-- Indicators-->
         <ol class="carousel-indicators visible-md visible-md">
            <li class="active" data-target="#main-slide" data-slide-to="0"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
         </ol>
         <!-- Indicators end-->
         <!-- Carousel inner-->
         <div class="carousel-inner">
            <?php 
            $query = mysqli_query ($con, "SELECT * FROM tb_slider ORDER BY id ASC");
            while ($r = mysqli_fetch_array($query)){
               ?>
               <div class="carousel-item <?php echo $r['class']; ?>" style="background-image:url(../img/slider/<?php echo $r['gambar'];?>);">
                  <div class="container">
                     <div class="slider-content text-left">
                        <div class="col-md-12">
                           <h3 class="slide-sub-title" style="text-shadow: 1px 1px 3px rgb(110 120 80);">"<?php echo $r['des']; ?>"</h3>
                        </div>
                        <!-- Col end-->
                     </div>
                     <!-- Slider content end-->
                  </div>
                  <!-- Container end-->
                  </div><?php } ?>
               </div>
               <!-- Carousel inner end-->
               <!-- Controllers--><a class="left carousel-control carousel-control-prev" href="#main-slide" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
               <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
            </div>
            <!-- Carousel end-->

            <section id="ts-features-light" class="ts-features-light">
               <div class="container">
                  <div class="row feature-light-row">
                     <div class="col-md-4 text-center">
                        <div class="ts-feature-box">
                           <div class="ts-feature-info">
                              <div class="feature-img">
                                 <img src="images/icon/layanan.png" alt="" style="width:80px; height: 80px;"/>
                              </div>
                              <h3 class="ts-feature-title">Layanan</h3>
                              <p>Kami siap melayani dengan sepenuh hati, bebas pungli, gratifikasi, korupsi, kolusi dan nepotisme.</p>
                              <a class="slider btn btn-primary" href="?page=layanan">Read More</a>
                           </div>
                        </div>
                        <!-- feature box-1 end-->
                     </div>
                     <!-- col-1 end-->
                     <div class="col-md-4 text-center border-left">
                        <div class="ts-feature-box">
                           <div class="ts-feature-info">
                              <div class="feature-img">
                                 <img src="images/icon/informasi.png" alt="" style="width:80px; height: 80px;" />
                              </div>
                              <h3 class="ts-feature-title">Informasi</h3>
                              <p>Berbagai informasi terbaru terkait pelayanan Desa bisa anda akses disini.</p>
                              <a class="slider btn btn-primary" href="?page=berita">Read More</a>
                           </div>
                        </div>
                        <!-- feature box-2 end-->
                     </div>
                     <!-- col-2 end-->
                     <div class="col-md-4 text-center border-left">
                        <div class="ts-feature-box">
                           <div class="ts-feature-info">
                              <div class="feature-img">
                                 <img src="images/icon/pelaporan.png" alt="" style="width:80px; height: 80px;"/>
                              </div>
                              <!--<i class="icon icon-clock3"></i>-->
                              <h3 class="ts-feature-title">Pelaporan</h3>
                              <p>Laporan kegiatan dan kinerja dapat dipertanggung jawaban, transfaran dan akuntable.</p>
                              <a class="slider btn btn-primary" href="?page=pelaporan">Read More</a>
                           </div>
                        </div>
                        <!-- feature box-2 end-->
                     </div>
                     <!-- col-3 end-->
                  </div>
               </div>
            </section>
            <!-- ts-feature light end -->

            <section  class="ts-service-area service-area-pattern" id="ts-service-area">
             <div class="service-area-bg">
               <div class="container">
                  <div class="row text-center">
                     <div class="col-md-12">
                        <h2 class="section-title">Statistik</h2>
                     </div>
                  </div>
                  <!-- Title row end-->
                  <div class="row">
                     <div class="col-lg-4 col-md-12">
                        <div class="ts-service-wrapper">
                         <div class="ts-service-box">
                           <div class="ts-service-box-img">
                              <img src="../img/icon/ktp.png" alt="" />
                           </div>
                           <?php 
                           $queryw=mysqli_query($con, "SELECT COUNT(*) AS jw FROM tb_penduduk");
                           while($rw=mysqli_fetch_array($queryw)){
                              ?>
                              <div class="ts-service-box-info">
                                 <h3 class="service-box-title"><?php echo $rw['jw']; ?> Penduduk terdaftar</h3>
                                 <p><br><br><br></p>
                              </div>
                           <?php } ?>
                        </div><!-- Service 1 end -->
                        <div class="gap-15"></div>
                        <div class="ts-service-box">
                           <div class="ts-service-box-img">
                              <img src="../img/icon/jenissurat.png " alt="" />
                           </div>
                           <?php 
                           $queryjs=mysqli_query($con, "SELECT COUNT(*) AS js FROM tb_jenissurat");
                           while($rjs=mysqli_fetch_array($queryjs)){
                              ?>
                              <div class="ts-service-box-info">
                                 <h3 class="service-box-title"><?php echo $rjs['js']; ?> Jenis surat</h3>
                                 <p><br><br><br></p>
                              </div>
                           <?php } ?>
                        </div><!-- Service 2 end -->
                        <div class="gap-15"></div>
                        <div class="ts-service-box">
                           <div class="ts-service-box-img">
                              <img src="../img/icon/jenissurat0.png" alt="" />
                           </div>
                           <?php 
                           $queryds=mysqli_query($con, "SELECT COUNT(*) AS ds FROM tb_datasurat");
                           while($rds=mysqli_fetch_array($queryds)){
                              ?>
                              <div class="ts-service-box-info">
                                 <h3 class="service-box-title"><?php echo $rds['ds']; ?> Surat dibuat</h3>
                                 <p><br><br><br></p>
                              </div>
                           <?php } ?>
                        </div><!-- Service 5 end -->
                     </div>
                  </div><!-- Col end -->
                  <div class="col-lg-4 col-md-12">
                     <span class="service-img"><img class="img-fluid" src="../img/icon/statistik.png" alt="" /></span>
                  </div>

                  <div class="col-lg-4 col-md-12">
                     <div class="ts-service-wrapper ml-lg-auto">
                      <div class="ts-service-box">
                        <div class="ts-service-box-img ">
                           <img src="../img/icon/pengunjung.png" alt="" />
                        </div>
                        <?php 
                        $querykj=mysqli_query($con, "SELECT COUNT(*) AS kj FROM tb_statistik");
                        while($rkj=mysqli_fetch_array($querykj)){
                           ?>
                           <div class="ts-service-box-info">
                              <h3 class="service-box-title"><?php echo $rkj['kj']; ?> Total Pengunjung</h3>
                              <p><br><br><br></p>
                           </div>
                        <?php } ?>
                     </div><!-- Service 4 end -->
                     <div class="gap-15"></div>
                     <div class="ts-service-box">
                        <div class="ts-service-box-img ">
                           <img src="../img/icon/hits.png" alt="" />
                        </div>
                        <?php 
                         $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                         $queryhits=mysqli_query($con, "SELECT COUNT(*) AS hitstoday FROM tb_statistik WHERE tanggal='$tanggal' GROUP BY  tanggal");
                         while($rh=mysqli_fetch_array($queryhits)){
                           ?>
                           <div class="ts-service-box-info">
                              <h3 class="service-box-title"><?php echo $rh['hitstoday']; ?> Pengunjung hari ini</h3>
                              <p><br><br><br></p>
                           </div>
                        <?php } ?>
                     </div><!-- Service 4 end -->
                     <div class="gap-15"></div>
                     <div class="ts-service-box">
                        <div class="ts-service-box-img ">
                           <img src="../img/icon/totalhits.png" alt="" />
                        </div>
                        <?php 
                         $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                         $queryhits=mysqli_query($con, "SELECT SUM(hits) AS hitstoday FROM tb_statistik WHERE tanggal='$tanggal' GROUP BY  tanggal");
                         while($rh=mysqli_fetch_array($queryhits)){
                           ?>
                           <div class="ts-service-box-info">
                              <h3 class="service-box-title"><?php echo $rh['hitstoday']; ?> Total Hits hari ini</h3>
                              <p><br><br><br></p>
                           </div>
                        <?php } ?>
                     </div><!-- Service 4 end -->
                  </div>
               </div><!-- Col end -->
            </div><!-- Content row end -->
            <!-- Content row end-->
         </div>
         <!-- Container end-->
      </div>
   </section>
   <!-- Service Section end-->
   
   <section class="news" id="news">
      <div class="container">
         <div class="row text-center">
            <div class="col-md-12">
               <h2 class="section-title">Berita Desa Terbaru</h2>
            </div>
         </div>
         <div class="row ">
            <div class="col-lg-6 ">
               <div class="latest-post post-large">
                  <div class="latest-post-media">
                     <?php 
                     $query = mysqli_query ($con, "SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.id_kategori=tb_berita.kategori ORDER BY tb_berita.id_berita DESC LIMIT 1");
                     while($r=mysqli_fetch_array($query)){
                        ?> 

                        <a class="latest-post-img" href="../img/berita/<?php echo $r['gambar'];?>">
                           <img class="img-fluid" src="../img/berita/<?php echo $r['gambar'];?>" alt="img">
                        </a>

                        <div class="post-body">
                           <a class="post-cat" href="#">News</a>
                           <h4 class="post-title"><a href="?page=detail_berita&slug=<?php echo $r['slug'];?>"><?php echo $r['judul'];?></a></h4>
                           <span class="post-item-date"><?php echo $r['tgl_posting'];?></span>
                           <a class="btn btn-primary" href="?page=detail_berita&slug=<?php echo $r['slug'];?>">Read More</a>
                        </div>
                        <!-- Post body end--><?php } ?>
                     </div>

                     <!-- Post media end-->
                  </div>
                  <!-- Latest post end-->
               </div>
               <!-- Col big news end-->
               <div class="col-lg-6 ">
                  <div class="row">
                     <?php 
                     $query = mysqli_query ($con, "SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.id_kategori=tb_berita.kategori ORDER BY tb_berita.id_berita DESC LIMIT 2");
                     while($rr=mysqli_fetch_array($query)){
                        ?> 
                        <div class="col-lg-6 col-md-6">
                           <div class="latest-post">
                              <div class="post-body"><a class="post-cat" href="#">News</a>
                                 <h4 class="post-title"><a href="?page=detail_berita&slug=<?php echo $rr['slug'];?>"><?php echo $rr['judul'];?></a></h4><span class="post-item-date"><?php echo $rr['tgl_posting'];?></span>
                                 <div class="post-text">
                                    <p><?php echo substr($rr['isi'], 0,100);?></p>
                                    <div class="text-left"><a class="btn btn-primary" href="?page=detail_berita&slug=<?php echo $rr['slug'];?>">Read More</a></div>
                                 </div>
                              </div>
                           </div>
                           <!-- Latest post end-->
                        </div>
                     <?php } ?>
                     <!-- Col end-->

                  </div>
                  <!-- row end-->
               </div>
               <!-- Col small news end-->
            </div>
            <!-- Content row end-->
         </div>
         <!-- Container end-->
      </section>
      <!-- News end-->

      <section class="ts-services solid-bg" id="ts-services">
         <div class="container">
            <!-- Title row end-->
            <div class="row text-center">
               <div class="col-md-12">
                  <h2 class="section-title">Pelayanan Admnistrasi</h2>
               </div>
            </div>
            <div class="row">
               <?php 
               $query =mysqli_query($con, "SELECT * FROM tb_jenissurat ORDER BY id ASC LIMIT 12");
               while($r=mysqli_fetch_array($query)){
                  ?>

                  <div class="col-lg-3 col-md-12" style="padding: 20px 10px 0px;">
                     <div class="ts-service-box">
                        <div class="ts-service-image-wrapper">
                           <img class="img-fluid" src="../img/file.png" alt="" style="align-items: center; padding:10% 20% 0%;">
                        </div>
                        <div class="ts-service-content">
                           <h4 class="service-title"><?php echo substr($r['nmsurat'],5,35); ?></h4>
                           <p><?php echo substr($r['keterangan'],0,50); ?></p>
                           <p><a class="link-more" href="?page=keterangan">Read More <i class="icon icon-right-arrow2"></i></a></p>
                        </div>
                     </div>
                     <!-- Service1 end-->
                  </div>
               <?php } ?>
               <!-- Col 1 end-->
            </div>
         </div>
         <!-- Container end-->
      </section>
      <!-- Service end-->
      
      <section class="testimonial-area" id="testimonial-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="accordion-title">
                     <h3 class="column-title"><span>Our FAQ <small>(Frequently Asked Questions)</small></span> Pertanyaan yang sering ditanyakan</h3>
                  </div>
                  <div id="accordion" class="accordion-area">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h5 class="mb-0">
                              <a href="#" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Bagaimana cara mengajukan permohonan surat secara online ?
                              </a>
                           </h5>
                        </div>
                        <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
                           <div class="card-body">
                              <p>Warga hanya tinggal memastikan sudah terdaftar di Web Pelayanan Administrasi desa ini kemudian membuat akun dan login melalui menu yang tersedia dengan username dan passwordnya.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingThree">
                           <h5 class="mb-0">
                              <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Bagaimana jika ingin membuat/mengisi dan mencetak surat secara mandiri ?
                              </a>
                           </h5>
                        </div>
                        <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
                           <div class="card-body">
                              <p>Setelah terdaftar di Web Pelayanan Administrasi Desa, warga dapat memilih menu pelayanan kemudian klik buat surat mandiri dilanjtkan dengan memilih nama surat yang diinginkan.</p>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingFour">
                           <h5 class="mb-0">
                              <a href="#" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 Bagaimana jika data diri belum terdaftar di Web Pelayanan Administrasi ini ?
                              </a>
                           </h5>
                        </div>
                        <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion">
                           <div class="card-body">
                              <p>Silahkan hubungi Administrator atau staff Desa/Keluarahan yang mengelolan Web Pelayanan Administrasi ini.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Accordion end -->
               </div>
               <!-- Col end-->
               <div class="col-lg-6 testimonial-client">
                  <h2 class="column-title "><span>Apa kata mereka</span>  Testimoni pengguna</h2>
                  <div class="owl-carousel owl-theme testimonial-slide owl-dark" id="testimonial-slide">
<?php
                     $bct="SELECT * FROM tb_testimoni WHERE status='Publish' ORDER BY id DESC LIMIT 5";
                     $hasil=mysqli_query($con,$bct);
                     $no=0;
                     while ($rt = mysqli_fetch_array($hasil)) {
                        ?>
                        <div class="item">

                           <div class="quote-item quote-square"><span class="quote-text"><?php echo $rt['testimoni']; ?></span>
                              <div class="quote-item-footer">
                                 <img class="testimonial-thumb" src="../file/foto/no_pic.png" alt="testimonial">
                                 <div class="quote-item-info">
                                    <p class="quote-author"><?php echo $rt['nama']; ?></p><span class="quote-subtext"><?php echo $rt['telp']; ?></span>
                                 </div>
                              </div>
                           </div>
                        <!-- Quote item end-->
                     </div><?php } ?>
                     <!-- Item 1 end-->
                  </div>
                  <!-- Testimonial carousel end-->
               </div>
               <!-- Col end-->
            </div>
            <!-- Content row end-->
         </div>
         <!-- Container end-->
      </section>
      <!-- Quote area end-->


      <section class="quote-area solid-bg" id="quote-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-5">
                  <div class="quote_form">
                     <div class="col-md-12">
                        <h2 class="column-title ">Silahkan datang pada hari dan jam kerja</h2>
                        <div class="quote-img" align="center">
                           <img class="img-fluid" src="../img/icon/kantor.png" alt="img" style="padding: 0px 40px 0px; width: 60%;">
                        </div>
                     </div>
                     <br>

                     <div class="col-md-12">
                        <h3>
                           <table cellpadding="4" cellspacing="5" border="0" width="100%" rules="rows">
                              <tr>
                                 <td>Hari</td><td>&nbsp;&nbsp;Jam/Waktu</td>
                              </tr>
                              <tr>
                                 <td>Senin - Jum'at</td><td>: 08.00 - 15.30 WIB</td>
                              </tr>
                              <tr>
                                 <td>Sabtu</td><td>: 08.00 - 12.00 WIB</td>
                              </tr>
                              <tr>
                                 <td><span style="color: red;">Minggu</span></td><td>: <span style="color: red;">Libur</span></td>
                              </tr>
                              <tr>
                                 <td colspan="2"></td>
                              </tr>
                           </table>
                        </h3>

                        <!-- Quote form end-->
                     </div>
                  </div>
               </div>
               <hr>
               <!-- Col end-->
               <div class="col-lg-7 qutoe-form-inner-le">
                  <form action="../aksi/s_testimoni_d.php"  method="POST">
                     <h2 class="column-title"><span>Berikan testimoni kamu disini</span> Testimoni   </h2>
                     <div class="error-container"></div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <input class="form-control form-name" id="nama" name="nama" placeholder="Nama lengkap" type="text" required="">
                           </div>
                        </div>
                        <!-- Col end-->
                        <div class="col-lg-12">
                           <div class="form-group">
                              <input class="form-control form-email" id="telp" name="telp" placeholder="No. Telp/Hp." type="text" required="">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <textarea class="form-control form-message required-field" id="testimoni" name="testimoni" placeholder="Tinggalkan testimoni kamu disini" rows="8"></textarea>
                           </div>
                        </div>
                        <!-- Col 12 end-->
                     </div>
                     <!-- Form row end-->
                     <div class="text-right">
                        <button class="btn btn-primary tw-mt-30" type="submit" id="simpan" name="simpan">Kirim Testimoni</button>
                     </div>
                  </form>
                  <!-- Form end-->
               </div>
               <!-- Col end-->
            </div>
            <!-- Content row end-->
         </div>
         <!-- Container end-->
      </section>
      <!-- Quote area end-->
      <section id="ts-facts-area" class="ts-facts-area-bg bg-overlay">
         <div class="container">
            <div class="row ">
               <div class="col-lg-12 col-md-12">
                  <div class="container">
                     <div class="row text-center">
                        <div class="col-lg-3 col-md-3">
                           <div class="ts-facts-bg">
                              <img src="../img/icon/penduduk.png" alt="" style="width:100px;" />
                              <?php 
                              $queryw=mysqli_query($con, "SELECT COUNT(*) AS jw FROM tb_penduduk");
                              while($rw=mysqli_fetch_array($queryw)){
                                 ?>
                                 <div class="ts-facts-content">
                                    <h4 class="ts-facts-num"><span class="counterUp"><?php echo $rw['jw']; ?></span></h4>
                                    <p class="facts-desc">Penduduk</p>
                                    </div><?php } ?>
                                 </div>
                                 <!-- Facts 1 end-->
                              </div>
                              <!-- Col 1 end-->
                              <div class="col-lg-3 col-md-3">
                                 <div class="ts-facts-bg">
                                    <img src="../img/icon/surat.png" alt="" style="width:70px;"/>
                                    <?php 
                                    $queryas=mysqli_query($con, "SELECT COUNT(*) AS jas FROM tb_datasurat");
                                    while($ras=mysqli_fetch_array($queryas)){
                                       ?>
                                       <div class="ts-facts-content">
                                          <h4 class="ts-facts-num"><span class="counterUp"><?php echo $ras['jas']; ?></span></h4>
                                          <p class="facts-desc">Arsip Surat</p>
                                          </div><?php } ?>
                                       </div>
                                       <!-- Facts 2 end-->
                                    </div>
                                    <!-- Col 2 end-->
                                    <div class="col-lg-3 col-md-3">
                                       <div class="ts-facts-bg">
                                          <img src="../img/icon/permohonan.png" alt="" style="width:70px;"/>
                                          <?php 
                                          $querysp=mysqli_query($con, "SELECT COUNT(*) AS sp FROM tb_permohonan WHERE status='acc'");
                                          while($rsp=mysqli_fetch_array($querysp)){
                                           ?>
                                           <div class="ts-facts-content">
                                             <h4 class="ts-facts-num"><span class="counterUp"><?php echo $rsp['sp']; ?></span></h4>
                                             <p class="facts-desc">Permohonan</p>
                                             </div><?php } ?>
                                          </div>
                                          <!-- Facts 3 end-->
                                       </div>
                                       <!-- Col 3 end-->
                                       <div class="col-lg-3 col-md-3">
                                          <div class="ts-facts-bg">
                                             <img src="../img/icon/suratmandiri.png" alt="" style="width:70px;"/>
                                             <?php 
                                             $querybs=mysqli_query($con, "SELECT COUNT(*) AS bs FROM tb_buatsendiri WHERE status='acc'");
                                             while($rbs=mysqli_fetch_array($querybs)){
                                              ?>
                                              <div class="ts-facts-content">
                                                <h4 class="ts-facts-num"><span class="counterUp"><?php echo $rbs['bs']; ?></span></h4>
                                                <p class="facts-desc">Surat Mandiri</p>
                                                </div><?php } ?>
                                             </div>
                                             <!-- Facts 3 end-->
                                          </div>
                                          <!-- En Col 4 -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- Row end-->
                           </div>
                           <!-- Container 2 end-->
                        </section>
                        <!-- Facts Area End -->


                        <section class="clients-area " id="clients-area">
                           <div class="container">
                              <div class="row">
                                 <div class="col-sm-12 owl-carousel owl-theme text-center partners" id="partners-carousel">
                                    <figure class="item partner-logo">
                                       <a href="https://www.bpk.go.id" target="_BLANK">
                                          <img class="img-fluid" src="../img/icon/bpk.png" alt="">
                                       </a>
                                    </figure>
                                    <figure class="item partner-logo">
                                       <a href="https://www.kemendagri.go.id">
                                          <img class="img-fluid" src="../img/icon/kemendagri.png" alt="">
                                       </a>
                                    </figure>
                                    <figure class="item partner-logo">
                                       <a href="https://www.kemendesa.go.id">
                                          <img class="img-fluid" src="../img/icon/kemendesa.png" alt="">
                                       </a>
                                    </figure>
                                    <figure class="item partner-logo">
                                       <a href="#">
                                        <img class="img-fluid" src="../img/icon/bpd.png" alt="">
                                     </a>
                                  </figure>
                                  <figure class="item partner-logo">
                                    <a href="#">
                                     <img class="img-fluid" src="../img/icon/lpm.png" alt="">
                                  </a>
                               </figure>
                               <figure class="item partner-logo last">
                                 <a href="#">
                                  <img class="img-fluid" src="../img/icon/pkk.png" alt="">
                               </a>
                            </figure>
                            <figure class="item partner-logo last">
                              <a href="#">
                               <img class="img-fluid" src="../img/icon/linmas.png" alt="">
                            </a>
                         </figure>
                         <figure class="item partner-logo last">
                           <a href="#">
                            <img class="img-fluid" src="../img/icon/posyandu.png" alt="">
                         </a>
                      </figure>
                      <figure class="item partner-logo last">
                        <a href="#">
                         <img class="img-fluid" src="../img/icon/karangtaruna.png" alt="">
                      </a>
                   </figure>
                </div>
                <!-- Owl carousel end-->
             </div>
             <!-- Content row end-->
          </div>
          <!-- Container end-->
       </section>
       <!-- Partners end-->

       <section id="call-to-action" class="call-to-action-bg ">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 align-self-center">
                  <h3 class="call-to-action-title">Informasi dan Pertanyaan</h3>
                  <p>
                    Kami akan melayani anda dengan baik
                 </p>
              </div>
              <div class="col-lg-4 text-right">
               <a class="btn btn-box" href="https://api.whatsapp.com/send?phone=6283824344430" target="_BLANK">Hubungi kami <br/>atau Chat +62 (838) 2434 4430</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Call to action end -->
