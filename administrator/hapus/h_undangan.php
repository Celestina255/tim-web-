<?php
include '../../koneksi.php';

$kode		= $_GET['kode'];


mysqli_query($con, "DELETE  FROM tb_datasurat WHERE kode='$kode'");
mysqli_query($con, "DELETE  FROM tb_detailsurat WHERE kode='$kode'");
mysqli_query($con, "DELETE  FROM t_dataundangan WHERE kodeu='$kode'");
echo "<script>alert('Surat Undangan berhasil dihapus!'); window.location = '../index.php?page=undangan'</script>"; 

?>

