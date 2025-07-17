<?php
include '../../koneksi.php';
$kode		= $_POST['kodesurat'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$nik1       = $_POST['nik1'];
$nama1      = $_POST['nama1'];
$jk1        = $_POST['jk1'];
$tmpl1      = $_POST['tmplahir1'];
$tgll1      = $_POST['tgllahir1'];
$almt1      = $_POST['almt1'];
$nik2       = $_POST['nik2'];
$nama2      = $_POST['nama2'];
$jk2        = $_POST['jk2'];
$tmpl2      = $_POST['tmplahir2'];
$tgll2      = $_POST['tgllahir2'];
$almt2      = $_POST['almt2'];
$luas       = $_POST['luas'];
$letak      = $_POST['letak'];

$ht         = $_POST['harga'];

$b          = $_POST['barat'];
$u          = $_POST['utara'];
$t          = $_POST['timur'];
$s          = $_POST['selatan'];
$nms1       = $_POST['nmsaksi1'];
$nms2       = $_POST['nmsaksi2'];
$nms3       = $_POST['nmsaksi3'];
$nms4       = $_POST['nmsaksi4'];
$detail     =$nik1.';'.$nama1.';'.$jk1.';'.$tmpl1.';'.$tgll1.';'.$almt1.';'.$nik2.';'.$nama2.';'.$jk2.';'.$tmpl2.';'.$tgll2.';'.$almt2.';'.$luas.';'.$letak.';'.$ht.';'.$b.';'.$u.';'.$t.';'.$s.';'.$nms1.';'.$nms2.';'.$nms3.';'.$nms4;
if(isset($_POST['update'])){

mysqli_query($con, "UPDATE tb_detailsurat SET no='$no', nik='$nik1', nama='$nama1', detail='$detail' WHERE kode='$kode'");

echo "<script>alert('Keterangan Pelepasan Tanah berhasil diupdate!'); window.location = '../../cetak/c_pelepasantanah.php?kode=$kode'</script>"; 
}
?>

