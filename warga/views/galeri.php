      <section id="main-container" class="main-container">
         <div class="container">
            <div class="row text-center">
               <div class="col-md-12">
                  <h2 class="section-title">Our Gallery</h2>
               </div>
            </div>
            <div class="row">
             <?php 
             $query = mysqli_query ($con, "SELECT * FROM tb_galeri ORDER BY id ASC");
             while ($r = mysqli_fetch_array($query)){
               ?>
               <div class="col-lg-3 col-md-6">
                  <div class="gallery-img">
                     <a class="gallery-popup" href="../img/galeri/<?php echo $r['foto']; ?>">
                        <img class="img-fluid" src="../img/galeri/kecil_<?php echo $r['foto']; ?>" alt="" style="width: 350px; box-shadow: 1px 2px 4px;">
                        <span class="gallery-icon"><i class="fa fa-search"></i></span>
                     </a>
                  </div>
                     <div class="gap-30"></div>
               </div>
            <?php } ?>
            <!--  item 1 end -->
         </div><!--/ Content row 1 end -->

      </div><!--/ Container end -->
   </section><!-- Main container end -->
