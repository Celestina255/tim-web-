<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
$id             = $_POST['id'];
$des            = $_POST['des'];

$lokasi_file    = $_FILES['file']['tmp_name'];
$tipe_file      = $_FILES['file']['type'];
$nama_file      = $_FILES['file']['name'];
$acak           = rand(000000,999999);

$nama_file_unik   = $acak.$nama_file; 

if (isset($_POST['update'])){
   if (!empty($lokasi_file)){
    UploadSlider($nama_file_unik);

    $sl = mysqli_query($con, "SELECT gambar FROM tb_slider WHERE id='$id'");
    $d      = mysqli_fetch_array($sl); 
    //@unlink('../../persyaratan/kk/'.$d['kk_ppersyaratan']);
    @unlink('../img/slider/'.$d['gambar']);
    @unlink('../img/slider/kecil_'.$d['gambar']);

    $qu=mysqli_query($con, "UPDATE tb_slider SET des='$des', gambar ='$nama_file_unik'
        WHERE id='$id'")or die (mysqli_error($qu));

    echo "<script>alert('Slider berhasil diupdate !'); window.location = '../administrator/index.php?page=slider'</script>"; 
}else{
     $qu=mysqli_query($con, "UPDATE tb_slider SET des='$des'
        WHERE id='$id'")or die (mysqli_error($qu));

    echo "<script>alert('Slider berhasil diupdate !'); window.location = '../administrator/index.php?page=slider'</script>";
}
}
?>