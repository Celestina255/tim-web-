<?php
include '../../koneksi.php';
$id		= $_POST['id'];
$ket	= $_POST['keterangan'];

$terima=(isset($_POST['terima'])); 
$tolak=(isset($_POST['tolak']));

if ($terima){
	mysqli_query($con, "UPDATE tb_permohonan SET keterangan='$ket', status='acc' WHERE id='$id'");

	echo "<script>alert('Permohonan sudah di acc..!'); window.location = '../index.php?page=process_permohonan_all'</script>"; 

}else if($tolak){
	if(!empty($ket)){
		mysqli_query($con, "UPDATE tb_permohonan SET keterangan='$ket', status='ditolak' WHERE id='$id'");
		echo "<script>alert('Permohonan sudah ditolak..!'); window.location = '../index.php?page=process_permohonan_all'</script>"; 
	}
	echo "<script>alert('Alasan penolakan wajib diisi..!'); window.location = '../index.php?page=acc_permohonan&id=$id'</script>"; 
}
?>

