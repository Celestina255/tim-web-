<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];


mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik', nama='$nama' WHERE kode='$kode'");

echo "<script>alert('Surat Keterangan Duda / Janda berhasil diupdate!'); window.location = '../../cetak/c_dudajanda.php?kode=$kode'</script>"; 

?>

