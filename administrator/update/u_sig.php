<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];

$no 		= $_POST['nosurat'];

$nik        = $_POST['nikpemohon'];
$nmp        = $_POST['namapemohon'];
$almtp      = $_POST['alamatpemohon'];
$nmusaha	= $_POST['namausaha'];
$almt 	    = $_POST['almtusaha'];
$jmlttg     = $_POST['jmlttg'];

$detail     = $nik.';'.$nmp.';'.$almtp.';'.$nmusaha.';'.$almt.';'.$jmlttg;

mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik', nama='$nmp', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Surat Izin Ganguan berhasil diupdate!'); window.location = '../../cetak/c_sig.php?kode=$kode'</script>"; 

?>

