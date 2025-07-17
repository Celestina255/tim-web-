<?php
include '../../koneksi.php';
$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$nik        = $_POST['nikpemohon'];
$nmp        = $_POST['namapemohon'];
$almtp      = $_POST['alamatpemohon'];
$nmusaha	= $_POST['namausaha'];
$almt 	    = $_POST['almtusaha'];
$jmlttg     = $_POST['jmlttg'];
$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail         = $nik.';'.$nmp.';'.$almtp.';'.$nmusaha.';'.$almt.';'.$jmlttg;                                                                                                    
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nmp', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Izin Gangguan berhasil dibuat!'); window.location = '../../cetak/c_sig.php?kode=$kode'</script>"; 
}
?>

