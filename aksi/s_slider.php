<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
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
        UploadSlider($nama_file_unik);
        mysqli_query($con, "INSERT INTO tb_slider(gambar, des) VALUES ('$nama_file_unik','$des')")or die (Error.mysqli_error());
        echo "<script>alert('Upload foto slider berhasil !'); window.location = '../administrator/index.php?page=slider'</script>"; 
    }
}

?>
