<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];

$hal 		= $_POST['perihal'];
$lam		= $_POST['lampiran'];
$tujuan 	= $_POST['tujuan'];
$almt	    = $_POST['almt'];
$dt     	= $_POST['detail'];

$detail		= $hal.';'.$lam.';'.$tujuan.';'.$almt.';'.$dt;

mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nama='$hal', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Surat Pemberitahuan berhasil diupdate!'); window.location = '../../cetak/c_pemberitahuan.php?kode=$kode'</script>"; 

?>

