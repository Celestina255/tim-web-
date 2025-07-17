<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];

$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$jk 		= $_POST['jk'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$pekerjaan	= $_POST['pekerjaan'];
$almt 		= $_POST['almt'];
$untuk      = $_POST['untuk'];

$kepada     = $_POST['kepada'];
$di         = $_POST['di'];
$detail     =$nik.';'.$nama.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$pekerjaan.';'.$almt.';'.$untuk.';'.$kepada.';'.$di;

mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik', nama='$nama', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Surat Pengantar SKCK berhasil di update !'); window.location = '../../cetak/c_skck.php?kode=$kode'</script>"; 

?>

