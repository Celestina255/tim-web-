<div class="col-lg-6 mx-auto">
   <h3 class="text-center mb-4">Form Permohonan Surat Online</h3>
   <div class="contact-submit-box contact-box form-box">
      <form class="contact-form" action="../aksi/kirim_pengajuan.php" method="POST" enctype="multipart/form-data" onSubmit="return validasi(this)">
         <div class="error-container"></div>
         <div class="row">

            <!-- NIK -->
            <div class="col-lg-12 mb-3">
               <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
               <input class="form-control" id="nik" name="nik" type="text" required onkeyup="isinik()" maxlength="16">
            </div>

            <!-- Nama -->
            <div class="col-lg-12 mb-3">
               <label for="nama" class="form-label">Nama Lengkap</label>
               <input class="form-control" id="nama" name="nama" type="text" required>
            </div>

            <!-- Nama Surat -->
            <div class="col-lg-12 mb-3">
               <label for="nmsurat" class="form-label">Nama Surat</label>
               <select class="form-control" id="nmsurat" name="nmsurat" required onchange="isijenis()">
                  <option value="">Pilih Nama Surat</option>
                  <?php 
                     $query = mysqli_query($con, "SELECT * FROM tb_jenissurat WHERE kategori!='Tata Usaha' ORDER BY id ASC ");
                     while ($r = mysqli_fetch_array($query)){
                     ?>
                  <option value="<?php echo $r['nmsurat'];?>"><?php echo $r['nmsurat'];?></option>
                  <?php } ?>
               </select>
            </div>

            <!-- No. HP -->
            <div class="col-lg-12 mb-3">
               <label for="hp" class="form-label">No. Telp/HP Aktif</label>
               <input class="form-control" id="hp" name="hp" type="text" required>
            </div>

            <!-- Upload KTP -->
            <div class="col-lg-12 mb-3">
               <label for="ktp" class="form-label">Unggah KTP</label>
               <input type="file" class="form-control" id="ktp" name="ktp" required onchange="return fileValidation()">
            </div>

            <!-- Hidden Fields -->
            <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>">
            <input type="hidden" id="kode" name="kode">
            <input type="hidden" id="page" name="page">
            <input type="hidden" id="urutan" name="urutan" value="<?php echo $nourut; ?>">

            <!-- Tombol Submit -->
            <div class="col-lg-12 text-center">
               <button class="btn btn-danger px-4 mt-3" type="submit" name="kirim">
                  <i class="fa fa-paper-plane-o"></i> Kirim Permohonan
               </button>
            </div>
         </div>
      </form>
   </div>
</div>
