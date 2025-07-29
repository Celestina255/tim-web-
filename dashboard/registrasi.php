<section class="main-container login-wrapper" id="main-container">
   <div class="gap-10"></div>
   <div class="ts-form form-boxed" id="ts-form">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
               <div class="login-box">
                  <h3 class="login-title text-center mb-4">Mendaftar sebagai user</h3>
                  <form class="contact-form" action="aksi/s_registrasi.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="uname">Nama User :</label>
                        <input type="text" name="uname" id="uname" class="form-control" placeholder="Masukkan nama pengguna" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Alamat E-mail :</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="contoh@mail.com" required>
                     </div>
                     <div class="form-group">
                        <label for="hp">No. Telp/HP :</label>
                        <input type="text" name="hp" id="hp" class="form-control" placeholder="08xxxx" required>
                     </div>
                     <div class="form-group">
                        <label for="kelurahan">Nama Desa/Kelurahan :</label>
                        <input type="text" name="kelurahan" id="kelurahan" class="form-control" placeholder="Contoh: Banjar Ausoy" required>
                     </div>
                     <div class="form-group">
                        <label for="foto">Masukkan Foto KTP (format bebas: JPG, PNG, PDF, dll) :</label>
                        <input type="file" name="foto" id="foto" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="pass">Kata Sandi / Password :</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Minimal 6 karakter" required>
                     </div>
                     <button class="btn btn-primary btn-block mt-3" type="submit" name="reg">
                        <i class="fa fa-save"></i> Daftar
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
