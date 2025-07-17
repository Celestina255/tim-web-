<?php
include '../koneksi.php';
$id=$_GET['id'];

$u=mysqli_query($con, "SELECT * FROM tb_slider where id='$id'");
$us=mysqli_fetch_array($u);
if(file_exists("../img/slider/".$us['gambar'])){
	unlink("../img/slider/".$us['gambar']);
	unlink("../img/slider/kecil_".$us['gambar']);
	mysqli_query($con, "DELETE FROM tb_galeri WHERE id='$id'");
	echo "<script>alert('Foto Slider berhasil dihapus!'); window.location = '../administrator/index.php?page=slider'</script>"; 
}else{
	mysqli_query($con, "DELETE FROM tb_slider WHERE id='$id'");

echo "<script>alert('Foto Slider berhasil dihapus!'); window.location = '../administrator/index.php?page=slider'</script>"; 
}
?>
