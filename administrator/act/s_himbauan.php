<?php
include '../../koneksi.php';

$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$hal 		= $_POST['perihal'];
$lam		= $_POST['lampiran'];
$tujuan 	= $_POST['tujuan'];
$almt	    = $_POST['almt'];
$dt     	= $_POST['detail'];
$detail		=$hal.';'.$lam.';'.$tujuan.';'.$almt.';'.$dt;

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn = date('Y');
                                                            
$slash	= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','-','$hal', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Himbauan berhasil dibuat!'); window.location = '../../cetak/c_himbauan.php?kode=$kode'</script>"; 

?>

