      <div class="banner-area" id="banner-area" style="background-image:url(../dashboard/images/banner/struktur.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title">Struktur Organisasi</h1>

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
                  <div class="col-lg-12 about-desc" align="center">
                     <h2 class="column-title text-center"><span>Struktur</span>Desa / Kelurahan</h2>
                     <p class="bold-text" style="justify-content-center:center; text-align: justify;"></p>
                     <?php 
                  $query = mysqli_query ($con, "SELECT * FROM tb_profile LIMIT 1");
                  while($r=mysqli_fetch_array($query)){
                     ?>
                     <img class="img-fluid text-center" src="../dashboard/images/pages/<?php echo $r['gambar_struktur']; ?>" style="justify-content-center:center; align-items: center;" alt="">
                  <?php } ?>
                  </div>
                  <!-- Col end-->
               </div>
               <!-- Main row end-->
            </div>
            <!-- Container 1 end-->
         </div>
         <!-- About pattern End-->
      </section>
      