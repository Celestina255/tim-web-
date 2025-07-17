      <div class="banner-area" id="banner-area" style="background-image:url(../dashboard/images/banner/peta.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title">Peta Desa / Kelurahan</h1>
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
                  <div class="col-lg-6 about-desc" align="center">
                     <?php 
                  $query = mysqli_query ($con, "SELECT * FROM tb_profile LIMIT 1");
                  while($r=mysqli_fetch_array($query)){
                     ?>
                     <iframe src="<?php echo $r['peta']; ?>" width="90%" height="380"  style="box-shadow: 1px 2px 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  
                     </div>
                     <!-- Col end-->
                     <div class="col-lg-6 text-md-center mt-40">
                        <img class="img-fluid" src="../dashboard/images/pages/<?php echo $r['gambar_peta']; ?>" alt="" style="box-shadow: 1px 2px 5px;">
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
         