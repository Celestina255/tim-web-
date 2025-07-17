<?php
include '../../koneksi.php';
$kodejenis      = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf      = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$agama 		= $_POST['agama'];
$almt 		= $_POST['almt'];

$niki 		= $_POST['niki'];
$namai 		= $_POST['namai'];
$tmp_lahiri = $_POST['tmp_lahiri'];
$tgl_lahiri	= $_POST['tgl_lahiri'];
$agamai 	= $_POST['agamai'];
$almti 		= $_POST['almti'];
$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail     =$nik.';'.$nama.';'.$tmp_lahir.';'.$tgl_lahir.';'.$agama.';'.$almt.';'.$niki.';'.$namai.';'.$tmp_lahiri.';'.$tgl_lahiri.';'.$agamai.';'.$almti;                                                                     
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail', '$lurah', '$idstf')");

echo "<script>alert('Surat Keterangan Tidak Mampu berhasil dibuat!'); window.location = '../../cetak/c_sukettmampuv2.php?kode=$kode'</script>"; 
}
?>

