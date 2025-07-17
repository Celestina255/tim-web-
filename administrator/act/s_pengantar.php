<?php
include '../../koneksi.php';

$kodejenis  = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$objek 		= $_POST['objek'];
$banyak		= $_POST['banyak'];
$dasar 		= $_POST['dasar'];
$lbg 	    = $_POST['lbg'];
$almt	    = $_POST['almt'];

$detail		=$objek.';'.$banyak.';'.$dasar.';'.$lbg.';'.$almt;

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];

$thn = date('Y');
	                                                                 
   $slash	= '/';
   $nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','-','-', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Pengantar berhasil dibuat!'); window.location = '../../cetak/c_pengantar.php?kode=$kode'</script>"; 



?>


