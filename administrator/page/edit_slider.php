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
                        <h1 class="title-5">EDIT FOTO SLIDER
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>
        <?php 
        $query = mysqli_query ($con, "SELECT * FROM tb_slider where id='$_GET[id]'");
        while ($r = mysqli_fetch_array($query)){
         ?>

         <div class="modal-body">
            <form action="../aksi/u_slider.php" method="post" name="form" id="form" onSubmit="return validasi(this)" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file" class=" form-control-label">Foto Slider</label></div>
                        <div class="col-12 col-md-5">
                            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $r['id'];?>"><input type="file" id="file" name="file" id="file" onchange="return fileValidation()" data-default-file="<?php echo '../img/slider/'.$r['gambar'];?>" class="form-control dropify"><small class="form-text text-muted">Ukuran : 1600 x 800 Pixel, Max 1 MB</small></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="des" class=" form-control-label">Deskripsi</label></div>
                        <div class="col-12 col-md-9"><textarea type="text" id="des" name="des" rows="3" class="form-control"><?php echo $r['des'];?></textarea></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                        <div class="col col-md-6"><button type="submit" name="update" id="update" class="btn btn-primary btn-sm pull pull-right">Update</button></div>

                    </div>
                </div>
            </form>
        <?php  } ?>
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
