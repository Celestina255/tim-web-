      
      <section id="main-container" class="main-container">
         <div class="container">
            <div class="row text-center">
               <div class="col-md-12">
                  <h2 class="section-title">GALERI KAMPUNG</h2>
               </div>
            </div>
           <div class="row">
  <?php 
  $query = mysqli_query($con, "SELECT * FROM tb_galeri ORDER BY id ASC");
  while ($r = mysqli_fetch_array($query)) {
  ?>
  <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
    <div class="gallery-img position-relative w-100">
      <a class="gallery-popup d-block" href="../img/galeri/<?php echo $r['foto']; ?>">
        <img class="img-fluid w-100 rounded shadow-sm" 
             src="../img/galeri/kecil_<?php echo $r['foto']; ?>" 
             alt="Foto Galeri" 
             style="height: 220px; object-fit: cover; box-shadow: 1px 2px 4px;">
        <span class="gallery-icon position-absolute top-50 start-50 translate-middle text-white fs-4">
          <i class="fa fa-search"></i>
        </span>
      </a>
    </div>
  </div>
  <?php } ?>
</div>
           
            <!--  item 1 end -->
         </div><!--/ Content row 1 end -->
         </div><!--/ Container end -->
      </section><!-- Main container end -->
      
