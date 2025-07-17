<?php
include '../../koneksi.php';
$kodejenis		= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$luas 		= $_POST['luas'];
$letak 		= $_POST['letak'];
$asal 		= $_POST['asaltanah'];
$b 		= $_POST['barat'];
$u 		= $_POST['utara'];
$t 		= $_POST['timur'];
$s 		= $_POST['selatan'];
$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail         =$nik.';'.$nama.';'.$luas.';'.$letak.';'.$asal.';'.$b.';'.$u.';'.$t.';'.$s;                                                          
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Kepemilikan Tanah berhasil dibuat!'); window.location = '../../cetak/c_sukettanah.php?kode=$kode'</script>"; 
}
?>

