<?php
include '../koneksi.php';
$idb        = $_POST['id_berita'];
$idm        = $_POST['id_master'];
$komentar   = $_POST['komentar'];
$nama       = $_POST['nama'];
$email		= $_POST['email'];


$posting=(isset($_POST['posting']));   

if ($posting){
    
        mysqli_query($con, "INSERT INTO tb_komentar(id_berita, id_master, isi_komen, komentator, email_komentator, status) VALUES ('$idb','$idm','$komentar','$nama','$email','Publish')")or die (Error.mysqli_error());
        echo "<script>alert('Komentar berhasil diposting !'); window.location = '../administrator/index.php?page=berita'</script>"; 
    }

?>
