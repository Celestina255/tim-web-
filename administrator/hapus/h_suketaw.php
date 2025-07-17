<?php
include '../../koneksi.php';
$kode=$_GET['kode'];


	mysqli_query($con, "DELETE FROM tb_detailsurat WHERE kode='$kode'");
	mysqli_query($con, "DELETE FROM tb_ahliwaris WHERE kodeaw='$kode'");
	mysqli_query($con, "DELETE FROM tb_datasurat WHERE kode='$kode'");
echo "<script>alert('Data Berhasil dihapus!'); window.location = '../index.php?page=suketaw'</script>"; 

?>
