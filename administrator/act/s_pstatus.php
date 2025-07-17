<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$idstf      = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];

$lurah	 	= $_POST['lurah'];

$thn = date('Y');

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nik','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nik','$nik','$nama', '-','$lurah','$idstf')");

echo "<script>alert('Surat Pernyataan Status berhasil dibuat!'); window.location = '../../cetak/c_pstatus.php?kode=$kode'</script>"; 

?>

