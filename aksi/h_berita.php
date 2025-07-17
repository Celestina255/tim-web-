<?php
include '../koneksi.php';
$id=$_GET['id'];

$u=mysqli_query($con, "SELECT * FROM tb_berita where id_berita='$id'");
$us=mysqli_fetch_array($u);
if(file_exists("../img/berita/".$us['gambar'])){
	@unlink("../img/berita/".$us['gambar']);
	@unlink("../img/berita/kecil_".$us['gambar']);
	mysqli_query($con, "DELETE FROM tb_berita WHERE id_berita='$id'");
	echo "<script>alert('Foto Barita berhasil dihapus!'); window.location = '../administrator/index.php?page=berita'</script>"; 
}else{
	mysqli_query($con, "DELETE FROM tb_berita WHERE id_berita='$id'");

echo "<script>alert('Foto Berita berhasil dihapus!'); window.location = '../administrator/index.php?page=berita'</script>"; 
}
?>
