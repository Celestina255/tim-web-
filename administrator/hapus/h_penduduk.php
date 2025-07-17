<?php
include '../../koneksi.php';
$nik=$_GET['nik'];

$u=mysqli_query($con, "SELECT * FROM tb_penduduk where nik='$nik'");
$us=mysqli_fetch_array($u);
if(file_exists("../../file/fotowarga/".$us['foto'])){
	unlink("../../file/fotowarga/".$us['foto']);
	mysqli_query($con, "DELETE FROM tb_penduduk WHERE nik='$nik'");
	echo "<script>alert('Data Penduduk berhasil dihapus!'); window.location = '../index.php?page=penduduk'</script>"; 
}else{
	mysqli_query($con, "DELETE FROM tb_penduduk WHERE nik='$nik'");

echo "<script>alert('Data Penduduk berhasil dihapus!'); window.location = '../index.php?page=penduduk'</script>"; 
}
?>
