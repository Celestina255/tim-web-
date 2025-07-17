<?php
include '../../koneksi.php';

$kode		= $_GET['kode'];


mysqli_query($con, "DELETE FROM tb_datasurat WHERE kode='$kode'");
mysqli_query($con, "DELETE FROM tb_detailsurat WHERE kode='$kode'");
mysqli_query($con, "DELETE FROM tb_datapdinas WHERE kodepd='$kode'");
echo "<script>alert('Surat Perjalanan Dinas berhasil dihapus!'); window.location = '../index.php?page=pdinas'</script>"; 

?>

