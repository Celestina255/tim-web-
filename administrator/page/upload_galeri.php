<?php
//include '../sesi.php';
include '../koneksi.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/dropify.min.css">
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
</head>
<body>

    <!-- Left Panel -->
    <div class="au-card recent-report">
        <section class="welcome p-t-1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-5">UPLOAD FOTO GALERI
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>


        <div class="modal-body">
            <form action="../aksi/s_galeri.php" method="post" name="form" id="form" onSubmit="return validasi(this)" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body card-block">
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama Foto</label></div>
                    <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Foto" ></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="file" class=" form-control-label">Upload foto</label></div>
                    <div class="col-12 col-md-5"><input type="file" id="file" name="file" id="file" onchange="return fileValidation()"  class="form-control dropify"><small class="form-text text-muted">Ukuran : 550 x 366 Pixel, Max 1 MB</small></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="des" class=" form-control-label">Deskripsi</label></div>
                    <div class="col-12 col-md-9"><textarea type="text" id="des" name="des" rows="3" placeholder="Deskripsi" class="form-control"></textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                    <div class="col col-md-6"><button type="submit" name="upload" id="upload" class="btn btn-primary btn-sm pull pull-right">Upload</button></div>

                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<!-- Codebase Core JS -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/core/jquery.slimscroll.min.js"></script>
<script src="../assets/js/core/jquery.scrollLock.min.js"></script>
<script src="../assets/js/core/jquery.appear.min.js"></script>
<script src="../assets/js/core/jquery.countTo.min.js"></script>
<script src="../assets/js/core/js.cookie.min.js"></script>
<script src="../assets/js/codebase.js"></script>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script src="../assets/js/dropify.min.js"></script>
<script type="text/javascript">
    var dr = $.noConflict();
    dr(document).ready(function(){
        dr('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
    });

</script>
<script type="text/javascript">

        CKEDITOR.replace( 'ckeditor' ,{
            height: '240px',
            extraPlugins : 'syntaxhighlight',        
            toolbar: [
            ['Source'] ,
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','Image','-','Blockquote','-','Styles','-','Format','-','FontSize'] 

            ]              
        });
</script>
<!-- jQuery 3 -->

<script type="text/javascript">
   function fileValidation() {
       var fileInput = document.getElementById('file');         
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

 </body>

 </html>
