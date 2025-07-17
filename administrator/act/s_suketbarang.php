<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];

$nmbrg 	        = $_POST['nmbrg'];
$jnbrg 	        = $_POST['jnbrg'];
$jmlbrg         = $_POST['jmlbrg'];
$asalbrg        = $_POST['asalbrg'];
$tujuanbrg 	= $_POST['tujuanbrg'];

$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$detail         = $nmbrg.';'.$jnbrg.';'.$jmlbrg.';'.$nama.';'.$asalbrg.';'.$tujuanbrg;

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');                                                              
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Pengantar Barang berhasil dibuat!'); window.location = '../../cetak/c_suketbarang.php?kode=$kode'</script>"; 
}
?>

