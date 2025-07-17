<?php
include '../koneksi.php';
include "../include/fungsi_thumb.php";
$id         = $_POST['id'];
$judul      = $_POST['judul'];
$slug       = $_POST['slug'];
$isi        = $_POST['isi'];
$kat        = $_POST['kategori'];
$user       = $_POST['user'];
$status     = $_POST['status'];

$lokasi_file    = $_FILES['file']['tmp_name'];
$tipe_file      = $_FILES['file']['type'];
$nama_file      = $_FILES['file']['name'];
$acak           = rand(000000,999999);

$nama_file_unik   = $acak.$nama_file; 

$update=(isset($_POST['update']));   

if ($update){
   if (!empty($lokasi_file)){
    UploadBerita($nama_file_unik);

    $brt = mysqli_query($con, "SELECT gambar FROM tb_berita WHERE id_berita='$id'");
    $d      = mysqli_fetch_array($brt); 

    @unlink('../img/berita/'.$d['gambar']);
    @unlink('../img/berita/kecil_'.$d['gambar']);

    $qu=mysqli_query($con, "UPDATE tb_berita SET judul='$judul', slug='$slug', isi='$isi',gambar ='$nama_file_unik', kategori='$kat', user='$user', status='$status'
     WHERE id_berita='$id'")or die (mysqli_error($qu));

    echo "<script>alert('Update Berita berhasil !'); window.location = '../administrator/index.php?page=berita'</script>"; 
 }else {
   $qu=mysqli_query($con, "UPDATE tb_berita SET judul='$judul', slug='$slug', isi='$isi', kategori='$kat', user='$user', status='$status'
     WHERE id_berita='$id'")or die (mysqli_error($qu));

   echo "<script>alert('Update Berita berhasil !'); window.location = '../administrator/index.php?page=berita'</script>"; 
}
}
?>