<?php
include '../../koneksi.php';

$kode		= $_GET['kode'];


mysqli_query($con, "DELETE  FROM tb_datasurat WHERE kode='$kode'");
mysqli_query($con, "DELETE  FROM tb_detailsurat WHERE kode='$kode'");
echo "<script>alert('Surat Himbauan berhasil dihapus!'); window.location = '../index.php?page=himbauan'</script>"; 

?>

