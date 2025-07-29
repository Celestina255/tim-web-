<section class="main-container contact-area" id="main-container">
   <div class="gap-10"></div>
   <div class="ts-form form-boxed" id="ts-form">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-6">
               <h3 class="column-title text-center">Kirim Pesan</h3>
               <div class="contact-submit-box contact-box form-box">
                  <form class="contact-form" action="../aksi/s_pesan_dashboard.php" method="POST">
                     <div class="error-container"></div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <input class="form-control form-name" name="name" placeholder="Nama lengkap" type="text" required="">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <input class="form-control form-email" name="telp" placeholder="No. Telp/Hp." type="text" required="">
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="form-group">
                              <textarea class="form-control form-message required-field" name="message" placeholder="Pesan" rows="6" required></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="text-center">
                        <button class="btn btn-danger tw-mt-30" type="submit" name="pesan">
                           <i class="fa fa-paper-plane-o"></i> Kirim Pesan
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
