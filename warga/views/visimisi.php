      <div class="banner-area" id="banner-area" style="background-image:url(../dashboard/images/banner/visimisi.jpg);">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="banner-heading">
                     <h1 class="banner-title">Visi & Misi</h1>
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
                     <h2 class="column-title"><span>Visi & Misi</span>Desa / Kelurahan</h2>
                     <?php 
                  $query = mysqli_query ($con, "SELECT * FROM tb_profile LIMIT 1");
                  while($r=mysqli_fetch_array($query)){
                     $m = explode(';', $r['misi']);
                     ?>
                     <p class="bold-text" style="justify-content-center:justify; text-align: justify;">
                        <h3><u>V I S I  :</u></h3>
                        <h4><i>"<?php echo $r['visi']; ?>"</i></h4>
                        <hr>
                        <h3><u>M I S I  :</u></h3>
                        <?php 
                        for ($i=1; $i < 10; $i++) { 
                           // code...
                        ?>
                        <ol>
                           <p style="justify-content-center:justify; text-align: justify;">
                         <?php echo $i; ?>. <?php echo $m[$i]; ?>;
                      </p>
                        </ol><?php } ?>
                     </p>
                  

                  </div>
                  <!-- Col end-->
                  <div class="col-lg-6 text-md-center mrt-40">
                     <img class="img-fluid" src="../dashboard/images/pages/<?php echo $r['gambar_visi']; ?>" alt="">
                  </div>
                  <?php }  ?>
                  <!-- Col end-->
               </div>
               <!-- Main row end-->
            </div>
            <!-- Container 1 end-->
         </div>
         <!-- About pattern End-->
      </section>
      