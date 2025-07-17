<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
$nama			= $_POST['nama'];
$des			= $_POST['des'];

$lokasi_file    = $_FILES['file']['tmp_name'];
$tipe_file      = $_FILES['file']['type'];
$nama_file      = $_FILES['file']['name'];
$acak           = rand(000000,999999);

$nama_file_unik   = $acak.$nama_file; 

$upload=(isset($_POST['upload']));   

if ($upload){
    if (empty($lokasi_file)){
        echo "<script>alert('Silahkan pilih foto yang akan diupload!'); window.location = '../administrator/index.php?page=upload_galeri'</script>"; 
    }else{
        UploadGallery($nama_file_unik);
        mysqli_query($con, "INSERT INTO tb_galeri(nama, foto, des) VALUES ('$nama','$nama_file_unik','$des')")or die (Error.mysqli_error());
        echo "<script>alert('Upload foto galeri berhasil !'); window.location = '../administrator/index.php?page=galeri'</script>"; 
    }
}

?>
