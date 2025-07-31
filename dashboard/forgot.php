<section class="main-container contact-area" id="main-container">
   <div class="gap-10"></div>
   <div class="ts-form form-boxed" id="ts-form">
      <div class="container">
         <?php 
         include "../koneksi.php";
         $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
         while ($r = mysqli_fetch_array($query)){
         ?>
         <div class="row">
            <div class="contact-wrapper full-contact">
               <!-- Contact info end -->
               <div class="col-lg-12">
                   <h3 class="column-title" align="center">Lupa Password</h3>
                   <p class="label" align="center">
                     Masukkan <strong>Email</strong> yang terdaftar untuk mendapatkan token reset password
                   </p>
                  <div class="contact-submit-box contact-box form-box" align="center">
                     <form class="contact-form" action="reset_pass.php" method="POST">
                        <div class="row" align="center">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input class="col-lg-6 form-control form-name" name="email_or_hp" placeholder="Masukkan Email yang terdaftar" type="text" required>
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-danger tw-mt-30 center" type="submit" name="reset">
                           <i class="fa fa-key"></i> Minta Kode/Token untuk membuat Password Baru
                        </button>
                     </form>
                  </div>
               </div>
               <!-- Contact form end -->
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</section>
