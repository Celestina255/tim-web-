<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
$id             = $_POST['id'];
$nama           = $_POST['nama'];
$des            = $_POST['des'];

$lokasi_file    = $_FILES['file']['tmp_name'];
$tipe_file      = $_FILES['file']['type'];
$nama_file      = $_FILES['file']['name'];
$acak           = rand(000000,999999);

$nama_file_unik   = $acak.$nama_file; 

if (isset($_POST['update'])){
   if (!empty($lokasi_file)){
    UploadGallery($nama_file_unik);

    $data_galeri = mysqli_query($con, "SELECT foto FROM tb_galeri WHERE id='$id'");
    $d      = mysqli_fetch_array($data_galeri); 
    //@unlink('../../persyaratan/kk/'.$d['kk_ppersyaratan']);
    @unlink('../img/galeri/'.$d['foto']);
    @unlink('../img/galeri/kecil_'.$d['foto']);

    $qu=mysqli_query($con, "UPDATE tb_galeri SET nama='$nama', des='$des',foto ='$nama_file_unik'
        WHERE id='$id'")or die (mysqli_error($qu));

    echo "<script>alert('Update foto galeri berhasil !'); window.location = '../administrator/index.php?page=galeri'</script>"; 
}else{
    $qu=mysqli_query($con, "UPDATE tb_galeri SET nama='$nama', des='$des' WHERE id='$id'")or die (mysqli_error($qu));

    echo "<script>alert('Update foto galeri berhasil !'); window.location = '../administrator/index.php?page=galeri'</script>"; 
}
}
?>