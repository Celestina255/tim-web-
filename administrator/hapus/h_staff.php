<?php
include '../../koneksi.php';
$id=$_GET['id'];

$u=mysqli_query($con, "SELECT * FROM tb_admin where id='$id'");
$us=mysqli_fetch_array($u);
if(file_exists("../foto/".$us['foto'])){
	unlink("../foto/".$us['foto']);
	mysqli_query($con, "DELETE FROM tb_admin WHERE id='$id'");
	echo "<script>alert('Data Berhasil dihapus!'); window.location = '../index.php?page=staff'</script>"; 
}else{
	mysqli_query($con, "DELETE FROM tb_admin WHERE id='$id'");

echo "<script>alert('Data Berhasil dihapus!'); window.location = '../index.php?page=staff'</script>"; 
}
?>