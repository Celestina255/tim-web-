<?php
include '../../koneksi.php';

$kode       = $_POST['kodesurat'];
$kl         = $_POST['klasifikasi'];
$jenis      = $_POST['jenis'];
$ktg        = $_POST['kategori'];
$nmsurat    = $_POST['nmsurat'];


    mysqli_query($con, "UPDATE tb_jenissurat SET 
        kode        ='$kode', 
        kode_klasi  ='$kl', 
        jenis       ='$jenis', 
        kategori    ='$ktg',
        nmsurat     ='$nmsurat', 

        WHERE kode='$kode'") or die (mysqli_error());

        

echo "<script>alert('Surat Jenis Surat berhasil diupdate!'); window.location = '../index.php.php?page=jenissurat'</script>"; 		

?>


