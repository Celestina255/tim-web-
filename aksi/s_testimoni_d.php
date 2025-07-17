<?php
include '../koneksi.php';

$nama 		= $_POST['nama'];
$telp 		= $_POST['telp'];
$testimoni 	= $_POST['testimoni'];
$simpan=(isset($_POST['simpan']));
if($simpan){
mysqli_query($con, "INSERT INTO tb_testimoni(nama, telp, testimoni, status) VALUES ('$nama','$telp','$testimoni','Publish')")or die (Error.mysqli_error());

echo "<script>alert('Testimoni berhasil terkirim!'); window.location = '../dashboard/index.php?page=home'</script>";
}
?>