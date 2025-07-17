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
                        <h1 class="title-5">POSTING BERITA DESA
                        </h1>
                        <hr class="line-seprate">
                    </div>
                </div>
            </div>
        </section>

        <div class="modal-body">
            <form action="../aksi/s_berita.php" method="post" name="form" id="form" onSubmit="return validasi(this)" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="judul" class=" form-control-label">Judul</label></div>
                    <div class="col-12 col-md-10"><input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Berita"required ></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="slug" class=" form-control-label">Slug</label></div>
                    <div class="col-12 col-md-10"><input type="text" id="slug" name="slug" class="form-control" placeholder="Slug diambil dari judul berita" required ><small class="form-text text-muted">Contoh : slug-diambil-dari-judul-berita</small></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="file" class=" form-control-label">Upload Gambar</label></div>
                    <div class="col-12 col-md-6"><input type="file" id="file" name="file" id="file" onchange="return fileValidation()"  class="form-control dropify" data-height="190" required><small class="form-text text-muted">Ukuran : 780 x 540 Pixel, Max 1 MB</small></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="isi" class=" form-control-label">Isi Berita</label></div>
                    <div class="col-12 col-md-10"><textarea name="isi" id="ckeditor" required></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="kategori" class=" form-control-label">Kategori</label></div>
                    <div class="col-12 col-md-4">
                    <select id="kategori" name="kategori" class="form-control" required>
                        <option value="">--Pilih Kategori--</option>
                        <?php 
                        $query = mysqli_query($con, "SELECT * FROM tb_kategori ORDER BY id_kategori ASC");
                        while($r=mysqli_fetch_array($query)){
                            ?>
                        <option value="<?php echo $r['id_kategori'];?>"><?php echo $r['kategori'];?></option>
                    <?php } ?>
                    </select></div>
                </div>
                <?php 
                $user = $_SESSION['userid'];
                ?>
                <input type="hidden" id="user" name="user" required value="<?php echo $user ;?>" >
                <div class="row form-group">
                    <div class="col col-md-2"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-12 col-md-3">
                    <select id="status" name="status" class="form-control" required>
                        <option value="Publish">--Status--</option>
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
                    </select></div>
                </div>
                                <hr>
                <div class="row form-group">
                    <div class="col col-md-6"><button type="reset" class="btn btn-primary btn-sm pull pull-left">Reset</button></div>
                    <div class="col col-md-6"><button type="submit" name="posting" id="posting" class="btn btn-primary btn-sm pull pull-right">Posting</button></div>

                </div>
            </div>
        </form>
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
