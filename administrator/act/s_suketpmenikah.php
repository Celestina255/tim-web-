<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$jk 		= $_POST['jk'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$kwng 		= $_POST['kwng'];
$agama 		= $_POST['agama'];
$pkjn           = $_POST['pkjn'];
$prov 		= $_POST['prov'];
$kab            = $_POST['kab'];
$kec            = $_POST['kec'];
$kelurahan      = $_POST['kelurahan'];
$almt 		= $_POST['almt'];

$nik1 		= $_POST['nik1'];
$nama1 		= $_POST['nama1'];
$jk1 		= $_POST['jk1'];
$tmp_lahir1     = $_POST['tmp_lahir1'];
$tgl_lahir1	= $_POST['tgl_lahir1'];
$kwng1 		= $_POST['kwng1'];
$agama1 	= $_POST['agama1'];
$pkjn1          = $_POST['pkjn1'];
$prov1          = $_POST['prov1'];
$kab1           = $_POST['kab1'];
$kec1           = $_POST['kec1'];
$desa1          = $_POST['desa1'];
$almt1 		= $_POST['almt1'];

$tgl_nikah 	= $_POST['tgl_nikah'];
$secara 	= $_POST['secara'];

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail         =$nik.';'.$nama.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$kwng.';'.$agama.';'.$pkjn.';'.$almt.';'.$prov.';'.$kab.';'.$kec.';'.$kelurahan.';'.$nik1.';'.$nama1.';'.$jk1.';'.$tmp_lahir1.';'.$tgl_lahir1.';'.$kwng1.';'.$agama1.';'.$pkjn1.';'.$almt1.';'.$prov1.';'.$kab1.';'.$kec1.';'.$desa1.';'.$tgl_nikah.';'.$secara;                                                                 
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Pernah Menikah berhasil dibuat!'); window.location = '../../cetak/c_suketpmenikah.php?kode=$kode'</script>"; 
}
?>

