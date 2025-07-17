<?php
include '../koneksi.php';
$id=$_GET['id'];

$u=mysqli_query($con, "SELECT * FROM tb_galeri where id='$id'");
$us=mysqli_fetch_array($u);
if(file_exists("../img/galeri/".$us['foto'])){
	unlink("../img/galeri/".$us['foto']);
	unlink("../img/galeri/kecil_".$us['foto']);
	mysqli_query($con, "DELETE FROM tb_galeri WHERE id='$id'");
	echo "<script>alert('Foto Galeri berhasil dihapus!'); window.location = '../administrator/index.php?page=galeri'</script>"; 
}else{
	mysqli_query($con, "DELETE FROM tb_galeri WHERE id='$id'");

echo "<script>alert('Foto Galeri berhasil dihapus!'); window.location = '../administrator/index.php?page=galeri'</script>"; 
}
?>
