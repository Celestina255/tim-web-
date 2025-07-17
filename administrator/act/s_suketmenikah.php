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
$jk 		= $_POST['jk'];
$tmp_lahir 	= $_POST['tmp_lahir'];
$tgl_lahir	= $_POST['tgl_lahir'];
$agama 		= $_POST['agama'];
$prov           = $_POST['prov'];
$kab            = $_POST['kab'];
$kec            = $_POST['kec'];
$kelurahan      = $_POST['kelurahan'];
$almt 		= $_POST['almt'];

$niki 		= $_POST['niki'];
$namai 		= $_POST['namai'];
$jki 		= $_POST['jki'];
$tmp_lahiri     = $_POST['tmp_lahiri'];
$tgl_lahiri	= $_POST['tgl_lahiri'];
$agamai 	= $_POST['agamai'];
$provi          = $_POST['provi'];
$kabi           = $_POST['kabi'];
$keci           = $_POST['keci'];
$kelurahani     = $_POST['kelurahani'];
$almti 		= $_POST['almti'];

$tgl_nikah 		= $_POST['tgl_nikah'];
$secara 		= $_POST['secara'];
$mahar 			= $_POST['mahar'];
$saksi1 		= $_POST['saksi1'];
$saksi2 		= $_POST['saksi2'];
$alasan 		= $_POST['alasan'];

$detail     =$nik.';'.$nama.';'.$jk.';'.$tmp_lahir.';'.$tgl_lahir.';'.$agama.';'.$almt.';'.$prov.';'.$kab.';'.$kec.';'.$kelurahan.';'.$niki.';'.$namai.';'.$jki.';'.$tmp_lahiri.';'.$tgl_lahiri.';'.$agamai.';'.$almti.';'.$provi.';'.$kabi.';'.$keci.';'.$kelurahani.';'.$tgl_nikah.';'.$secara.';'.$mahar.';'.$saksi1.';'.$saksi2.';'.$alasan;
$blnr		= $_POST['blnr'];
$lurah	 	= $_POST['lurah'];
$thn 		= date('Y');
                                                                
$slash		= '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;
if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd,id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

echo "<script>alert('Surat Keterangan Menikah berhasil dibuat!'); window.location = '../../cetak/c_suketmenikah.php?kode=$kode'</script>"; 
}
?>

