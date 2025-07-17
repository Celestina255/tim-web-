<?php
include '../../koneksi.php';

$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$jk 		= $_POST['jk'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$agama 		= $_POST['agama'];
$prov       = $_POST['prov'];
$kab        = $_POST['kab'];
$kec        = $_POST['kec'];
$kelurahan  = $_POST['kelurahan'];
$almt		= $_POST['alamat'];

$niki 		= $_POST['niki'];
$namai 		= $_POST['namai'];
$jki 		= $_POST['jki'];
$tmp_lahiri = $_POST['tmp_lahiri'];
$tgl_lahiri	= $_POST['tgl_lahiri'];
$agamai 	= $_POST['agamai'];
$provi      = $_POST['provi'];
$kabi       = $_POST['kabi'];
$keci       = $_POST['keci'];
$kelurahani = $_POST['kelurahani'];
$almti		= $_POST['alamati'];

$tgl_cerai 	= $_POST['tgl_cerai'];


$detail     =$nik.';'.$nama.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$agama.';'.$almt.';'.$prov.';'.$kab.';'.$kec.';'.$kelurahan.';'.$niki.';'.$namai.';'.$jki.';'.$tmp_lahiri.';'.$tgl_lahiri.';'.$agamai.';'.$almti.';'.$provi.';'.$kabi.';'.$keci.';'.$kelurahani.';'.$tgl_cerai;

mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik', nama='$nama', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Surat Keterangan Cerai berhasil diupdate!'); window.location = '../../cetak/c_suketcerai.php?kode=$kode'</script>"; 

?>

