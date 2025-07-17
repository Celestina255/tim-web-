<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$klasifikasi= $_POST['klasifikasi'];
$jenis 		= $_POST['jenis'];
$nmsurat	= $_POST['nmsurat'];

mysqli_query($con, "INSERT INTO tb_jenissurat values('','$kode','$kodejenis','$klasifikasi','$jenis','$nmsurat')");
echo "<script>alert('Jenis Surat berhasil ditambahkan..!'); window.location = '../index.pgp?page=jenissurat'</script>"; 

?>

