      <div class="banner-area" id="banner-area" style="background-image:url(../dashboard/images/banner/sejarah.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title">Sejarah Desa / Kelurahan</h1>
                  </div>
               </div>
               <!-- Col end-->
            </div>
            <!-- Row end-->
         </div>
         <!-- Container end-->
      </div>
      <!-- Banner area end-->
      <section class="main-container no-padding" id="main-container">

         <div class="about-pattern">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 about-desc">
                  <?php 
                  $query = mysqli_query ($con, "SELECT * FROM tb_profile LIMIT 1");
                  while($r=mysqli_fetch_array($query)){
                     ?>
                     <h2 class="column-title"><span>Sejarah</span>Desa/Kelurahan</h2>
                     <p class="bold-text" style="justify-content-center:center; text-align: justify;">
                        <?php echo $r['sejarah']; ?>.
                  </p>
   
                  <a href="index.php?page=warga" class="top-right-btn btn btn-primary">Home</a>
               </div>
               <!-- Col end-->
               <div class="col-lg-6 text-md-center mrt-40">
                  <br><br>
                  <img class="img-fluid" src="../dashboard/images/pages/<?php echo $r['gambar_sejarah']; ?>" alt="">
               </div>
                <?php } ?>
               <!-- Col end-->
            </div>
            <!-- Main row end-->
         </div>
         <!-- Container 1 end-->
      </div>
      <!-- About pattern End-->
   </section>
   