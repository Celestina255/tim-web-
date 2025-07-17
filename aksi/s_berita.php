<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
$judul		= $_POST['judul'];
$slug       = $_POST['slug'];
$isi		= $_POST['isi'];
$kat        = $_POST['kategori'];
$user       = $_POST['user'];
$status     = $_POST['status'];

$lokasi_file    = $_FILES['file']['tmp_name'];
$tipe_file      = $_FILES['file']['type'];
$nama_file      = $_FILES['file']['name'];
$acak           = rand(000000,999999);

$nama_file_unik   = $acak.$nama_file; 

$posting=(isset($_POST['posting']));   

if ($posting){
    if (empty($lokasi_file)){
        echo "<script>alert('Silahkan lampirkan gambar yang akan diupload di berita !'); window.location = '../administrator/index.php?page=post_berita'</script>"; 
    }else{
        UploadBerita($nama_file_unik);
        mysqli_query($con, "INSERT INTO tb_berita(judul, slug, isi, gambar, kategori, user, status) VALUES ('$judul','$slug','$isi','$nama_file_unik','$kat','$user','$status')")or die (Error.mysqli_error());
        echo "<script>alert('Berita berhasil diposting !'); window.location = '../administrator/index.php?page=berita'</script>"; 
    }
}

?>
