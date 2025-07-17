<?php
include '../../koneksi.php';

$kodejenis      = $_POST['kodejenis'];
$kode		= $_POST['kodesurat'];
$kode_klasi	= $_POST['kode_klasi'];
$nmsurat	= $_POST['nmsurat'];
$no 		= $_POST['nosurat'];
$idstf          = $_POST['idstf'];
$nik 		= $_POST['nik'];
$nama 		= $_POST['nama'];
$tglm       = $_POST['tglm'];
$tmpm       = $_POST['tmpm'];
$almta      = $_POST['almtakhir'];
$namasi     = $_POST['namasi'];
$jmla       = $_POST['jmlanak'];
//$pemohon    = $_POST['pemohon'];
$detail     = $nik.';'.$nama.';'.$tglm.';'.$tmpm.';'.$almta.';'.$namasi.';'.$jmla;
$blnr       = $_POST['blnr'];
$lurah      = $_POST['lurah'];
$thn        = date('Y');
                                                                  
$slash      = '/';
$nosur = $kode_klasi.$slash.$no.$slash.$blnr.$slash.$thn;

if(isset($_POST['cetak'])){

mysqli_query($con, "INSERT INTO tb_datasurat(kode, kodejenis, nmsurat, no, id_stf, status) VALUES ('$kode','$kodejenis','$nmsurat','$nosur','$idstf','acc')");

mysqli_query($con, "INSERT INTO tb_detailsurat (kode, kodejenis, nmsurat, no, nik, nama, detail, ttd, id_ptg) values('$kode','$kodejenis','$nmsurat','$nosur','$nik','$nama', '$detail','$lurah','$idstf')");

$kodeaw		= $_POST['kodesurataw'];
$nm	        = $_POST['nm'];
$lp		= $_POST['lp'];
$ttl	 	= $_POST['ttl'];
$alamat         = $_POST['alamat'];
$agama          = $_POST['agama'];
$shdk	 	= $_POST['shdk'];
var_dump($kodeaw);
var_dump($nm);
var_dump($lp);
var_dump($ttl);
var_dump($alamat);
var_dump($agama);
var_dump($shdk);

$kodeaw		= array_filter($kodeaw);
$nm		= array_filter($nm);
$lp		= array_filter($lp);
$ttl		= array_filter($ttl);
$alamat         = array_filter($alamat);
$agama          = array_filter($agama);
$shdk		= array_filter($shdk);


$jumlah_pilih = count($nm);
for ($i=0; $i<$jumlah_pilih;$i++){
        mysqli_query($con, "INSERT INTO tb_ahliwaris SET
                kodeaw 	= '$kodeaw[$i]',
                nm    	= '$nm[$i]',
                lp      = '$lp[$i]',
                ttl  	= '$ttl[$i]',
                alamat  = '$alamat[$i]',
                agama   = '$agama[$i]',
                shdk 	= '$shdk[$i]'
        ");
	}
		
echo "<script>alert('Surat Keterangan Ahli Waris berhasil dibuat!'); window.location = '../index.php?page=c_ahliwaris&kode=$kode'</script>"; 
}


else {
	echo 'Surat Keterangan Ahli Waris Gagal dibuat !';
}
?>


