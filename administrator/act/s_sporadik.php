<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$idstf          = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];

$luas 		= $_POST['luas'];
$letak 		= $_POST['letak'];
$rtrw           = $_POST['rtrw'];
$kelurahan       = $_POST['deskel'];
$kab            = $_POST['kab'];
$nib            = $_POST['nib'];
$status         = $_POST['stanah'];
$untuk          = $_POST['untuk'];

$asal 		= $_POST['asaltanah'];
$sejak          = $_POST['sejak'];
$b 			= $_POST['barat'];
$u 			= $_POST['utara'];
$t 			= $_POST['timur'];
$s 			= $_POST['selatan'];
$nms1       = $_POST['nmsaksi1'];
$ums1       = $_POST['umursaksi1'];
$kerjaans1  = $_POST['kerjaansaksi1'];
$almts1     = $_POST['almtsaksi1'];
$nms2       = $_POST['nmsaksi2'];
$ums2       = $_POST['umursaksi2'];
$kerjaans2  = $_POST['kerjaansaksi2'];
$almts2     = $_POST['almtsaksi2'];

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail     =$nik.';'.$nama.';'.$luas.';'.$letak.';'.$rtrw.';'.$kelurahan.';'.$kab.';'.$nib.';'.$status.';'.$untuk.';'.$asal.';'.$sejak.';'.$b.';'.$u.';'.$t.';'.$s.';'.$nms1.';'.$ums1.';'.$kerjaans1.';'.$almts1.';'.$nms2.';'.$ums2.';'.$kerjaans2.';'.$almts2;                                                              
$slash		= '/';
$nosur = $kode_klasi.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nik','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nik','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Sporadik berhasil dibuat!'); window.location = '../../cetak/c_sporadik.php?kode=$kode'</script>"; 
}
?>

