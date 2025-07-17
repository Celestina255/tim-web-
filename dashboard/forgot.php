      <section class="main-container contact-area" id="main-container">
         <div class="gap-10"></div>
         <div class="ts-form form-boxed" id="ts-form">
            <div class="container">
               <?php 
               $query = mysqli_query ($con, "SELECT * FROM tb_kelurahan LIMIT 1");
               while ($r = mysqli_fetch_array($query)){
               ?>
               <div class="row">
                  <div class="contact-wrapper full-contact">
                     <!-- Contact info end -->
                     <div class="col-lg-12">
                         <h3 class="column-title" align="center">Lupa Password</h3>
                         <p class="label" align="center">Masukan e-mail yang terdaftar untuk mendapatkan token untuk membuat password baru</p>
                        <div class="contact-submit-box contact-box form-box" align="center">
                           <form class="contact-form" id="" action="reset_pass.php" method="POST">
                              <div class="error-container"></div>
                              <div class="row" align="center">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="col-lg-6 form-control form-name" id="email" name="email" placeholder="Masuk email untuk memulihkan Password" type="email" required="">
                                    </div>
                                 </div>
                                 <!-- Col 12 end-->
                              </div>
                              <!-- Form row end-->
                              <button class="btn btn-danger tw-mt-30 center" type="submit" name="reset"><i class="fa fa-key"></i> Minta Kode/Token untuk membuat Password Baru</button>
                              
                           </form>
                           <!-- Form end-->
                        </div>
                     </div>
                     <!-- Contact form end -->
                  </div>
               </div>
            <?php } ?>
            </div>
         </div>
      </section>
