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
                         <h3 class="column-title" align="center">Buat Password Baru</h3>

                        <div class="contact-submit-box contact-box form-box" align="center">
                           <form class="contact-form" id="" action="reset_pass.php" method="POST">
                              <div class="error-container"></div>
                              <div class="row" align="center">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="col-lg-6 form-control form-name" id="pass1" name="pass1" placeholder="Masuk Password baru" type="password" required="">
                                    </div>
                                    <div class="form-group">
                                       <input class="col-lg-6 form-control form-name" id="pass2" name="pass2" placeholder="Ulangi Password baru" type="password" required="">
                                    </div>
                                 </div>
                                 <!-- Col 12 end-->
                              </div>
                              <!-- Form row end-->
                              <button class="btn btn-danger tw-mt-30 center" type="submit" name="ubah"><i class="fa fa-key"></i> Ubah Password</button>
                              
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
