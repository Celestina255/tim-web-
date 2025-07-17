   <section class="main-container contact-area" id="main-container">
      <div class="gap-10"></div>
      <div class="ts-form form-boxed" id="ts-form">
         <div class="container">
            <div class="row">
               <div class="contact-wrapper full-contact">
                  <div class="col-lg-6">
                     <h3 class="column-title">Layanan Permohonan Administrasi Surat Menyurat Online</h3>
                     <p class="contact-content">	Siapkan persyaratan dan pastikan NIK kamu terdaftar untuk melanjutkan membuat surat secara mandiri.</p>
                     <div class="contact-info-box contact-box info-box ">
                        <div class="contact-info">
                           <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-map-marker2"></i></span>
                              <div class="ts-contact-content">
                                 <h3 class="ts-contact-title">Alamat Sekretariat</h3>
                                 <p>Jl. Pemuda No. 70, Dagelan, Way Asalan, 35555</p>
                              </div>
                              <!-- Contact content end-->
                           </div>
                           <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-phone3"></i></span>
                              <div class="ts-contact-content">
                                 <h3 class="ts-contact-title">Telp/Hp.</h3>
                                 <p>+62 (822) 7818 3799</p>
                              </div>
                              <!-- Contact content end-->
                           </div>
                           <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i class="icon icon-envelope"></i></span>
                              <div class="ts-contact-content">
                                 <h3 class="ts-contact-title">Alamat E-mail</h3>
                                 <p>desadagelan@gmail.com.com</p>
                              </div>
                              <!-- Contact content end-->
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Contact info end -->

                  <div class="col-lg-6">
                   <h3 class="column-title">Silahkan Pilih Nama Surat yang akan kamu buat</h3>
                   <div class="contact-submit-box contact-box form-box" style="padding: 45px 45px; box-shadow: 1px 2px 4px;">
                     <form class="contact-form" id="" action="" method="">
                        <div class="error-container"></div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <select class="form-control form-name" name="page" id="page" onchange="this.form.submit()" class="form-control" style="font-size: 18px; border: 1;">
                                    <option value="" selected>-- Pilih Nama Surat--</option>
                                    <?php 
                                    $qry = $con->query("SELECT * FROM tb_jenissurat WHERE kategori!='Tata Usaha' ORDER BY id ASC");
                                    while($data = $qry->fetch_assoc()){?>
                                      <option value="<?= $data['page'];?>" 
                                         <?php
                                        // Selected option
                                         if($_POST['page'] == $data['page']){
                                           echo "selected";
                                        }
                                        // Selected option
                                     ?>><?= $data['nmsurat'];?></option>
                                  <?php } ?>
                               </select>
                            </div>
                         </div>
                     </form>
                     <!-- Form end-->
                  </div>
               </div>
               <!-- Contact form end -->
            </div>
         </div>
      </div>
   </div>
</section>