<?php
include '../../koneksi.php';
$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
//$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
//$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$nik        = $_POST['nikpemohon'];
$nmp        = $_POST['namapemohon'];
$kerjaan    = $_POST['pekerjaan'];
$almtp      = $_POST['alamatpemohon'];
$jb			= $_POST['jenisbangunan'];
$fb 	    = $_POST['fungsibangunan'];
$lantai     = $_POST['lantai'];
$ukuran     = $_POST['ukuran'];
$almtu      = $_POST['almtusaha'];
$kepada     = $_POST['kepada'];
$di      	= $_POST['di'];
//$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
//$thn 		= date('Y');
$detail         = $nik.';'.$nmp.';'.$kerjaan.';'.$almtp.';'.$jb.';'.$fb.';'.$lantai.';'.$ukuran.';'.$almtu.';'.$kepada.';'.$di;                                                                                                    
//$slash		= '/';
//$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nik','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nik','$nik','$nmp', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Permohonan Izin Mendirikan Bangunan berhasil dibuat!'); window.location = '../../cetak/c_simb.php?kode=$kode'</script>"; 
}
?>

