<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no         = $_POST['nosurat'];
$idstf      = $_POST['idstf'];

$nik1 		= $_POST['nik1'];
$nama1 		= $_POST['nama1'];
$jk1 		= $_POST['jk1'];
$tmpl1 		= $_POST['tmplahir1'];
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

$b 			= $_POST['barat'];
$u 			= $_POST['utara'];
$t 			= $_POST['timur'];
$s 			= $_POST['selatan'];
$nms1       = $_POST['nmsaksi1'];
$nms2       = $_POST['nmsaksi2'];
$nms3       = $_POST['nmsaksi3'];
$nms4       = $_POST['nmsaksi4'];

$detail     =$nik1.';'.$nama1.';'.$jk1.';'.$tmpl1.';'.$tgll1.';'.$almt1.';'.$nik2.';'.$nama2.';'.$jk2.';'.$tmpl2.';'.$tgll2.';'.$almt2.';'.$luas.';'.$letak.';'.$ht.';'.$b.';'.$u.';'.$t.';'.$s.';'.$nms1.';'.$nms2.';'.$nms3.';'.$nms4;
$blnr       = $_POST['blnr'];
$lurah      = $_POST['lurah'];
$thn        = date('Y');
$slash      = '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

    mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

    mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik1','$nama1', '$detail','$lurah','$idstf')");

    echo "<script>alert('Surat Keterangan Pelepasan Tanah berhasil dibuat!'); window.location = '../../cetak/c_pelepasantanah.php?kode=$kode'</script>"; 
}
?>

