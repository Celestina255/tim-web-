<?php
include '../../koneksi.php';

$kode		= $_GET['kode'];


mysqli_query($con, "DELETE FROM tb_datasurat WHERE kode='$kode'");
mysqli_query($con, "DELETE FROM tb_detailsurat WHERE kode='$kode'");
mysqli_query($con, "DELETE FROM tb_datastugas WHERE kodetgs='$kode'");
echo "<script>alert('Surat Tugas berhasil dihapus!'); window.location = '../index.php?page=tugas'</script>"; 

?>

