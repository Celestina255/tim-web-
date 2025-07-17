<?php
include '../../koneksi.php';
$kodejenis	= $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nik1 		= $_POST['nik1'];
$nama1 		= $_POST['nama1'];
$jk1 		= $_POST['jk1'];
$tmp_lahir1     = $_POST['tmp_lahir1'];
$tgl_lahir1	= $_POST['tgl_lahir1'];
$agama1 	= $_POST['agama1'];
$almt1 		= $_POST['almt1'];

$nik2 		= $_POST['nik2'];
$nama2 		= $_POST['nama2'];
$jk2 		= $_POST['jk2'];
$tmp_lahir2     = $_POST['tmp_lahir2'];
$tgl_lahir2	= $_POST['tgl_lahir2'];
$agama2 	= $_POST['agama2'];
$almt2 		= $_POST['almt2'];

$id1 		= $_POST['id1'];
$id2 		= $_POST['id2']; 

$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
$detail         =$nik1.';'.$nama1.';'.$jk1.';'.$tmp_lahir1.';'.$tgl_lahir1.';'.$agama1.';'.$almt1.';'.$id1.';'.$nik2.';'.$nama2.';'.$jk2.';'.$tmp_lahir2.';'.$tgl_lahir2.';'.$agama2.';'.$almt2.';'.$id2;                                                       
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik1','$nama1', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Perbedaan Identitas berhasil dibuat!'); window.location = '../../cetak/c_suketbedaid.php?kode=$kode'</script>"; 
}
?>

