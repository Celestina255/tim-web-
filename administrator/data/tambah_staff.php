<?php
include '../koneksi.php';
include_once "../assets/inc.php";
?>
<body>
    <div class="au-card recent-report">
     <section class="welcome p-t-1s">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title-5">TAMBAH DATA STAFF
                    </h1>
                    <hr class="line-seprate">
                </div>
            </div>
        </div>
    </section>
    <div class="card-body card-block"> 
        <form action="act/s_staff.php"  method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group">
            <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama</label></div>
            <div class="col-12 col-md-4"><input type="text" id="nama" name="nama" placeholder="Nama" class="form-control"></div>

        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="nip" class=" form-control-label">NIP</label></div>
            <div class="col-12 col-md-6"><input type="text" id="nip" name="nip" placeholder="NIP" class="form-control"></div>
        </div>
        
        <div class="row form-group">
            <div class="col col-md-3"><label for="level" class=" form-control-label">Jabatan</label></div>
            <div class="col-12 col-md-4">
                <select name="jab" id="jab" class="form-control">
                    <option value="">--Pilih Jabatan --</option>
                    <option value="Kepala Kampung">Kepala Kampung</option>
                    <option value="Sekretaris Kampung">Sekretaris Kampung</option>
                    <option value="Kasie Pelayanan">Kasie Pelayanan</option>
                    <option value="Kasie Kesejahteraan">Kasie Kesejahteraan</option>
                    <option value="Kasie Pemerintahan">Kasie Pemerintahan</option>
                    <option value="Kaur Umum">Kaur Umum</option>
                    <option value="Kaur Keuangan">Kaur Keuangan</option>
                    <option value="Kaur Perencanaan">Kaur Perencanaan</option>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="ttd" class=" form-control-label">Tanda Tangan (*.png)</label></div>
            <div class="col-12 col-md-6"><input type="file" id="ttd" name="ttd" onchange="return fileValidation()" class="form-control"><small class="form-text text-muted">Ukuran : 3x4 cm, Max 500 KB</small>
            </div>

        </div>
        <hr>
        <div class="row form-group">
            <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
            <div class="col col-md-6"><button type="submit" name="save" id="save" class="btn btn-primary btn-sm pull pull-right">Simpan</button></div>

        </div>
    </div>


</form>

</div>
<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script> <!-- untuk Pemanggilan data penduduk -->

<script type="text/javascript">
 function fileValidation() {
     var fileInput = document.getElementById('foto');         
     var filePath = fileInput.value;
             // Allowing file type
     var allowedExtensions =/(\.png)$/i;
     if (!allowedExtensions.exec(filePath)) {
         alert('Extensi file harus PNG');
         fileInput.value = '';
         return false;
     }
             if(fileInput.files[0].size > 500000){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
               alert("Maaf. Foto Terlalu Besar ! Maksimal Upload 500 KB");
               fileInput.value = "";
               return false;
           }
       }
   </script> 


</body>

</html>
