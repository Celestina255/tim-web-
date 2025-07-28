   <section class="main-container contact-area" id="main-container" style="margin-top: 50px;">
      <div class="gap-10"></div>
      <div class="ts-form form-boxed" id="ts-form">
         <div class="container">
            <div class="row">
               <div class="contact-wrapper full-contact">
                  <div class="col-lg-6">
                     <h3 class="column-title">Layanan Permohonan Administrasi Surat Menyurat Online</h3>
                     <p class="contact-content">	Siapkan persyaratan dan pastikan NIK kamu terdaftar untuk mengajukan permohonan Administrasi surat - menyurat disamping.</p>
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
                  <?php
                  $queryy = mysqli_query($con, "SELECT MAX(tb_permohonan.id) AS maxId FROM tb_permohonan");
                  $dt = mysqli_fetch_array($queryy);
                  $kodesurat = $dt['maxId'];
                  $urutan = (int) substr($kodesurat, 0, 2);
                  $urutan++;
                  $nourut = sprintf($urutan);
                  ?>

                  <div class="col-lg-6">
                   <h3 class="column-title">Form Permohonan Surat Online</h3>
                   <div class="contact-submit-box contact-box form-box">
                     <form class="contact-form" id="" action="../aksi/kirim_pengajuan.php" method="POST" enctype="multipart/form-data" onSubmit="return validasi(this)">
                        <div class="error-container"></div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input class="form-control form-name" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" type="text" required="" onkeyup="isinik()" maxlength="16">

                              </div>
                           </div>
                           <!-- Col end-->
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input class="form-control form-name" id="nama" name="nama" placeholder="Nama lengkap" type="text" required="" readonly>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <select class="form-control form-name" id="nmsurat" name="nmsurat" required="" onchange="isijenis()">
                                    <option value="">Pilih Nama Surat</option>
                                    <?php 
                                    $query = mysqli_query ($con, "SELECT * FROM tb_jenissurat WHERE kategori!='Tata Usaha' ORDER BY id ASC ");
                                    while ($r = mysqli_fetch_array($query)){
                                       ?>
                                       <option value="<?php echo $r['nmsurat'];?>"><?php echo $r['nmsurat'];?></option><?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <input class="form-control form-name" id="hp" name="hp" placeholder="No. Telp/Hp. aktif" type="text" required="">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <input class="form-control form-name" id="berkas" name="berkas" type="file" required="" onchange="return fileValidation()">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <input class="form-control form-name" id="foto" name="foto" type="file" required="" onchange="return fotoValidation()">
                                 </div>
                              </div>
                              <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                              <input type="hidden" id="kode" name="kode">
                              <input type="hidden" id="page" name="page">
                              <input type="hidden" id="urutan" name="urutan" value="<?php echo $nourut; ?>">
                              <!-- Col 12 end-->
                           </div>
                           <!-- Form row end-->
                           <button class="btn btn-primary tw-mt-30" type="submit" name="kirim"><i class="fa fa-paper-plane-o"></i> Kirim Permohonan</button>
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
   <script src="../assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

   <script type="text/javascript">
    function isinik(){
      var nik = $("#nik").val();
      $.ajax({
        url: '../include/ambil_datawarga.php',
        data:"nik="+nik ,
     }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nama').val(obj.nama);
     });
  }
</script>
<script type="text/javascript">
 function isijenis(){
   var nmsurat = $("#nmsurat").val();
   $.ajax({
     url: '../include/ambil_jenissurat.php',
     data:"nmsurat="+nmsurat ,
  }).success(function (data) {
     var json = data,
     obj = JSON.parse(json);
     $('#kode').val(obj.kode);
     $('#page').val(obj.page);
  });
}
</script>
<script type="text/javascript">
   function fileValidation() {
    var fileInput = document.getElementById('berkas');         
    var filePath = fileInput.value;
             // Allowing file type
             var allowedExtensions =/(\.jpg|\.jpeg)$/i;
             if (!allowedExtensions.exec(filePath)) {
              alert('Extensi file harus jpg/jpeg');
              fileInput.value = '';
              return false;
           }
             if(fileInput.files[0].size > 1000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                alert("Maaf. Berkas Terlalu Besar ! Maksimal Upload 1 MB");
                fileInput.value = "";
                return false;
             }
          }
          function fotoValidation() {
             var fileInput = document.getElementById('foto');         
             var filePath = fileInput.value;
             // Allowing file type
             var allowedExtensions =/(\.jpg|\.jpeg)$/i;
             if (!allowedExtensions.exec(filePath)) {
              alert('Extensi file harus jpg/jpeg');
              fileInput.value = '';
              return false;
           }
             if(fileInput.files[0].size > 1000000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                alert("Maaf. Foto Terlalu Besar ! Maksimal Upload 1 MB");
                fileInput.value = "";
                return false;
             }
          }
       </script>    
       <script type="text/javascript">
        function validasi(form) {  
          if (form.nik.value=="") {
            alert('NIK  harus di isi !');
            form.nik.focus();
            return false;
         }else if(form.hp.value=="") {
            alert('No. Hp harus di isi !');
            form.hp.focus();
            return false;
         }

      }
   </script>
