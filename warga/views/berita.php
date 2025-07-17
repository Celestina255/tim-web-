      <section class="main-container" id="main-container">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <?php 
                  $query = mysqli_query ($con, "SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.id_kategori=tb_berita.kategori ORDER BY tb_berita.id_berita DESC LIMIT 6");
                  while($r=mysqli_fetch_array($query)){
                     ?>

                     <div class="post news-post">
                        <div class="post-media post-image">
                           <img class="img-fluid" src="../img/berita/<?php echo $r['gambar'];?>" alt="">
                        </div>
                        <div class="post-body clearfix">
                           <!-- Post meta left-->
                           <div class="post-content">
                              <div class="entry-header">
                                 <div class="post-meta"><span class="post-cat"><i class="icon icon-folder"></i><a href="#"> <?php echo $r['kategori'];?></a></span>
                                    <span class="post-tag"><i class="icon icon-tag"></i><a href="#"> <?php echo $r['tgl_posting'];?></a></span>
                                 </div>
                                 <h2 class="entry-title"><a href="?page=detail_berita&slug=<?php echo $r['slug'];?>"><?php echo $r['judul'];?></a></h2>
                              </div>
                              <!-- header end-->
                              <div class="entry-content">
                                 <p><?php echo substr($r['isi'], 0, 300) ;?>..
                                 </p>
                              </div>
                              <div class="post-footer "><a class="btn btn-primary" href="?page=detail_berita&slug=<?php echo $r['slug'];?>">Read More ...</a></div>
                           </div>
                           <!-- Post content right-->
                        </div>
                        <!-- post-body end-->
                     </div>
                  <?php } ?>
               </div>


               <!-- Content Col end-->
               <div class="col-lg-4">
                  <div class="sidebar sidebar-right">
                     <div class="widget widget-search">
                        <div class="input-group" id="search">
                           <input class="form-control" placeholder="Search" type="search"><span class="input-group-btn"><i class="fa fa-search"></i></span>
                        </div>
                     </div>
                     <div class="widget recent-posts">
                        <h3 class="widget-title">Popular Posts</h3>
                        <ul class="unstyled clearfix">
                           <?php 
                           $query2 = mysqli_query ($con, "SELECT * FROM tb_berita JOIN tb_kategori ON tb_kategori.id_kategori=tb_berita.kategori JOIN tb_admin ON tb_admin.id=tb_berita.user ORDER BY tb_berita.id_berita DESC LIMIT 6");
                           while($rr=mysqli_fetch_array($query2)){
                              ?>
                              <li class="media">
                                 <div class="media-left media-middle">
                                    <img alt="img" src="../img/berita/kecil_<?php echo $rr['gambar'];?>">
                                 </div>
                                 <div class="media-body media-middle"><span class="post-date"><i class="icon icon-calendar-full"></i><a href="#"> <?php echo $rr['tgl_posting'];?></a></span>
                                    <h4 class="entry-title"><a href="?page=detail_berita&slug=<?php echo $rr['slug'];?>"><?php echo $rr['judul'];?></a>
                                       <small>by : <b><?php echo $rr['uname'];?></b></small>
                                    </h4>
                                 </div>
                                 <div class="clearfix"></div>
                              </li>
                           <?php } ?>
                        </ul>
                     </div>
                     <!-- Recent post end-->
                  </div>
                  <!-- Sidebar end-->
               </div>
               <!-- Sidebar Col end-->
            </div>
            <!-- Main row end-->
         </div>
         <!-- Container end-->
      </section>
