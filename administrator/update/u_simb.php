<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];

//$no 		= $_POST['nosurat'];

$nik        = $_POST['nikpemohon'];
$nmp        = $_POST['namapemohon'];
$kerjaan    = $_POST['pekerjaan'];
$almtp      = $_POST['alamatpemohon'];
$jb			= $_POST['jenisbangunan'];
$fb 	    = $_POST['fungsibangunan'];
$lantai     = $_POST['lantai'];
$ukuran     = $_POST['ukuran'];
$almtu      = $_POST['almtusaha'];
$kepada     = $_POST['kepada'];
$di      	= $_POST['di'];

$detail         = $nik.';'.$nmp.';'.$kerjaan.';'.$almtp.';'.$jb.';'.$fb.';'.$lantai.';'.$ukuran.';'.$almtu.';'.$kepada.';'.$di;  

mysqli_query($con, "UPDATE tb_detailsurat SET nik='$nik', nama='$nmp', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Surat Permohonan Izin Mendirikan Bangunan berhasil diupdate!'); window.location = '../../cetak/c_simb.php?kode=$kode'</script>"; 

?>

