<section id="main-container" class="main-container">
   <div class="container">
      <div class="row text-center">
         <div class="col-md-12">
            <h2 class="section-title">GALERI DESA</h2>
            <h5 class="section-sub-title">Menampilkan kegiatan-kegiatan yang berlangsung di desa</h5>
         </div>
      </div>
      <div class="row">

         <style>
         .btn-green {
            background-color: #006633;
            color: #fff;
            border: none;
         }
         .btn-green:hover {
            background-color: #004d26;
            color: #fff;
         }
         .gallery-img img {
            width: 100%;
            max-width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.2);
         }
         .gap-30 {
            margin-bottom: 30px;
         }
         </style>

         <?php 
         $query = mysqli_query ($con, "SELECT * FROM tb_galeri ORDER BY id ASC");
         while ($r = mysqli_fetch_array($query)){
            $thumbnail = "../img/galeri/kecil_" . $r['foto'];
            $original  = "../img/galeri/" . $r['foto'];
            $src = file_exists($thumbnail) ? $thumbnail : $original;
         ?>
         <div class="col-lg-3 col-md-6">
            <div class="gallery-img">
               <a class="gallery-popup" href="<?php echo $original; ?>">
                  <img class="img-fluid" src="<?php echo $src; ?>" alt="<?php echo $r['nama']; ?>">
                  <span class="gallery-icon"><i class="fa fa-search"></i></span>
               </a>
            </div>
            <div class="gap-30"></div>
         </div>
         <?php } ?>

      </div><!--/ Content row 1 end -->
      <div class="text-center">
         <a href="?page=home" class="btn btn-green">← Kembali ke Beranda</a>
      </div>
   </div><!--/ Container end -->
</section><!-- Main container end -->
