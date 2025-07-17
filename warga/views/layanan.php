<section id="main-container" class="main-container">
   <div class="container">
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
</section>
