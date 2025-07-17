<?php
include '../../koneksi.php';

$kodejenis      = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];

$nik 		= $_POST['nika'];
$nama 		= $_POST['namaa'];
$bin        = $_POST['bina'];
$jk         = $_POST['jka'];
$tmp_lahir  = $_POST['tmp_lahira'];
$tgl_lahir  = $_POST['tgl_lahira'];
$kwng       = $_POST['kwnga'];
$agama      = $_POST['agamaa'];
//$pkjn       = $_POST['pkjna'];
$almt 		= $_POST['almta'];


$nik1       = $_POST['nik1'];
$nama1      = $_POST['nama1'];
$bin1        = $_POST['bin1'];
$jk1         = $_POST['jk1'];
$tmp_lahir1  = $_POST['tmp_lahir1'];
$tgl_lahir1  = $_POST['tgl_lahir1'];
$kwng1       = $_POST['kwng1'];
$agama1      = $_POST['agama1'];
//$pkjn1       = $_POST['pkjn1'];
$almt1       = $_POST['almt1'];

$shdk       = $_POST['shdk'];
$sebab      = $_POST['sebab'];
$hari       = $_POST['hari'];
$tanggal    = $_POST['tanggal'];
$waktu      = $_POST['waktu'];
$tempat     = $_POST['tempat'];

$blnr       = $_POST['blnr'];
$lurah      = $_POST['lurah'];
$thn        = date('Y');

$detail     =$nik.';'.$nama.';'.$bin.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$kwng.';'.$agama.';'.$almt.';'.$nik1.';'.$nama1.';'.$bin1.';'.$jk1.';'.$tmp_lahir1.';'.$tgl_lahir1.';'.$kwng1.';'.$agama1.';'.$almt1.';'.$shdk.';'.$sebab.';'.$hari.';'.$tanggal.';'.$waktu.';'.$tempat;

$slash      = '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
        if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Kematian berhasil dibuat!'); window.location = '../../cetak/c_n6.php?kode=$kode'</script>"; 
}
?>


