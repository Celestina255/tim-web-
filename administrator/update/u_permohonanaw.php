<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no         = $_POST['nosurat'];
//$idstf      = $_POST['idstf'];
$noaw       = $_POST['nosurataw'];
$kodeaw     = $_POST['kodesurataw'];
$nik        = $_POST['nik'];
$pemohon    = $_POST['pemohon'];
$detail     = $nik.';'.$pemohon.';'.$noaw.';'.$kodeaw;

if (isset($_POST['update'])){

    mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik', nama='$pemohon', detail='$detail' WHERE kode='$kode'");
echo "<script>alert('Surat Permohonan Pencatatan Pernyataan Ahli Waris berhasil diupdate !'); window.location = '../../cetak/c_permohonanawkec.php?kode=$kode'</script>"; 		

}



?>


