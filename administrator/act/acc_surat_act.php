<?php
include '../../koneksi.php';

$ks		= $_POST['kodesurat'];
$kj		= $_POST['kodejenis'];
$ns		= $_POST['nosur'];
$nm		= $_POST['nmsurat'];
$ket	= $_POST['keterangan'];

$terima=(isset($_POST['terima'])); 
$tolak=(isset($_POST['tolak']));
$query=mysqli_query($con, "SELECT count(*) AS js FROM tb_datasurat WHERE kode='$ks'");
$hasil=mysqli_fetch_array($query);
$adasurat=$hasil['js'];
if ($terima){
	 if ($adasurat==0){
mysqli_query($con, "INSERT INTO tb_datasurat (kode, kodejenis, nmsurat, no, status) VALUES('$ks','$kj','$nm','$ns','acc')");
mysqli_query($con, "UPDATE tb_buatsendiri SET status='acc' WHERE kode_surat='$ks'");

echo "<script>alert('Surat sudah di acc..!'); window.location = '../index.php?page=buat_sendiri_all'</script>"; 
}
mysqli_query($con, "UPDATE tb_datasurat SET status='acc' WHERE kode='$ks'");
mysqli_query($con, "UPDATE tb_buatsendiri SET status='acc' WHERE kode_surat='$ks'");
echo "<script>alert('Surat sudah di acc..!'); window.location = '../index.php?page=buat_sendiri_all'</script>"; 
} else if($tolak){
	mysqli_query($con, "DELETE FROM tb_detailsurat WHERE kode='$ks'");
	mysqli_query($con, "DELETE FROM tb_datasurat WHERE kode='$ks'");
	mysqli_query($con, "UPDATE tb_buatsendiri SET kode_surat='0000', keterangan='$ket', status='ditolak' WHERE kode_surat='$ks'");
	echo "<script>alert('Status surat anda ditolak..!'); window.location = '../index.php?page=buat_sendiri_all'</script>"; 
}

?>

