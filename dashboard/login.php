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
                     <div class="col-lg-6">
                         <h3 class="column-title">Hubungi kami</h3>
                         <p class="contact-content">	Silahkan hubungi kami jika ada hal - hal yang ingin ditanyakan lebih lanjut atau bisa datang langsung ke kantor desa pada hari dan jam kerja.</p>
                        <div class="contact-info-box contact-box info-box ">
                           <div class="contact-info">
                              <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-map-marker2"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Alamat Sekretariat</h3>
                                 <p><?php echo $r['kantor']; ?></p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                              <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-phone3"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Telp/Hp.</h3>
                                    <p><?php echo $r['telp']; ?></p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                              <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i class="icon icon-envelope"></i></span>
                                 <div class="ts-contact-content">
                                    <h3 class="ts-contact-title">Alamat E-mail</h3>
                                 <p><?php echo $r['email']; ?></p>
                                 </div>
                                 <!-- Contact content end-->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Contact info end -->
                     <div class="col-lg-6">
                         <h3 class="column-title">Login</h3>
                        <div class="contact-submit-box contact-box form-box">
                           <form class="contact-form" id="" action="login_act.php" method="POST">
                              <div class="error-container"></div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="form-control form-name" id="uname" name="uname" placeholder="User Name" type="text" required="">
                                    </div>
                                 </div>
                                 
                                 <!-- Col end-->
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <input class="form-control form-website" id="pass" name="pass" placeholder="******" type="password" required="">
                                    </div>
                                 </div>
                                 <!-- Col 12 end-->
                              </div>
                              <!-- Form row end-->
                              Daftar klik&nbsp; <a href="?page=registrasi" class="tw-mt-30" type="button"> disini,</a>
                              / Lupa Password klik&nbsp;<a href="?page=forgot" class="tw-mt-30" type="button"> disini </a>
                              <button class="btn btn-success tw-mt-30 pull pull-right" type="submit"><i class="fa fa-paper-plane-o"></i> Login</button>
                              
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
